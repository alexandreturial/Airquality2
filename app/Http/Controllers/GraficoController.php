<?php

namespace App\Http\Controllers;

use App\Coleta;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function teste(Request $data){
        if($data['data1'] == 1){
            $dados = Coleta::dados($data['data1']);
            $teste1 = floatval($dados['0']->temp);
            return $teste1;
        }else if($data['data2'] == 2){
            $dados = Coleta::dados($data['data2']);
            $teste2 = floatval($dados['0']->umi);
            return $teste2;
        }else if($data['data3'] == 3){
            $dados = Coleta::dados($data['data3']);
            $teste3 = floatval($dados['0']->mp);
            return $teste3;
        }else if($data['data4'] == 4){
            $dados = Coleta::dados($data['data4']);
            $teste4 = floatval($dados['0']->lpg);
            return $teste4;
        }else if($data['data5'] == 5){
            $dados = Coleta::dados($data['data5']);
            $teste5 = floatval($dados['0']->fumo);
            return $teste5;
        }else if($data['data6'] == 6){
            $dados = Coleta::dados($data['data6']);
            $teste6 = floatval($dados['0']->co);
            return $teste6;
        }else if($data['data7'] == 7){
            $dados = Coleta::dados($data['data7']);
            $teste7 = floatval($dados['0']->co2);
            return $teste7;
        }else if($data['data8'] == 8){
            $dados = Coleta::dados($data['data8']);
            $teste8 = floatval($dados['0']->nh4);
            return $teste8;
        }else if($data['data9'] == 9){
            $dados = Coleta::dados($data['data9']);
            $teste9 = floatval($dados['0']->tol);
            return $teste9;
        }else if($data['data10'] == 10){
            $dados = Coleta::dados($data['data10']);
            $teste10 = floatval($dados['0']->ace);
            return $teste10;
        }else if($data['data11'] == 11){
            $dados = Coleta::dados($data['data11']);
            $teste11 = floatval($dados['0']->eta);
            return $teste11;
        }
    }

    public function ultimosdados(){
        $dados= Coleta::teste();
        return view('charts', compact('dados'));
    }
}
