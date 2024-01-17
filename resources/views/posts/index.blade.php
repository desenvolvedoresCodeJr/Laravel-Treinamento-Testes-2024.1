@extends('layouts.posts')

@section('content')

    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('posts.index') }}>Treinamento CodeJr - Testes</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('posts.create') }}>Add Post</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-6 col-md-4 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $post->title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $post->content }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                       class="btn btn-primary btn-sm">Editar</a>
                                </div>
                                <div class="col-sm">
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
