@extends('layout.app')
@section('main')
        <header class="header-2">
            <div class="page-header min-vh-75 relative"
                style="background-image: url('/assets/img/curved-images/dcfundo.jpg')">
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

        <main>
            <section>
                <div class="container">
                    <div id="tamanho">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                            @foreach ($produto->ProdutoImagem as $imagem )
                            @if($imagem->IMAGEM_ORDEM == 0)
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{$imagem->IMAGEM_URL}}" alt="Slide" height="400px" width="auto">
                            </div>
                            @else
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{$imagem->IMAGEM_URL}}" alt="Slide" height="400px" width="auto">
                            </div>
                            @endif
                            @endforeach
                            <a class="carousel-control-prev" href="#carouselExampleFade" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleFade" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Próximo</span>
                            </a>
                        </div>
                    </div>
                    <div class="possition-desc">
                        <H2>{{$produto->PRODUTO_NOME}}</H2>
                        @if($produto->PRODUTO_DESC == true)
                        <h4 class="price">R$ {{$produto->PRODUTO_PRECO}}</h4>
                        @endif
                        @if($produto->PRODUTO_DESC == true)
                        <h3>R$ {{$produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO}}
                        <sup class="desconto">{{$produto->PRODUTO_DESCONTO}} OFF</sup></h3>
                        @else
                        <h3>R$ {{$produto->PRODUTO_PRECO}}</h3>
                        @endif
                        @if($produto->ProdutoEstoque->PRODUTO_QTD == true)
                        <h3>QTD: {{$produto->ProdutoEstoque->PRODUTO_QTD}}</h3>
                        @else
                        <h3>produto indisponível no momento !!</h3>
                        @endif
                        <!-- <H3>{{$produto->Categoria->CATEGORIA_NOME}}</H3> -->
                        <button class="btn btn-secondary" type="submit">Compra</button><br>
                        <button class="btn btn-secondary" type="submit">Adicionar no Carrinho</button><br>
                        <a href="{{ route('produto.index', $produto->PRODUTO_ID )}}">Continuar Comprando</a>
                    </div>
                    <div style="position: relative; bottom:10rem;">
                        Descriçao:
                        <p>{{$produto->PRODUTO_DESC}}</p>
                    </div>
                </div>
            </section>

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="cards-wrapper">
                    
                        @foreach (\App\Models\Produto::all()->take(6) as $produto)
                        
                        <div class="card" style="width:15rem;">
                        @if(isset($produto->ProdutoImagem[0]->IMAGEM_URL))
                                <img src="{{$produto->ProdutoImagem[0]->IMAGEM_URL}}" class="card-img-top" alt="...">
                            @else
                                <img src="/assets/img/curved-images/sem-imagem.jpg" class="card-img-top" alt="...">
                            @endif
                       
                            <div class="card-body">
                                <h5 class="card-title">{{Str::substr(($produto->PRODUTO_NOME), 0, 18)}}</h5>
                                <p class="card-text">{{Str::substr(($produto->PRODUTO_DESC), 0, 18)}}</p>
                                <p class="card-number">{{($produto->PRODUTO_PRECO)}}</p>
                                <a href="/produto/{{$produto->PRODUTO_ID}}">views</a>
                                <br>
                                <br>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#loginCadastro" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    
                    @endforeach
                    
                  </div>
                  </div>        
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

           
        </main>






@endsection