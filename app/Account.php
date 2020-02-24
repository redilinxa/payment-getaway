<?php
/**
 * Created by Redi Linxa
 * Date: 13/12/2019
 * Time: 01:28
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['customer_id', 'street', 'house_no', 'zip_code', 'city', 'owner', 'iban'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
