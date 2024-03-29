<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_reg',
        'descripcion',
        'status'
    ];
    public function communes()
    {
        return $this->hasMany(Communes::class, 'id_reg','id_reg');
    }
}
