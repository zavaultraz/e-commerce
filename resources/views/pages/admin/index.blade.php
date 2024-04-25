@extends('layouts.parent')
@section('title', 'Dashboard - Admin')
@section('content')
    Welcome {{Auth::user()->name}}
@endsection