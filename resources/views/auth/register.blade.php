@extends('layouts.main')
@section('title', 'Register')
@section('files')
<link rel="stylesheet" href="/css/register.css">
@endsection

@section('content')

    <div class="global-container h-100 d-flex">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card w-100 ">
                <div class="card-body">
                    
                    <div id="title-container">
                        <a href="/"><ion-icon name="arrow-back" id="back-arrow"></ion-icon></a>
                        <div class="text-center">
                            <img src="/images/twitter_logo.png" alt="Twitter">
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <h2>Crie sua conta</h1>
                        
                        <form action="/register" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="first_name" placeholder="Primeiro nome" required>
                                </div>
                                
                                <div class="col">
                                    <input type="text" class="form-control" name="last_name" placeholder="Último nome" required>
                                </div>
                            </div>

                            <div class="mt-2">
                                <input type="text" class="form-control" name="user" placeholder="Nome de usuário" required>
                            </div>
    
                            <div class="mt-2">
                                <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                            </div>
    
                            <div class="mt-2">
                                <input type="password" class="form-control" name="password" placeholder="Senha" required>
                            </div>
    
                            <div class="mt-2">
                                <p>Ao clicar em se cadastrar, você concorda com os nossos <a href="#">Termos de serviço</a> e com as nossas <a href="#">Políticas de privacidade</a>.</p>
                            </div>

                            @if(session('message'))
                                <div class="text-center my-2 bg-danger bg-opacity-10 border border-danger rounded p-3">
                                    {{ session('message') }}
                                </div>
                            @endif
    
                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary">Inscrever-se</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection