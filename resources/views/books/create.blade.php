@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить новую книгу</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
                            @csrf
                            <p>Заголовок: <br><input type="text" name="title" value="{{ old('title') }}" class="form-control"</p>
                            <p>Файл: <br><input type="file" name="cover" value="{{old('cover')}}" class="form-control"</p>
                            <br><hr>
                            <button type="submit" class="btn btn-success">Добавить файл</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@stop
