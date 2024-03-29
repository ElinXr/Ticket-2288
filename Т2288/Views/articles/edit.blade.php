@extends('layouts.admin')

@section('content')
    <h1>Редактиране на статия</h1>

    <form method="POST" action="{{ route('articles.edit', $article->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Заглавие:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
        </div>

        <div class="form-group">
            <label for="content">Съдържание:</label>
            <textarea class="form-control" id="content" name="content" rows="10" required>{{ $article->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Запази</button>
    </form>
@endsection
