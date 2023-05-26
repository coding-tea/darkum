@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
  @if(session("message"))
    <div class="{{session('alert')}}">
      {{session("message")}}
    </div>
  @endif
    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('room') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('annonces.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('New room') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-room" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>No</th>
                                <th>Title</th>
                                <th>Type of transaction</th>
                                <th>Type of property</th>
                                <th>Surface</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($annonces as $annonce)
                            <tr data-entry-id="{{ $annonce->id }}">
                                <td>

                                </td>
                                <td>{{ $annonce->id }}</td>
                                <td>{{ $annonce->title }}</td>
                                <td>{{ $annonce->typeL }}</td>
                                <td>{{ $annonce->type }}</td>
                                <td>{{ $annonce->surface }}</td>
                                <td>${{ $annonce->price }}</td>
                                <td>
                                    <a href="{{ route('annonces.show', $annonce->id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('annonces.edit', $annonce->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure to remove Annonce {{$annonce->id}}? ')" class="d-inline" action="{{ route('annonces.destroy', $annonce->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->

</div>
@endsection
