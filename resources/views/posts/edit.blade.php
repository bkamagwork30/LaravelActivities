@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-info" href="/posts">Back</a>
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('posts.update', $post->id)}}" method="POST">
                            @method('PATCH')
                            @csrf
                                <label for="title">Title</label>
                                <input type="text" class="form-control"  name="title" value="{{$post->Title}}" required autofocus>

                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" value="{{ $post->Description}}" required autocomplete="Description">{{ $post->Description}}</textarea>
                                <br>
                                <input type="submit" class="btn button btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection