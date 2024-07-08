@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Dashboard Analytics</h1>
        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tupad Project</h6>
        </div>

        <!--Tupad Project dashboard -->
        <!-- Content Row -->
        <div class="row">
            <!--  -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Tupad Budget Target</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Php {{ number_format($countingTupadTotals->totalTupadBudget, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-handshake-o fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <!--  -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Tupad Approved Budget</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Php {{ number_format($totalApprovedBudget, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>.
            <!--  -->

        </div>
        <!--  -->

        <!-- Content Row -->
        <div class="row">

            <!--  -->
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Tupad Approved</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($countingTupadTotals->approvedTupadProject, 0) }} Projects</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-handshake-o fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

        </div>
        <!--  -->

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Tupad Project Budget</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Php {{ number_format($totalPendingBudget, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-hand-paper-o fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Tupad Pending Project</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($countingTupadTotals->pendingTupadProject, 0) }} Projects</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Denied Tupad Project Budget</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Php {{ number_format($totalDeniedBudget, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-handshake-o fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Denied Project </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($countingTupadTotals->deniedTupadProject, 0) }} Projects</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-money fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

        </div>
        <!--  -->


        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-1">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                    </div>

                    <div class="card-body">

                        <h4 class="small font-weight-bold">
                            TUPAD Program
                            <span class="float-right">

                                @if (number_format($percentage, 0) == 100)
                                    Complete!
                                @else
                                    {{ number_format($percentage, 0) }} %
                                @endif

                            </span>
                        </h4>

                        <div class="progress mb-4">

                            <div class="progress-bar" role="progressbar" style="width: {{ number_format($percentage, 0) }}%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">

                            </div>

                        </div>

                        <!--<h4 class="small font-weight-bold">
                            Integrated Livelihood Program
                            <span class="float-right">
                                80%
                            </span>
                        </h4>

                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>-->

                        <!--<h4 class="small font-weight-bold">
                            Others
                            <span class="float-right">
                                Complete!
                            </span>
                        </h4>

                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>-->

                    </div>

                </div>

            </div>

        </div>
    </div>



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tupad Beneficiary</h6>
        </div>
        <!--Tupad Beneficiary dashboard -->
        <!-- Content Row -->
        <div class="row">

            <!--  -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Beneficiary Insurance Target</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Php {{ number_format($countingBeneficiaryTotals->totalBeneficiaryInsurance, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-handshake-o fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <!--  -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Approved Beneficiary Insurance</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Php {{ number_format($totalApprovedInsurance, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>.
            <!--  -->

        </div>
        <!--  -->

        <!-- Content Row -->
        <div class="row">

            <!--  -->
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Beneficiaries Approved</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($countingBeneficiaryTotals->approvedBeneficiary, 0) }} Projects</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-handshake-o fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

        </div>
        <!--  -->

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Insurance Budget</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Php {{ number_format($totalPendingInsurance, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-hand-paper-o fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Beneficiaries</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($countingBeneficiaryTotals->pendingBeneficiary, 0) }} Projects</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Denied Insurance Budget</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Php {{ number_format($totalDeniedInsurance, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-handshake-o fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Denied Beneficiaries </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($countingBeneficiaryTotals->deniedBeneficiary, 0) }} Projects</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-money fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

        </div>
        <!--  -->


        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-1">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Beneficiaries</h6>
                    </div>

                    <div class="card-body">

                        <h4 class="small font-weight-bold">
                            TUPAD Program
                            <span class="float-right">

                                @if (number_format($percentage1, 0) == 100)
                                    Complete!
                                @else
                                    {{ number_format($percentage1, 0) }} %
                                @endif

                            </span>
                        </h4>

                        <div class="progress mb-4">

                            <div class="progress-bar" role="progressbar" style="width: {{ number_format($percentage, 0) }}%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-2">

            <!-- Approach -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Announcement
                    </h6>
                </div>

                <div class="card-body">
                    <p>
                       No Announcement...
                    </p>
                    <p class="mb-0">
                        No Announcement...
                    </p>
                </div>

            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

@endsection
