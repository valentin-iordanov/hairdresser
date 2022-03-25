@extends('layout.admin')

@section('container')

<div class="container d-flex justify-content-center vh-100">
    <div class="row align-items-center justify-content-center w-100">
        <div class="col-lg-5 col-md-8">
            <div class="card">
                <div class="card-body">
                    <form id="serviceAdd">
                    <div class="card-title text-center">
                        <h3 class="mb-5" id="service">Създай Услуга</h3>
                    </div>
                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Име на Услугата:</label>
                        <input name="name" type="name" name="trip-start" required>
                    </div>

                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Времетраене на Услугата:</label>
                        <input name="duration" type="text" required>
                    </div>
                    
                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Цена:</label>
                        <input name="price" type="text" required>
                    </div>

                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Снимка</label>
                        <input name="picture" type="text" required>
                    </div>
                    
                    <div class="card-title text-left mb-4">
                      <button class="btn btn-success w-100" type="submit">Добави</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{base_url()}}/js/createService.js"></script>

@endsection


