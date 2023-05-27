@extends('layouts.adminLayout')
@section('title', 'profile')
@section('content')
@isset($user)
<div class="card shadow mb-4">
    <x-section sectionTitle='Profile info' />
    <form class="p-3" method="post" action="{{ route('profileUpdate',Auth::user()->id) }}">
      @csrf
      @method('PUT')
        <x-form-input title='user name' name='name' value='{{ $user->name }}' />
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        <x-form-input title='email' name='email' type='email' value='{{ $user->email }}' />
          @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
            <x-form-input title='full name' name='fullName' value='{{ (!empty($data)) ? $data->fullName : ""}}' placeholder="name" />
          @error('fullName')
            <span class="text-danger">{{ $message }}</span>
          @enderror
            <x-form-input title='adresse' name='adresse' value='{{ (!empty($data)) ? $data->adresse : ""}}' placeholder="adresse"/>
          @error('adresse')
            <span class="text-danger">{{ $message }}</span>
          @enderror
            <x-form-input title='phone number' name='tel' value='{{ (!empty($data)) ? $data->tel : ""}}' placeholder="whatsapp number" />
          @error('tel')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        <input type="hidden" name="state" value="0">
        <div class="md:flex md:items-center">
          <div class="md:w-1" >
            <button type="submit" class="btn btn-primary mt-3" type="button">
              Update Info
            </button>
            <a  class="btn btn-primary mt-3" href="{{route('dashboard.index')}}">
              Back
            </a>
        </div>
    </form>
</div>
@endisset
@endsection