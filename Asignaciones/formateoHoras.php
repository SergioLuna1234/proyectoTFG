<?php
function formateo($hora){
    switch ($hora){
        case 1:$hora = "8:00 - 9:00";return $hora;break;
        case 2:$hora = "9:00 - 10:00";return $hora;break;
        case 3:$hora = "10:00 - 11:00";return $hora;break;
        case 4:$hora = "11:30 - 12:30";return $hora;break;
        case 5:$hora = "12:30 - 13:30";return $hora;break;
        case 6:$hora = "13:30 - 14:30";return $hora;break;
        case 7:$hora = "15:15 - 16:10";return $hora;break;
        case 8:$hora = "16:10 - 17:00";return $hora;break;
        case 9:$hora = "17:00 - 17:55";return $hora;break;
        case 10:$hora = "18:15 - 19:10";return $hora;break;
        case 11:$hora = "19:10 - 20:05";return $hora;break;
        case 12:$hora = "20:05 - 21:00";return $hora;
    }
}

