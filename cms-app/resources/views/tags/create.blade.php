@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">
    {{isset($tag)? "Update Tag" : "Add a new tag"}}
    </div>
    <div class="card-body">
        <form action="{{isset($tag) ? route('tags.update', $tag) : route('tags.store') }}" method="POST">
            @csrf
            @if(isset($tag))
                @method('PUT')
            @endif

            <div class="form-group">
              <label for="tag">Tag Name: </label>
              <input type="text" name="name" value="{{isset($tag) ? $tag->name : "" }}" placeholder="new tag" class="form-control @error('name') is-invalid @enderror">
        
            @error('name')
                <div class="alert alert-danger" style="margin-top:5px;">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group">
                <button  class="btn btn-success">{{isset($tag)? "Update" : "Add"}} </button>
            </div>
        
        </form>
    </div>
</div>
@endsection