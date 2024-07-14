@extends('layouts.app')

@section('title', 'Tupad Table')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">TUPAD BENEFICIARY INFO</h1>
            <a href="{{ '/export_tupad_information/'.$tupadProject->id  }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50">

                </i>
                Generate Report Project
            </a>
            {{-- <a href="{{asset('/dashboard/add-tupad-form')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa-regular fa-address-book text-white-50 mr-1"></i>
                Add Beneficiary
            </a> --}}
            <a data-toggle="modal" data-target="#importTupadBeneficiaries" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa fa-id-card fa-sm text-white-50"></i>
                Import Beneficiaries
            </a>

            <!-- ADD BENEFICIARY BUTTON -->
            <a data-toggle="modal" data-target="#addBeneficiary" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa-regular fa-address-book text-white-50 mr-1"></i>
                Add Beneficiary
            </a>
        </div>

        <div class="row">

            <div class="col-lg-12 mb-2">
                <!-- Illustrations -->
                <div class="card shadow mb-4">

                    <div class="card-header py-3">

                        <h6 class="m-0 font-weight-bold text-primary">
                            PROJECT INFORMATION
                        </h6>

                    </div>

                    <div class="card-body">

                        <ul class="list-group">
                            <li class="list-group-item font-weight-bold">TUPAD ID: {{ $tupadProject->id }} </li>
                            <li class="list-group-item font-weight-bold">REFERENCE NUMBER: {{ $tupadProject->project_reference }} </li>
                            <li class="list-group-item font-weight-bold">PROGRAM: {{ $tupadProject->name_of_program }} </li>
                            <li class="list-group-item font-weight-bold">OFFICE NAME: {{ $tupadProject->name_of_office }} </li>
                            <li class="list-group-item font-weight-bold">OFFICE ADDRESS: {{ $tupadProject->office_address }} </li>
                            <li class="list-group-item font-weight-bold">CONTACT NUMBER#: {{ $tupadProject->contact_number }} </li>

                            <li class="list-group-item font-weight-bold">EMAIL: {{ $tupadProject->email_address }} </li>

                            <li class="list-group-item font-weight-bold">REGION: {{ $tupadProject->region }} </li>
                            <li class="list-group-item font-weight-bold">PROVINCE: {{ $tupadProject->province }} </li>

                            <li class="list-group-item font-weight-bold">TOTAL BUDGET: {{ number_format($tupadProject->total_budget, 2) }} </li>

                            <li class="list-group-item font-weight-bold">REVIEWED BY IMSD: {{ $tupadProject->reviewed_by_IMSD }} </li>
                            <li class="list-group-item font-weight-bold">REVIEWED BY TSSD: {{ $tupadProject->reviewed_by_TSSD }} </li>
                            <li class="list-group-item font-weight-bold">REVIEWED BY ORD: {{ $tupadProject->reviewed_by_ORD }} </li>
                            <li class="list-group-item font-weight-bold">REVIEWED BY COA: {{ $tupadProject->reviewed_by_COA }} </li>
                            <li class="list-group-item font-weight-bold">REVIEWED BY CASHIER: {{ $tupadProject->reviewed_by_CASHIER }} </li>
                            <li class="list-group-item font-weight-bold">REVIEWED BY ACCOUNTING: {{ $tupadProject->reviewed_by_ACCOUNTING }} </li>
                            <li class="list-group-item font-weight-bold">REVIEWED BY BUDGET: {{ $tupadProject->reviewed_by_BUDGET }} </li>
                            <li class="list-group-item font-weight-bold">REVIEWED BY ARD: {{ $tupadProject->reviewed_by_ARD }} </li>
                            <li class="list-group-item font-weight-bold">REVIEWED BY RD: {{ $tupadProject->reviewed_by_RD }} </li>
                            <li class="list-group-item font-weight-bold">REVIEWED BY PD: {{ $tupadProject->reviewed_by_PD }} </li>
                            <li class="list-group-item font-weight-bold">DENIED DATE: {{ $tupadProject->denied_date }} </li>
                            <li class="list-group-item font-weight-bold">
                                STATUS:
                                @if($tupadProject->status == "PENDING")
                                    <span class="badge badge-warning">PENDING</span>
                                @endif

                                @if($tupadProject->status == "APPROVED")
                                    <span class="badge badge-success">APPROVED</span>
                                @endif

                                @if($tupadProject->status == "DENIED")
                                    <span class="badge badge-danger">DENIED</span>
                                @endif
                            </li>

                            <li class="list-group-item font-weight-bold">REMARKS: <pre class="text-lg font-weight-bold">{{ $tupadProject->remarks }} </pre></li>


                            <li class="list-group-item font-weight-bold">

                                <a target="_blank" href="https://docs.google.com/spreadsheets/d/1vKTdf5q50YAl7ZF-LI6zJw1hAGTjyt_M8gqlBxl-4-w/edit?usp=sharing" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fa fa-id-card fa-sm text-white-50">

                                    </i>
                                    Import Beneficiary Example:
                                </a>
                            </li>

                        </ul>


                        <!-- Evaluation TSSD -->
                        @if (Auth::user()->role_id == 16 AND $tupadProject->reviewed_by_TSSD == NULL)
                            <ul class="list-group mt-2">

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#approvedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm">
                                        <i class="fa fa-thumbs-o-up fa-lg text-white-50">

                                        </i>
                                        Approve Tupad Project
                                    </a>
                                </li>

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#deniedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                                        <i class="fa fa-thumbs-o-down fa-lg text-white-50">

                                        </i>
                                        Deny Tupad Project
                                    </a>
                                </li>

                            </ul>
                        @endif
                        <!-- -->

                        <!-- Evaluation IMSD -->
                        @if (Auth::user()->role_id == 3 AND $tupadProject->reviewed_by_IMSD == NULL AND !empty($tupadProject->reviewed_by_TSSD))
                            <ul class="list-group mt-2">

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#approvedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm">
                                        <i class="fa fa-thumbs-o-up fa-lg text-white-50">

                                        </i>
                                        Approved Tupad Project
                                    </a>
                                </li>

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#deniedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                                        <i class="fa fa-thumbs-o-down fa-lg text-white-50">

                                        </i>
                                        Denied Tupad Project
                                    </a>
                                </li>

                            </ul>

                        @endif
                        <!-- -->

                        <!-- Evaluation BUDGET UNIT -->
                        @if (Auth::user()->role_id == 17 AND $tupadProject->reviewed_by_BUDGET == NULL AND !empty($tupadProject->reviewed_by_IMSD))
                            <ul class="list-group mt-2">

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#approvedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm">
                                        <i class="fa fa-thumbs-o-up fa-lg text-white-50">

                                        </i>
                                        Approved Tupad Project
                                    </a>
                                </li>

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#deniedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                                        <i class="fa fa-thumbs-o-down fa-lg text-white-50">

                                        </i>
                                        Denied Tupad Project
                                    </a>
                                </li>

                            </ul>

                        @endif
                        <!-- -->

                        <!-- Evaluation ACCOUNTING -->
                        @if (Auth::user()->role_id == 7 AND $tupadProject->reviewed_by_ACCOUNTING == NULL AND !empty($tupadProject->reviewed_by_BUDGET))
                            <ul class="list-group mt-2">

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#approvedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm">
                                        <i class="fa fa-thumbs-o-up fa-lg text-white-50">

                                        </i>
                                        Approved Tupad Project
                                    </a>
                                </li>

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#deniedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                                        <i class="fa fa-thumbs-o-down fa-lg text-white-50">

                                        </i>
                                        Denied Tupad Project
                                    </a>
                                </li>

                            </ul>

                        @endif
                        <!-- -->

                        <!-- Evaluation COA -->
                        @if (Auth::user()->role_id == 5 AND $tupadProject->reviewed_by_COA == NULL AND !empty($tupadProject->reviewed_by_ACCOUNTING))
                            <ul class="list-group mt-2">

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#approvedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm">
                                        <i class="fa fa-thumbs-o-up fa-lg text-white-50">

                                        </i>
                                        Approved Tupad Project
                                    </a>
                                </li>

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#deniedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                                        <i class="fa fa-thumbs-o-down fa-lg text-white-50">

                                        </i>
                                        Denied Tupad Project
                                    </a>
                                </li>

                            </ul>

                        @endif
                        <!-- -->

                        <!-- Evaluation ARD -->
                        @if (Auth::user()->role_id == 8 AND $tupadProject->reviewed_by_ARD == NULL AND !empty($tupadProject->reviewed_by_COA))
                            <ul class="list-group mt-2">

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#approvedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm">
                                        <i class="fa fa-thumbs-o-up fa-lg text-white-50">

                                        </i>
                                        Approved Tupad Project
                                    </a>
                                </li>

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#deniedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                                        <i class="fa fa-thumbs-o-down fa-lg text-white-50">

                                        </i>
                                        Denied Tupad Project
                                    </a>
                                </li>

                            </ul>

                        @endif
                        <!-- -->

                        <!-- Evaluation RD -->
                        @if (Auth::user()->role_id == 9 AND $tupadProject->reviewed_by_RD == NULL AND !empty($tupadProject->reviewed_by_ARD))
                            <ul class="list-group mt-2">

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#approvedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm">
                                        <i class="fa fa-thumbs-o-up fa-lg text-white-50">

                                        </i>
                                        Approved Tupad Project
                                    </a>
                                </li>

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#deniedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                                        <i class="fa fa-thumbs-o-down fa-lg text-white-50">

                                        </i>
                                        Denied Tupad Project
                                    </a>
                                </li>

                            </ul>

                        @endif
                        <!-- -->

                        <!-- Evaluation CASHIER -->
                        @if (Auth::user()->role_id == 6 AND $tupadProject->reviewed_by_CASHIER == NULL AND !empty($tupadProject->reviewed_by_RD))
                            <ul class="list-group mt-2">

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#approvedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm">
                                        <i class="fa fa-thumbs-o-up fa-lg text-white-50">

                                        </i>
                                        Approved Tupad Project
                                    </a>
                                </li>

                                <li class="list-group-item font-weight-bold">
                                    <a data-toggle="modal" data-target="#deniedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                                        <i class="fa fa-thumbs-o-down fa-lg text-white-50">

                                        </i>
                                        Denied Tupad Project
                                    </a>
                                </li>

                            </ul>

                        @endif
                        <!-- -->

                        <!-- Reset Tupad Project -->
                        @if (Auth::user()->role_id == 3 AND !empty($tupadProject->denied_date))

                            <li class="list-group-item font-weight-bold">
                                <a data-toggle="modal" data-target="#resetTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                                    <i class="fa fa-repeat fa-lg text-white-50">

                                    </i>
                                    Reset Tupad Project
                                </a>
                            </li>

                        @endif
                        <!-- -->

                    </div>
                </div>

            </div>

        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">PROJECT BENEFICIARIES: {{ $tupadProject->project_reference }}</h6>
                <a href="{{ '/export_tupad_beneficiaries/'.$tupadProject->id }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50">

                    </i>
                    Generate Report Beneficiaries
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>TUPAD ID</th>
                                <th>TOTAL INSURANCE</th>
                                <th>CONTACT #</th>
                                <th>FULL NAME</th>
                                <th>PROVINCE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>TUPAD ID</th>
                                <th>TOTAL INSURANCE</th>
                                <th>CONTACT #</th>
                                <th>FULL NAME</th>
                                <th>PROVINCE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($tupadProjectBeneficiaries as $beneficiaries)
                                <tr class="text-center">
                                    <td>{{ $beneficiaries->tupad_id }}</td>
                                    <td>{{ number_format($beneficiaries->total_insurance_amount, 2) }}</td>
                                    <td>{{ $beneficiaries->contact_number }}</td>
                                    <td>{{ $beneficiaries->first_name." ".$beneficiaries->middle_initial." ".$beneficiaries->last_name." ".$beneficiaries->name_extension }}</td>
                                    <td>{{ $beneficiaries->province }}</td>
                                    <td>
                                        @if($beneficiaries->beneficiary_status == "PENDING")
                                            <span class="badge badge-warning">PENDING</span>
                                        @endif

                                        @if($beneficiaries->beneficiary_status == "APPROVED")
                                            <span class="badge badge-success">APPROVED</span>
                                        @endif

                                        @if($beneficiaries->beneficiary_status == "DENIED")
                                            <span class="badge badge-danger">DENIED</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ '/dashboard/tupad-beneficiary-table-information/'.$beneficiaries->id }}" class="btn btn-primary">VIEW</a>
                                        <a href="{{ '/dashboard/tupad-beneficiary-table-information/edit/'.$beneficiaries->id }}" class="btn btn-primary">EDIT</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $tupadProjectBeneficiaries->links() }}
                </div>
            </div>
        </div>
        <!-- -->


        <!-- DataTales Duplicated Beneficiaries Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DUPLICATE BENEFICIARIES BENEFICIARIES: {{ $tupadProject->project_reference }}</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>FULL NAME</th>
                                <th>COUNT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>FULL NAME</th>
                                <th>COUNT</th>
                                <th>ACTION</th>
                            </tr>
                        </tfoot>
                        <tbody>


                            @foreach ($duplicates as $duplicate)
                                <tr class="text-center">
                                    <td>{{ $duplicate['id'] }}</td>
                                    <td>{{ $duplicate['name'] }}</td>
                                    <td>{{ $duplicate['count'] }}</td>
                                    <td>
                                        <a href="{{ '/dashboard/tupad-beneficiary-table-information/'.$duplicate['id'] }}" class="btn btn-primary">VIEW</a>
                                        <a href="{{ '/dashboard/tupad-beneficiary-table-information/edit/'.$duplicate['id'] }}" class="btn btn-primary">EDIT</a>
                                    </td>
                                </tr>
                            @endforeach

                            <tr class="text-center">
                                <td>-</td>
                                <td>-</td>
                                <td>
                                    -
                                </td>
                            </tr>


                            @foreach ($duplicatesData as $duplicate)
                                <tr class="text-center">
                                    <td>{{ $duplicate['id'] }}</td>
                                    <td>{{ $duplicate['name'] }}</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ '/dashboard/tupad-beneficiary-table-information/'.$duplicate['id'] }}" class="btn btn-primary">VIEW</a>
                                        <a href="{{ '/dashboard/tupad-beneficiary-table-information/edit/'.$duplicate['id'] }}" class="btn btn-primary">EDIT</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Modal -- Import Beneficiaries -->
    <div class="modal fade" id="importTupadBeneficiaries" tabindex="-1" role="dialog" aria-labelledby="importTupadBeneficiariesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="importTupadBeneficiariesLabel">
                        Import TUPAD Beneficiaries
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <!-- Row 7 -->
                    <div class="custom-file">
                        <form action="{{ route('import_TupadBeneficiaries') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="project_id" value="{{ $tupadProject->id }}" hidden readonly>
                            <input type="file" name="file">
                            <!--  accept="xlsx" class="custom-file-input"
                                id="customFile"-->
                            <!--<label class="custom-file-label" for="customFile">
                                Choose file
                            </label>-->

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Close
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    Save changes
                                </button>

                            </div>

                        </form>

                    </div>
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->


    <!-- Modal -- Approved -->
    <div class="modal fade" id="approvedTupadProject" tabindex="-1" role="dialog" aria-labelledby="approvedTupadProjectLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="approvedTupadProject">
                        Approved TUPAD Project
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{route('admin.tupad.evaluate.tupad.project') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Row 1 -->
                        <input type="text" name="project_id" value="{{ $tupadProject->id }}" hidden readonly> <!--ugma-->
                        <label for="">Remarks</label>

                        <textarea
                            name="remarks"
                            class="form-control"
                            rows="6" cols="50"
                        >{{ $tupadProject->remarks }}</textarea>

                        @error('project_reference')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror



                        @if (Auth::user()->role_id == 16)

                            <button type="button" class="btn block btn-secondary mt-2" data-dismiss="modal">
                                Close
                            </button>

                            <button name="submit" value="TSSD_REVIEW" type="submit" class="btn block btn-primary mt-2">
                                Confirm 'Approved Tupad Project'
                            </button>

                        @endif

                        @if (Auth::user()->role_id == 3)

                            <button type="button" class="btn block btn-secondary mt-2" data-dismiss="modal">
                                Close
                            </button>

                            <button name="submit" value="IMSD_REVIEW" type="submit" class="btn block btn-primary mt-2">
                                Confirm 'Approved Tupad Project'
                            </button>

                        @endif

                        @if (Auth::user()->role_id == 17)

                            <button type="button" class="btn block btn-secondary mt-2" data-dismiss="modal">
                                Close
                            </button>

                            <button name="submit" value="BUDGET_REVIEW" type="submit" class="btn block btn-primary mt-2">
                                Confirm 'Approved Tupad Project'
                            </button>

                        @endif

                        @if (Auth::user()->role_id == 7)

                            <button type="button" class="btn block btn-secondary mt-2" data-dismiss="modal">
                                Close
                            </button>

                            <button name="submit" value="ACCOUNTING_REVIEW" type="submit" class="btn block btn-primary mt-2">
                                Confirm 'Approved Tupad Project'
                            </button>

                        @endif

                        @if (Auth::user()->role_id == 5)

                            <button type="button" class="btn block btn-secondary mt-2" data-dismiss="modal">
                                Close
                            </button>

                            <button name="submit" value="COA_REVIEW" type="submit" class="btn block btn-primary mt-2">
                                Confirm 'Approved Tupad Project'
                            </button>

                        @endif

                        @if (Auth::user()->role_id == 8)

                            <button type="button" class="btn block btn-secondary mt-2" data-dismiss="modal">
                                Close
                            </button>

                            <button name="submit" value="ARD_REVIEW" type="submit" class="btn block btn-primary mt-2">
                                Confirm 'Approved Tupad Project'
                            </button>

                        @endif

                        @if (Auth::user()->role_id == 9)

                            <button type="button" class="btn block btn-secondary mt-2" data-dismiss="modal">
                                Close
                            </button>

                            <button name="submit" value="RD_REVIEW" type="submit" class="btn block btn-primary mt-2">
                                Confirm 'Approved Tupad Project'
                            </button>

                        @endif

                        @if (Auth::user()->role_id == 6)

                            <button type="button" class="btn block btn-secondary mt-2" data-dismiss="modal">
                                Close
                            </button>

                            <button name="submit" value="CASHIER_REVIEW" type="submit" class="btn block btn-primary mt-2">
                                Confirm 'Approved Tupad Project'
                            </button>

                        @endif




                    </form>
                    <!-- End -->

                </div>
            </div>
        </div>
    </div>





    <!-- Modal -- Add Beneficiary -->
    <div class="modal fade" id="addBeneficiary" tabindex="-1" role="dialog" aria-labelledby="addBeneficiaryLabel" aria-hidden="true">
        <div
        class="modal-dialog"
        style="
            border: 5px solid #74f76d;
            border-radius: 8px;
            "
        role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="m-0 font-weight-bold text-primary">TUPAD Program - Add Beneficiaries</h6>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <div class="modal-body">
                    <form action="{{ route('admin.tupad.add.beneficiary') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Row 1 -->
                        <div class="row mb-3">

                            <div class="col-lg-12 mb-1">

                                <label for="">Project Reference Number</label>
                                <input name="project_reference" type="text" value="{{ $tupadProject->project_reference }}" class="form-control font-weight-bold" id="" placeholder="{{ $tupadProject->project_reference }}" readonly>


                                @error('project_reference')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 2 -->
                        <div class="row mb-3">

                            <div class="col-lg-6 mb-1">

                                <label for="">Contact Number</label>
                                <input name="contact_number" type="text" value="{{ old('contact_number') }}" class="form-control" id="" placeholder="Enter Contact Number">

                                @error('contact_number')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-lg-6 mb-1">

                                <label for="">Email Address</label>
                                <input name="email_address" type="text" value="{{ old('email_address') }}" class="form-control" id="" placeholder="Enter Email Address">

                                @error('email_address')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 3 -->
                        <div class="row mb-3">

                            <div class="col-lg-6 mb-1">

                                <label for="">First Name</label>
                                <input name="first_name" type="text" value="{{ old('first_name') }}" class="form-control" id="" placeholder="Enter First Name">

                                @error('first_name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-lg-6 mb-1">

                                <label for="">Middle Name</label>
                                <input name="middle_initial" type="text" value="{{ old('middle_initial') }}" class="form-control" id="" placeholder="Enter Middle Name">

                                @error('middle_initial')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 4 -->
                        <div class="row mb-3">

                            <div class="col-lg-6 mb-1">

                                <label for="">Last Name</label>
                                <input name="last_name" type="text" value="{{ old('last_name') }}" class="form-control" id="" placeholder="Enter Last Name">

                                @error('last_name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-lg-6 mb-1">

                                <label for="">Name Extension</label>
                                <input name="name_extension" type="text" value="{{ old('name_extension') }}" class="form-control" id="" placeholder="Extension (Jr., Sr., etc.)">

                                @error('name_extension')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 4 -->
                        <div class="row mb-3">

                            <div class="col-lg-6 mb-1">
                                <label for="">Date of Birth</label>
                                <input name="date_of_birth" type="date" value="{{ old('date_of_birth') }}" class="form-control" id="" placeholder="Enter Date of Birth">

                                @error('date_of_birth')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-1">
                                <label for="">Age</label>
                                <input name="age" type="text" value="{{ old('age') }}" class="form-control" id="" placeholder="Enter Your Age">

                                @error('age')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 5 -->
                        <div class="row mb-3">

                            <div class="col-lg-12 mb-1">

                                <label for="">Region</label>
                                <input name="region" type="text" value="REGION 10 ONLY" class="form-control" readonly>

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 6 -->
                        <div class="row mb-3">

                            <div class="col-lg-12 mb-1">

                                <label for="">Province</label>
                                <select name="province" class="form-control" id="">
                                    <option value="" selected>Select Province</option>
                                    <option value="Cagayan de Oro City">Cagayan de Oro City</option>
                                    <option value="Misamis Oriental">Misamis Oriental</option>
                                    <option value="Misamis Occidental">Misamis Occidental</option>
                                    <option value="Lanao Del Norte">Lanao Del Norte</option>
                                    <option value="Bukidnon">Bukidnon</option>
                                    <option value="Camiguin">Camiguin</option>
                                </select>

                                @error('province')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                            {{-- <div class="col-lg-6 mb-1">

                                <label for="">Complete Address</label>
                                <input name="complete_address" type="text" value="{{ old('complete_address') }}" class="form-control" id="" placeholder="Enter Complete Address">

                                @error('complete_address')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div> --}}

                        </div>
                        <!-- End -->

                        <!-- Row 6 -->
                        <div class="row mb-3">

                            <div class="col-lg-4 mb-1">

                                <label for="">Barangay</label>
                                <input name="barangay" type="text" value="{{ old('barangay') }}" class="form-control" id="" placeholder="Enter barangay ">


                                @error('barangay')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-lg-4 mb-1">

                                <label for="">Street No.</label>
                                <input name="street" type="text" value="{{ old('street') }}" class="form-control" id="" placeholder="Enter Street">

                                @error('street')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-lg-4 mb-1">

                                <label for="">Postal Code.</label>
                                <input name="postal_code" type="text" value="{{ old('postal_code') }}" class="form-control" id="" placeholder="Enter Street">

                                @error('postal_code')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 7 -->
                        <div class="row mb-3">

                            <div class="col-lg-6 mb-1">

                                <label for="">Designated Beneficiary</label>
                                <input name="designated_beneficiary" type="text" value="{{ old('designated_beneficiary') }}" class="form-control" id="" placeholder="Enter Designated Beneficiary">

                                @error('designated_beneficiary')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-lg-6 mb-1">

                                <label for="">Relationship To Assured</label>
                                <input name="relationship_to_assured" type="text" value="{{ old('relationship_to_assured') }}" class="form-control" id="" placeholder="Enter Relationship To Assured">

                                @error('relationship_to_assured')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 8 -->
                        <div class="row mb-3">

                            <div class="col-lg-6 mb-1">

                                <label for="">Period of Employment Start Date</label>
                                <input name="period_of_employment_start" type="date" value="{{ old('period_of_employment_start') }}" class="form-control" id="" placeholder="Enter Period of Employment">

                                @error('period_of_employment_start')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-lg-6 mb-1">

                                <label for="">Period of Employment End Date</label>
                                <input name="period_of_employment_end" type="date" value="{{ old('period_of_employment_end') }}" class="form-control" id="" placeholder="Enter Period of Employment">

                                @error('period_of_employment_end')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 9 -->
                        <div class="row mb-3">

                            <div class="col-lg-12 mb-1">

                                <label for="">Beneficiary Type</label>
                                <input name="beneficiary_type" type="text" value="{{ old('beneficiary_type') }}" class="form-control" id="" placeholder="Enter Beneficiary Type">

                                @error('beneficiary_type')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 10 -->
                        <div class="row mb-3">

                            <div class="col-lg-12 mb-1">

                                <label for="">Insurance Total Amount</label>
                                <input name="total_insurance_amount" type="text" value="{{ old('total_insurance_amount') }}" class="form-control" id="" placeholder="Enter Amount">

                                @error('total_insurance_amount')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 11 -->
                        <div class="row mb-3">

                            <div class="col-lg-12 mb-1">

                                <label for="">Status</label>
                                <textarea name="status" class="form-control" id="" placeholder="Enter Status" rows="5">{{ old('status') }}</textarea>

                                @error('status')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 12 -->
                        <div class="row mb-3">

                            <div class="col-lg-12 mb-1">

                                <label for="">Remarks</label>
                                <textarea name="remarks" class="form-control" id="" placeholder="Enter Remarks" rows="5">{{ old('remarks') }}</textarea>

                                @error('remarks')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 13 -->
                        <div class="row mb-3">

                            <label for="">Upload Valid ID</label>

                            <div class="col-lg-12 mb-1 text-center">
                                <input type="file" name="picture" accept="jpeg" class="form-control">
                            </div>

                            @error('picture')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                        </div>
                        <!-- End -->

                        <!-- Row 14 -->
                        <div class="row mb-3">

                            <div class="col-lg-12 mb-1">
                                <label for="">Interviewed by</label>
                                    <input name="interviewed_by" type="text" value="{{ old('interviewed_by') }}" class="form-control" id="" placeholder="Enter Interviewed by">

                                @error('interviewed_by')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Row 15 -->
                        <div class="row mb-3">

                            <div class="col-lg-12 mb-1 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Add Beneficiary</button>
                            </div>

                        </div>
                        <!-- End -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--end of modal body-->



    <!-- Modal -- Reset -->
    <div class="modal fade" id="resetTupadProject" tabindex="-1" role="dialog" aria-labelledby="resetTupadProjectLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="resetTupadProject">
                        Reset TUPAD Project
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{route('admin.tupad.evaluate.tupad.project') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Row 1 -->
                        <input type="text" name="project_id" value="{{ $tupadProject->id }}" hidden readonly>
                        <label for="">Remarks</label>

                        <textarea
                            name="remarks"
                            class="form-control"
                            rows="6" cols="50"
                        >{{ $tupadProject->remarks }}</textarea>

                        @error('project_reference')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror

                        <button type="button" class="btn block btn-secondary mt-2" data-dismiss="modal">
                            Close
                        </button>

                        <button name="submit" value="RESET" type="submit" class="btn block btn-primary mt-2">
                            Confirmation 'Reset Tupad Project'
                        </button>

                    </form>
                    <!-- End -->

                </div>
            </div>
        </div>
    </div>

     <!-- Modal -- Reset -->
     <div class="modal fade" id="resetTupadProject" tabindex="-1" role="dialog" aria-labelledby="resetTupadProjectLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="resetTupadProject">
                        Reset TUPAD Project
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{route('admin.tupad.evaluate.tupad.project') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Row 1 -->
                        <input type="text" name="project_id" value="{{ $tupadProject->id }}" hidden readonly>
                        <label for="">Remarks</label>

                        <textarea
                            name="remarks"
                            class="form-control"
                            rows="6" cols="50"
                        >{{ $tupadProject->remarks }}</textarea>

                        @error('project_reference')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror

                        <button type="button" class="btn block btn-secondary mt-2" data-dismiss="modal">
                            Close
                        </button>

                        <button name="submit" value="RESET" type="submit" class="btn block btn-primary mt-2">
                            Confirmation 'Reset Tupad Project'
                        </button>

                    </form>
                    <!-- End -->

                </div>
            </div>
        </div>
    </div>

@endsection


<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> -->

  <!-- Modal -->
  <!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> -->
