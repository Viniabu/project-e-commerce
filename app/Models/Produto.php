<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tbl_produto'; 
    protected $primaryKey = 'id_tbl_produto';
    public $incrementing = true;
    
    
    protected $fillable = [ //campos que podem ser preenchidos
        'nome_produto',
        'descricao_produto',
        'preco_produto',
        'estoque',
        ];

        protected $dates = ['deleted_at'];
        

}
