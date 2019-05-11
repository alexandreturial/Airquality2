<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coleta extends Model
{
    protected $table = 'coleta';

    protected $fillable = [
        'id', 'fumo','temp','umi','mp','lpg','co','co2','nh4','tol','ace','eta'
    ];

    public static function dados($teste){
        if($teste['data'] == 1){
            $dados = DB::table('coleta')->select('temp')->orderBy('id', 'DESC')->limit(1)->get();
        }elseif($teste['data'] == 2){
            $dados = DB::table('coleta')->select('umi')->orderBy('id', 'DESC')->limit(1)->get();

        }elseif($teste['data'] == 3){
            $dados = DB::table('coleta')->select('mp')->orderBy('id', 'DESC')->limit(1)->get();

        }elseif($teste['data'] == 4){
            $dados = DB::table('coleta')->select('lpg')->orderBy('id', 'DESC')->limit(1)->get();

        }elseif($teste['data'] == 5){
            $dados = DB::table('coleta')->select('fumo')->orderBy('id', 'DESC')->limit(1)->get();

        }elseif($teste['data'] == 6){
            $dados = DB::table('coleta')->select('co')->orderBy('id', 'DESC')->limit(1)->get();

        }elseif($teste['data'] == 7){
            $dados = DB::table('coleta')->select('co2')->orderBy('id', 'DESC')->limit(1)->get();

        }elseif($teste['data'] == 8){
            $dados = DB::table('coleta')->select('nh4')->orderBy('id', 'DESC')->limit(1)->get();

        }elseif($teste['data'] == 9){
            $dados = DB::table('coleta')->select('tol')->orderBy('id', 'DESC')->limit(1)->get();

        }elseif($teste['data'] == 10){
            $dados = DB::table('coleta')->select('ace')->orderBy('id', 'DESC')->limit(1)->get();

        }elseif($teste['data'] == 11){
            $dados = DB::table('coleta')->select('eta')->orderBy('id', 'DESC')->limit(1)->get();

        }

        return $dados;
    }

    public static function teste(){
        $dados = DB::table('coleta')->orderBy('id','DESC')->limit(1)->get();
            return $dados;
    }

}
