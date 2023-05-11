@extends('layouts.userLayout')
@section('title', 'annonces')
@section('content')
<div class="card shadow mb-4">

    <x-section sectionTitle='Announces' />

    <a style="border-radius: 0; width: 100%" href="{{ route('announces.create') }}" class="btn btn-primary mt-1">create a new announce</a>

    <div class="d-flex justify-content-center flex-wrap p-4">
        @isset($announces)
            @forelse ($announces as $item)
            @php
                $titre = $item->titre;
                $description = $item->description;
                $id = $item->id;
                $routeDelete = 'announces.destroy';
                $routeEdit = 'announces.edit';
            @endphp
            <x-card 
                image=''
                :id="$id"
                :routeDelete="$routeDelete"
                :routeEdit="$routeEdit"
                :title="$titre"
                :description="$description"
            />
            @empty
            <p></p>
            @endforelse
        @endisset
    </div>
</div>
@endsection