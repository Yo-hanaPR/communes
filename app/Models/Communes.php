<?php

namespace App\Models;
use App\Models\Regions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communes extends Model
{
    use HasFactory;

    public function region()
    {
       return $this->belongsTo(Regions::class, 'id_reg','id_reg');
    }

    public function customers()
    {
        return $this->hasMany(Customers::class, 'id_com', 'id_com');
    }
}
