@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    <style>
        .scr-registration-form-main {
            display: flex;

        }

        .scr-registration-form {
            width: 70%
        }

        .invoice-view-section {
            width: 30%;
            padding-right: 20px;
            padding-top: 20px
        }

        .invoice-view-section img {
            margin-top: 40px;
        }

        .scr-form-group p {
            margin: 0;
            padding: 0;
            font-size: 11px;
            padding-left: 10px
        }

        @media (max-width: 768px) {
            .scr-registration-form {
                width: 100%;
            }

            .invoice-view-section {
                width: 100%;
                padding-right: 0;
                padding-top: 20px;
                text-align: center;
            }

            .invoice-view-section img {
                max-width: 80%;
                margin-top: 20px;
            }

            .scr-registration-row {
                flex-direction: column;
            }

            .scr-form-group {
                width: 100%;
            }
        }

        /* Mobile (426px and below) */
        @media (max-width: 426px) {
            .scr-registration-form-main {
                flex-direction: column;
            }

            .scr-registration-form,
            .invoice-view-section {
                width: 100%;
                padding: 0;
            }

            .scr-registration-row {
                display: flex;
                flex-direction: column;
            }

            .scr-form-group {
                width: 100%;
            }

            .scr-form-group-btn {
                flex-direction: column;
                align-items: center;
            }

            .scr-form-group-btn button {
                width: 80%;
            }

            .csr-registration-main-heading p {
                font-size: 18px;
                text-align: center;
            }

            textarea {
                width: 100%;
            }
        }
    </style>
    @include('components.breadcrumb')

    <div class="scr-registration-section">
        <div class="container p-0">
            <div class="csr-registration-main-heading">
                <p>Update Invoice Setting</p>
            </div>
            <div class="scr-registration-form-main">
                <form class="scr-registration-form">
                    <div class="scr-registration-row">
                        <div class="scr-form-group">
                            <label>Registration Number</label>
                            <input type="text" placeholder="" required>
                        </div>
                        <div class="scr-form-group">
                            <label>80G Number</label>
                            <input type="text" placeholder="" required>
                        </div>
                    </div>
                    <div class="scr-registration-row">
                        <div class="scr-form-group">
                            <label>Pan Number</label>
                            <input type="text" placeholder="" required>
                        </div>
                        <div class="scr-form-group">
                            <label>Address</label>
                            <input type="text" placeholder="" required>
                        </div>
                    </div>
                    <div class="scr-registration-row">
                        <div class="scr-form-group">
                            <label>Upload logo</label>
                            <input type="file">
                            <p>Logo Size at most 2 MB</p>
                            <p>logo must be png with transparant background</p>
                            <p> logo should be 165 X 55 px</p>
                        </div>
                        <div class="scr-form-group">
                            <label>Upload Authority Signature</label>
                            <input type="file">
                            <p>Logo Size at most 2 MB</p>
                            <p>logo must be png with transparant background</p>
                            <p> logo should be 165 X 55 px</p>
                        </div>
                    </div>



                    <div class="scr-form-group mb-3">
                        <label>Write Donation Description</label>
                        <textarea></textarea>
                    </div>
                    <div class="scr-form-group-btn" style="justify-content: center; gap:5px">
                        <button type="submit" class="btn btn-success" style="padding: 10px 20px"><i
                                class="fa-solid fa-eye"></i> </button>
                        <button type="submit" class="btn btn-primary" style="padding: 10px 20px">Submit </button>
                    </div>
                </form>
                <div class="invoice-view-section">
                    <img src="https://img.freepik.com/free-vector/flat-design-driving-school-invoice_23-2149274282.jpg?ga=GA1.1.559987269.1744107898&semt=ais_hybrid&w=740"
                        alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
