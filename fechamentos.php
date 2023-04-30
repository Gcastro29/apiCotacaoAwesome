<?php


use app\Awesome\Economia;

require 'app/Awesome/Economia.php';

$objEcon=new Economia();

if(!isset($argv[2])){
    die('É preciso enviar duas moedas!!!');
}

$moedaA=$argv[1];
$moedaB=$argv[2];

print_r($moedaA);
print_r($moedaB);

$dadosFechamento=$objEcon->consultarUltimosFechamentos($moedaA,$moedaB,15);


echo 'Moedas:'.$moedaA.'->'.$moedaB."<br>";

foreach($dadosFechamento as $fechamento){
  $output=[ date('Y-m-d',$fechamento['timestamp']),
   number_format($fechamento['bind'],4,'.',''),
   number_format($fechamento['ask'],4,'.',''),
];

   echo implode(' | ',$output)."<br>";
}





?>