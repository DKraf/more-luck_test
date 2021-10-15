@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered mb-5">
        <thead>
        <tr class="table-success">
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Фото</th>
            <th scope="col">Тип</th>
            <th scope="col">Код</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($checks as $data)
            <tr>
                <th scope="row">{{ $data->id }}</th>
                <td>{{ $data->name }}</td>
                <td>{{ $data->photo }}</td>
                <td>{{ $data->type }}</td>
                <td>{{ $data->code }}</td>
                <td>{{ $data->status }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="pagination justify-content-center">
        {!! $checks->links() !!}
    </div>
</div>
</div>
@endsection
