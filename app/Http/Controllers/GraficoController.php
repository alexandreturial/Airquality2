<?php

namespace App\Http\Controllers;

use App\Coleta;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function teste(Request $data){
        if($data['data'] == 1){
            $dados = Coleta::dados($data);

            $teste = floatval($dados['0']->temp);
            return $teste;
        }else if($data['data2'] == 2){
            $dados = Coleta::dados($data);
            $teste = floatval($dados['0']->fumo);
            return $teste;
        }else if($data['data'] == 3){
            $dados = Coleta::dados($data);
            $teste = floatval($dados['0']->fumo);
            return $teste;
        }else if($data['data'] == 4){
            $dados = Coleta::dados($data);
            $teste = floatval($dados['0']->fumo);
            return $teste;
        }else if($data['data'] == 5){
            $dados = Coleta::dados($data);
            $teste = floatval($dados['0']->fumo);
            return $teste;
        }else if($data['data'] == 6){
            $dados = Coleta::dados($data);
            $teste = floatval($dados['0']->fumo);
            return $teste;
        }else if($data['data'] == 7){
            $dados = Coleta::dados($data);
            $teste = floatval($dados['0']->fumo);
            return $teste;
        }else if($data['data'] == 8){
            $dados = Coleta::dados($data);
            $teste = floatval($dados['0']->fumo);
            return $teste;
        }else if($data['data'] == 9){
            $dados = Coleta::dados($data);
            $teste = floatval($dados['0']->fumo);
            return $teste;
        }else if($data['data'] == 10){
            $dados = Coleta::dados($data);
            $teste = floatval($dados['0']->fumo);
            return $teste;
        }else if($data['data'] == 11){
            $dados = Coleta::dados($data);
            $teste = floatval($dados['0']->fumo);
            return $teste;
        }
    }

    public function ultimosdados(){

        $dados= Coleta::teste();

        return view('home', compact('dados'));
    }
}
