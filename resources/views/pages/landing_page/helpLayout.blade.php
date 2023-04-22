@extends('layouts.landingPage')

@section("links")
@parent
<link rel="stylesheet" href="{{asset("css/landing_page/card-help.css")}}">
@endsection

@section("content")
<div class="help">
  <section class="container-card">
    <div class="card-about">
      <h1>À propose de Nous</h1>
      <div class="card-menu">
          <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">Qui sommes nous?</a>
          <a href="/contact" class="{{request()->is('contact') ? 'active' : '' }}">Contactez-nous</a>
          <a href="/" class="{{request()->is('faqs') ? 'active' : '' }}">FAQ's</a>
          <a href="/privacy" class="{{ request()->is('privacy') ? 'active' : '' }}">Conditions d'utilisation</a>
      </div>
    </div>
    <div class="card-text">
      @yield('card-text')
    </div>
  </section>
</div>
  
@endsection