@extends('app_layout')
@section('title')
User Registration
@stop
@section('content')
<div class="container">
    <div class="signup user-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2>User Registration</h2>
            <p>Please fill in this form to create an account!</p>
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="name">Name<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="email">Email Address<sup class="text-danger">*</sup></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="input valid email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="password">Password<sup class="text-danger">*</sup></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required pattern=".{8,}" title="8 characters minimum">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="password">Confirm Password<sup class="text-danger">*</sup></label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required pattern=".{8,}" title="8 characters minimum">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="phone">Phone<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required pattern="^\d{3}-\d{3}-\d{4}$" title="enter valid US phone (format: xxx-xxx-xxxx)">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="street_address">Street Address<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control @error('street_address') is-invalid @enderror" name="street_address" id="street_address" value="{{ old('street_address') }}" required>
                        @error('street_address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="city">City<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{ old('city') }}" required readonly>
                        @error('city')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="state">State<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" id="state" value="{{ old('state') }}" required readonly>
                        @error('state')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="zip">Zip Code<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}"
                        pattern="^\d{5}" id="zipcode" title="enter valid US zip code" required readonly>
                        @error('zip')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" id="user-accepts" class="form-check-input" required>
                <label for="user-accepts" class="form-check-label">I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
            </div>
        </form>
        <div class="text-center">Already have an account? <a href="{{ route('login') }}">Login here</a></div>
    </div>
</div>
@stop
@section('script')
<script>
    $(document).ready(function(){
        $( "#street_address" ).autocomplete({
            source: function(_request, response ) {
                $.ajax(
                {
                    type: 'GET',
                    url: 'https://us-autocomplete-pro.api.smartystreets.com/lookup?key={{env("SMARTYSTREETS_KEY")}}&search='+$('#street_address').val(),
                    success: function (data) {
                        if(data.suggestions){
                            response(data.suggestions.map(function(item){
                                return {label: item.street_line,value: item.street_line, complete_address: item}
                            }));
                        }
                    }
                });
            },
            select: function (_event, ui) {
                $('#city').val(ui.item.complete_address.city);
                $('#state').val(ui.item.complete_address.state);
                $('#zipcode').val(ui.item.complete_address.zipcode);
            }
        });
    });
</script>
@stop
