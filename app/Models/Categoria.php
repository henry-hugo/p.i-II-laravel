<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Categoria extends Model
{
    use HasFactory;
    protected $table = "CATEGORIA";
    protected $primaryKey = "CATEGORIA_ID";

    public function Produtos(){
        return $this->belongsToMany(Produto::class, 'CATEGORIA_ID','CATEGORIA_ID');
    }
}
