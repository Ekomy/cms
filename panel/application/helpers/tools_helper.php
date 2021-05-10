<?php

function convertToSEO($text){

    $turkce = array("ç","Ç","Ğ","ğ","ü","Ü","Ö","ö","İ","ı","ş","Ş",".",",",";","\""," ","?","*","!","+","_","'","&","%","^",":");
    $convert = array("c","c","g","g","u","u","o","o","i","i","s","s","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-");

    return strtolower(str_replace($turkce,$convert,$text));

}

function getFileName(){
    $fileName = $this->product_image_model->get(
        array(
            "id" => "$id"
        )
    );
    return ($fileName->image_url);

}

function get_readable_date($date){

    return strftime('%e %B %Y', strtotime($date));

}