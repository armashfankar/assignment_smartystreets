@extends('app_layout')
@section('title')
    Dashboard
@stop
@section('content')
<div class="container">
    <div class="dashboard user-data">
        <div class="card">
            <h3>Welcome {{ Auth::user()->name }}!</h3>
            <div class="row mt-5">
                <div class="col-lg-6 col-md-6 col-xs-12 pb-2">
                    <label class="text-muted">Email:</label>
                    <span class="text-dark">{{ Auth::user()->email }}</span>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 pb-2">
                    <label class="text-muted">Phone:</label>
                    <span class="text-dark">{{ Auth::user()->phone }}</span>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 pb-2">
                    <label class="text-muted">Street Address:</label>
                    <span class="text-dark">{{ Auth::user()->street_address }}</span>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 pb-2">
                    <label class="text-muted">City:</label>
                    <span class="text-dark">{{ Auth::user()->city }}</span>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 pb-2">
                    <label class="text-muted">State:</label>
                    <span class="text-dark">{{ Auth::user()->state }}</span>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 pb-2">
                    <label class="text-muted">Zipcode:</label>
                    <span class="text-dark">{{ Auth::user()->zip }}</span>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 pb-2">
                    <label class="text-muted">County Name:</label>
                    <span class="text-dark">{{ Auth::user()->county_name }}</span>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg" onclick="event.preventDefault(); this.closest('form').submit();">Logout</button>
                </div>
            </form>
        </div>
        
        
    </div>
</div>
@stop
