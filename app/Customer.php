<?php
/**
 * Created by Redi Linxa
 * Date: 24/02/2020
 * Time: 01:28
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['firstName', 'lastName', 'telephone'];

    public function account(){
        return $this->hasOne('App\Account');
    }
}
