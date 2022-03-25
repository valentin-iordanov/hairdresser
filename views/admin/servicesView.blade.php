@extends('layout.admin')


@section('container')
<div class="container-fluid">
    <div class="row mt-5 d-flex justify-content-center gap-4">
        @foreach ($services as $service)
        <div id='{{$service["id"]}}' class="col-xl-4 col-md-6 col-sm-12 card p-0 text-center">
            <img class="card-img-top" src='{{$service["picture"]}}' alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$service["name"]}}</h5>
                <p class="card-text">Цена за Услугата:{{$service["price"]}}лв</p>
                <p class="card-text">Време за Услугата:{{$service["duration"]}}</p>
                <a href="/service/redact/{{$service['id']}}" class="btn btn-primary">Редактирай</a>
                <button data-id="{{$service['id']}}" class="btn btn-primary deleteBtn">Изтрии</button>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="{{base_url()}}/js/serviceView.js"></script>

@endsection