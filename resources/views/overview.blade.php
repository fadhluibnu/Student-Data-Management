@extends('layouts.main')

@section('container')
    <div class="col" style="height: 100%; overflow-y: scroll">
        <div class="hidden-area-collapse p-3 position-absolute" id="collapse-area" onclick="areaCollapse()"></div>
        <div class="container-fluid mt-4">
            <div class="row bg-white p-3 rounded-3">
                <div class="col-md-4 col-lg-3">
                    <div class="box-profile m-auto"></div>
                    <style>
                        .box-profile {
                            background-image: url(assets/pinguin.jpg);
                        }

                    </style>
                </div>
                <div class="col-md-8 col-lg-9 text-center text-md-start mt-3 mt-md-0">
                    <h2 class="username">Retrofit</h2>
                    <h4 class="desc">3103120079</h4>
                    <h4 class="desc">XI RPL 4</h4>
                    <div class="d-flex justify-content-center justify-content-md-start">
                        <a href="" class="btn my-btn mt-2">
                            <i class="bi bi-pen me-2"></i>Edit Profile
                        </a>
                        <a href="" class="btn my-btn-danger mt-2 ms-3">
                            <i class="bi bi-pen me-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
