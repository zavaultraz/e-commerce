@extends('layouts.parent')
@section('title', 'My Transaction')
@section('content')

<div class="card">
    <div class="card-body">
        <div>
            <h1 class="fs-1 mt-3 card-title">My Transaction</h1>
            <nav class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        @if (Auth::user()->role=='admin')
                        <a href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    @else
                    <a href="{{route('user.dashboard')}}">Dashboard</a></li>
                    @endif
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">My Transaction</li>
                </ol>
            </nav>
        </div>
        <h3 class="card-title">
            <i class="bi bi-cart"></i> List Transaction
        </h3>
        <div class="section dashboard">
            <div class="row">
                <div class="col-md-4">
                    <div class="card info-card customers-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Pending</h5>

                            <div class="d-flex align-items-center ">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-alarm"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$pending}} Product</h6>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">
                    <div class="card info-card  sales-card">



                        <div class="card-body">
                            <h5 class="card-title">Expired</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle  d-flex align-items-center justify-content-center">
                                    <i class="bi bi-exclamation-octagon-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $expired }} Orders</h6>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card info-card  revenue-card">



                        <div class="card-body">
                            <h5 class="card-title">Settlement</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-check-shield"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $settlement }} Orders</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Account</th>
                    <th scope="col">Reciever Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mytransaction as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ auth()->user()->name }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>Rp. {{number_format($row->total_price)}}</td>
                    <td>
                    @if ($row->status == 'EXPIRED')
                        <span class="badge bg-danger text-uppercast">Expired</span>
                        @elseif ($row->status == 'PENDING')
                        <span class="badge bg-warning text-uppercast">Pending</span>
                        @elseif ($row->status == 'SATTLEMENT')
                        <span class="badge bg-info text-uppercast">Sattlement</span>
                        @else
                        <span class="badge bg-success text-uppercast">Success</span>
                        @endif
                    </td>
                    <td>
                        @if (Auth::user()->role == 'admin')
                        <a href="{{ route('admin.my-transaction.showDataBySlugAndId', [$row->id, $row->slug]) }}" class="btn btn-info"><i class="bi bi-eye">detail</i></a>
                        @else
                        <a href="{{ route('user.my-transaction.showDataBySlugAndId', [$row->id, $row->slug]) }}" class="btn btn-info"><i class="bi bi-eye">detail</i></a>
                        @endif
                    </td>
                </tr>
                @empty

                @endforelse

            </tbody>
        </table>
    </div>
</div>

@endsection