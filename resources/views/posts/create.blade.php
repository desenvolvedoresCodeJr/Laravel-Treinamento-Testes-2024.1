@extends('layouts.posts')

@section('content')

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Adicionar Post</h3>
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="title">Título</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="content">Conteúdo</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Criar Post</button>
                </form>
            </div>
        </div>
    </div>

@endsection
