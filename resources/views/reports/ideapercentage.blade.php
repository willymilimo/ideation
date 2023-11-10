@extends('layouts.app')
@section('content')
    <!-- Donut Chart -->
    <div class="col-xl-4 col-lg-8">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ideas Percentage Per Department</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                </div>
                <hr>
                Styling for the donut chart can be found in the
                <code>/js/demo/chart-pie-demo.js</code> file.
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/stupidpiechart.js') }}"></script>
@endsection
