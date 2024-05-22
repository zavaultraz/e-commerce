@extends('layouts.parent')
@section('title', 'My Transaction')
@section('content')

<div class="card">
    <div class="card-body">
        <div>
            <h1 class="fs-1 mt-3 card-title">My Transaction</h1>
            <nav class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">My Transaction</li>
                </ol>
            </nav>
        </div>
        <h3 class="card-title">
            <i class="bi bi-cart"></i> List Transaction
        </h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Account</th>
                    <th scope="col">Reciever Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Total Price</th>
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
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal{{$row->id}}">
                            View
                        </button></td>
                    @include('pages.admin.my-transaction.modal.view-modal')

                </tr>
                @empty

                @endforelse

            </tbody>
        </table>
    </div>
</div>

@endsection