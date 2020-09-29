@extends('layouts.app')

@section('content')

<div class="clearfix">
    <a href="{{ route('posts.create') }}" class="btn btn-success float-right ml-2 " >Create A post</a>
<div>
<div class="card card-default">
    <div class="card-header">
        All Posts
        <span class="badge badge-primary">
            {{$posts->count()}}
        </span>
    </div>
    <div class="card-body">
    @if (Count($posts) != 0)
        <table class="table">
        <thead class="table-dark">
            <th>Image</th>
            <th>Title</th>
            <th>Actions</th>
        </thead>
        <tbody>
        @foreach ($posts as $p)
        <tr>
        <td><img src="{{ asset('storage/'. $p->image) }}" style="width:75px;height:75px" ></td>
            <td>{{$p->Title}}</td>
            <td>
                @if(!$p->trashed())
                <a href="{{ route('posts.edit',$p->id) }}" class="btn btn-primary btn-sm float-right">edit</a>
                @else
                <a href="{{ route('posts.RestoreTrashed',$p->id) }}" class="btn btn-primary btn-sm float-right">Restore</a>

                @endif
                <form action=" {{ route('posts.destroy',$p->id) }} " class="float-right" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mr-2 ">{{$p->Trashed()? "Delete" : 'Trash'}}</button>
                </form>
            </td>
        </tr>
        </tbody>
        @endforeach
        
        </table>
    @else
        <h6>No Posts found yet. </h6>
    @endif
    </div>
</div>
@endsection