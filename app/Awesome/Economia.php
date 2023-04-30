<?php
    namespace app\Awesome;

    class Economia{

        const BASE_URL='http://economia.awesomeapi.com.br/json';

        public function consultarCotacao($moedaA,$moedaB){
            return $this->get('/last/'.$moedaA.'-'.$moedaB);
        }

        public function consultarUltimosFechamentos($moedaA,$moedaB,$dias=1){
            return $this->get('/daily/'.$moedaA.'-'.$moedaB.'/'.$dias);
        }

        public function get($resource){
            //ENDPOINT
            $endpoint=self::BASE_URL.$resource;
            
            //INICIA O CURL
            $curl=curl_init();

            //CONFIG CURL
            curl_setopt_array($curl,[
                CURLOPT_URL=>$endpoint,
                CURLOPT_RETURNTRANSFER=>true,
                CURLOPT_CUSTOMREQUEST=>'GET'
            ]);

            $res=curl_exec($curl);

            curl_close($curl);

            return json_decode($res,true);
        }
    }

?>