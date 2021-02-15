<?php

$url = "http://localhost:8080/api/notes";
$retorno = file_get_contents($url);

// json para array
$data = json_decode($retorno,1);
	
// echo no array
foreach ($data as $value) {
	echo $value['titulo']."<br>".$value['texto']."<br>";
}
