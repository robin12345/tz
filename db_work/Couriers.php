<?php

class Couriers extends Main {
    //Выбираем всех курьеров
    public function find_all_couriers (){
        $sql = "SELECT * FROM couriers";
        $sql = mysql_query($sql) or die(mysql_error());
        $sql = $this->bd2Array($sql);
        return $sql;
    }
    //Ищим свободного курьера
    public function find_free_courier($seek){
        $sql = "SELECT *
                FROM couriers
                WHERE NOT id = ANY (SELECT id_couriers FROM timetable t
                WHERE FROM_UNIXTIME($seek) BETWEEN t.date_out AND t.date_back)";
        $sql = mysql_query($sql) or die (mysql_error());
        $sql =  $this->bd2Array($sql);
        return $sql;
    }
}