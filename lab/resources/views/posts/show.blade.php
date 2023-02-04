 @extends('layouts.app')

@section('title') Show @endsection

@section('content')
<body>
  <div class="card my-2">
      <div class="card-header">
        Post info
      </div>
      <div class="card-body">
        <h6 class="card-title">{{ $post['title'] }}</h6>
        <h4 class="card-title">{{ $post['description'] }} </h4>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  <div class="card">
      <div class="card-header">
        Post Creator info
      </div>
      <div class="card-body">
        <h5 class="card-title ">Name:  @foreach($users as $user)
          <option value="{{$user->id}}" @if($user->id == $post->user_id) selected @else hidden @endif >{{$user->name}}</option>
             
      @endforeach</h5>
        <h5 class="card-title ">Title: {{$post['title']}}</h5>
        <h5 class="card-title">Created at: {{$post['created_at']}}</h5>
        
      </div>
    </div>




    <form method="POST" action="{{route('posts.comments',$id)}}">
      @csrf
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Add your comment</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="comment">
      </div>
      <button type="submit" class="btn btn-primary">add comment</button>
    
    @foreach($comments as $comment)
    <div class="card" @if($comment->post_id ==$posts->id) selected @else hidden @endif>
      <div class="card-header">
      comment {{$comment['id']}}
      </div>
     <div class="card-body" >
       
  
         <p class="card-text">{{$comment['comment_body']}}</p>
        
      </div>
    </div>
  
    
  
    @endforeach
  </form>
    <a href="{{route('posts.index')}}" class="btn btn-primary">go to index</a>




      @endsection
 
 

