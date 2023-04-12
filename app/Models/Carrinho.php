<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use App\Models\Carrinho;


class Carrinho extends Model
{
    protected $fillable =['USUARIO_ID','PRODUTO_ID','ITEM_QTD'];
    protected $table ='CARRINHO_ITEM';

    public $timestamps = false;

    public function Produto(){
        return $this->belongsTo(Produto::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }
    public function somaDesconto($id){
        $dados = Carrinho::where('USUARIO_ID', $id)->get();
        $desconto=0;
            for($i=0;$i< count($dados);$i++){
                $soma = Produto::where('PRODUTO_ID', $dados[$i]['PRODUTO_ID'])->get();
                $desconto += $soma[0]['PRODUTO_DESCONTO'];
            }
            return number_format(($desconto), 2, ',', '.');
    }
    public function somaTotal($id){
        $dados = Carrinho::where('USUARIO_ID', $id)->get();
        $preco=0;
            for($i=0;$i< count($dados);$i++){
                $soma = Produto::where('PRODUTO_ID', $dados[$i]['PRODUTO_ID'])->get();
                $preco += $soma[0]['PRODUTO_PRECO'];
            }
            return number_format(($preco), 2, ',', '.');
    }
    public function somaFinal($id){
        $dados = Carrinho::where('USUARIO_ID', $id)->get();
        $desconto=0;
        $preco=0;
            for($i=0;$i< count($dados);$i++){
                $soma = Produto::where('PRODUTO_ID', $dados[$i]['PRODUTO_ID'])->get();
                $desconto += $soma[0]['PRODUTO_DESCONTO'];
                $preco += $soma[0]['PRODUTO_PRECO'];
            }
            return number_format(( $preco - $desconto), 2, ',', '.');
    }
}
