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
                                TUPAD BENEFICIARY ID: {{ $beneficiary->id }}
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
                                INTERVIEWED BY:
                                {{ $beneficiary->interviewed_by }}
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

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Family Member</h6>
                            <a data-toggle="modal" data-target="#addFamilyMember" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fa-solid fa-user-plus"></i>
                                ADD
                            </a>
                            {{-- {{ '/dashboard/tupad-beneficiary-table-information/'.$familyMember->employee_id }} --}}
                            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="" data-toggle="collapse" data-target="#familyMem"
                                aria-expanded="true" aria-controls="tupad">
                                <i class="fa fa-users"></i>
                                <span>View</span>
                            </a>
                        </div>


                        <div id="familyMem" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <!-- Row 5 -->
                                <div class="row mb-3">
                                    <div class="col-lg-12 mb-1">
                                        <table class="table table-hover text-center">
                                            <thead class="border bg-gray-500 text-dark">
                                                <tr>
                                                    <th class="border border-dark">ID</th>
                                                    <th class="border border-dark">First Name</th>
                                                    <th class="border border-dark">Middle Name</th>
                                                    <th class="border border-dark">Last Name</th>
                                                    <th class="border border-dark">Gender</th>
                                                    <th class="border border-dark">Age</th>
                                                    {{-- <th class="border border-dark">Date of Birth</th> --}}
                                                    {{-- <th class="border border-dark">Mobile No</th> --}}
                                                    <th class="border border-dark">Civil Status</th>
                                                    {{-- <th class="border border-dark">Address</th> --}}
                                                    <th class="border border-dark">Relationship</th>
                                                    <th class="border border-dark">Action</th>
                                                 </tr>
                                            </thead>
                                            <tfoot class="border bg-gray-500 text-dark">
                                                <tr>
                                                    <th class="border border-dark">ID</th>
                                                    <th class="border border-dark">First Name</th>
                                                    <th class="border border-dark">Middle Name</th>
                                                    <th class="border border-dark">Last Name</th>
                                                    <th class="border border-dark">Gender</th>
                                                    <th class="border border-dark">Age</th>
                                                    {{-- <th class="border border-dark">Date of Birth</th> --}}
                                                    {{-- <th class="border border-dark">Mobile No</th> --}}
                                                    <th class="border border-dark">Civil Status</th>
                                                    {{-- <th class="border border-dark">Address</th> --}}
                                                    <th class="border border-dark">Relationship</th>
                                                    <th class="border border-dark">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody class="border bg-gray-200">
                                                {{-- @if ($beneficiary->id == 1 && $familyMember->id == 1) --}}
                                                    @foreach ($beneficiaryFamily as $familyMember)
                                                        <tr>
                                                            <td class="border border-dark">
                                                            {{$familyMember->employee_id}}</td>
                                                            <td class="border border-dark">{{$familyMember->Family_Fname}}</td>
                                                            <td class="border border-dark">{{$familyMember->Family_Mname}}</td>
                                                            <td class="border border-dark">{{$familyMember->Family_Lname}}</td>
                                                            <td class="border border-dark">{{$familyMember->Family_gender}}</td>
                                                            <td class="border border-dark">{{$familyMember->Family_age}}</td>
                                                            {{-- <td class="border border-dark">{{$familyMember->Family_birth}}</td> --}}
                                                            {{-- <td class="border border-dark">{{$familyMember->Family_mobile}}</td> --}}
                                                            <td class="border border-dark">{{$familyMember->Family_Cstatus}}</td>
                                                            {{-- <td class="border border-dark">{{$familyMember->Family_address}}</td> --}}
                                                            <td class="border border-dark">{{$familyMember->Family_Relationship}}</td>
                                                            <td class="border border-dark">
                                                                <a href="#" class="btn btn-secondary">view</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                {{-- @endif --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End -->
                            </div>
                        </div>




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


    <!-- Modal -- Add Family -->
    <div class="modal fade" id="addFamilyMember" tabindex="-1" role="dialog" aria-labelledby="addFamilyMemberLabel" aria-hidden="true">
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
                    <form action="{{ route('admin.tupad.add.family.member') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Row 1 -->
                        <div class="row mb-3">

                            <div class="col-lg-12 mb-1" hidden>

                                <label for="">BENEFICIARY FULLNAME</label>
                                <input name="id" type="text" value="{{ $beneficiary->id }}" class="form-control font-weight-bold" id="" placeholder="{{ $beneficiary->id }}" readonly>

                                @error('id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 1 -->
                        <div class="row mb-3">

                            <div class="col-lg-12 mb-1">

                                <label for="">BENEFICIARY FULLNAME</label>
                                <input type="text" placeholder="{{ $beneficiary->first_name }} {{ $beneficiary->middle_initial }} {{ $beneficiary->last_name }}" class="form-control font-weight-bold" id="" readonly>

                                @error('id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 2 -->
                        <div class="row mb-3">

                            <div class="col-lg-6 mb-1">

                                <label for="">First Name</label>
                                <input name="Family_Fname" type="text" value="{{ old('Family_Fname') }}" class="form-control" id="" placeholder="Enter First Name">

                                @error('Family_Fname')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-lg-6 mb-1">

                                <label for="">Middle Name</label>
                                <input name="Family_Mname" type="text" value="{{ old('Family_Mname') }}" class="form-control" id="" placeholder="Enter Middle Name">

                                @error('Family_Mname')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 3 -->
                        <div class="row mb-3">

                            <div class="col-lg-6 mb-1">

                                <label for="">Last Name</label>
                                <input name="Family_Lname" type="text" value="{{ old('Family_Lname') }}" class="form-control" id="" placeholder="Enter Last Name">

                                @error('Family_Lname')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-lg-6 mb-1">

                                <label for="">Gender</label>
                                <input name="Family_gender" type="text" value="{{ old('Family_gender') }}" class="form-control" id="" placeholder="Enter Gender">

                                @error('Family_gender')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 4 -->
                        <div class="row mb-3">

                            <div class="col-lg-6 mb-1">
                                <label for="">Date of Birth</label>
                                <input name="Family_birth" type="date" value="{{ old('Family_birth') }}" class="form-control" id="" placeholder="Enter Date of Birth">

                                @error('Family_birth')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-1">
                                <label for="">Age</label>
                                <input name="Family_age" type="text" value="{{ old('Family_age') }}" class="form-control" id="" placeholder="Enter Your Age">

                                @error('Family_age')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Row 5 -->
                        <div class="row mb-3">

                            <div class="col-lg-6 mb-1">

                                <label for="">Mobile No.</label>
                                <input name="Family_mobile" type="text" value="{{ old('Family_mobile') }}" class="form-control" id="" placeholder="Enter Mobile No.">

                                @error('Family_mobile')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-lg-6 mb-1">

                                <label for="">Civil Status</label>
                                <input name="Family_Cstatus" type="text" value="{{ old('Family_Cstatus') }}" class="form-control" id="" placeholder="Enter Civil Status">

                                @error('Family_Cstatus')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <!-- Row 1 -->
                        <div class="row mb-3">

                            <div class="col-lg-8 mb-1">

                                <label for="">ADDRESS</label>
                                <input name="Family_address" type="text" value="{{ old('Family_address') }}" class="form-control" id="" placeholder="Enter Address">

                                @error('Family_address')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-lg-4 mb-1">

                                <label for="">Relationship</label>
                                <input name="Family_Relationship" type="text" value="{{ old('Family_Relationship') }}" class="form-control" id="" placeholder="Enter Relationship">

                                @error('Family_Relationship')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <!-- End -->

                        <div class="row mb-3">

                            <div class="col-lg-12 mb-1 text-center">
                                <button type="submit" class="btn btn-success btn-lg">SAVE</button>
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of modal family member-->

@endsection
