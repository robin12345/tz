<?php

class Main {
    function __get($property) {
        //...
    }

    function __set($property, $value) {
        //...
    }

    //��������� ������ �� ���� ������ � ������
    function bd2Array($data){
        $arr=array();
        while($row=mysql_fetch_assoc($data)) {
            $arr[]= $row;
        }
        return $arr;
    }
}