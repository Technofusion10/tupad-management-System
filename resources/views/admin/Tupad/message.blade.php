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
                                <a  href="/dashboard/add-tupad-form" class="btn btn-primary btn-lg mb-3">Redirect Back</a>



                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12 mb-1">
                                    <ul class="list-group">
                                        <li class="list-group-item font-weight-bold">
                                            Beneficiary ID: {{$existingFamilyMember->employee_id}}
                                            <a class="collapse-item" href="/dashboard/tupad-beneficiaries-table">Beneficiaries Table</a>
                                        </li>
                                        <li class="list-group-item font-weight-bold">Family ID: {{$existingFamilyMember->id}}</li>
                                        {{-- <li class="list-group-item font-weight-bold">Beneficiary Address: {{$existingFamilyMember->Family_province}}, {{$existingFamilyMember->Family_barangay}},{{$existingFamilyMember->Family_street}}, {{$existingFamilyMember->Family_postalcode}}</li> --}}
                                        <li class="list-group-item font-weight-bold">Relationship to beneficiary: {{$existingFamilyMember->Family_Relationship}}</li>
                                        <li class="list-group-item font-weight-bold">Family Fullname: {{$existingFamilyMember->Family_Fname}} {{$existingFamilyMember->Family_Mname}} {{$existingFamilyMember->Family_Lname}} </li>
                                        <li class="list-group-item font-weight-bold">Family Civil Status: {{$existingFamilyMember->Family_Cstatus}}</li>
                                        {{-- <li class="list-group-item font-weight-bold">Family Address: {{$existingFamilyMember->Family_province}}, {{$existingFamilyMember->Family_barangay}},{{$existingFamilyMember->Family_street}}, {{$existingFamilyMember->Family_postalcode}}</li> --}}
                                        <li class="list-group-item font-weight-bold">Family date created: {{$existingFamilyMember->created_at}}</li>


                                    </ul>
                                </div>
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

{{-- <table class="table table-hover text-center">
                                            <thead class="border bg-gray-500 text-dark">
                                                <tr>
                                                    <th class="border border-dark">Family ID</th>
                                                    <th class="border border-dark">Family First Name</th>
                                                    <th class="border border-dark">Family Middle Name</th>
                                                    <th class="border border-dark">Family Last Name</th>
                                                    <th class="border border-dark">Beneficiary Name</th>
                                                 </tr>
                                            </thead>
                                            <tbody class="border bg-gray-200">
                                                @foreach ($beneficiaryFamily as $familyMember)
                                                    <tr>
                                                        <td class="border border-dark">{{$familyMember->id}}</td>
                                                        <td class="border border-dark">{{$familyMember->Family_Fname}}</td>
                                                        <td class="border border-dark">{{$familyMember->Family_Mname}}</td>
                                                        <td class="border border-dark">{{$familyMember->Family_Lname}}</td>
                                                        <td class="border border-dark">1</td>
                                                        <td class="border border-dark">Isaiah</td>
                                                        <td class="border border-dark">Ramos</td>
                                                        <td class="border border-dark">Jimoya</td>
                                                        <td class="border border-dark">Matthew Ramos Jimoya</td>
                                                    </tr>
                                                @endforeach
                                        </tbody>
                                        </table> --}}
