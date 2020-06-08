<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Util extends Model
{
    public static function limitCharacters($value)
    {
        if(strlen($value) > 140){
            echo substr($value, 0, 140) . "...";
        }
        else{
            echo $value;
        }
    }

    public static function shaGitHub($value)
    {
        if(strlen($value) > 7){
            echo substr($value, 0, 7);
        }
        else{
            echo $value;
        }
    }

    public static function maxMsgCommit($value)
    {
        if(strlen($value) > 150){
            echo substr($value, 0, 150);
        }
        else{
            echo $value;
        }
    }

    public static function getDateAttribute($value)
    {
        if($value == null){
            return "Indefinido";
        }
        else{
            return Carbon::parse($value)->format('d/m/Y');
        }
    }

    public static function getPoint($value)
    {
        $values = ['Positivo', 'Negativo'];
        return $values[$value];
    }
}
