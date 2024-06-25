<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tbl_venda'; 
    protected $primaryKey = 'id_tbl_venda';
    public $incrementing = true;
    protected $fillable = [
        'valor_total',
        'fk_tbl_carrinho_tbl_venda'
    ];
    
    protected $dates = ['deleted_at'];
}
