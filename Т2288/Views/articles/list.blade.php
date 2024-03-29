@extends('layouts.admin')

@section('content')
    <h1>Списък със статии</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Заглавие</th>
                <th>Автор</th>
                <th>Дата</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->author->name }}</td>
                    <td>{{ $article->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-primary">Редактиране</a>
                        <form action="{{ route('articles.delete', $article->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Изтриване</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
