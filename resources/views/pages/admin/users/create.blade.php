@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('create user') }}</h1>
        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm shadow-sm"><b>Go Back</b></a>
    </div>


<!-- Content Row -->
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name', '') }}"/>
                      @error('name')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                  
                  <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email', '') }}"/>
                      @error('email')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="{{ old('password', '') }}"/>
                        <div class="input-group-append">
                            <button class="btn btn-outline-none btn-primary btn-border-none" type="button" id="togglePassword">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                  
                  <div class="form-group">
                      <label for="roles">Role</label>
                      <select name="roles" class="form-control select2" required>
                          <option value="user"{{ old('roles') == 'user' ? ' selected' : '' }}>User</option>
                          <option value="admin"{{ old('roles') == 'admin' ? ' selected' : '' }}>Admin</option>
                      </select>
                      @error('roles')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection

@section("script")
<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.innerHTML = type === 'password' ? '<i class="fa fa-eye"></i>' : '<i class="fa fa-eye-slash"></i>';
  });
</script>
@endsection