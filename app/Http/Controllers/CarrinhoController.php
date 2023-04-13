<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Carrinho;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function store(Request $request , $produto){
    
        	Carrinho::create([
                'USUARIO_ID'=> Auth::user()->USUARIO_ID,
                'PRODUTO_ID'=> (int)$produto,
                'ITEM_QTD'=> (int)$request->quantidade
            ]);
            return redirect(route('carrinho.index'));
        }
        public function index(){
            $carrinho = Carrinho::where('USUARIO_ID' ,Auth::user()->USUARIO_ID)->get();
            return view ('carrinho.index')->with('carrinho',$carrinho);
        }
    }
  
