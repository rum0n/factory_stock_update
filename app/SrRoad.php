<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SrRoad extends Model
{
    public function sr()
    {
        return $this->belongsTo(Sr::class);
    }

    public function road()
    {
        return $this->belongsTo(Road::class);
    }

}
