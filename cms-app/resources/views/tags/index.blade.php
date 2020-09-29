@extends('layouts.app')

@section('content')

<div class="clearfix">
    <a href="{{ route('tags.create') }}" class="btn btn-success float-right ml-2" >Create A Tag</a>
<div>
<div class="card card-default">
    <div class="card-header">
        All Tags
    </div>
    <div class="card-body">
    @if (Count($tag) != 0)
        @foreach ($tag as $c)
            <ul class="list-group">
                <li class="list-group-item">
                    {{$c->name}}
                    <span class=" ml-2 badge badge-primary">{{$c->posts->count()}}</span>

                    <a href="{{ route('tags.edit', $c) }}" class="btn btn-primary btn-sm float-right">
                        edit
                    </a>
                    <form action="{{ route('tags.destroy',$c->id) }}" method="POST" class="float-right">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm mr-2">X</button>
                    </form>
                </li>
            </ul>
        @endforeach
    @else
        <h6>No Tags found yet. </h6>
    @endif
    </div>
</div>
@endsection