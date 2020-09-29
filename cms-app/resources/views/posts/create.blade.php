@extends('layouts.app')

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.Ttags').select2();
});
</script>
@endsection

@section('styleCheet')
<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="card card-default">
    <div class="card-header">
       {{isset($posts) ? 'Edit a post' : "Create a new post" }} 

    </div>

    <div class="card-body">
        <form action="{{ isset($posts) ? route('posts.update',$posts) : route('posts.store') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            @if(isset($posts))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="posts title">Title: </label>
                <input type="text" class="form-control " name="Title" placeholder="post title"
                    value="{{ isset($posts) ? $posts->Title : '' }}">
            </div>
            <div class="form-group">
                <label for="post Description">Description: </label>
                <input type="text" class="form-control" name="Description" placeholder="post Description"
                    value="{{isset($posts)? $posts->Description : '' }}">
            </div>
            <div class="form-group">
                <label for="post content">Content: </label>
               <!-- <input type="text" class="form-control" name="content" placeholder="post content"
                value=""> -->
                <input id="x" type="hidden" name="content" value="{{isset($posts)? $posts->content : '' }}">
                <trix-editor input="x"></trix-editor>
            </div>

            <div class="form-group">
                <label for="category" >select the category</label>
                <select class="form-control" name="category_id" >category
                @foreach($categories as $c)
                <option value="{{ $c->id }}">{{$c->name}}</option>
                @endforeach
                </select>
            </div>
            @if($tags->count() >0)
            <div class="form-group">
                <label for="tag">select a tag</label>
                <select name="tags[]" class="form-control Ttags" multiple>
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                                    
                    @if(isset($posts) && $posts->hasTag($tag->id))
                        selected
                    @endif
                    
                    >{{$tag->name}} </option>
                    @endforeach
                </select>
            </div>
            @endif

            <div class="form-group">
            @if(isset($posts))
                    <img src=" {{ asset('storage/'.$posts->image) }} " style="width:100%;"/>
                @endif
            </div>
            <div class="form-group">
                <label for="post image">post image: </label>
                <input type="file" name="PostImage" class="form-control" value="{{isset($posts)? $posts->image : ''}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success">{{isset($posts) ? "Update" : "Add" }}</button>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                @foreach($errors->all() as $error)  
                    <li><strong>{{$error}}</strong></li> 
                @endforeach  
                </ul>
            </div>  
             @endif
        </form>
    </div>
</div>



@endsection