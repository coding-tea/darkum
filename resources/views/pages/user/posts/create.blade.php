@extends('user.userLayout')
@section('title', 'posts')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create Anooce</h6>
    </div>
    <form class="p-3" method="post" action="">

        <div class="mt-3">
            <label class="form-label" for="Title">
              Title
            </label>
            <input class="form-control" id="Title" name="title" type="text" placeholder="Enter you annoce title ...">
        </div>

        <div class="mt-3">
            <label class="form-label" for="description">
                Description
            </label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Enter your description"></textarea>
            {{-- <input class="form-control" id="description" name="description" type="text" placeholder="Enter you annoce title ..."> --}}
        </div>

        <div class="mt-3">
            <label class="form-label" for="prix">
                Price
            </label>
            <input class="form-control" id="prix" name="prix" type="number" placeholder="Enter you annoce price ...">
        </div>

        <div class="mt-3">
            <label class="form-label" for="Title">
              Rom Number
            </label>
            <input class="form-control" id="nbChambre" name="nbChambre" type="number" placeholder="0">
        </div>

        <div class="mt-3">
            <label class="form-label" for="surface">
                surface
            </label>
            <input class="form-control" id="surface" name="surface" type="text" placeholder="0">
        </div>

        <div class="mt-3">
            <label class="form-label" for="ville">
                ville
            </label>
            <input class="form-control" id="ville" name="ville" type="text" placeholder="0">
        </div>

        <input type="hidden" name="state" value="0">

        <div class="mt-3">
            <label class="form-label" for="image">
                image
            </label>
            <input class="form-control" id="image" name="image" type="file">
        </div>

        <div class="md:flex md:items-center">
          <div class="md:w-1" >
            <button type="submit" class="btn btn-primary mt-3" type="button">
              create annoce
            </button>
        </div>
      </form>
</div>
@endsection