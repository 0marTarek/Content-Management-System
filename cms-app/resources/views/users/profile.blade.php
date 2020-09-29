@extends('layouts.app')
@section('content')
<div class="container">
@if (session()->has('edited'))
<alert class=" alert alert-success">
    {{ session()->get('edited') }}
</alert>
@endif
    <div class="card card-default">
        <div class="card-header">
            Edite profile
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', auth()->user()->id) }}" method='POST' enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Name">Name: </label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook: </label>
                    <input type="text" name="facebook" value="{{ auth()->user()->profile->facebook }}"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter: </label>
                    <input type="text" name="twitter" value="{{ auth()->user()->profile->twitter }}"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">About: </label>
                    <input type="text" name="about" value="{{ auth()->user()->profile->about }}"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Image: </label><br>
                    <img src="{{asset('storage/' . auth()->user()->profile->image )}}" alt="avatar">
                    <input type="file" name="ProfileImage" class="form-control">
                </div>
                <button class="btn btn-success">
                    Update
                </button>
                
            </form>
        </div>
    
    </div>

</div>

@endsection