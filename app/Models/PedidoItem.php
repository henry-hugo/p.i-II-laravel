<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    protected $table ='PEDIDO_ITEM';
    protected $fillable =['PRODUTO_ID', 'PEDIDO_ID', 'ITEM_QTD', 'ITEM_PRECO'];

    public $timestamps = false;



    public function somaFinalPedido($id ){
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
                $quantidade1 = $dados[$i]['ITEM_QTD'];
                $somaFinal= $preco * $quantidade1;
                $somaFina2= $desconto * $quantidade1;
                $sub = $somaFinal - $somaFina2;
                $resultado += $sub;
            }

            return number_format(( $resultado), 2, ',', '.');
    }

    public function Produto(){
        return $this->belongsTo(Produto::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }

}
