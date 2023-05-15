<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use Illuminate\Support\Facades\Auth;

class EnderecoController extends Controller
{
    public function store(Request $request , $usuario){
        
        $item = Endereco::where('USUARIO_ID', Auth::user()->USUARIO_ID)
        ->where('USUARIO_ID', $usuario)->first();


        if($item){
            $item =$item->update([
                'USUARIO_ID'=> (int)$usuario,
                'ENDERECO_NOME'=> $request->nome,
                'ENDERECO_LOGRADOURO'=> $request->endereco,
                'ENDERECO_NUMERO'=> (int)$request->numero,
                'ENDERECO_COMPLEMENTO'=> $request->complemento,
                'ENDERECO_CEP'=> $request->cep,
                'ENDERECO_CIDADE'=> $request->cidade,
                'ENDERECO_ESTADO'=> $request->estado,
                'ENDERECO_APAGADO'=> 1
            ]);
        }else{
            Endereco::create([
                'USUARIO_ID'=> (int)$usuario,
                'ENDERECO_NOME'=> $request->nome,
                'ENDERECO_LOGRADOURO'=> $request->endereco,
                'ENDERECO_NUMERO'=> (int)$request->numero,
                'ENDERECO_COMPLEMENTO'=> $request->complemento,
                'ENDERECO_CEP'=> $request->cep,
                'ENDERECO_CIDADE'=> $request->cidade,
                'ENDERECO_ESTADO'=> $request->estado,
                'ENDERECO_APAGADO'=> 1
            ]);
        }
        return redirect(route('carrinho.pagamento'));
    }
}
