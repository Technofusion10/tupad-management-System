@extends('layouts.app')

@section('title', 'Add Tupad Project')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Tupad Project</h1>
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
                        <h6 class="m-0 font-weight-bold text-primary">TUPAD Program - Add Project Information</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.tupad.add.project') }}" method="POST">
                            @csrf

                            <!-- Row 1 -->
                            <div class="row mb-3">

                                <div class="col-lg-6 mb-1">

                                    <label for="">Program</label>
                                    <input name="name_of_program" type="text" value="TUPAD" class="form-control" selected readonly>

                                    @error('name_of_program')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="col-lg-6 mb-1">

                                    <label for="">Office Name</label>
                                    <input name="name_of_office" type="text" value="{{ old('name_of_office') }}" placeholder="Enter Office Name" class="form-control" >

                                    @error('name_of_office')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>
                            <!-- End -->

                            <!-- Row 2 -->
                            <div class="row mb-3">

                                <div class="col-lg-6 mb-1">

                                    <label for="">Office Address</label>
                                    <input name="office_address" type="text" value="{{ old('office_address') }}" placeholder="Enter Office Address" class="form-control" >

                                    @error('office_address')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="col-lg-6 mb-1">

                                    <label for="">Contact # Number</label>
                                    <input name="contact_number" type="text" value="{{ old('contact_number') }}" placeholder="Enter Contact Number #" class="form-control">

                                    @error('contact_number')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>
                            <!-- End -->

                            <!-- Row 3 -->
                            <div class="row mb-3">

                                <div class="col-lg-6 mb-1">

                                    <label for="">Email Address</label>
                                    <input name="email_address" type="text" value="{{ old('email_address') }}" class="form-control" id="" placeholder="Enter Email Address">

                                    @error('email_address')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="col-lg-6 mb-1">

                                    <label for="">Total Budget</label>
                                    <input name="total_budget" type="text" value="{{ old('total_budget') }}" class="form-control" id="" placeholder="Enter Total Budget">

                                    @error('total_budget')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>
                            <!-- End -->

                            <!-- Row 4 -->
                            <div class="row mb-3">

                                <div class="col-lg-6 mb-1">

                                    <label for="">Provincial-Field Office</label>
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

                                <div class="col-lg-6 mb-1">

                                    <label for="">Region</label>
                                    <input name="region" type="text" value="REGION 10 ONLY" class="form-control" readonly>

                                </div>

                            </div>
                            <!-- End -->

                            <!-- Row 5 -->
                            <div class="row mb-3">

                                <div class="col-lg-12 mb-1">

                                    <label for="">Prepared By</label>
                                    <input name="prepared_by" type="text" value="{{ old('prepared_by') }}" class="form-control" placeholder="Enter Officer In-Charge">

                                    @error('prepared_by')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>
                            <!-- End -->

                            <!-- Row 6 -->
                            <div class="row mb-3">

                                <div class="col-lg-12 mb-1">

                                    <label for="">Description</label>
                                    <textarea rows="5" cols="50" name="description" value="{{ old('description') }}" class="form-control" placeholder="Enter Description">

                                    </textarea>

                                    @error('description')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>
                            <!-- End -->


                            <!-- Row 8 -->
                            <div class="row mb-3">

                                <div class="col-lg-6 mb-1">

                                    <label for="">Period of Project Start (DATE)</label>
                                    <input type="date" name="period_of_project_start" class="form-control">

                                    @error('period_of_project_start')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-1">

                                    <label for="">Period of Project End (DATE)</label>
                                    <input type="date" name="period_of_project_end" class="form-control">

                                    @error('period_of_project_end')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>
                            <!-- End -->

                            <!-- Row 9 -->
                            <div class="row mb-3">

                                <div class="col-lg-12 mb-1">
                                    <label for="">Remarks</label>
                                    <textarea name="remarks" class="form-control" id="" placeholder="Enter Remarks" rows="5"></textarea>
                                    @error('remarks')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <!-- End -->

                            <!-- Row 10 -->
                            <div class="row mb-3">

                                <div class="col-lg-12 mb-1 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Add Tupad Project</button>
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
