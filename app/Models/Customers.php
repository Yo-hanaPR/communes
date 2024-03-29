<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table= 'customers';
    protected $fillable=[
        'dni',
        'id_reg',
        'id_com',
        'email',
        'name',
        'lastname',
        'address',
        'date_reg',
        'status'
    ];

    public function commune(){
        return $this->belongsTo(Communes::class, 'id_com', 'id_com');
    }
}
