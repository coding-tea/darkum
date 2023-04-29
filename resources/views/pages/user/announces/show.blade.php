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
        @isset($data)
        <div class="contactInfo">
            <b> Full Name : </b> <span>" {{ (isset($data->fullName))?$data->fullName:'' }} "</span> <br>
            <b> adresse : </b> <span>" {{ (isset($data->adresse))?$data->adresse:'' }} "</span><br>
            <b>contact on : </b>
            @isset($data->tel)
            <span>
                <a href="http://wa.me/+212{{ $data->tel }}" class="contact" title="whatsapp"><i class="bi bi-whatsapp"></i></a>
                <a href="mailto:{{ $email }}" class="contact" title="send an email"><i class="bi bi-envelope"></i></a>
                <a href="sms:+212{{ $data->tel }}" class="contact" title="sms"><i class="bi bi-chat-fill"></i></a>
            </span>
            @endisset
        </div>
        @endisset
    </div>
</div>
@endsection
@endisset