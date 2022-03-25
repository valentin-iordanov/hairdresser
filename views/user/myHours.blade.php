@extends('layout.user')

@section('container')
    
<div class="container-fluid">
    <div class="row mt-5 d-flex justify-content-center gap-4">
        
        @if (count($appointments) != 0)
            @foreach ($appointments as $appointment)
            <div class="col-xl-4 col-md-6 col-sm-12 card p-0 text-center">
                    <img class="card-img-top"
                    src="{{$services->getServiceById($appointment['service_id'])->picture}}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 id="title" class="card-title fw-bold display-6">{{$services->getServiceById($appointment['service_id'])->name}}</h5>
                    <p class="card-text fs-2">Дата: <span id="date">{{$appointment['date']}}</span></p>
                    <p class="card-text fs-3">Час: <span id="hour">{{$appointment['time']}}</span></p>
                    <a href="/appointment/redact/{{$appointment['id']}}" class="btn btn-warning">Редактиране</a>
                    <button data-id="{{$appointment['id']}}" class="btn btn-danger deleteBtn">отмени</button>
                </div>
            </div>
            @endforeach
        @else
            <div class="col border">
                <div>
                    <p class="display-4">Нямаш Запазени Часове</p>
                </div>
                <div>
                    <a href="/savehour" class="btn btn-success w-100">Запази Час</a>
                </div>
            </div>
        @endif
           
       

    </div>
</div>

<script src="{{base_url()}}/js/myHours.js"></script>

@endsection

