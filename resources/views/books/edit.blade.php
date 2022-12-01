@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать книгу</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('books.update', ['book' => $book]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <p>Заголовок: <br><input type="text" name="title" value="{{ $book->title }}" class="form-control"></p>
                            <p>Файл: <br><input type="file" name="cover" class="form-control" value="{{$book->cover}}"></p>
                            <br><hr>
                            <button type="submit" class="btn btn-success">Редактировать файл</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@stop
