@extends('layouts.userLayout')
@section('title', 'posts')
@section('content')
<div class="card shadow mb-4">
    <x-section sectionTitle='Create Announce' />
    <form class="p-3" method="post" action="{{ route('announces.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
      @csrf
        <x-form-input title='title' name='title' placeholder='Announce title ...' />
        <x-textarea title='Description' name='description' placeholder='Announce description ...' />
        <x-form-input title='Price' name='price' type='number' />
        <x-form-input title='Rom Number' name='nbRome' type='number' />
        <x-form-input title='surface' name='surface' type='number' />
        <x-form-input title='city' name='city' placeholder="city" />

        <br>

        @isset($typeL)
        <div class="mb-3">
          <label for="typel" class="form-label">Type de transaction</label>
          <select id="typel" name="typeL" width='100%' required>
            @foreach ($typeL as $item)
                <option value="{{ $item }}" {{ ($item=='location')?'selected':'' }} > {{ $item }} </option>
            @endforeach
          </select>
        </div>
        @endisset

        @isset($type)
        <div class="mb-3">
          <label for="type" class="form-label">Type de bien immobilier</label>
          <select id="type" name="type" width='100%' required>
            @foreach ($type as $item)
                <option value="{{ $item }}"> {{ $item }} </option>
            @endforeach
          </select>
        </div>
        @endisset

        <x-form-input title='adresse' name='adresse' placeholder="adresse" required />
        
        <br>

        <div class="mb-3">
          <label onmouseover='document.querySelector("#imagetitle").style="display:none;"' onmouseout='document.querySelector("#imagetitle").style="display:inline;"' for="file-upload" class="form-label custom-file-upload" ><i class="fa-solid fa-cloud-arrow-up"></i> <span id="imagetitle">Images</span></label>
          <input type="file" class="form-control" name= "image[]" id="file-upload" multiple = "multiple" required />
        </div>
        <button id="addLocation" class="btn mt-3 mx-auto" onsubmit="return false">Start Location</button>
        <button id="beforeMap" type="submit" class="btn btn-primary mt-5" type="button">
          Create Announce
        </button>
        <div id="map"></div>

        <input type="hidden" name="lat" id="lat" value="null" />
        <input type="hidden" name="lng" id="lng" value="null" />
    
        <div class="md:flex md:items-center">
          <div class="md:w-1" >
            <button id="afterMap" type="submit" class="btn btn-primary mt-3" style="display:none" type="button">
              Create Announce
            </button>
        </div>
    </form>
</div>
@endsection

@section("script")
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script>

document.getElementById('addLocation').addEventListener('click', function(event) {
  
  event.preventDefault();

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(success, error);
} else {
    alert("Geolocation is not supported by this browser.");
}

function success(pos) {
    const lat = pos.coords.latitude;
    const lng = pos.coords.longitude;
    const accuracy = pos.coords.accuracy;

    const map = L.map('map');
    map.setView([lat, lng], 15);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© darkum'
    }).addTo(map);

    const marker = L.marker([lat, lng]).addTo(map).bindPopup('your location')
        .openPopup();;
    const circle = L.circle([lat, lng], { radius: accuracy }).addTo(map);

    map.fitBounds(circle.getBounds());
    document.getElementById("afterMap").style.display = 'block'; 
    document.getElementById("beforeMap").style.display = 'none'; 
    document.getElementById("addLocation").style.display = 'none'; 
    document.getElementById('lng').value = lng;
    document.getElementById('lat').value = lat;
}


function error(err) {
    if (err.code === 1) {
        alert("allow geolocation access");
    } else {
        alert("Cannot get current location");
    }
     
}


});
</script>
@endsection

@section("link")
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection