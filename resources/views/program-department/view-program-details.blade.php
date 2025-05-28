@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/employee.css') }}">
    <style>
        .employee-name-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%
        }

        .employee-name-details p,
        .employee-name-details h2 {
            margin: 0;
            padding: 0;
        }
    </style>
    @include('components.breadcrumb')
    @include('components.program-department.view-program-details')
@endsection
