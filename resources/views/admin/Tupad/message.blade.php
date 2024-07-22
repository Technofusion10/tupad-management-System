@extends('layouts.app')

@section('title', 'System Message')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">System Message</h1>
        </div>

        <div class="row">

            <div class="col-lg-12 mb-2">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">System Message</h6>
                    </div>
                    <div class="card-body">

                        <div class="text-center">
                            <!--<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('images/bg-1.svg') }}" alt="...">-->
                        </div>

                        @if ($message_type == "success")
                            <div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> {{ $message }}
                            </div>
                        @else
                            <div class="alert alert-danger" role="alert">
                                <strong>Error!</strong> {{ $message }}
                            </div>
                        @endif

                        @if($action == "redirect-back-submit-beneficiary")

                            <div class="text-center">
                                <a  href="/dashboard/add-tupad-form" class="btn btn-primary btn-lg">Redirect Back</a>
                            </div>

                        @endif

                        @if($action == "redirect-back-submit-beneficiary-exist")

                            <div class="text-center">
                                <a  href="/dashboard/add-tupad-form" class="btn btn-primary btn-lg">Redirect Back</a>
                            </div>

                        @endif

                        @if($action == "redirect-back-submit-family")

                            <div class="text-center">
                                <a  href="/dashboard/tupad-beneficiaries-table" class="btn btn-primary btn-lg">Redirect Back</a>
                            </div>

                        @endif


                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
