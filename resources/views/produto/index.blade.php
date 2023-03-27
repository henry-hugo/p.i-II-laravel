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
                                <input type="email" class="form-control" name="email" required onchange='campobranco'
                                    required onchange='confere(email, confirme_email, "email")' ; id="email"
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
                    <form class="was-validated" action="{{route('registrar')}}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h3 class="modal-title text-center mx-auto" id="staticBackdropLabel">Cadastro</h3>
                        </div>
                        <div>
                            <h3 class="modal-title" id="staticBackdropLabel"></h3>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="USUARIO_NOME" required onchange='campobranco'
                                    id="categoria_name" placeholder="abc">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControEMAIL" class="form-label"> Email</label>
                                <input type="email" class="form-control" name="USUARIO_EMAIL" required onchange='campobranco'
                                    required onchange='confere(email, confirme_email, "email")' ; id="email"
                                    placeholder="abc@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControEMAIL" class="form-label"> Confirme o Email</label>
                                <input type="email" class="form-control" name="confirme_email" required
                                    onchange='confereemail();' id="confirme_email" placeholder="abc@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControsenha" class="form-label"> Senha</label>
                                <input type="password" class="form-control" name="USUARIO_SENHA" size=15 required
                                    onchange='campobranco' required onchange='confere(senha, confirme_senha, "senhas")'
                                    ; id="senha" placeholder="****">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControsenha" class="form-label"> Confirme a Senha</label>
                                <input type="password" class="form-control" name="confirme_senha" size=15 required
                                    onchange='conferesenha();' id="confirme_senha" placeholder="****">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControcpf" class="form-label"> CPF</label>
                                <input type="number" class="form-control" name="USUARIO_CPF" required id="cpf"
                                    placeholder="xxx.xxx.xxx-xx">
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
                                onchange='campobranco' required onchange='confere(senha, confirme_senha, "senhas")' ;
                                id="senha" placeholder="****">
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

    <!-- Modal do força a fazer login ou cadastro -->
    <div class="modal fade" id="loginCadastro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="10"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="was-validated" action="" method="POST">
                        <div class="modal-header">
                            <h3 class="modal-title text-center mx-auto" id="staticBackdropLabel">Junte-se hoje à Foxtrot</h3>
                        </div>
                        
                        <div class="mb-3 text-center">
                            <h4>Vantagens</h4>
                        </div>
                        <div>
                            <ul>
                                <li>Frete gratis</li>
                                <li>Promoções Foxtrot</li>
                                <li>Desconto primeiro Cadastro</li>
                            </ul>
                        </div>
                        <hr>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        class="btn btn-sm btn-outline-primary btn-round mb-0 me-1 mt-2 mt-md-0">cadastre-se</a>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"
                                        class="btn btn-sm  bg-gradient-primary  btn-round mb-0 me-1 mt-2 mt-md-0">Login</a>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <header class="header-2">
        <div class="page-header min-vh-75 relative"
            style="background-image: url('/assets/img/curved-images/logo.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <h1 class="text-dark pt-3 mt-n5">PROMOÇÕES IMPERDÍVEIS </h1>
                        <b><p class="lead text-dark mt-3">Só aqui você acha o que procura com o maior desconto!<br> 
                            Nãoperca tempo e aproveite tudo de melhor da nossa loja!! </p></b>
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
                        <div class="centerfiltro">
                            <svg width="16" height="13" viewBox="0 0 14 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="IconSort">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.88883 3.77821L4.33328 0.222656L0.777723 3.77821L3.44439 3.77821L3.44439 10.0004L5.22217 10.0004L5.22217 3.77821L7.88883 3.77821ZM9.66661 16.2227L13.2222 12.6671L10.5555 12.6671L10.5555 6.44488L8.77772 6.44488L8.77772 12.6671L6.11106 12.6671L9.66661 16.2227Z"
                                    fill="#FF6500"></path>
                            </svg>
                            <label for="ordenar"> Ordenar: </label>
                            <select class="form-control" style="width: 15rem;">
                                <option value="escolha">Escolha</option>
                                <option value="precoCrescente">Preço Crescente</option>
                                <option value="precoDecrescente">Preço Decrescente</option>
                            </select>
                        </div>
                        <div class="centerfiltro">
                            <label for="exibir">Exibir:</label>
                            <select class="form-control" style="width: 15rem;">
                                <option value="escolha">Escolha</option>
                                <option value="20pag">20 Produtos</option>
                                <option value="40pag">40 Produtos</option>
                                <option value="60pag">60 Produtos</option>
                                <option value="100pag">100 Produtos</option>
                            </select>
                        </div>
                        <div class="centerfiltro">
                            <label for="pesquisa">Pesquisa:</label>
                            <input class="form-control" style="width: 15rem;" id="" type="search"
                                placeholder="Procurar..">
                        </div>
                    </div>
                    <tbody id="myTable"> @foreach (\App\Models\Produto::all()->take(5) as $produto)
                        <td class="myTable">
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
                        </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- modal views produtos -->

    <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="10"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="was-validated" action="" method="POST">
                        <div class="modal-header">
                            <h3 class="modal-title text-center mx-auto" id="staticBackdropLabel">
                                {{($produto->PRODUTO_NOME)}}</h3>
                        </div>
                        <div>
                            <h3 class="modal-title" id="staticBackdropLabel"></h3>


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


@endsection