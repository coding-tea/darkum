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

        <section style="background-color: #fff;" class="comments">
            <div class="container my-5 py-5">
              <div class="row w-100">
                <div class="col">
                  <div class="card w-100">
                    
                    @isset($comments)
                    @foreach ($comments as $item)
                        <div class="card-body w-100 mb-2">
                          <div class="d-flex flex-start align-items-center w-100">
                            <div>
                              <h6 class="fw-bold text-primary"> {{ Auth()->user()->name }} </h6>
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