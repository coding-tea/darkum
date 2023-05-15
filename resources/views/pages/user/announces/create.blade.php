@extends('layouts.userLayout')
@section('title', 'posts')
@section('content')
<div class="card shadow mb-4">
    <x-section sectionTitle='Create Announce' />
    <form class="p-3" method="post" action="{{ route('announces.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
      @csrf
        <x-form-input title='title' name='title' placeholder='Announce title ...' />
        <x-textarea title='Description' name='description' placeholder='Announce description ...' />
        <x-form-input title='Price' name='price' type='number' />
        <x-form-input title='Rom Number' name='nbRome' type='number' />
        <x-form-input title='surface' name='surface' type='number' />
        <x-form-input title='city' name='city' placeholder="city" />

        <br>

        @isset($typeL)
        <div class="mb-3">
          <label for="typel" class="form-label">Type de transaction</label>
          <select id="typel" name="typeL" width='100%' >
            @foreach ($typeL as $item)
                <option value="{{ $item->typeL }}"> {{ $item->typeL }} </option>
            @endforeach
          </select>
        </div>
        @endisset

        @isset($type)
        <div class="mb-3">
          <label for="type" class="form-label">Type de bien immobilier</label>
          <select id="type" name="type" width='100%'>
            @foreach ($type as $item)
                <option value="{{ $item->type }}"> {{ $item->type }} </option>
            @endforeach
          </select>
        </div>
        @endisset

        <x-form-input title='adresse' name='adresse' placeholder="adresse" />
        
        <br>

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