@extends('layouts.userLayout')
@section('title', 'posts')
@section('content')
<div class="card shadow mb-4">
    @isset($announce)
    <x-section sectionTitle='Update Announce' />
    <form class="p-3" method="post" action="{{ route('announces.update', $announce->id) }}">
      @csrf
      @method('PUT')
        <x-form-input title='title' name='title' :value="$announce->title" placeholder='Enter you announce title ...' />
        <x-textarea title='Description' name='description' :value="$announce->description" placeholder='announce description ...' />
        <x-form-input title='Price' name='price' :value="$announce->price" type='number' />
        <x-form-input title='Rom Number' name='nbRome' :value="$announce->nbRome" type='number' />
        <x-form-input title='surface' name='surface' :value="$announce->surface" type='number' />
        <x-form-input title='city' name='city' :value="$announce->city" placeholder="your city" />

        <input type="hidden" name="state" value="0">
        <div class="md:flex md:items-center">
          <div class="md:w-1" >
            <button type="submit" class="btn btn-primary mt-3" type="button">
              Update Announce
            </button>
        </div>
      </form>
      @endisset
</div>
@endsection