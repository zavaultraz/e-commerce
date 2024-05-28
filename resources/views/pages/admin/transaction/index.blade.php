@extends('layouts.parent')
@section('title', 'My Transaction')
@section('content')

<div class="card">
    <div class="card-body">
        <div>
            <h1 class="fs-1 mt-3 card-title">Transaction</h1>
            <nav class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">Transaction</li>
                </ol>
            </nav>
        </div>
        <h3 class="card-title">
            <i class="bi bi-cart"></i> List Transaction
        </h3>
        <table class="table datatable table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Account</th>
                    <th>Reciever</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Payement Url</th>
                    <th>Total Price</th>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>

                @forelse ($transaction as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->user->name }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->phone }}</td>
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
                        @if ($row->payment_url == '')
                        Empty
                        @else
                        <a href="{{$row->payment_url}}">Click Here</a>
                        @endif
                    </td>
                    <td>Rp. {{number_format($row->total_price)}}</td>
                    <td>
                        <button type=" button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatestaus{{$row->id}}">
                            view
                        </button>
                        @include('pages.admin.transaction.modal-edit')
                        <a href="{{route('admin.transaction.showTransactionUserByAdminWithSlugAndId', [$row->id, $row->slug])}}"  class="btn btn-sm mt-1 btn-warning">Detail</a>
                    </td>
                </tr>
                @empty
                @endforelse


            </tbody>
        </table>
    </div>
</div>

@endsection