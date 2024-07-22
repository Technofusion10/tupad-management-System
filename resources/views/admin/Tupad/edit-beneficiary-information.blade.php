@extends('layouts.app')

@section('title', 'Edit Tupad Project Info')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Tupad Beneficiary Information</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
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
                            <li class="list-group-item"><i class="fa fa-hand-o-right text-success" aria-hidden="true"></i> Add </li>
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
                        <h6 class="m-0 font-weight-bold text-primary">DOLE Programs - Edit Tupad Benificiary Information</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.tupad.update.beneficiary') }}" method="POST">
                            @csrf

                            <!-- Row 1 -->
                            <div class="row mb-3">

                                <div class="col-lg-4 mb-1">
                                    <label for="">First Name</label>
                                    <input
                                        name="first_name"
                                        type="text"
                                        value="{{ $beneficiary->first_name }}"
                                        class="form-control"
                                        placeholder="Enter First Name..."
                                    >

                                    <input
                                        name="id"
                                        type="text"
                                        value="{{ $beneficiary->id }}"
                                        readonly hidden
                                    >

                                    @error('first_name')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-3 mb-1">
                                    <label for="">Middle Initial</label>
                                    <input
                                        name="middle_initial"
                                        type="text"
                                        value="{{ $beneficiary->middle_initial }}"
                                        class="form-control"
                                        placeholder="Enter Middle Initial..."
                                    >

                                    @error('middle_initial')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-3 mb-1">
                                    <label for="">Last Name</label>
                                    <input
                                        name="last_name"
                                        type="text"
                                        value="{{ $beneficiary->last_name }}"
                                        class="form-control"
                                        placeholder="Enter Last Name..."
                                    >

                                    @error('last_name')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-2 mb-1">
                                    <label for="">Name Extension</label>
                                    <input
                                        name="name_extension"
                                        type="text"
                                        value="{{ $beneficiary->name_extension }}"
                                        class="form-control"
                                        placeholder="Enter Name Extension..."
                                    >

                                    @error('name_extension')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <!-- End -->

                            <!-- Row 2 -->
                            <div class="row mb-3">

                                <div class="col-lg-3 mb-1">
                                    <label for="">Contact Number</label>
                                    <input
                                        name="contact_number"
                                        type="text"
                                        value="{{ $beneficiary->contact_number }}"
                                        class="form-control"
                                        id=""
                                        placeholder="Enter Contact Number"
                                    >

                                    @error('contact_number')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-3 mb-1">
                                    <label for="">Date of Birth</label>
                                    <input
                                        name="date_of_birth"
                                        type="date"
                                        value="{{ $beneficiary->date_of_birth }}"
                                        class="form-control"
                                        id=""
                                        placeholder="Enter Date of Birth"
                                    >

                                    @error('date_of_birth')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-3 mb-1">
                                    <label for="">Age</label>
                                    <input
                                        name="age"
                                        type="text"
                                        value="{{ $beneficiary->age }}"
                                        class="form-control"
                                        placeholder="Enter Age..."
                                    >

                                    @error('age')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-3 mb-1">
                                    <label for="">Gender</label>
                                    <input type="text" name="gender" class="form-control" placeholder="Enter Gender" value="{{$beneficiary->gender}}">

                                    @error('gender')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>


                            </div>
                            <!-- End -->

                            <!-- Row 3 -->
                            <div class="row mb-3">

                                <div class="col-lg-3 mb-1">
                                    <label for="">Civil Status</label>
                                    <input type="text" name="civil_status" class="form-control" placeholder="Enter civil status" value="{{$beneficiary->civil_status}}">

                                    @error('civil_status')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-3 mb-1">
                                    <label for="">Province</label>
                                    <input type="text" name="province" class="form-control" placeholder="Enter province" value="{{$beneficiary->province}}">

                                    @error('province')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-3 mb-1">
                                    <label for="">Barangay</label>
                                    <input
                                        name="barangay"
                                        type="text"
                                        value="{{ $beneficiary->barangay }}"
                                        class="form-control"
                                        placeholder="Enter barangay..."
                                    >

                                    @error('barangay')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-3 mb-1">

                                    <label for="">Street/Subdivision/Block No.</label>
                                    <input
                                        name="street"
                                        type="text"
                                        value="{{ $beneficiary->street }}"
                                        class="form-control"
                                        placeholder="Enter Street/Subdivision/Block No...."
                                    >

                                    @error('street')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>



                            </div>
                            <!-- End -->

                            <!-- Row 3 -->
                            <div class="row mb-3">

                                <div class="col-lg-3 mb-1">

                                    <label for="">Postal Code</label>
                                    <input
                                        name="postal_code"
                                        type="text"
                                        value="{{ $beneficiary->postal_code }}"
                                        class="form-control"
                                        placeholder="Enter Postal Code"
                                    >

                                    @error('postal_code')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="col-lg-3 mb-1">
                                    <label for="">Email Address</label>
                                    <input
                                        name="email_address"
                                        type="text"
                                        value="{{ $beneficiary->email_address }}"
                                        class="form-control"
                                        placeholder="Enter Email Address..."
                                    >

                                    @error('email_address')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-3 mb-1">
                                    <label for="">Designated Beneficiary</label>
                                    <input
                                        name="designated_beneficiary"
                                        type="text"
                                        value="{{ $beneficiary->designated_beneficiary }}"
                                        class="form-control"
                                        placeholder="Enter Designated Beneficiary..."
                                    >

                                    @error('designated_beneficiary')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-3 mb-1">

                                    <label for="">Relationship To Assured</label>
                                    <input
                                        name="relationship_to_assured"
                                        type="text"
                                        value="{{ $beneficiary->relationship_to_assured }}"
                                        class="form-control"
                                        placeholder="Enter Relationship To Assured..."
                                    >

                                    @error('relationship_to_assured')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>
                            <!-- End -->

                            <!-- row -->
                            <div class="row mb-3">
                                <div class="col-lg-12 mb-1">
                                    <label for="">Region</label>
                                    <input
                                        name="region"
                                        type="text"
                                        value="{{ $beneficiary->region }}"
                                        class="form-control"
                                        placeholder="Enter Region..."
                                        readonly
                                    >

                                    @error('region')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 4 -->
                            <div class="row mb-3">

                                <div class="col-lg-6 mb-1">

                                    <label for="">Period of Employment Start</label>
                                    <input
                                        name="period_of_employment_start"
                                        type="date"
                                        value="{{ $beneficiary->period_of_employment_start }}"
                                        class="form-control"
                                        id=""
                                        placeholder="Enter Date..."
                                    >

                                    @error('period_of_employment_start')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="col-lg-6 mb-1">
                                    <label for="">Period of Employment End</label>
                                    <input
                                        name="period_of_employment_end"
                                        type="date"
                                        value="{{ $beneficiary->period_of_employment_end }}"
                                        class="form-control"
                                        placeholder="Enter Date..."
                                    >

                                    @error('period_of_employment_end')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <!-- End -->

                            <!-- Row 5 -->
                            <div class="row mb-3">

                                <div class="col-lg-4 mb-1">

                                    <label for="">Total Insurance Amount</label>
                                    <input
                                        name="total_insurance_amount"
                                        type="text"
                                        value="{{ $beneficiary->total_insurance_amount }}"
                                        class="form-control"
                                        id=""
                                        placeholder="Enter Total Insurance Amount..."
                                    >

                                    @error('total_insurance_amount')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="col-lg-4 mb-1">
                                    <label for="">Beneficiary Type</label>
                                    <input
                                        name="beneficiary_type"
                                        type="text"
                                        value="{{ $beneficiary->beneficiary_type }}"
                                        class="form-control"
                                        placeholder="Enter Beneficiary Type..."
                                    >

                                    @error('beneficiary_type')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-4 mb-1">
                                    <label for="">Beneficiary Status</label>
                                    <input
                                        name="beneficiary_status"
                                        type="text"
                                        value="{{ $beneficiary->beneficiary_status }}"
                                        class="form-control"
                                        readonly
                                    >
                                </div>

                            </div>
                            <!-- End -->

                            <!-- Row 6 -->
                            <div class="row mb-3">

                                <div class="col-lg-6 mb-1">
                                    <label for="">Status</label>
                                    <textarea
                                        name="status"
                                        class="form-control"
                                        value ="{{ $beneficiary->remarks }}"
                                        id=""
                                        placeholder="{{ $beneficiary->status }}"
                                        rows="5"
                                    >
                                    </textarea>
                                    @error('status')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-1">
                                    <label for="">Remarks</label>
                                    <textarea
                                        name="remarks"
                                        class="form-control"
                                        value ="{{ $beneficiary->remarks }}"
                                        id=""
                                        placeholder="{{ $beneficiary->remarks }}"
                                        rows="5"
                                    >
                                    </textarea>
                                    @error('remarks')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <!-- End -->

                            <!-- Row 7 -->
                            <div class="custom-file">

                                <input
                                    type="file"
                                    name="picture"
                                    accept="jpeg"
                                    class="custom-file-input"
                                    id="customFile"
                                >
                                <label class="custom-file-label" for="customFile">Choose file</label>

                            </div>
                            <!-- End -->

                            <!-- Row 3 -->
                            <div class="row mb-3">

                                <div class="col-lg-12 mb-1">
                                    <label for="">Interviewed by</label>
                                    <input
                                        name="interviewed_by"
                                        type="text"
                                        value="{{ $beneficiary->interviewed_by }}"
                                        class="form-control"
                                        placeholder="Enter Interviewed by..."
                                    >

                                    @error('interviewed_by')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- End -->

                            <!-- Row 9 -->
                            <div class="row mb-3 mt-3">

                                <div class="col-lg-12 mb-1 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Update Beneficiary Information</button>
                                </div>

                            </div>
                            <!-- End -->

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
