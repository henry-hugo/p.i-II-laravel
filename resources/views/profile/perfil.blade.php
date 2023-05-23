@extends('layout.app') 
@section('main')
<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('/assets/img/curved-images/perfil.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">

                </div>
            </div>
        </div>

        <div class="position-absolute w-100 z-index-1 bottom-0">
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave"
                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="moving-waves">
                    <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                    <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                    <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                    <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
                </g>
            </svg>
        </div>
    </div>
</header>
<div class="container">
    <h1 class="text-center">PERFIL</h1>
    <div class="viwTabela justify-content-center">
        <section class="perfil">
        </div>
        <div class="form-perfil" >
            <div style="text-align: center;">
                <form action="" method="post">
                    <h1>Meu Perfil</h1><br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="250" height="250" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                    <h2>Dados do Usuário</h2>
                    <div class="form-10">
                        <label>Nome:</label>
                        <input type="text" value="{{Auth::user()->USUARIO_NOME}}">
                    </div>
                    <div class="form-10">
                        <label>Email:</label>
                        <input type="text" value="{{Auth::user()->USUARIO_EMAIL}}">
                    </div>
                    <div class="form-10">
                        <label>CPF:</label>
                        <input type="text" placeholder="(000.000.000-00)" value="{{Auth::user()->USUARIO_CPF}}">
                    </div>
                    <div>
                        <input class="btn btn-secondary" type="submit" value="Salvar">
                    </div>
                </form>
                <div class="form-10">
                    <input type="submit" name="acao" value="Alterar Senha">                
                </div>
            </div>
        </div>
    </section>
    <section class="AlterarSenha">
    </div>
    <div class="form-senha">
        <form method="POST">
            <h1>Meu Perfil</h1><br>
            <img src="perfil.png" width="100px" height="100px"><br><br>
            <h2>Altere sua Senha</h2>
            <div class="form-1">
                <label>Senha:</label>
                <input type="text">
            </div>
            <div class="form-1">
                <label>Confirme sua Senha:</label>
                <input type="text">
            </div>
                <div class="form-1">
                <input type="submit" name="acao" value="Alterar Senha">                
            </div>
            </div>
            </form>
        </div>
    </section>
    </div>
</div>
@endsection