<?php

class Timetable extends Main {

    //Добавляем поездку
    public function add_trip($id_region,$id_courier,$date_out,$date_in,$date_back){
        $sql = "INSERT INTO timetable(id_region, id_couriers, date_out, date_in, date_back)
                VALUE ('$id_region','$id_courier','$date_out','$date_in','$date_back')";
        mysql_query($sql) or die (mysql_error());

    }

    //Узнаем дату окончания поездки, чтобы отправить курьеа в новый рейс
    public function last_trip($id_couriers){
        $sql = "SELECT date_back FROM timetable WHERE id_couriers = $id_couriers ORDER BY date_back DESC LIMIT 1";
        $sql = mysql_query($sql) or die(mysql_error());
        $sql = $this->bd2Array($sql);
        return $sql;
    }

    //Выбираем все рейсы
    public function find_all_tables (){
        $sql = "SELECT * FROM timetable ORDER BY id DESC";
        $sql = mysql_query($sql) or die(mysql_error());
        $sql = $this->bd2Array($sql);
        return $sql;
    }

    //Выбираем рейсы в заданом интервале времени
    public function find_select_date($date_start,$date_end){
        $sql = "SELECT * FROM timetable WHERE date_out BETWEEN FROM_UNIXTIME($date_start) AND FROM_UNIXTIME($date_end)";
        $sql = mysql_query($sql) or die(mysql_error());
        $sql = $this->bd2Array($sql);
        return $sql;
    }

    // Скрипт заполняющий расписание
    public function fill_timetable($regions = array(),$couriers = array()){
        // Получаем массив регионов
        $reg = new Regions();
        $regions = $reg->find_regions();
        // Массив курьеров
        $cour = new Couriers();
        $couriers = $cour->find_all_couriers();
        // С какого времени хотим заполнить
        $start_data = mktime(0,0,0,6,1,2015);
        // По сегодняшний день
        $today = time() + 86400;
        //Пробегаем по всем дням интервала
        for ( $i = $start_data; $i < $today; $i = $i + 86400){
            //Формируем поездки для каждого курьера
            for ($j = 0; $j < count($couriers); $j++){
                //Получаем данные о прибытии с последней поездки
                $last = $this->last_trip($couriers[$j]['id']);
                $last = $last[0]['date_back'];
                $current = date('Y-m-d', $i);
                //Если курьер прибыл из поездки отправляем его снова в случайный регион
                if( $last < $current ){
                    $count_reg = count($regions) - 1;
                    $numb = rand(0,$count_reg);
                    $id_region = $regions[$numb]['id'];
                    $id_courier = $couriers[$j]['id'];
                    $date_out = $i;
                    $date_in = $i + $regions[$numb]['days_there']*86400;
                    $date_back = $date_in + $regions[$numb]['days_back']*86400;

                    $date_out = date('Y-m-d', $date_out);
                    $date_in = date('Y-m-d', $date_in);
                    $date_back = date('Y-m-d', $date_back);
                    $this->add_trip($id_region,$id_courier,$date_out,$date_in,$date_back);
                }
            }
        }
    }

}