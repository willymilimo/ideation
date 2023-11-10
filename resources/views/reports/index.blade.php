@extends('layouts.app')
@section('content')
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-12 mb-4">
        <a href="{{ route('reportIdeasPerDept') }}">
            <div class="card border-left-primary shadow h-100 py-2" style="border-left-width: 20px !important;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h3 font-weight-bold text-primary text-uppercase mb-0">
                                Ideas Per Department
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Earnings (Annual) Card Example -->
    <div class="col-12 mb-4">
        <a href="{{ route('ideaPercentage') }}">
            <div class="card border-left-success shadow h-100 py-2" style="border-left-width: 20px !important;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h3 font-weight-bold text-primary text-uppercase mb-0">
                                Ideas by Category
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
        </a>
    </div>
</div>

<!-- Tasks Card Example -->
<div class="col-12 mb-4">
    <div class="card border-left-info shadow h-100 py-2" style="border-left-width: 20px !important;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ideas Without a comments
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><a href="#">Click here</a></div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-12 mb-4">
    <div class="card border-left-warning shadow h-100 py-2" style="border-left-width: 20px !important;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Anonymous ideas and comments</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="#">Click here</a> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection