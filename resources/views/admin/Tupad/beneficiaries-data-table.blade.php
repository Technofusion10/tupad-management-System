@extends('layouts.app')

@section('title', 'Tupad Data-Table')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tupad Beneficiaries Table</h1>
            <a href="{{asset('/dashboard/add-tupad-form')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa-regular fa-address-book text-white-50 mr-1"></i>
                Add Beneficiaries
            </a>
            @if (Auth::user()->role_id == 16)
                <a href="{{route('export_AllTupadBeneficiaries')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Generate Beneficiaries Report
            </a>
            @endif
        </div>

        <div class="row">

            <div class="col-lg-12 mb-2">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Guideline</h6>
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
                <h6 class="m-0 font-weight-bold text-primary">Tupad Beneficiaries Data-Table</h6>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.tupad.search.beneficiaries') }}" method="GET">
                    @csrf
                    <div class="form-row">

                        <div class="col-2">
                            <select name="contains" class="form-control">
                                <option value="ID">ID</option>
                                <option value="Status">Status</option>
                                <option value="Contact_Number">Contact Number</option>
                                <option value="First_Name">First Name</option>
                                <option value="Last_Name">Last Name</option>
                                <option value="Email_Address">Email Address</option>
                            </select>
                        </div>

                        <div class="col-7">
                            <input type="text" name="input_text" class="form-control" placeholder="Search Bar... Input your Text Here...">
                        </div>

                        <div class="col-3">
                            <button type="submit" class="form-control btn btn-primary ">
                                Search Tupad Beneficiary <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>

                    </div>
                </form>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">

                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>FULL NAME</th>
                                <th>EMPLOYMENT PERIOD</th>
                                <th>PROVINCE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>FULL NAME</th>
                                <th>EMPLOYMENT PERIOD</th>
                                <th>PROVINCE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($tupadBeneficiaries as $beneficiary)

                                <tr class="text-center">
                                    <td>{{ $beneficiary->id }}</td>
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
                                        <a href="{{ '/dashboard/tupad-beneficiary-table-information/'.$beneficiary->id }}" class="btn btn-primary"><small>VIEW</small></a>
                                        <a href="{{ '/dashboard/tupad-beneficiary-table-information/edit/'.$beneficiary->id }}" class="btn btn-primary"><small>EDIT</small></a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div>
                    {{ $tupadBeneficiaries->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
