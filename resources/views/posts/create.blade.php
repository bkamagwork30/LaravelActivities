@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('posts.store')}}" method="POST">
                            @csrf
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title')}}" required autofocus>

                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" value="{{ old('description')}}" required autofocus></textarea>
                                <br>
                                <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection