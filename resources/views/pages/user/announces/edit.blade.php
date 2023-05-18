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

          <br>

          @isset($typeL)
          <div class="mb-3">
            <label for="typel" class="form-label">Type de transaction</label>
            <select id="typel" name="typeL" width='100%' required>
              @foreach ($typeL as $item)
                  <option value="{{ $item->typeL }}" {{ ($announce->typeL == $item->typeL)?'selected' : '' }} > {{ $item->typeL }} </option>
              @endforeach
            </select>
          </div>
          @endisset
  
          @isset($type)
          <div class="mb-3">
            <label for="type" class="form-label">Type de bien immobilier</label>
            <select id="type" name="type" width='100%' required>
              @foreach ($type as $item)
                  <option value="{{ $item->type }}" {{ ($announce->type == $item->type)?'selected' : '' }} > {{ $item->type }} </option>
              @endforeach
            </select>
          </div>
          @endisset
  
          <x-form-input title='adresse' name='adresse' :value="$announce->adresse" placeholder="adresse" required />

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