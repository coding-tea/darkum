@extends("layouts.landingPage")
@isset($announce)
@section("title", $announce->title)
@section('content')
<div class="announceContainer">
    <div class="announce">
        <div class="announceInfo">
            <div class="headingShow"><span>{{ $announce->title }}& </span> <span class="price">{{ $announce->price }} DH</span></div>

            @isset($medias)
            <div class="slidshow">
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  @foreach ($medias as $key => $value)
                  <div class="carousel-item {{ ($loop->first) ? 'active' : '' }}">
                    <img src="{{ asset('images/' . $value->url) }}" class="d-block w-100" alt="{{ $announce->title }}">
                  </div>
                  @endforeach
                </div>
                <button 
                class="carousel-control-prev" 
                type="button" 
                data-bs-target="#carouselExampleControls" 
                data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button 
                class="carousel-control-next" 
                type="button" 
                data-bs-target="#carouselExampleControls" 
                data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            @endisset

            <div class="info">
              <div class="info_item">
                <span class="info_icon"><i class="fa-sharp fa-solid fa-city"></i></span>
                <br>
                <span class="info_title">city <br> {{ $announce->city }}</span>
              </div>
              <div class="info_item">
                <span class="info_icon"><i class="fa-solid fa-location-dot"></i></span>
                <br>
                <span class="info_title" style="overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                overflow-y: auto;">adresse <br> {{ $announce->adresse }}</span>
              </div>
              <div class="info_item">
                <span class="info_icon"><i class="fa-solid fa-house"></i></span>
                <br>
                <span class="info_title">surface <br> {{ $announce->surface }} m<sup>2</sup></span>
              </div>
              <div class="info_item">
                <span class="info_icon"><i class="fa-solid fa-arrow-down-1-9"></i></span>
                <br>
                <span class="info_title"> rom number <br> {{ $announce->nbRome }}</span>
              </div>
            </div>
        </div>

        <p class="announceDescription">
          {{ $announce->description }}
        </p>

        @if (isset($announce->lat) && isset($announce->lng))
            <div id="map"></div>
        @endif

        @isset($data->tel)
        <div class="ctaContainer">

          <a class="cta firstCta" href="{{ url("/contact/$announce->typeL/$author/$announce->title") }}" target="_blanc k"> <i class="fa-solid fa-envelope"></i> Contact the Seller</a>

            <a class="cta ctaBtn" href="https://wa.me/+212{{ $data->tel }}"><i class="fa-brands fa-whatsapp"></i></a>

            <a class="cta ctaBtn" style="background-color: #4e73de" href="https://wa.me/+212{{ $data->tel }}"><i class="fa-solid fa-phone"></i></a>

            
        </div>
        @endisset

        <div class="report">
          <h3><b>darkum</b> Is not responsible for the products offered in the ads.</h3>

          <button data-bs-toggle="modal" data-bs-target="#m" class="reportCta"><i class="fa-solid fa-circle-exclamation"></i> report the announcement</button>

          {{-- modal --}}
          <div class="modal" id="m">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title">
                    report the announcement
                  </h5>
                  <button class="btn-close" data-bs-dismiss="modal" ></button>
                </div>

                <form action="{{ route('report.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="announce_id" value="{{ $announce->id }}" class="form-control">

                    <div class="mb-3">
                      <label for="type" class="form-label" style="text-align: left">Please select a problem !.</label>
                      <select id="type" class="form-select" name="type" width='100%' required>
                        <option value="select a type" disabled>select a type</option>
                        <option value="Misleading">Misleading</option>
                        <option value="False Information">False Information</option>
                        <option value="spam">spam</option>
                        <option value="Inappropriate Content">Inappropriate Content</option>
                        <option value="Technical Issues">Technical Issues</option>
                        <option value="something else">something else</option>
                      </select>
                    </div>
                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">close</button>
                  <button type="submit" class="btn btn-primary">
                    report
                  </button>
                </div>
              </form>
              </div>
            </div>
          </div>
        
        </div>

        @isset($announces)
        <div class="announcesContainer">
          <h1 class="heading">YOU MAY ALSO LIKE</h1>
          <div class="announces">
              @foreach ($announces as $item)
                <div class="announceOne">
                <a href="{{ route('show', $item['id']) }}">
                  @if(isset($item['medias'][0]['url']))
                  <img src="{{ asset('images/' . $item['medias'][0]['url']) }}" alt="{{ $item['title'] }}" class="announceImg">
                  @else
                  <img src="{{ asset('images/default.jpg') }}" alt="{{ $item['title'] }}" class="announceImg">
                  @endif
                  <h1 class="prix"> {{ $item['price'] }} DH </h1>
                  <h1 class="title"> {{ $item['title'] }} DH </h1>
                </a>
                </div>
              @endforeach
          </div>
        </div>
        @endisset

        {{-- comments --}}
        <section style="background-color: #fff;" class="comments">
            <div class="container my-5 py-5">
              <h1 class="heading"> comments </h1>
              <div class="row w-100">
                <div class="col">
                  <div class="card w-100">
                    
                    @isset($comments)
                    @foreach ($comments as $key => $item)
                        <div class="card-body w-100 mb-2">
                          <div class="d-flex flex-start align-items-center w-100">
                            <div>
                              <h6 class="fw-bold text-primary"> {{ $names[$key] }} </h6>
                            </div>
                          </div>
              
                          <p class="mt-1 mb-4 pb-2">
                            {{ $item->comment }}
                          </p>
                        </div>
                    @endforeach
                    @endisset
                    

                    <form action="{{ route('comment') }}" method="post" class="form w-100">
                      @csrf
                      <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <div class="d-flex flex-start w-100">
                          <div class="form-outline w-100">
                            <textarea class="form-control" name="comment" id="textAreaExample" rows="4"
                              style="background: #fff;"></textarea>
                            <label class="form-label" for="textAreaExample">Message</label>
                          </div>
                        </div>
                        <input type="hidden" name="AnnounceId" value="{{ ($announce_id)?$announce_id:"" }}">
                        <div class="float-end mt-2 pt-1">
                          <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
        </section>

    </div>
</div>
@endsection



@if (isset($announce->lat) && isset($announce->lng))
@section("script")
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script>

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(success, error);
} else {
    alert("Geolocation is not supported by this browser.");
}

function success(pos) {
    const lat = {{ $announce->lat }};
    const lng = {{ $announce->lng }};
    const accuracy = {{ $announce->accuracy }};
    const title= ` ${{{$announce->title}}} `;

    const map = L.map('map');
    map.setView([lat, lng], 15);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© darkum'
    }).addTo(map);

    const marker = L.marker([lat, lng]).addTo(map).bindPopup(title)
        .openPopup();;
    const circle = L.circle([lat, lng], { radius: accuracy }).addTo(map);

    map.fitBounds(circle.getBounds());
}


function error(err) {
    if (err.code === 1) {
        alert("allow geolocation access");
    } else {
        alert("Cannot get current location");
    }
}



  // navigator.geolocation.getCurrentPosition(success, error);
  // const lat = {{ $announce->lat }};
  // const lng = {{ $announce->lng }};

  // const map = L.map('map');
  // map.setView([lat, lng], 15);

  // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  //     maxZoom: 19,
  //     attribution: '© darkum'
  // }).addTo(map);

  // const marker = L.marker([lat, lng]).addTo(map).bindPopup({{ "'".$announce->title."'" }})
  //     .openPopup();;
  // const circle = L.circle([lat, lng]).addTo(map);

  // map.fitBounds(circle.getBounds());
</script>
@endsection

@section("link")
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection

@endif
@endisset