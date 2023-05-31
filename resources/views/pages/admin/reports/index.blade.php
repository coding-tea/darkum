@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
  @if(session("message"))
    <div class="{{session('alert')}} p-3">
      {{session("message")}}
    </div>
  @endif
    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Reports
                </h6>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-room" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>No</th>
                                <th>Reporting Users</th>
                                <th>Annonce Id</th>
                                <th>Annonce Title</th>
                                <th>Announce Owner</th>
                                <th>Owner ID</th>
                                <th>Types of reports</th>
                                <th>Number of reports</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reports as $key => $report)
                            <tr data-entry-id="{{ $report->announce_id }}">
                                <td>

                                </td>
                                <td>{{ $key }}</td>
                                
                                <td>
                                    @foreach($arrays[$key] as $item)
                                      <span class="d-block text-gray-800">{{$item->user->name}}</span>
                                    @endforeach 
                                  </td>
                                <td>{{ $report->announce_id }}</td>
                                <td>{{ $report->announce->title }}</td>
                                <td>{{ $report->announce->user->name }}</td>
                                <td>{{ $report->announce->user->id }}</td>
                                <td>
                                  @foreach($arrays[$key] as $item)
                                    <span class="d-block text-gray-800">{{$item->type}}</span>
                                  @endforeach 
                                </td>
                                <td>{{ $report->nbAnnonces }}</td>
                                <td>
                                  @if($arrays[$key][count($arrays[$key]) - 1]->etat == 1 || $arrays[$key][count($arrays[$key]) - 1]->etat == 0)
                                    <a title="show" href="{{ route('annonces.show', $report->announce_id) }}" class="btn btn-info">
                                      <i class="fa fa-eye"></i>
                                  </a>
                                  
                                  <form onclick="return confirm('are you sure to Validate this report of annonce ==> {{$report->announce_id}} ? ')" class="d-inline" action="{{route('reports.update', $report->announce_id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button title="OK" class="btn btn-success" title="Clean" type="submit">
                                          <i class="fa-solid fa-check"></i>
                                    </button>
                                  </form>


                                  <form onclick="return confirm('are you sure to remove Annonce {{$report->announce_id}}? ')" class="d-inline" action="{{ route('reports.destroy', $report->announce_id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                        <button title="DELETE ANNONCE" class="btn btn-danger" type="submit">
                                            <i class="fa fa-trash"></i>
                                            </button>
                                  </form>
                                  
                                  @else
                                    <span class="text-gray-800">Terminée</span>
                                  @endif
                                    
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->
    <div class="noprint">               
      {{-- {{ $reports->links() }} --}}
   </div>
</div>
@endsection
