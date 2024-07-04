@extends('layouts.app')

@section('title', 'Search Tupad Beneficiaries Data-Table')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Search Tupad Beneficiary Table</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Generate Report
            </a>
        </div>

        <div class="row">

            <div class="col-lg-12 mb-2">

                <!-- Illustrations -->
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Guideline
                        </h6>
                    </div>

                    <div class="card-body">

                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('images/bg-1.svg') }}" alt="...">
                        </div>

                        <ul class="list-group">
                            <li class="list-group-item"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Add </li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">
                    Tupad Project Data-Table
                </h6>

            </div>

            <div class="card-body">

                <a href="/dashboard/tupad-beneficiaries-table" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fa fa-hand-o-left fa-sm text-white-50"></i>
                    Redirect Back
                </a>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">

                        <thead>
                            <tr class="text-center">
                                <th>FULL NAME</th>
                                <th>EMPLOYMENT PERIOD</th>
                                <th>PROVINCE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="text-center">
                                <th>FULL NAME</th>
                                <th>EMPLOYMENT PERIOD</th>
                                <th>PROVINCE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($results as $beneficiary)

                                <tr class="text-center">
                                    <td>{{ $beneficiary->first_name }} {{ $beneficiary->middle_initial }} {{ $beneficiary->last_name }} {{ $beneficiary->name_extension }}</td>
                                    <td>{{ \Carbon\Carbon::parse($beneficiary->period_of_employment_start)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($beneficiary->period_of_employment_end)->format('M d, Y') }} </td>
                                    <td>{{ $beneficiary->province }}</td>

                                    <td>
                                        @if($beneficiary->beneficiary_status == "PENDING")
                                            <span class="badge badge-warning">PENDING</span>
                                        @endif

                                        @if($beneficiary->beneficiary_status == "APPROVED")
                                            <span class="badge badge-success">APPROVED</span>
                                        @endif

                                        @if($beneficiary->beneficiary_status == "DENIED")
                                            <span class="badge badge-danger">DENIED</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ '/dashboard/tupad-beneficiary-table-information/'.$beneficiary->id }}" class="btn btn-primary">VIEW</a>
                                        <a href="{{ '/dashboard/tupad-beneficiary-table-information/edit/'.$beneficiary->id }}" class="btn btn-primary">EDIT</a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>

                <div>
                    {{ $results->links() }}
                </div>
            </div>


        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
