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

        $somaFinal=0;
        $resultado = 0;
            for($i=0;$i< count($dados);$i++){
                $desconto=0;
                $soma = Produto::where('PRODUTO_ID', $dados[$i]['PRODUTO_ID'])->get();
                $desconto += $soma[0]['PRODUTO_DESCONTO'];
                $quantidade1 = $dados[0]['ITEM_QTD'];
                $somaFinal =$desconto * $quantidade1;
                $resultado += $somaFinal;
            }
            return number_format(($resultado), 2, ',', '.');
    }



    public function somaTotal($id , $quantidade){
        $dados = Carrinho::where('USUARIO_ID', $id)->get();
        $somaFinal=0;
        $resultado = 0;

            for($i=0;$i< count($dados);$i++){
                $preco=0;
                $soma = Produto::where('PRODUTO_ID', $dados[$i]['PRODUTO_ID'])->get();
                $preco += $soma[0]['PRODUTO_PRECO'];
                $quantidade1 = $dados[0]['ITEM_QTD'];
                $resultado = $preco * $quantidade1;
                $somaFinal += $resultado;
            }
            return number_format(($somaFinal), 2, ',', '.');
    }



    public function somaFinal($id , $quantidade){
        $dados = Carrinho::where('USUARIO_ID', $id)->get();
        $somaFinal=0;
        $somaFina2=0;
        $resultado = 0;
            for($i=0;$i< count($dados);$i++){
                $desconto=0;
                $preco=0;
                $sub =0;
                $soma = Produto::where('PRODUTO_ID', $dados[$i]['PRODUTO_ID'])->get();
                $desconto += $soma[0]['PRODUTO_DESCONTO'];
                $preco += $soma[0]['PRODUTO_PRECO'];
                $quantidade1 = $dados[0]['ITEM_QTD'];
                $somaFinal= $preco * $quantidade1;
                $somaFina2= $desconto * $quantidade1;
                $sub = $somaFinal - $somaFina2;
                $resultado += $sub;
            }

            return number_format(( $resultado), 2, ',', '.');
    }



    public function desPrecoDesconto($id , $quantidade){
        $dados = Carrinho::where('USUARIO_ID', $id)->get();
        $somaFinal=0;
        $somaFina2=0;
        $resultado = 0;
            for($i=0;$i< count($dados);$i++){
                $desconto=0;
                $preco=0;
                $sub =0;
                $soma = Produto::where('PRODUTO_ID', $dados[$i]['PRODUTO_ID'])->get();
                $desconto += $soma[0]['PRODUTO_DESCONTO'];
                $preco += $soma[0]['PRODUTO_PRECO'];
                $quantidade1 = $dados[0]['ITEM_QTD'];
                $somaFinal= $preco * $quantidade1;
                $somaFina2= $desconto * $quantidade1;
                $sub = $somaFinal - $somaFina2;
                $resultado += $sub;
            }

            $desconto = $resultado / 10;
            return number_format(( $resultado - $desconto), 2, ',', '.');
    }


    public function somaQTD($quantidade , $preco){
        return number_format(( $preco * $quantidade), 2, ',', '.');
    }

}
