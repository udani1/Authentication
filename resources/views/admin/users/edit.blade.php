@extends('layout')
@section('content')

<h2>Edit User</h2>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="/users/{{ $user->id }}" class="" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf()

        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name..." value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email..." value="{{ $user->email }}" >
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password..." minlength="8">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Confirm</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password...">
        </div>

        <div class="form-group">
            <label for="role">Select Role</label>
            <select name="" id=""></select>
            {{--  <select class="role form-control" name="role" id="role">
            <option value="">Select Role...</option>
            @foreach ($roles as $role)
                <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}" {{ $user->roles->isEmpty() || $role->name != $userRole->name ? "" : "selected"}}>{{$role->name}}</option>                
            @endforeach
        </select>            --}}
        </div>

        <div id="permissions_box">
            <label for="roles">Select Permissions</label>
            <div id="permissions_checkbox_list"></div>
        </div>

        {{--  @if($user->permissions->isNotEmpty())
            @if($rolePermissions != null)
                <div id="user_permissions_box" >
                    <label for="roles">User Permissions</label>
                    <div id="user_permissions_ckeckbox_list">                    
                        @foreach ($rolePermissions as $permission)
                        <div class="custom-control custom-checkbox">                         
                            <input class="custom-control-input" type="checkbox" name="permissions[]" id="{{$permission->slug}}" value="{{$permission->id}}" {{ in_array($permission->id, $userPermissions->pluck('id')->toArray() ) ? 'checked="checked"' : '' }}>
                            <label class="custom-control-label" for="{{$permission->slug}}">{{$permission->name}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif  --}}

        <div class="form-group pt-2">
            <input class="btn btn-primary" type="submit" value="Submit">
        </div>

    </form>
 
@endsection

