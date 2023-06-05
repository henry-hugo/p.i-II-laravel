<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\Status;

class CarrinhoController extends Controller
{
       public function store(Request $request , $produto){
              $item = Carrinho::where('USUARIO_ID', Auth::user()->USUARIO_ID)
        ->where('PRODUTO_ID', $produto)->first();

        //dd($request->all());
        if($item){
            $item =$item->update([
                'ITEM_QTD'=> (int)$request->quantidadeSelect
                ]);
                return redirect(route('carrinho.index'));
        }else{
            Carrinho::create([
                'USUARIO_ID'=> Auth::user()->USUARIO_ID,
                'PRODUTO_ID'=> (int)$produto,
                'ITEM_QTD'=> (int)$request->quantidadeSelect
            ]);
            return redirect(route('carrinho.index'));
        }

   
        	
        }
        public function index(){
            $carrinho = Carrinho::where('USUARIO_ID' ,Auth::user()->USUARIO_ID)->get();
            return view ('carrinho.index')->with('carrinho',$carrinho);
        }
        public function pagamento(){
            $carrinho = Carrinho::where('USUARIO_ID' ,Auth::user()->USUARIO_ID)->get();
            return view ('carrinho.pagamento')->with('carrinho',$carrinho);
        }
        public function checkout(){

            $pedido = Pedido::where('USUARIO_ID', Auth::user()->USUARIO_ID)->get();
            $status = Status::all();
            return view('carrinho.pedido', compact('pedido', 'status'));
    
        }
    }
  
