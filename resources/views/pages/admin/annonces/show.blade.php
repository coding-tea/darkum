@extends("layouts.landingPage")
@isset($annonces)
@section("title", $annonces->title)
@section('content')

<div class="announceContainer">
  @if(session("message"))
<div>
  {{session("message")}}
</div>
@endif
    <div class="announce">
        <div class="announceInfo">
            {{-- <img src="{{ asset('images/'. $medias[0]->url) }}" alt="img"> --}}

            @isset($medias)
            <div class="slidshow mx-auto">
              <div id="carouselExampleControls" class="carousel slide w-75 mx-auto" data-bs-ride="carousel">
                <div class="carousel-inner">
                  @foreach ($medias as $key => $value)
                  <div class="carousel-item {{ ($loop->first) ? 'active' : '' }}">
                    <img src="{{ asset('images/' . $value->url) }}" class="d-block w-100" alt="{{ $annonces->title }}">
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
            <h1 class="heading text-center"> {{ $annonces->title }} </h1>

            <table class="table w-75 mx-auto text-center">
                <tr>
                    <td> <b>price</b> </td>
                    <td> {{ $annonces->price }}DH</td>
                </tr>
                <tr>
                    <td> <b>city</b> </td>
                    <td> {{ $annonces->city }}</td>
                </tr>
                <tr>
                    <td> <b>adresse</b> </td>
                    <td> {{ $annonces->adresse }}</td>
                </tr>
                <tr>
                    <td> <b>surface</b> </td>
                    <td> {{ $annonces->surface }}m<sup>2</sup></td>
                </tr>
                <tr>
                    <td> <b>rom number</b> </td>
                    <td> {{ $annonces->nbRome }} </td>
                </tr>
            </table>
        </div>

        <p class="announceDescription text-center">
          {{ $annonces->description }}
        </p>

        <div class="map"></div>

        @isset($data->tel)
        <div class="ctaContainer">
            <a class="cta" href="https://wa.me/+212{{ $data->tel }}"></i></span> Contacter le Vendeur</a>

            <a class="cta" style="background-color: #4e73de; margin-left:5px;" href="{{ url("/contact/$annonces->typeL/$author/$annonces->title") }}" target="_blanc k"> <i class="fa-solid fa-envelope"></i> via email</a>
        </div>
        @endisset

        <div class="report">
          <h3><b>darkum</b> n’est pas responsable des produits proposés dans les annonces.</h3>
        </div>


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
                              <h6 class="fw-bold text-primary"> {{ $item->user->name }} </h6>
                            </div>
                          </div>
              
                          <p class="mt-1 mb-4 pb-2">
                            {{ $item->comment }}
                          </p>
                          <form onclick="return confirm('are you sure to remove this Comment ==> {{$item->comment}}? ')" class="d-flex flex-row-reverse" action="{{ route('deleteC', $item->idCom) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        </div>
                    @endforeach
                    @endisset
                    

                    

                  </div>
                </div>
              </div>
            </div>
        </section>

    </div>
</div>
@endsection
@endisset