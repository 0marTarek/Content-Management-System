@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                
                    <div class="card card-default bg-primary text-white">
                    <a href="{{ route('users.index') }}" class="text-white"> 
                        <div class="card-header">
                            Users
                        </div>
                        </a>
                        <div class="card-body">
                            {{$users_count}}
                        </div>
                    </div>
                
                </div>
                <div class="col-md-4">
                
                    <div class="card card-default bg-success text-white">
                    <a href="{{ route('posts.index') }}" class="text-white"> 
                        <div class="card-header text-white">
                            Posts
                        </div>
                    </a>
                        <div class="card-body">
                            {{$posts_count}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-default bg-info text-white">
                    <a href="{{ route('category.index') }}" class="text-white"> 

                        <div class="card-header">
                            Categories
                        </div>
                        </a>
                        <div class="card-body">
                            {{$categories_count}}
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    
    </div>
</div>
@endsection