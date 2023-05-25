@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('edit user')}}</h1>
        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('Name') }}" name="name" value="{{ old('name', $user->name) }}" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" placeholder="{{ __('Email') }}" name="email" value="{{ old('email',  $user->email) }}" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="roles">Role</label>
                        <select name="roles" class="form-control select2" required>
                          <option value="user" {{ $user->role == 'user' ? ' selected' : '' }}>User</option>
                          <option value="admin" {{ $user->role == 'admin' ? ' selected' : '' }}>Admin</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection