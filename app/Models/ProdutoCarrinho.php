<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoCarrinho extends Model
{
    use HasFactory;
    protected $table = 'tbl_produto_carrinho';     
    public $timestamps = false;
    protected $fillable = [
        'id_tbl_carrinho',
        'id_tbl_produto',
        'quantidade'
    ];
       
}
