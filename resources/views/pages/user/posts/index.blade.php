@extends('layouts.userLayout')
@section('title', 'annonces')
@section('content')
<div class="card shadow mb-4">

    <x-section sectionTitle = 'announces' />

    <a style="border-radius: 0; width: 100%" href="{{ route('posts.create') }}" class="btn btn-primary mt-1">create a new announce</a>

    <div class="d-flex justify-content-center flex-wrap p-4">
        @isset($posts)
            @forelse ($posts as $item)
            @php
                $titre = $item->titre;
                $description = $item->description;
            @endphp
            <x-card 
                image = ''
                :title = '$titre'
                :description = '$description'
            />
            @empty
            
            @endforelse
        @endisset
    </div>
</div>
@endsection