@extends('layouts.userLayout')
@section('title', 'posts')
@section('content')
<div class="card shadow mb-4">

    <x-section sectionTitle='create Announce' />

    <form class="p-3" method="post" action="">

        <x-form-input title='title' name='title' placeholder='Enter you announce title ...' />
        <x-textarea title='Description' name='Description' placeholder='announce description ...' />
        <x-form-input title='Price' name='prix' type='number' />
        <x-form-input title='Rom Number' name='nbChambre' type='number' />
        <x-form-input title='surface' name='surface' type='number' />
        <x-form-input title='ville' name='ville' placeholder="your city" />
        <x-form-input title='image' name='image' type='file' />

        <input type="hidden" name="state" value="0">
        <div class="md:flex md:items-center">
          <div class="md:w-1" >
            <button type="submit" class="btn btn-primary mt-3" type="button">
              create annoce
            </button>
        </div>
      </form>
</div>
@endsection