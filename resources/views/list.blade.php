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
            <th scope="col">Дата загрузки</th>
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
{{--                <td>{{$data->created_at}}</td>--}}
                <td><?php echo ($data->created_at)->format('m-d-Y'); ?></td>
                <td>@if(isset($data->code) && $data->code !='')
                        <?php
                            if (strtotime("+7 day",strtotime($data->created_at)) > strtotime(date("Y-m-d H:i:s"))) {
                                echo $data->code;
                            } else {
                                echo 'Не учавствует на этой неделе' . date("Y-m-d H:i:s", strtotime("+7 day",strtotime($data->created_at)));
                            }
                        ?>
                    @else {{ $data->code }} @endif</td>
                <td> @if( $data->status  == 0) Отклонен @else Принят @endif</td>

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
