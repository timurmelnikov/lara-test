@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleble-md navbar-light bg-faded">
                    <a href="{{ route('blog.admin.posts.create') }}" class="btn btn-primary">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <th>#</th>
                            <th>Автор</th>
                            <th>Категория</th>
                            <th>Заголовок</th>
                            <th>Дата публикации</th>
                            </thead>
                            <tbody>
                            @foreach($paginator as $post)
                                @php /** @var \App\Models\BlogPost $post */ @endphp
                                <tr @if(!$post->is_published) style="background-color: #ccc;" @endif>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->category->title}}</td>
                                    <td>
                                        <a href="{{route('blog.admin.posts.edit', $post->id)}}">{{$post->title}}</a>
                                    </td>
                                    <td>{{$post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M.Y H:i'): ''}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($paginator->total() > $paginator->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    {{$paginator->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection()