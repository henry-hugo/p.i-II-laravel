@extends('layout.app')
@section('main')
@if(Auth::check())
<header class="header-2">
        <div class="page-header min-vh-75 relative" style="background-image: url('/assets/img/curved-images/carrinho.jpg')">
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
        <h1 class="text-center">PEDIDO</h1>
        <div class="viwTabela justify-content-center">
            <div class="tamanhoTabela">
                <div>
                    <h4>Endereço de Entrega</h4>
                    <p>{{$enderecos[0]->ENDERECO_NOME}}</p>
                    <p>{{$enderecos[0]->ENDERECO_LOGRADOURO}} - {{$enderecos[0]->ENDERECO_COMPLEMENTO}} - N°{{$enderecos[0]->ENDERECO_NUMERO}} - {{$enderecos[0]->ENDERECO_CIDADE}} - {{$enderecos[0]->ENDERECO_ESTADO}} - {{$enderecos[0]->ENDERECO_CEP}}  </p>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>

@endif
@endsection
