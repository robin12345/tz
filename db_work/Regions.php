<?php

class Regions extends Main {
    //�������� ��� �������
    public function find_regions (){
        $sql = "SELECT * FROM regions";
        $sql = mysql_query($sql) or die(mysql_error());
        $sql = $this->bd2Array($sql);
        return $sql;
    }
}