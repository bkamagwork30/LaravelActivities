@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('posts.store')}}" method="POST" enctype= "multipart/form-data">
                            @csrf
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')}}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>

                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description')}}"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>            
                                    </span>
                                @enderror    
                                <br>
                                <div class="form-group">
                                    <label for="img" class="col-from-label">{{__('Post Image')}}</label>
                                    <div>
                                        <input type="file" class="form-control-file @error('img') is-invalid @enderror" name="img">
                                        @error('img')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection