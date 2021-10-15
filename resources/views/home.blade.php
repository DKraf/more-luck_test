@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Для перехода на страницу загрузки чека, нажмите кнопку ниже</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form action="/upload">
                            <button  type="submit" class="btn btn-outline-success">Вам, сюда!</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
