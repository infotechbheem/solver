@extends('auth.human-resource.layouts.app')
@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/attendance.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/income.css') }}">
    @include('components.breadcrumb')
    @include('components.team.view-attendance')
@endsection
