@extends('layout.app')
@section('main')

        <!-- Modal do fale conosco -->
        <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="10"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="was-validated" action="" method="POST">
                            <div class="modal-header">
                                <h3 class="modal-title text-center mx-auto" id="staticBackdropLabel">Fale Conosco</h3>
                            </div>
                            <div>
                                <h3 class="modal-title" id="staticBackdropLabel"></h3>
                                <div class="mb-3">
                                    <label for="exampleFormControEMAIL" class="form-label"> Email</label>
                                    <input type="email" class="form-control" name="email" required
                                        onchange='campobranco' required
                                        onchange='confere(email, confirme_email, "email")' ; id="email"
                                        placeholder="abc@gmail.com">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="faleconosco" id="faleconosco" cols="50"
                                        rows="10"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" value="enviar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal do cadastro -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="10"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="was-validated" action="" method="POST">
                            <div class="modal-header">
                                <h3 class="modal-title text-center mx-auto" id="staticBackdropLabel">Cadastro</h3>
                            </div>
                            <div>
                                <h3 class="modal-title" id="staticBackdropLabel"></h3>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="nome" required onchange='campobranco'
                                        id="categoria_name" placeholder="abc">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControEMAIL" class="form-label"> Email</label>
                                    <input type="email" class="form-control" name="email" required
                                        onchange='campobranco' required
                                        onchange='confere(email, confirme_email, "email")' ; id="email"
                                        placeholder="abc@gmail.com">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControEMAIL" class="form-label"> Confirme o Email</label>
                                    <input type="email" class="form-control" name="confirme_email" required
                                        onchange='confereemail();' id="confirme_email" placeholder="abc@gmail.com">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControsenha" class="form-label"> Senha</label>
                                    <input type="password" class="form-control" name="senha" size=15 required
                                        onchange='campobranco' required
                                        onchange='confere(senha, confirme_senha, "senhas")' ; id="senha"
                                        placeholder="****">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControsenha" class="form-label"> Confirme a Senha</label>
                                    <input type="password" class="form-control" name="confirme_senha" size=15 required
                                        onchange='conferesenha();' id="confirme_senha" placeholder="****">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" value="enviar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal do login -->
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="10"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="was-validated" action="" method="POST">
                            <div class="modal-header">
                                <h3 class="modal-title text-center mx-auto" id="staticBackdropLabel">Login</h3>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControEMAIL" class="form-label"> Email</label>
                                <input type="email" class="form-control" name="email" required onchange='campobranco'
                                    required onchange='confere(email, confirme_email, "email")' ; id="email"
                                    placeholder="abc@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControsenha" class="form-label"> Senha</label>
                                <input type="password" class="form-control" name="senha" size=15 required
                                    onchange='campobranco' required onchange='confere(senha, confirme_senha, "senhas")'
                                    ; id="senha" placeholder="****">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" value="enviar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>






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
                        @foreach ($produto->ProdutoImagem as $imagem )
                        @if($imagem->IMAGEM_ORDEM == 0)
                            <img src="{{$imagem->IMAGEM_URL}}" class="card-img-top" alt="...">
                        @endif
                        @endforeach
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