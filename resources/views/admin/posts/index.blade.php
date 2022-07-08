@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                    @if(session('post_eliminato'))
                      <div class="alert alert-success container" role="alert">
                        {{ session('post_eliminato')}}
                      </div> 
                    @endif
            
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif
                    
                    @foreach($posts as $post)
                    <div class="card m-3">
                      <div class="card-body">
                        <h5>
                          {{$post->title}}
                        </h5>
                        <p class="my-3">
                          {{$post->content}}
                        </p>
                        <div class="d-flex justify-content-between">
                          <span>
                            Categoria: {{ $post->category ? $post->category->name : '-'}}
                          </span>
                          <div> 
                            <a class="btn btn-primary m-1" href="{{ route('admin.posts.show', $post)}}">Show</a>
                            <a class="btn btn-primary m-1" href="{{ route('admin.posts.edit', $post)}}">Edit</a>
                            <form 
                            class="d-inline"
                            action="{{ route('admin.posts.destroy', $post)}}" 
                            method="POST"
                            onsubmit="return confirm('Sicuro di vole eliminare?')">
                            @csrf
              
                            @method('DELETE')
              
                              <button class="btn btn-primary" type="submit"><i class="fa-solid fa-trash"></i></button>
                            </form>
                            
                          </div>

                        </div>
                        
                      </div>
                    </div>
                      
                    @endforeach
                    <div class="m-3">
                      {{$posts->links() }}
                    </div>
                    <a class="btn btn-primary m-1" href="{{ route('admin.posts.create')}}">Create</a>

                    <div class="m-5">
                      @foreach($categories as $category)
                          <h4>{{$category->name}}</h4>
                          <ul>
                            @foreach ($category->posts as $post)
                            <li>{{$post->title}}</li>
                            @endforeach
                          </ul>
                      @endforeach
                    </div>
                    
        </div>
    </div>
</div>
@endsection
