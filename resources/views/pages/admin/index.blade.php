@extends('layouts.parent')
@section('title', 'Dashboard - Admin')
@section('content')
<div class="section dashboard">
    <div class="card revenue-card sales-card">
        <div class="card-body">
            <h5 class="card-title fs-3">{{Auth::user()->name}}  <span class="badge bg-success text-light"><i class="bi bi-check-circle me-1"></i> {{Auth::user()->role}} </span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                    <h6></h6>
                   
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section dashboard">
    <div class="row">

        <div class="col-md-4">

            <div class="card info-card sales-card">



                <div class="card-body">
                    <h5 class="card-title">Category</h5>

                    <div class="d-flex align-items-center ">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$category}} Category</h6>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-4">
            <div class="card info-card sales-card">



                <div class="card-body">
                    <h5 class="card-title">Product</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle  d-flex align-items-center justify-content-center">
                            <i class="ri-gift-line"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $product }} Items</h6>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-4">
            <div class="card info-card sales-card">



                <div class="card-body">
                    <h5 class="card-title">Users</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-user-5-line"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $user }} Users</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>



@endsection