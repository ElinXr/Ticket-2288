@extends('layouts.admin')

@section('content')
    <h1>Табло за управление</h1>

    <p>Добре дошли, {{ Auth::guard('admin')->user()->name }}!</p>

    <ul>
        <li><a href="{{ route('articles.list') }}">Списък със статии</a></li>
        <li><a href="{{ route('admin.add') }}">Добавяне на администратор</a></li>
    </ul>

    <h2>Списък с администратори</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Име</th>
                <th>Email</th>
                <th>Роля</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
