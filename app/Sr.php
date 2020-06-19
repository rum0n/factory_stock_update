<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sr extends Model
{

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function sr_roads()
    {
        return $this->hasMany(SrRoad::class);
    }

}
