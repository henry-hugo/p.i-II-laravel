<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Administrador;
use App\Models\Produto;
use App\Models\Categoria;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('produto.index')->with('categorias',$categorias,)->with('produtos',$produtos);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'USUARIO_EMAIL' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        ]);
    
        if ($request->USUARIO_CPF) {
            $user = User::create([   
                'USUARIO_NOME' => $request->USUARIO_NOME,
                'USUARIO_EMAIL' => $request->USUARIO_EMAIL,
                'USUARIO_SENHA' => Hash::make($request->USUARIO_SENHA),
                'USUARIO_CPF' => $request->USUARIO_CPF,
            ]);
        }
    
        event(new Registered($user));
    
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME)->with('error', 'Ocorreu um erro ao processar o formulário. Por favor, verifique os campos e tente novamente.');
    }
}
 