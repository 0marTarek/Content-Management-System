@extends('layouts.app')

@section('content')
@if(session()->has('ErrorNoCategory'))
<div class="alert alert-danger">
    {{session()->get('ErrorNoCategory')}}
</div>
@endif
<div class="clearfix">
    <a href="{{ route('category.create') }}" class="btn btn-success float-right ml-2" >Create A Category</a>
<div>
<div class="card card-default">
    <div class="card-header">
        All Categories
        <span class="badge badge-primary">
            {{$categories->count()}}
        </span>
    </div>
    <div class="card-body">
    @if (Count($categories) != 0)
        @foreach ($categories as $c)
            <ul class="list-group">
                <li class="list-group-item">
                    {{$c->name}}
                    <span class=" ml-2 badge badge-primary">{{$c->posts->count()}}</span>
                    <a href="{س{ route('category.edit', $c) }}" class="btn btn-primary btn-sm float-right">
                        edit
                    </a>
                    <form action="{{ route('category.destroy',$c->id) }}" method="POST" class="float-right">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm mr-2">X</button>
                    </form>
                </li>
            </ul>
        @endforeach
    @else
        <h6>No Categories found yet. </h6>
    @endif
    </div>
</div>
@endsection