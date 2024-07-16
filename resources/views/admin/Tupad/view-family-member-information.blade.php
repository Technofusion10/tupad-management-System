@extends('layouts.app')

@section('title', 'FAMILY INFORMATION')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">FAMILY INFORMATION</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a> --}}
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
                            <!--<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('images/bg-1.svg') }}" alt="...">-->
                        </div>

                        <ul class="list-group">
                            <li class="list-group-item"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Add </li>
                        </ul>

                    </div>
                </div>

            </div>

        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-lg-12 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">TUPAD Program - Family Information Update</h6>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.tupad.update.beneficiary.family') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Row 1 -->
                            <div class="row mb-3">

                                <div class="col-lg-12 mb-1" hidden>

                                    <label for="">BENEFICIARY FULLNAME</label>
                                    <input name="id" type="text" value="{{ $familyMember->id }}" class="form-control font-weight-bold" id="" readonly>

                                    @error('id')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>
                            <!-- End -->

                            <!-- Row 1 -->
                            {{-- <div class="row mb-3">

                                <div class="col-lg-12 mb-1">

                                    <label for="">BENEFICIARY FULLNAME</label>
                                    <input type="text" placeholder="{{ $beneficiary->first_name }} {{ $beneficiary->middle_initial }} {{ $beneficiary->last_name }}" class="form-control font-weight-bold" id="" readonly>

                                    @error('id')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>
                            <!-- End --> --}}

                            <!-- Row 2 -->
                            <div class="row mb-3">

                                <div class="col-lg-6 mb-1">

                                    <label for="">First Name</label>
                                    <input name="Family_Fname" type="text" value="{{$familyMember->Family_Fname}}" class="form-control" id="" placeholder="Enter First Name">

                                    @error('Family_Fname')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>


                                <div class="col-lg-6 mb-1">

                                    <label for="">Middle Name</label>
                                    <input name="Family_Mname" type="text" value="{{$familyMember->Family_Mname}}" class="form-control" id="" placeholder="Enter Middle Name">

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
                                    <input name="Family_Lname" type="text" value="{{$familyMember->Family_Lname}}" class="form-control" id="" placeholder="Enter Last Name">

                                    @error('Family_Lname')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="col-lg-6 mb-1">

                                    <label for="">Gender</label>
                                    <input name="Family_gender" type="text" value="{{$familyMember->Family_gender}}" class="form-control" id="" placeholder="Enter Gender">

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
                                    <input name="Family_birth" type="date" value="{{$familyMember->Family_birth}}" class="form-control" id="" placeholder="Enter Date of Birth">

                                    @error('Family_birth')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-1">
                                    <label for="">Age</label>
                                    <input name="Family_age" type="text" value="{{$familyMember->Family_age}}" class="form-control" id="" placeholder="Enter Your Age">

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
                                    <input name="Family_mobile" type="text" value="{{$familyMember->Family_mobile}}" class="form-control" id="" placeholder="Enter Mobile No.">

                                    @error('Family_mobile')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="col-lg-6 mb-1">

                                    <label for="">Civil Status</label>
                                    <input name="Family_Cstatus" type="text" value="{{$familyMember->Family_Cstatus}}" class="form-control" id="" placeholder="Enter Civil Status">

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
                                    <input name="Family_address" type="text" value="{{$familyMember->Family_address}}" class="form-control" id="" placeholder="Enter Address">

                                    @error('Family_address')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="col-lg-4 mb-1">

                                    <label for="">Relationship</label>
                                    <input name="Family_Relationship" type="text" value="{{$familyMember->Family_Relationship}}" class="form-control" id="" placeholder="Enter Relationship">

                                    @error('Family_Relationship')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>
                            <!-- End -->

                            <div class="row mb-3">

                                <div class="col-lg-12 mb-1 text-center">
                                    <button type="submit" class="btn btn-success btn-lg">update family</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
