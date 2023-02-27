<?php
function revertir($horaParam){
    if($horaParam == "8:00 - 9:00"){
        $horaParam = 1;
        return $horaParam;
    }
    if($horaParam == "9:00 - 10:00"){
        $horaParam = 2;
        return $horaParam;
    }
    if($horaParam == "10:00 - 11:00"){
        $horaParam = 3;
        return $horaParam;
    }
    if($horaParam == "11:30 - 12:30"){
        $horaParam = 4;
        return $horaParam;
    }
    if($horaParam == "12:30 - 13:30"){
        $horaParam = 5;
        return $horaParam;
    }
    if($horaParam == "13:30 - 14:30"){
        $horaParam = 6;
        return $horaParam;
    }
    if($horaParam == "15:15 - 16:10"){
        $horaParam = 7;
        return $horaParam;
    }
    if($horaParam == "16:10 - 17:00"){
        $horaParam = 8;
        return $horaParam;
    }
    if($horaParam == "17:00 - 17:55"){
        $horaParam = 9;
        return $horaParam;
    }
    if($horaParam == "18:15 - 19:10"){
        $horaParam = 10;
        return $horaParam;
    }
    if($horaParam == "19:10 - 20:05"){
        $horaParam = 11;
        return $horaParam;
    }
    if($horaParam == "20:05 - 21:00"){
        $horaParam = 12;
        return $horaParam;
    }
}

?>
