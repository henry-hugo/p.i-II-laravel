@extends('layout.app')
@section('main')
    <header class="header-2">
        <div class="page-header min-vh-75 relative"
            style="background-image: url('/assets/img/curved-images/logo.jpg')">

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


    <!-- carrosel header -->


    <section class="pt-3 pb-4" id="count-stats">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
                    <div class="row">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="container" src="assets/img/curved-images/1.png" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img class="container" src="assets/img/curved-images/2.png" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img class="container" src="assets/img/curved-images/3.png" alt="">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden"></span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- tabela do banco de dados -->

    <section class="pt-3 pb-3" id="count-stats">
        <div class="container">
            <div class="row">
                <table>
                    <div class="filtro">
                      
                    </div>
                    <tbody id="myTable"> @foreach ($produtos as $produto)
                        <td class="myTable">
                            <div class="card" style="width:15rem;">
                                <a href="/produto/{{$produto->PRODUTO_ID}}">
                            @if(isset($produto->ProdutoImagem[0]->IMAGEM_URL))
                                <img src="{{$produto->ProdutoImagem[0]->IMAGEM_URL}}" class="card-img-top" alt="...">
                            @else
                                <img src="/assets/img/curved-images/sem-imagem.jpg" class="card-img-top" alt="...">
                            @endif
                                <div class="card-body">
                                    <h6 class="card-title">{{Str::substr(($produto->PRODUTO_NOME), 0, 18)}}</h6>
                                    <p class="card-text">{{Str::substr(($produto->PRODUTO_DESC), 0, 18)}}</p>
                                    @if(isset($produto->PRODUTO_DESC))
                                    <p class="card-number"><i class="price">R$ {{($produto->PRODUTO_PRECO)}}</i> <h3>R$ {{$produto->getPrecoDesconto()}} </h3></p>
                                    @else
                                    <h3>R$ {{$produto->PRODUTO_PRECO}}</h3>
                                    @endif
                                    @if(!Auth::check())
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#loginCadastro" class="btn btn-primary">Comprar</a>
                                    @endif
                                </div>
                            </a>
                            </div>
                        </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$produtos->links('vendor.pagination.paginate')}}
        </div>
    </section>

@endsection
