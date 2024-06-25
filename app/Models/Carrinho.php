<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrinho extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tbl_carrinho'; 
    protected $primaryKey = 'id_tbl_carrinho';
    public $incrementing = true;
    protected $fillable = [
        'valor_total'
    ];

    protected $dates = ['deleted_at'];
    
}
