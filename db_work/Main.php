<?php

class Main {
    function __get($property) {
        //...
    }

    function __set($property, $value) {
        //...
    }

    //Переводим данные из базы данных в массив
    function bd2Array($data){
        $arr=array();
        while($row=mysql_fetch_assoc($data)) {
            $arr[]= $row;
        }
        return $arr;
    }
}