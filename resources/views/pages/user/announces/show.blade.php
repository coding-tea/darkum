@extends("layouts.landingPage")
@isset($announce)
@section("title", $announce->title)
@section('content')
<div class="announceContainer">
    <div class="announce">
        <div class="announceInfo">
            <h1 class="heading"> {{ $announce->title }} </h1>
            <p class="announceDescription">
                {{ $announce->description }}
            </p>
            <table class="table">
                <tr>
                    <td> price </td>
                    <td> {{ $announce->price }}DH</td>
                </tr>
                <tr>
                    <td> city </td>
                    <td> {{ $announce->city }}</td>
                </tr>
                <tr>
                    <td> surface </td>
                    <td> {{ $announce->surface }}m<sup>2</sup></td>
                </tr>
                <tr>
                    <td> nbRome </td>
                    <td> {{ $announce->nbRome }}</td>
                </tr>
                <tr>
                    <td> rom number </td>
                    <td> {{ $announce->nbRome }} </td>
                </tr>
            </table>
        </div>
        @isset($data->tel)
        <div class="ctaContainer">
            <a class="cta" href="http://wa.me/+212{{ $data->tel }}" target="_blanck"> <span><i class="bi bi-whatsapp"></i></span> Contacter le Vendeur</a>
        </div>
        @endisset

        <section style="background-color: #fff;">
            <div class="container my-5 py-5">
              <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                  <div class="card">
                    
                    <div class="card-body">
                      <div class="d-flex flex-start align-items-center">
                        <img class="rounded-circle shadow-1-strong me-3"
                          src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                          height="60" />
                        <div>
                          <h6 class="fw-bold text-primary mb-1">Lily Coleman</h6>
                          <p class="text-muted small mb-0">
                            Shared publicly - Jan 2020
                          </p>
                        </div>
                      </div>
          
                      <p class="mt-3 mb-4 pb-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip consequat.
                      </p>
                    </div>



                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                      <div class="d-flex flex-start w-100">
                        <img class="rounded-circle shadow-1-strong me-3"
                          src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                          height="40" />
                        <div class="form-outline w-100">
                          <textarea class="form-control" id="textAreaExample" rows="4"
                            style="background: #fff;"></textarea>
                          <label class="form-label" for="textAreaExample">Message</label>
                        </div>
                      </div>
                      <div class="float-end mt-2 pt-1">
                        <button type="button" class="btn btn-primary btn-sm">Post comment</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>

    </div>
</div>
@endsection
@endisset