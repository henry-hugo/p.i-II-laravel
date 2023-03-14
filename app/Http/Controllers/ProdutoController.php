<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        return view('produto.index')->with('produtos', $produtos);
    }
    public function show(Produto $produto){
        // ver os dados do banco  dd($produto);
        return view('produto.show')->with('produto', $produto);
    }

    
}

