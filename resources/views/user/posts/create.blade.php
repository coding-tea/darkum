@extends('user/layout')
@section('title', 'posts')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Your Posts</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <a href=" {{ route('user.create') }} " class="btn btn-success btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Create a post</span>
            </a>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>description</th>
                        <th>prix</th>
                        <th>Rome number</th>
                        <th>surface</th>
                        <th>ville</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($posts)
                        @forelse ($posts as $item)
                        <tr>
                            <td> {{ $item->id }} </td>
                            <td> {{ $item->title }} </td>
                            <td> {{ $item->description }} </td>
                            <td> {{ $item->prix }} </td>
                            <td> {{ $item->nbChambre }} </td>
                            <td> {{ $item->surface }} </td>
                            <td> {{ $item->ville }} </td>
                            <td>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                there is no post yet 
                            </td>
                        </tr>
                        @endforelse
                    @endisset
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection