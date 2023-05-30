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

            <table class="table table-striped">
                <tr>
                    <td> <b>city</b> </td>
                    <td> {{ $announce->city }}</td>
                </tr>
                <tr>
                    <td> <b>adresse</b> </td>
                    <td> {{ $announce->adresse }}</td>
                </tr>
                <tr>
                    <td> <b>surface</b> </td>
                    <td> {{ $announce->surface }}m<sup>2</sup></td>
                </tr>
                <tr>
                    <td> <b>Rom Number</b> </td>
                    <td> {{ $announce->nbRome }} </td>
                </tr>
            </table>
        </div>

        <p class="announceDescription">
          {{ $announce->description }}
        </p>

        <div class="map"></div>

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
                        <option value="spam">spam</option>
                        <option value="Unauthorized post">Unauthorized post</option>
                        <option value="something else">something else</option>
                      </select>
                    </div>
                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" data-bs-dismiss="modal">close</button>
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
@endisset