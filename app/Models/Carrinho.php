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


    public function somaDesconto($id , $quantidade){
        $dados = Carrinho::where('USUARIO_ID', $id)->get();
        $desconto=0;
            for($i=0;$i< count($dados);$i++){
                $soma = Produto::where('PRODUTO_ID', $dados[$i]['PRODUTO_ID'])->get();
                $desconto += $soma[0]['PRODUTO_DESCONTO'];
            }
            return number_format(($desconto* $quantidade), 2, ',', '.');
    }



    public function somaTotal($id , $quantidade){
        $dados = Carrinho::where('USUARIO_ID', $id)->get();
        $preco=0;
            for($i=0;$i< count($dados);$i++){
                $soma = Produto::where('PRODUTO_ID', $dados[$i]['PRODUTO_ID'])->get();
                $preco += $soma[0]['PRODUTO_PRECO'];
            }
            return number_format(($preco*$quantidade), 2, ',', '.');
    }



    public function somaFinal($id , $quantidade){
        $dados = Carrinho::where('USUARIO_ID', $id)->get();
        $desconto=0;
        $preco=0;
            for($i=0;$i< count($dados);$i++){
                $soma = Produto::where('PRODUTO_ID', $dados[$i]['PRODUTO_ID'])->get();
                $desconto += $soma[0]['PRODUTO_DESCONTO'];
                $preco += $soma[0]['PRODUTO_PRECO'];
            }
            $preco *= $quantidade;
            $desconto *= $quantidade;
            return number_format(( $preco - $desconto), 2, ',', '.');
    }



    public function desPrecoDesconto($id , $quantidade){
        $dados = Carrinho::where('USUARIO_ID', $id)->get();
        $preco=0;
        $descontoproduto=0;
            for($i=0;$i< count($dados);$i++){
                $soma = Produto::where('PRODUTO_ID', $dados[$i]['PRODUTO_ID'])->get();
                $descontoproduto += $soma[0]['PRODUTO_DESCONTO'];
                $preco += $soma[0]['PRODUTO_PRECO'];
            }
            $preco *= $quantidade;
            $descontoproduto *= $quantidade;
            $preco -=  $descontoproduto ;
            $desconto = $preco / 10;
            return number_format(( $preco - $desconto), 2, ',', '.');
    }

    
    public function somaQTD($quantidade , $preco){
        return number_format(( $preco * $quantidade), 2, ',', '.');
    }

}
