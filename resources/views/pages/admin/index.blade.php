@extends('layouts.parent')
@section('title', 'Dashboard - Admin')
@section('content')
<div class="card">
    <div class="row m-3">
<h4 class="text-center">Welcome {{Auth::user()->name}}</h4>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
    <!-- <li class="breadcrumb-item"><a href="#"></a></li>
    <li class="breadcrumb-item active"></li> -->
</ol>
    </div>
</div>
@endsection