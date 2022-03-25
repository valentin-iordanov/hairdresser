@extends('layout.user')


@section('container')
<div class="container-fluid">
    <div class="row mt-5 d-flex justify-content-center gap-4">
        @foreach ($services as $service)
        <div id='{{$service["id"]}}' class="col-xl-4 col-md-6 col-sm-12 card p-0 text-center">
            <img class="card-img-top" src='{{$service["picture"]}}' alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$service["name"]}}</h5>
                <p class="card-text">Цена за Услугата</p>
                <p class="card-text">{{$service["price"]}}лв</p>
                <a href="/appoitmentmenu/{{$service['id']}}" class="btn btn-primary">Запази час</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
