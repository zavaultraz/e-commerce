@extends('layouts.parent')

@section('title', 'Admin - ProductGallery')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title fs-2">Product Gallery >> {{$product->name}}</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Product</a></li>
                <li class="breadcrumb-item active">Product Gallery</li>
            </ol>
        </nav>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            <i class="bi bi-plus"></i> Add Images
        </button>
        @include('pages.admin.Product.gallery.modal-create')
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($product->product_galleries as $row )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{$row->image}}" alt="{{$row->name}}"></td>
                    <td><button class="btn btn-danger">✖️</button></td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="3">
                        Data Not Found
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection