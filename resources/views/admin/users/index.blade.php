@extends('layout')
@section('content')
<div class="card" style="margin-top: 20px"> {{-- uda idan 20px thiyala  --}}
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        User Table
        <a href="{{ url('/users/create') }}" class="btn btn-primary btn-sm float-right">Create a new user</a>
    </div>
    <div class="card-body">
        <table id="" class="display compact row-border stripe" style="width:100%">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Permission</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dump($users)  this code used for get data in DB as an array--}} 
                
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>role</td>
                    <td>permission list</td>
                    <td>
                        <form action="{{ route('users.destroy' , $user->id) }}" method="POST">
                            <a class="btn btn-sm btn-info"  href="{{ route('users.show',$user->id) }}">Show</a>
                            <a class="btn btn-sm btn-primary"  href="{{ route('users.edit',$user->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    
@endsection