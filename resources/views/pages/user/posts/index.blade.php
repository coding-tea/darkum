@extends('user.userLayout')
@section('title', 'annonces')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Annoces</h6>
    </div>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mt-1">create a new annoce</a>

    <div class="d-flex justify-content-center flex-wrap p-4">
        @isset($posts)
            @forelse ($posts as $item)
            <div class="card m-1" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->title }}</h5>
                  <p class="card-text">{{ $item->description }}</p>
                  <a href="#" class="btn btn-primary">Edit annoce</a>
                  <a href="#" class="btn btn-danger">delete annoce</a>
                </div>
              </div>
            @empty
            @endforelse
        @endisset
    </div>
</div>
@endsection