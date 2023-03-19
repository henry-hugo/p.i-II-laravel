<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('produto.index')->with('categorias',$categorias,)->with('produtos',$produtos);
    }
    public function show(Produto $produto){
        // ver os dados do banco  dd($produto);
        return view('produto.show')->with('produto', $produto);
    }

    public function store(Request $request){
        Produto::create($request->only(['nome'],['email'],['senha'],['cpf']));
        return redirect()->route('produto.index');
    }
}

