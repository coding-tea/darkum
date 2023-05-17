@extends('layouts.landingPage')

@section('title', "Location Appartement")

@section("links")
  @parent
  <link rel="stylesheet" href="{{asset("css/landing_page/location.css")}}">
  <style>
    .hidden-image {
        display: none;
    }
  </style>
@endsection

@section("content")

  <livewire:filter-component :path="'location'"/>

    
@endsection

@section("script")
  <script src="{{asset("js/landing_page/location.js")}}"></script>
@endsection

