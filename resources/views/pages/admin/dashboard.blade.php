@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

<!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="{{route('annonces.index')}}" class="dashbord-link">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Annonces
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                              @isset($nbAnnonces)
                                  {{$nbAnnonces}}
                              @else
                                No Annonce Yet
                              @endisset
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hotel fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-4 mb-4">
          <a href="{{route('users.index')}}" class="dashbord-link">

            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              User
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              @isset($nbUsers)
                                {{$nbUsers}}
                              @else 
                                No User Let
                              @endisset

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-users fa-2x text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
          </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-4 mb-4">
          <a href="{{route("commentAdmin")}}" class="dashbord-link">

            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                              Comments
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                      @isset($nbCom)
                                          {{$nbCom}}
                                      @else 
                                        No Comment Yet
                                      @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                          <i class="fa-solid fa-comment fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
          </a>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-4 mb-4">
          <a href="{{route('reports.index')}}" class="dashbord-link">

            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Reports</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              
                              @isset($nbReports)
                                          {{$nbReports}}
                                          <span class="ml-2 text-info">
                                            @isset($newReports)
                                              @if($newReports)
                                              ({{$newReports }} new reports)
                                              @endif
                                            @endisset
                                          </span>
                              @else 
                                        No Report Yet
                              @endisset
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-flag fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
          </a>
        </div>
    </div>

    <!-- Content Row -->

</div>
@endsection