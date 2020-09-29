@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">
    {{isset($category)? "Update category" : "Add a new category"}}
    </div>
    <div class="card-body">
        <form action="{{isset($category) ? route('category.update', $category) : route('category.store') }}" method="POST">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif

            <div class="form-group">
              <label for="category">Category Name: </label>
              <input type="text" name="name" value="{{isset($category) ? $category->name : "" }}"placeholder="new Category" class="form-control @error('name') is-invalid @enderror">
        
            @error('name')
                <div class="alert alert-danger" style="margin-top:5px;">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group">
                <button  class="btn btn-success">{{isset($category)? "Update" : "Add"}} </button>
            </div>
        
        </form>
    </div>
</div>
@endsection