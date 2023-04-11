<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Carrinho extends Model
{
    protected $fillable =['USUARIO_ID','PRODUTO_ID','ITEM_QTD'];
    protected $table ='CARRINHO_ITEM';

    public $timestamps = false;

    public function Produto(){
        return $this->belongsTo(Produto::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }
}
