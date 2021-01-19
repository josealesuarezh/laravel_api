<?php

namespace App;

use App\Scopes\BuyerScope;

class Buyer extends User
{
    /**
     * @var mixed
     */

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BuyerScope());
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
