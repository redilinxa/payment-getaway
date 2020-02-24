<?php
/**
 * Created by Redi Linxa
 * Date: 11/12/2019
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
