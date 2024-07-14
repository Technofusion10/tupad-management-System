@extends('layouts.app')

@section('title', 'Tupad Data-Table')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tupad Project Table</h1>
            <a href="{{asset('/dashboard/add-tupad-project-info-form')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa-solid fa-user-plus fa-sm mr- text-white-50"></i>
                Add New Project
            </a>
            <a href="{{route('export_AllTupadInformation')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Generate Report
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
                            <li class="list-group-item"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Add </li>
                        </ul>

                    </div>
                </div>

            </div>

        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tupad Project Data-Table</h6>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.tupad.search.project') }}" method="GET">
                    @csrf
                    <div class="form-row">
                        <div class="col-2">
                            <select name="contains" class="form-control">
                                <option value="Reference_Number">Reference Number</option>
                                <option value="total_budget">Total Budget</option>
                                <option value="Office_Name">Office Name</option>
                                <option value="Office_Address">Office Address</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <input type="text" name="input_text" class="form-control" placeholder="Search Bar... Input your Text Here...">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="form-control btn btn-primary ">
                                Search Tupad Project <i class="fas fa-search fa-sm"></i>
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
                                <th>REFERENCE #</th>
                                <th>OFFICE NAME</th>
                                <th>CONTACT #</th>
                                <th>TOTAL BUDGET</th>
                                <th>PROVINCE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>REFERENCE #</th>
                                <th>OFFICE NAME</th>
                                <th>CONTACT #</th>
                                <th>TOTAL BUDGET</th>
                                <th>PROVINCE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($tupadProject as $project)
                                <tr class="text-center">
                                    <td>{{ $project->project_reference }}</td>
                                    <td>{{ $project->name_of_office }}</td>
                                    <td>{{ $project->contact_number }}</td>
                                    <td>{{ number_format($project->total_budget, 2) }}</td>
                                    <td>{{ $project->province }}</td>
                                    <td>
                                        @if($project->status == "PENDING")
                                            <span class="badge badge-warning">PENDING</span>
                                        @endif

                                        @if($project->status == "APPROVED")
                                            <span class="badge badge-success">APPROVED</span>
                                        @endif

                                        @if($project->status == "DENIED")
                                            <span class="badge badge-danger">DENIED</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ '/dashboard/tupad-project-table/'.$project->id }}" class="btn btn-primary">VIEW</a>
                                        <a href="{{ '/dashboard/tupad-project-table/edit/'.$project->id }}" class="btn btn-primary">EDIT</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $tupadProject->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
