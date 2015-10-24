<?php

class TableController extends Controller {

    // Функция для дополнения массива с рейсами данными о курьере и регионе
    public function adding_data($timetables){
        $reg = new Regions();
        $cur = new Couriers();

        $regions = $reg->find_regions();
        $couriers = $cur->find_all_couriers();

        for($i = 0; $i < count($timetables); $i++){
            for($j = 0; $j < count($couriers); $j++){
                if ($timetables[$i]['id_couriers'] == $couriers[$j]['id']){
                    $timetables[$i]['data_courier'] = $couriers[$j];
                }
            }
            for($r = 0; $r < count($regions); $r++){
                if ($timetables[$i]['id_region'] == $regions[$r]['id']){
                    $timetables[$i]['data_region'] = $regions[$r];
                }
            }
        }

        return $timetables;
    }

    // Выводим на главную страницу все расписание
    public function actionView(){

        // ЗАПОЛНЕНИЕ РАСПИСАНИЯ
        //$trip = new Timetable();
        //$trip->fill_timetable();

        $table = new Timetable();
        $timetables = $table->find_all_tables();

        $timetables = $this->adding_data($timetables);

        $current_url = "http://".$_SERVER['HTTP_HOST'].'/';
        echo $this->twig->render("index.html", array(
            'trips' => $timetables,
            'url' => $current_url
        ));
    }

    // Загружаем страницу с формой отправки курьера
    public function actionIndex(){
        $reg = new Regions();
        $regions = $reg->find_regions();
        echo $this->twig->render("push.html", array(
            'regions' => $regions
        ));
    }

    // Функция для поиска рейсов в заданном интервале времени
    public function actionUpdate(){
        $date_end = $_POST['date_end'];
        $date_start = $_POST['date_start'];
        $date_end = strtotime($date_end);
        $date_start = strtotime($date_start);
        $table = new Timetable();
        $result = $table->find_select_date($date_start,$date_end);
        $result = $this->adding_data($result);
        $result = json_encode($result);
        print_r($result);
    }

    // Добавляем новый рейс
    public function actionAdd(){
        $region = $_POST['region'];
        $out = $_POST['date_out'];
        $there = $_POST['date_there'];
        $back = $_POST['date_back'];
        $courier = $_POST['courier'];
        $table = new Timetable();
        $table->add_trip($region,$courier,$out,$there,$back);

        $redirect = new Redirect;
        $redirect->redir("",'');
    }

    //Проверяем выбранную дату, чтобы подобрать свободного курьера
    public function actionCheck(){
        $seek = $_POST['date'];
        $seek = strtotime($seek);
        $cour = new Couriers();
        $aa = $cour->find_free_courier($seek);
        $aa = json_encode($aa);
        print_r($aa);
    }

}