<?php

use app\Awesome\Economia;

require 'app/Awesome/Economia.php';

$objEcon=new Economia();

if(!isset($argv[2])){
   die('É preciso enviar duas moedas!!!');
}

$moedaA=$argv[1];
$moedaB=$argv[2];

$dadosCotacao=$objEcon->consultarCotacao($moedaA,$moedaB);
$dadosCotacao=$dadosCotacao[$moedaA.$moedaB]??[];

echo 'Moedas:'.$moedaA.'->'.$moedaB."<br>";
echo 'Compra'.($dadosCotacao['bind']??'Desconhecido')."<br>";
echo 'Venda'.($dadosCotacao['ask']??'Desconhecido')."<br>";


?>