@extends('layouts.userLayout')
@section('title', 'posts')
@section('content')
<div class="card shadow mb-4">
    <x-section sectionTitle='Create Announce' />
    <form class="p-3" method="post" action="{{ route('announces.store') }}">
      @csrf
        <x-form-input title='title' name='title' placeholder='Enter you announce title ...' />
        <x-textarea title='Description' name='description' placeholder='announce description ...' />
        <x-form-input title='Price' name='price' type='number' />
        <x-form-input title='Rom Number' name='nbRome' type='number' />
        <x-form-input title='surface' name='surface' type='number' />
        <x-form-input title='city' name='city' placeholder="your city" />

        <div class="mt-3">
          <label class="form-label" for="Title">
            images
          </label>
          <input type="file" class="form-control" placeholder="Choose Announce Images" id="images" name="files" >
        </div>

        <input type="hidden" name="state" value="0">
        <div class="md:flex md:items-center">
          <div class="md:w-1" >
            <button type="submit" class="btn btn-primary mt-3" type="button">
              Create Announce
            </button>
        </div>
    </form>
</div>
@endsection