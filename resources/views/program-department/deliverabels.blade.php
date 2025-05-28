@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/admin-department.css') }}">
    <style>
        .modal-dialog {
            max-width: 700px;
            /* Increased width */
        }
    </style>
    @include('components.breadcrumb')
    @include('components.program-department.deliverabels')
    <!-- Bootstrap 5 JS Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
@endsection