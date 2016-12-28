<?php

function getNumWeather($amDays)
{

	$city = "Astrakhan"; // город. Можно и по-русски написать, например: Брянск
$mode = "json"; // в каком виде мы получим данные
$units = "metric"; // Единицы измерения. metric или imperial
$lang = "ru"; // язык
$countDay = 7; // количество дней. Максимум 14 дней
 
// формируем урл для запроса
$url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=$city&mode=$mode&units=$units&cnt=$countDay&lang=$lang&APPID=a8527f242d3645e8d9d74a4660bf8b40";
// делаем запрос к апи
$data = @file_get_contents($url);
// если получили данные
if($data){
    // декодируем полученные данные
    $dataJson = json_decode($data);
    // получаем только нужные данные
    $arrayDays = $dataJson->list;
    // выводим данные
	$i=0;
	$res = 0;
	echo $amDays;
    foreach($arrayDays as $oneDay)
    {
		
		if($i==$amDays)
		{ 
        	$res = $oneDay->temp->day;
        	//echo "Погода: " . $oneDay->weather[0]->description . "<br/>";
		}
		$i = $i + 1;        
    }
	return $res;	
}
else{
    //echo "Сервер не доступен!";
	return "Error";
    }

	

}


function getStringWeather($amDays)
{

	$city = "Astrakhan"; // город. Можно и по-русски написать, например: Брянск
$mode = "json"; // в каком виде мы получим данные
$units = "metric"; // Единицы измерения. metric или imperial
$lang = "ru"; // язык
$countDay = 7; // количество дней. Максимум 14 дней
 
// формируем урл для запроса
$url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=$city&mode=$mode&units=$units&cnt=$countDay&lang=$lang&APPID=a8527f242d3645e8d9d74a4660bf8b40";
// делаем запрос к апи
$data = @file_get_contents($url);
// если получили данные
if($data){
    // декодируем полученные данные
    $dataJson = json_decode($data);
    // получаем только нужные данные
    $arrayDays = $dataJson->list;
    // выводим данные
	$i=0;
	$res = "";
	echo $amDays;
    foreach($arrayDays as $oneDay)
    {
		
		if($i==$amDays)
		{ 
        	$res = $oneDay->weather[0]->description;
        	//echo "Погода: " . $oneDay->weather[0]->description . "<br/>";
		}
		$i = $i + 1;        
    }
return $res;	
}
else{
    //echo "Сервер не доступен!";
	return "Error";
    }
}

getNumWeather(0);

?>
