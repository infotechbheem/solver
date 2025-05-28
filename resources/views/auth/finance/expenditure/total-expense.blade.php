@extends('auth.finance.layouts.app')
@section('main_container')
     <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/income.css') }}">
    @include('components.breadcrumb')
    @include('components.expenditure.total-expense')
@endsection
