@extends('layout.user')

@section('container')

<div class="container d-flex justify-content-center vh-100">
    <div class="row align-items-center justify-content-center w-100">
        <div class="col-lg-5 col-md-8">
            <div class="card">
                <div class="card-body">
                    <form id="formSaveHour">
                    <div class="card-title text-center">
                        <h3 class="mb-5" data-id="{{$service->id}}"; id="service">{{$service->name}}</h3>
                    </div>
                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Дата:</label>
                        <input name="date" type="date" id="date" name="trip-start" min="{{$appointmentRedact->date}}" value="{{$appointmentRedact->date}}">
                    </div>

                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Час:</label>
                        <input name="selectedHour" id="selectedHour" type="text" value="{{$appointmentRedact->time}}" required>
                        <button id="saveHour" type="button" class="btn btn-primary mb-3 fs-5" data-bs-toggle="modal"
                        data-bs-target="#moduleFreeHour">
                        Свободни Часове
                    </button>
                    </div>
                    
                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Име:</label>
                        <input name="name" type="text" id="name" value="{{$appointmentRedact->person_name}}" required>
                    </div>

                    <div class="card-title text-left mb-4">
                        <button name="submit" type="submit" class="btn btn-warning w-100 fs-5">
                        Редактирай
                        </button>
                    </div>

                    </form>
                    
                    <div class="modal fade" id="moduleFreeHour" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold" id="moduleFreeHourLabel">Свободни часове за Дата: <span id="moduleDate"></span> </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{base_url()}}/js/redactAppoitment.js"></script>

@endsection

