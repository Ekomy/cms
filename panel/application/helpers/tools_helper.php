<?php

function convertToSEO($text){

    $turkce = array("ç","Ç","Ğ","ğ","ü","Ü","Ö","ö","İ","ı","ş","Ş",".",",",";","\""," ","?","*","!","+","_","'","&","%","^",":");
    $convert = array("c","c","g","g","u","u","o","o","i","i","s","s","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-");

    return strtolower(str_replace($turkce,$convert,$text));

}