@extends('layouts.landingPage')

@section('title', "Location Appartement")

@section("links")
  @parent
  <link rel="stylesheet" href="{{asset("css/landing_page/location.css")}}">
@endsection

@section("content")
  
<livewire:filter-component :path="'vacance'"/>

    
@endsection

@section("script")
  <script src="{{asset("js/landing_page/location.js")}}"></script>
@endsection

