@extends('layouts.app')

@section('title', 'Tupad Beneficiary Information')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">TUPAD BENEFICIARY INFO</h1>
            <a href="{{ '/dashboard/tupad-project-table/'.$beneficiary->tupad_id }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50">

                </i>
                View Project Info
            </a>

            <a href="{{ '/print-identification-card-tupad/'.$beneficiary->id }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa fa-id-card fa-sm text-white-50">

                </i>
                Print ID
            </a>
        </div>

        <div class="row">

            <div class="col-lg-12 mb-2">
                <!-- Illustrations -->
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tupad Beneficiary Information</h6>
                    </div>

                    <div class="card-body">

                        <ul class="list-group">

                            <li class="list-group-item font-weight-bold">
                                TUPAD EMPOYEE ID: {{ $beneficiary->id }}
                            </li>

                            <li class="list-group-item font-weight-bold">
                                TUPAD ID: {{ $beneficiary->tupad_id }}
                            </li>

                            <li class="list-group-item font-weight-bold">
                                FULLNAME:
                                {{ $beneficiary->first_name." ".$beneficiary->middle_initial." ".$beneficiary->last_name." ".$beneficiary->name_extension }}
                            </li>

                            <li class="list-group-item font-weight-bold">BIRTH-DATE: {{ \Carbon\Carbon::parse($beneficiary->date_of_birth)->format('M d, Y') }} </li>

                            <li class="list-group-item font-weight-bold">
                                AGE: {{ $beneficiary->age }}
                            </li>

                            <li class="list-group-item font-weight-bold">
                                REGION: {{ $beneficiary->region }}
                            </li>

                            <li class="list-group-item font-weight-bold">
                                PROVINCE: {{ $beneficiary->province }}
                            </li>

                            <li class="list-group-item font-weight-bold">
                                Barangay: {{ $beneficiary->barangay }}
                             </li>
                             <li class="list-group-item font-weight-bold">
                                 Street: {{ $beneficiary->street }}
                              </li>
                              <li class="list-group-item font-weight-bold">
                                  Postal Code: {{ $beneficiary->postal_code }}
                               </li>
                            <li class="list-group-item font-weight-bold">
                                DESIGNATED BENEFICIARY: {{ $beneficiary->designated_beneficiary }}
                            </li>
                            <li class="list-group-item font-weight-bold">
                                RELATIONSHIP TO ASSURED: {{ $beneficiary->relationship_to_assured }}
                            </li>

                            <li class="list-group-item font-weight-bold">
                                PERIOD OF EMPLOYMENT START: {{ \Carbon\Carbon::parse($beneficiary->period_of_employment_start)->format('M d, Y') }}
                            </li>

                            <li class="list-group-item font-weight-bold">
                                PERIOD OF EMPLOYMENT END: {{ \Carbon\Carbon::parse($beneficiary->period_of_employment_end)->format('M d, Y') }}
                            </li>

                            <li class="list-group-item font-weight-bold">
                                TOTAL INSURANCE AMOUNT: {{ $beneficiary->total_insurance_amount }}
                            </li>

                            <li class="list-group-item font-weight-bold">
                                BENEFICIARY TYPE:
                                {{ $beneficiary->beneficiary_type }}
                            </li>

                            <li class="list-group-item font-weight-bold">

                                BENEFICIARY STATUS:
                                @if($beneficiary->beneficiary_status == "PENDING")
                                    <span class="badge badge-warning">PENDING</span>
                                @endif

                                @if($beneficiary->beneficiary_status == "APPROVED")
                                    <span class="badge badge-success">APPROVED</span>
                                @endif

                                @if($beneficiary->beneficiary_status == "DENIED")
                                    <span class="badge badge-danger">DENIED</span>
                                @endif

                            </li>

                            <li class="list-group-item font-weight-bold">
                                STATUS:
                                {{ $beneficiary->status }}
                            </li>

                            <li class="list-group-item font-weight-bold">
                                REMARKS:
                                {{ $beneficiary->remarks }}
                            </li>

                            <li class="list-group-item font-weight-bold">

                                <a href="{{ '/image/'.$beneficiary->file_path }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fa fa-id-card fa-sm text-white-50">

                                    </i>
                                    VIEW ID
                                </a>

                            </li>

                        </ul>

                        @if(Auth::user()->role_id == 16 )

                        <ul class="list-group mt-2">

                            <li class="list-group-item font-weight-bold">
                                <a data-toggle="modal" data-target="#approvedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm">
                                    <i class="fa fa-thumbs-o-up fa-lg text-white-50">

                                    </i>
                                    Approve Beneficiary
                                </a>
                            </li>

                            <li class="list-group-item font-weight-bold">
                                <a data-toggle="modal" data-target="#deniedTupadProject" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                                    <i class="fa fa-thumbs-o-down fa-lg text-white-50">

                                    </i>
                                    Deny Beneficiary
                                </a>
                            </li>

                        </ul>

                        @endif

                    </div>
                </div>

            </div>

        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">GROUP ID: {{ $beneficiary->group_id }} -- BENEFICIARIES</h6>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            @foreach ($tupadBeneficiaries as $beneficiaries)
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
                    {{ $tupadBeneficiaries->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

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

                    <form action="{{route('admin.tupad.evaluate.tupad.beneficiary') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Row 1 -->
                        <input type="text" name="beneficiary_id" value="{{ $beneficiary->id }}" hidden readonly> <!--ugma-->
                        <label for="">Remarks</label>

                        <textarea
                            name="remarks"
                            class="form-control"
                            rows="6" cols="50"
                        >{{ $beneficiary->remarks }}</textarea>

                        @error('project_reference')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror



                        @if (Auth::user()->role_id == 16)

                            <button type="button" class="btn block btn-secondary mt-2" data-dismiss="modal">
                                Close
                            </button>

                            <button name="submit" value="TSSD_REVIEW" type="submit" class="btn block btn-primary mt-2">
                                Confirm 'Approved Tupad Beneficiary'
                            </button>

                        @endif

                    </form>
                    <!-- End -->

                </div>
            </div>
        </div>
    </div>


    <!-- Modal -- Denied -->
    <div class="modal fade" id="deniedTupadProject" tabindex="-1" role="dialog" aria-labelledby="deniedTupadProjectLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="deniedTupadProject">
                        Denied TUPAD Project
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{route('admin.tupad.evaluate.tupad.beneficiary') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Row 1 -->
                        <input type="text" name="beneficiary_id" value="{{ $beneficiary->id }}" hidden readonly>
                        <label for="">Remarks</label>

                        <textarea
                            name="remarks"
                            class="form-control"
                            rows="6" cols="50"
                        >{{ $beneficiary->remarks }}</textarea>

                        @error('project_reference')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror

                        <button type="button" class="btn block btn-secondary mt-2" data-dismiss="modal">
                            Close
                        </button>

                        <button name="submit" value="DENIED" type="submit" class="btn block btn-primary mt-2">
                            Confirmation 'Denied Tupad Beneficiary'
                        </button>

                    </form>
                    <!-- End -->

                </div>
            </div>
        </div>
    </div>

@endsection
