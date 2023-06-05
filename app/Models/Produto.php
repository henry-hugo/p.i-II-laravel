<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    use HasFactory;
    protected $table = "PRODUTO";
    protected $primaryKey = "PRODUTO_ID";

    public function ProdutoImagem(){
        return $this->hasMany(ProdutoImagem::class, 'PRODUTO_ID','PRODUTO_ID');
    }
    public function ProdutoEstoque(){
        return $this->belongsTo(ProdutoEstoque::class, 'PRODUTO_ID','PRODUTO_ID');
    }
    public function Categoria(){
        return $this->belongsTo(Categoria::class, 'CATEGORIA_ID','CATEGORIA_ID');
    }
    public function getPrecoDesconto(){
        return number_format(($this->PRODUTO_PRECO - $this->PRODUTO_DESCONTO), 2, ',', '.');
    }
    public function preco($quantidade){
        return number_format((($this->PRODUTO_PRECO - $this->PRODUTO_DESCONTO) * $quantidade ), 2, ',', '.');
    }
    public function ordem(){
        return Produto::orderBy('PRODUTO_PRECO')->paginate(20);
    }

    public function total($itens){
        //dd( $itens[0]->Produto->PRODUTO_DESCONTO);
        $resultado = 0;
        for($i = 0; $i<count($itens); $i++){
            $qtd = $itens[$i]['ITEM_QTD'];
            $preco = $itens[$i]['ITEM_PRECO']*$qtd;
            $des = $itens[$i]->Produto->PRODUTO_DESCONTO * $qtd;
            $precodes = $preco - $des;
            $resultado += $precodes;
        }

        return number_format(($resultado), 2, ',', '.');
    }

}
