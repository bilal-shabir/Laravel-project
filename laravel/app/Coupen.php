<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupen extends Model
{
    public static function returnByCode($code){
        return self::where('code', '$code');
    }

    public function discount($total){
        if($this->type == 'fixed'){
            return $this->value;
        }
        elseif($this->type == 'percent'){
            return ($total*$this->percent) /100;
        }
        else{
            return 0;
        }
    }
}
