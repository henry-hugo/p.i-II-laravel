@extends('layout.app')
@section('main')
<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('/assets/img/curved-images/pagamento.jpg')">
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
<nav>
    <div class="carrinhoCenter" >
        <div>
        <a href="{{route('carrinho.index')}}"><h2 class="text-body ps-4">CARRINHO DE COMPRAS</h2></a>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-arrow-right-short ps-3" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
        </svg>
        <div>
        <a href="{{route('carrinho.pagamento')}}" ><h2 class="carrinhoAtivo ps-4">PAGAMENTO</h2></a>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-arrow-right-short ps-3" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
        </svg>
        <div>
            <a href="{{route('carrinho.checkout')}}"><h2 class="text-body ps-4">CHECKOUT</h2></a>
        </div>
    </div>
</nav>
<div class="pagamentoMain container">
    @if (!\App\Models\Endereco::where('USUARIO_ID', Auth::user()->USUARIO_ID)->count())
        <section class="endereco">
            <div class="form-endereco">
                <form action="{{route('endereco',Auth::user()->USUARIO_ID)}}" method="POST">
                    @csrf
                    <h1>Endereço de Entrega</h1><br>
                        <div class="form-1000">
                        <label>Nome:</label>
                        <input name="nome" type="text" required>
                    </div>  
                    <div class="form-1000">
                        <label>CEP:</label>
                        <input name="cep" type="number" required max="99999999">
                    </div>
                    
                    <div class="form-1000">
                        <label>Endereço:</label>
                        <input type="text" name="endereco" placeholder="Rua, Avenida..." required>
                    </div>
                    <div class="form-500">
                        <input style="margin-top: -1px;" name="numero"  type="text" placeholder="Numero" required>
                        <input style="margin-left: -1px;margin-top: -1px;" name="complemento"  type="text" placeholder="Complemento" required>
                    </div>
                    <div class="form-500">
                        <select id="estado" name="estado" onchange="buscaCidades(this.value)" required>
                            <option value="">Selecione o Estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                        <br />
                        <select id="cidade" name="cidade" required>
                            <option value="">Cidade <i>(estado)</i></option>
                        </select>
                        <input style="margin-left: -1px;margin-top: -1px;"  type="text" placeholder="Bairro">
                    </div>
                        <div class="form-1000" style="position: relative;top: 165px;">
                        <button class="btn btn-primary tamanhoBntE" type="submit" >Confirmar</button>                
                    </div>
                </form>

            </div>
        </section>
    @else

    <section class="endereco" style="flex-wrap: nowrap !important;">
        @foreach (\App\Models\Endereco::where('USUARIO_ID', Auth::user()->USUARIO_ID)->get() as $endereco)
        <div class="form-endereco d-block" style="max-height:13vh;">
            <h4>Endereço de Entrega</h4>
            <h3>{{$endereco->ENDERECO_NOME}}</h3>
            <p>{{$endereco->ENDERECO_LOGRADOURO}} - {{$endereco->ENDERECO_COMPLEMENTO}} - N°{{$endereco->ENDERECO_NUMERO}} - {{$endereco->ENDERECO_CIDADE}} - {{$endereco->ENDERECO_ESTADO}} - {{$endereco->ENDERECO_CEP}}  </p>
        </div>
        <button class="btn" style="height: 13vh;" type="submit" data-bs-toggle="modal" data-bs-target="#editEnd">Editar</button>

        <div class="modal fade" id="editEnd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="10"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{route('endereco',Auth::user()->USUARIO_ID)}}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title text-center mx-auto">Endereço de Entrega</h1>
                        </div>
                        <label  class="form-label">Nome:</label>
                        <input class="form-control" name="nome" type="text" value="{{$endereco->ENDERECO_NOME}}" required>
    
                        <label class="form-label">CEP:</label>
                        <input class="form-control" name="cep" type="text" max="99999999" value="{{$endereco->ENDERECO_CEP}}" required>
               
                        <label  class="form-label">Endereço:</label>
                        <input class="form-control" type="text" name="endereco" placeholder="Rua, Avenida..." value="{{$endereco->ENDERECO_LOGRADOURO}}" required>
              
                        <input  class="form-control" name="numero"  type="text" placeholder="Numero" value="{{$endereco->ENDERECO_NUMERO}}" required>
                        <input  class="form-control" name="complemento"  type="text" placeholder="Complemento" value="{{$endereco->ENDERECO_COMPLEMENTO}}" required>
            
              
                        <select class="form-control" id="estado" name="estado" onchange="buscaCidades(this.value)" required>
                            <option value="{{$endereco->ENDERECO_ESTADO}}">Selecione o Estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
           
                        <select class="form-control" id="cidade" name="cidade" required>
                            <option value="{{$endereco->ENDERECO_CIDADE}}">Cidade <i>(estado)</i></option>
                        </select>
                        <input class="form-control" type="text" placeholder="Bairro">
              
                        <button class="form-label btn btn-primary" type="submit" >Editar</button>
                        <button type="button" class="btn btn-secondary form-label" data-bs-dismiss="modal">Fechar</button>                
               
                    </form>
                </div>
            </div>
        </div>
        </div>
        @endforeach
    </section>

    <section class="pagamento">
        <div class="form-pagamento">
            <form action="{{route('finalizar',Auth::user()->USUARIO_ID)}}" method="POST">
                @csrf
                <h1> Pagamento</h1>
                <img src="/assets/img/pagamento/1.png" width="50px" height="50px">
                <img src="/assets/img/pagamento/2.png" width="50px" height="50px">
                <img src="/assets/img/pagamento/3.png" width="50px" height="50px">
                <img src="/assets/img/pagamento/4.png" width="50px" height="50px">
                <img src="/assets/img/pagamento/5.png" width="50px" height="50px">
                <img src="/assets/img/pagamento/6.png" width="50px" height="50px">
        
                <div class="form-100">
                    <label>Dados do Cartão:</label>
                    <input type="text" placeholder="1234 1234 1234 1234">
                <div class="form-50">
                    <input style="margin-top: -1px;"  type="text" placeholder="12/23">
                    <input style="margin-left: -1px;margin-top: -1px;"  type="text" placeholder="CVC">
                </div>
                </div>
                <div class="form-100">
                    <input type="text" placeholder="Nome no cartão">
                </div>
                <div class="form-100">
                    <button class="btn btn-primary tamanhoBntP" type="submit" >Pagar</button>    
                             
                </div>
                </form>

        </div>
    </section>

</div>
    @endif

@endsection