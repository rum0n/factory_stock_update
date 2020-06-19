<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactoryStock extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
