@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-info" href="/posts">Back</a>
                <br><br>
                <div class="card w-100">
                    @isset($comments)
                    <div class="card-body p-3 m-3 ">
                        <strong>Titles:</strong> {{$show->Title}} <br>
                        <strong>Description:</strong> {{$show->Description}} <br>
                        <strong>Created At:</strong> {{$show->created_at}} <br>
                        <strong>Image:</strong> <br>
                        <img class="img-fluid" src="{{ asset('/storage/img/'.$show->img) }}" alt="No image found"> 
                        <br>
                        @if ($comments)
                        <span class="badge badge-pill badge-warning h3">Comments:</span><br>
                        @foreach ($comments as $comment)
                            <div class="display-comment" >
                                <p>{{ $comment->description }}</p>
                                <a href="" id="reply"></a>
                                <form method="post" action="{{ route('comments.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="description" class="form-control" />
                                        <input type="hidden" name="post_id" value="{{ $comment->post_id }}" />
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-warning" value="Reply" />
                                    </div>
                                </form>
                            </div>
                        @endforeach                            
                    @endif
                    <form method="post" action="{{ route('comments.store') }}">  
                        @csrf
                       
                        <span class="badge badge-pill badge-warning h3">Comment:</span><br>

                           <div class="col-md-6">
                               <input id="description" type="text" class="form-control  @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required>
                               <input type="hidden" name="post_id" value="{{ $show->id }}">        
                               
                               @error('description')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                           <br>
                           <br>
                           <div class="form-group col-8 m-auto">
                                <input type="submit" class="btn btn-block btn-outline-primary custom-btn" value="Add Comment">
                           </div>
                      </form>
                    @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection