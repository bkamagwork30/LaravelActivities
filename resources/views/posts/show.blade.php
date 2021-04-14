@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-info" href="/posts">Back</a>
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <strong>Title:</strong> {{$post->Title}} <br>
                        <strong>Description:</strong> {{$post->Description}} <br>
                        <strong>Created At:</strong> {{$post->created_at}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection