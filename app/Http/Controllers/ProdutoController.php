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
        $categorias = Categoria::all();
        return view('produto.show')->with('produto', $produto)->with('categorias',$categorias,);
    }

    

    
}

