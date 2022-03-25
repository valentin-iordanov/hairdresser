@extends('layout.admin')


@section('container')
<div class="container d-flex justify-content-center vh-100">
    <div class="row align-items-center justify-content-center w-100">
        <div class="col-lg-5 col-md-8">
            <div class="card">
                <div class="card-body">
                    <form id="redactService">
                    <div class="card-title text-center">
                        <h3 class="mb-5" id="service" data-id="{{$service->id}}">Редактирай Услугата</h3>
                    </div>
                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Име на Услугата:</label>
                        <input name="name" type="name" name="trip-start" value="{{$service->name}}">
                    </div>

                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Времетраене на Услугата:</label>
                        <input name="duration" type="text" value="{{$service->duration}}" required>
                    </div>
                    
                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Цена:</label>
                        <input name="price" type="text" value="{{$service->price}}" required>
                    </div>

                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Снимка</label>
                        <input name="picture_url" type="text" value="{{$service->picture}}" required>
                    </div>
                    
                    <div class="card-title text-left mb-4">
                      <button class="btn btn-success w-100" type="submit">Запази Редакцията</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{base_url()}}/js/redactService.js"></script>

@endsection