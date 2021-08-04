@extends('layouts.start')

@section('home')
<div class="container-fluid p-0">
    <div class="d-flex flex-column justify-content-center align-items-center ct-cards">
        <div class="d-flex flex-column justify-content-center align-items-center card">
            <h2 class="txt-continent p-0">AFRICA</h2>
            <a href=""><img class="img-card" src="{{ asset('img/africa.jpg') }}" alt="Fearscare from pixabay"></a>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center card">
            <h2 class="txt-continent p-0">ASIA</h2>
            <a href=""><img class="img-card" src="{{ asset('img/japon.jpg') }}" alt="Free-Photos from pixabay"></a>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center card">
            <h2 class="txt-continent p-0">AMERICA</h2>
            <a href=""><img class="img-card" src="{{ asset('img/newYork.jpg') }}" alt="Michael Pewney from pixabay"></a>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center card">
            <h2 class="txt-continent p-0">EUROPE</h2>
            <a href=""><img class="img-card" src="{{ asset('img/paris.jpg') }}" alt="Free-Photos from pixabay"></a>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center card">
            <h2 class="txt-continent p-0">OCEANIA</h2>
            <a href=""><img class="img-card" src="{{ asset('img/sydney.jpg') }}" alt="Patty Jansen from pixabay"></a>
        </div>
    </div>
</div>
@endsection