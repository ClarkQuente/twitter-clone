@extends('layouts.main')
@section('title', 'Login')
@section('files')
    <link rel="stylesheet" href="/css/login.css">
@endsection

@section('content')

    <div class="login-container" id="info">
        <div class="d-flex flex-column text-center">
            <ion-icon name="search-outline" class="align-self-center me-2"></ion-icon>
            <span>Siga o que lhe interessa.</span>
        </div>

        <div class="d-flex flex-column text-center mt-2">
            <ion-icon name="people" class="align-self-center me-2"></ion-icon>
            <span>Saiba sobre o que as pessoas estão falando.</span>
        </div>

        <div class="d-flex flex-column text-center mt-2">
            <ion-icon name="chatbubble-outline" class="align-self-center me-2"></ion-icon>
            <span>Participe daconversa.</span>
        </div>
    </div>

    <div class="login-container">
        <div class="container mt-4">

            @if(session('message'))
                <div class="text-center my-2 bg-danger bg-opacity-10 border border-danger rounded p-3">
                    {{ session('message') }}
                </div>
            @endif

            <form action="/" method="POST">
                @csrf

                <div class="row">
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="emailOrUser" placeholder="E-mail ou nome de usuário" required>
                    </div>

                    <div class="col-lg-5">
                        <input type="password" class="form-control" name="password" placeholder="Senha" required>
                    </div>

                    <div class="col-lg-2 d-grid">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </div>

            </form>
        </div>

        <div class="container p-5">
            <ion-icon name="logo-twitter" id="twitter-logo"></ion-icon>

            <div class="title fw-bold">Veja o que está acontecendo no mundo agora</div>
            <p class="fw-bold m-0 mt-3 mb-2">Participe hoje do twitter.</p>

            <div class="d-grid">
                <a href="/register" class="btn btn-primary">Inscrever-se</a>
            </div>
        </div>
    </div>
@endsection
