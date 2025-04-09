@extends('layouts.app')

@section('content')
<h2>Dashboard</h2>

<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Tasks</h5>
                <p class="card-text fs-3">50</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Hours Logged</h5>
                <p class="card-text fs-3">120</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Completed Tasks</h5>
                <p class="card-text fs-3">15</p>
            </div>
        </div>
    </div>
</div>
@endsection
