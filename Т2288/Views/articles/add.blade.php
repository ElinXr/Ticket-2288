@extends('layouts.admin')

@section('content')
    <h1>Добавяне на нова статия</h1>

    <form method="POST" action="{{ route('articles.add') }}">
        @csrf

        <div class="form-group">
            <label for="title">Заглавие:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="content">Съдържание:</label>
            <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Добавяне</button>
    </form>
@endsection
