@extends('admin.layout.master')
@section('menuDashboard', 'active')
@section('content')
    @if (Auth()->user()->level_id == '1')
        @include('admin.index')
    @elseif(Auth()->user()->level_id == '2')
        @include('pengurus.index')
    @elseif(Auth()->user()->level_id == '3')
        @include('alumni.index')
    @endif
@endsection
