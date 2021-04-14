@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-info" href="/posts/create">Create New</a>
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($post as $post)
                                  <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->Title}}</td>
                                        <td>{{$post->Description}}</td>
                                        <td><a href="/posts/{{$post->id}}" class="btn btn-info">View</a></td>
                                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a></td>
                                        <td><form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">Delete</button>
                                          </form>
                                        </td>
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection