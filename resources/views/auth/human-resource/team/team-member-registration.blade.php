@extends('auth.human-resource.layouts.app')
@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/employee.css') }}">
    @include('components.breadcrumb')
    @include('components.team.team-member-registration')

    <script src="{{ asset('asset/js/team-member-registration.js') }}"></script>
@endsection
