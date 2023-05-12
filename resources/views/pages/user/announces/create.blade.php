@extends('layouts.userLayout')
@section('title', 'posts')
@section('content')
<div class="card shadow mb-4">
    <x-section sectionTitle='Create Announce' />
    <form class="p-3" method="post" action="{{ route('announces.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
      @csrf
        <x-form-input title='title' name='title' placeholder='Enter you announce title ...' />
        <x-textarea title='Description' name='description' placeholder='announce description ...' />
        <x-form-input title='Price' name='price' type='number' />
        <x-form-input title='Rom Number' name='nbRome' type='number' />
        <x-form-input title='surface' name='surface' type='number' />
        <x-form-input title='city' name='city' placeholder="your city" />

        <div class="mb-3">
          <label for="images" class="form-label">Images</label>
          <input type="file" class="form-control" name= "image[]" id="images" multiple = "multiple" />
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