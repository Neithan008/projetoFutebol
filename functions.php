<?php

    function GetCompeticoes(){
        $uri = 'http://api.football-data.org/v2/competitions/';
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: c710e33b71fe486c949abef77404ed69';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        $api_result = json_decode($response);

        return $api_result;

    }

    function GetCompeticao($id){
        $uri = 'http://api.football-data.org/v2/competitions/'.$id.'/teams';
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: c710e33b71fe486c949abef77404ed69';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);

        if($response === False){
            return false;
        }else{
            $api_result = json_decode($response);

            return $api_result;
        }
    }

    function GetTime($id){
        $uri = 'http://api.football-data.org/v2/teams/'.$id;
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: c710e33b71fe486c949abef77404ed69';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        $api_result = json_decode($response);

        return $api_result;

    }

    function calcularIdade($data){
        $idade = 0;
        $data_nascimento = date('Y-m-d', strtotime($data));
           $data = explode("-",$data_nascimento);
           $anoNasc    = $data[0];
           $mesNasc    = $data[1];
           $diaNasc    = $data[2];
        
           $anoAtual   = date("Y");
           $mesAtual   = date("m");
           $diaAtual   = date("d");
        
           $idade      = $anoAtual - $anoNasc;
           if ($mesAtual < $mesNasc){
               $idade -= 1;
           } elseif ( ($mesAtual == $mesNasc) && ($diaAtual <= $diaNasc) ){
               $idade -= 1;
           }
        
           return $idade;
       }
?>