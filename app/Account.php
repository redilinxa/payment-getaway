<?php
/**
 * Created by Redi Linxa
 * Date: 24/02/2020
 * Time: 01:28
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['customer_id', 'street', 'house_no', 'zip_code', 'city', 'owner', 'iban', 'paymentId'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function getFullName(){
        return $this->firstName . ' ' . $this->lastName;
    }
}
