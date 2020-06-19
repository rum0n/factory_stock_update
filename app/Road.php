<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    public function srRoads()
    {
        return $this->hasMany(SrRoad::class);
    }
}
