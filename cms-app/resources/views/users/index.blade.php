@extends('layouts.app')

@section('content')
@if (session()->has('adminGranted'))
<div class="alert alert-success">
    {{session()->get('adminGranted')}}
</div>
@elseif(session()->has('adminRemoved'))
<div class="alert alert-success">
    {{session()->get('adminRemoved')}}
</div>
@endif

<div class="card card-default">
    <div class="card-header">
        
        <form action="{{ route('users.AdminsOnly') }}" method="GET">
            @csrf
            All users
            <span class="badge badge-primary">
                {{$users->count()}}
            </span>
            <button class="btn btn-primary btn-sm float-right">
                View admins only
            </button>
        </form>
    </div>
    <div class="card-body">
    @if (Count($users) != 0)
        <table class="table">
        <thead class="thead-dark">
            <th>Image</th>
            <th>Username</th>
            <th>Permession</th>
        </thead>
        <tbody>
        @foreach ($users as $user)
        <tr>

        <td> 
            <img src="{{ asset('storage/'. $user->profile->image)  }}" style="border-radius:50%;width:75px;height:75px">
        </td>
            <td style="padding-top:30px">{{$user->name}}</td>
            <td style="padding-top:30px">
            @if($user->role == "admin")
                <form action="{{ route('users.removeAdmin', $user->id) }}" method="POST">
                @csrf
                    <button class="btn btn-primary btn-sm">Remove Admin</button>
                </form>            
            @endif
            @if($user->role == "writer")
            <form action="{{ route('users.makeAdmin', $user->id) }}" method="POST">
                @csrf
                    <button class="btn btn-primary btn-sm">Make admin</button>
                </form>  
            @endif
            </td>
        </tr>
        </tbody>
        @endforeach
        </table>
    @else
        <h6>No Users yet. </h6>
    @endif
    </div>
</div>
@endsection