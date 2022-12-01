@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Список книг</div>
                    <div class="card-body">
                        <a href="{{route('books.create')}}" class="btn btn-primary">Добавить</a><br>
                        <br>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>UUID</th>
                                <th>Заголовок</th>
                                <th>Скачать</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($books as $book)
                                <tr>
                                    <td> {{ $book->uuid }} </td>
                                    <td> {{ $book->title }} </td>
                                    <td><a href= {{ route('books.download', $book->uuid) }}>{{ $book->cover }}</a> </td>
                                    <td><a href="{{ route('books.edit', ['book'=> $book]) }}">Редактировать</a> ||

                                        <a href="{{ route('books.destroy', ['book' => $book]) }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();">
                                            {{ __('Удалить') }}
                                        </a>

                                        <form id="delete-form" action="{{ route('books.destroy', ['book' => $book]) }}"
                                              method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Нет загруженных книг</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

