@extends('layout')
@section('content')
    
    <div class="card" style="margin-top: 20px">
        <div class="card-header">
            <i class="fas fa-user-edit"></i>
            Create User
        </div>
        
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
            @csrf
            
            <div>
                <div class="form-group">
                    <label for="">Name:</label>
                    <input type="text" name="name" class="form-control" id="" >
                    @if ($errors->has('name'))
                            <div style="color: red">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="text" name="email" class="form-control" id="" >
                    @if ($errors->has('email'))
                            <div style="color: red">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <label for="">Password:</label>
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : ''}}" id="" placeholder="You can leave this section emply if you do not wish
                        to change the current password!">
                        @if ($errors->has('password'))
                            <div style="color: red">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <label for="">Password Confirm:</label>
                    <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="">
                </div>
                <div class="form-group">
                    <label for="">Select Role:</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Select a user role</option>
                            @foreach ($roles as $role)
                                <option data-role-id="{{ $role->id }}" data-role-slug="{{ $role->slug }}" value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group" id="permission_set">
                    <label for="">Select Permissions:</label>
                    <div id="permission_check_box_list">
                    </div>
                </div>
                
            </div>
        </div> {{-- /card-body --}}

        <div class="card-footer">
            <div class="btn-group float-right" role="group">
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div> 
        </form>
    </div> {{-- /card --}} 
@endsection