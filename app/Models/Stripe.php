<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stripe extends Model
{
    protected $guarded = ['id'];

    public function getStripeTokenAttribute($value)
    {
        return decrypt($value);
    }

    public function setStripeTokenAttribute($value)
    {
        $this->attributes['stripe_token'] = encrypt($value);
    }
    public function getAmountAttribute($value)
    {
        return number_format($value / 100, 2);
    }
}
