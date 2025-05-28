@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/income.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js">
    </script>
    <style>
        .ibox {

            box-shadow: #587c50a5 0px 1px 3px 0px, #587c50a5 0px 0px 0px 1px;
            padding: 10px;
            border-radius: 5px;
        }

        .ibox .ibox-head {
            border-radius: 0;
            border: 1px solid #323F2F;
        }

        .grapgh-content ul {
            display: flex;
            flex-direction: column;
            padding: 0;
            gap: 4px;
        }

        .grapgh-content ul li {
            font-size: 12px;
            display: flex;
            align-items: center;
        }

        .grapgh-content ul li span {
            font-size: 30px;
            margin-right: 6px;
            line-height: 0.5;
            margin-bottom: 7px;
        }
    </style>
    @include('components.breadcrumb')
    @include('components.program-department.view-program')
@endsection
