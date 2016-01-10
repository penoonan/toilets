@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header"><h2>Flag a Business</h2></div>


            <p>Tell us about any businesses that meet the "low-hanging-fruit" criteria for gender-neutral bathrooms. We are looking for any business that:</p>
            <ol>
                <li>Has bathrooms</li>
                <li>Has no gender neutral bathroooms</li>
                <li>Has single-occupancy "men's" or "women's" bathrooms</li>
                <li>Is located in the Twin Cities Metro area @include('partials._tooltip', ['text' => 'We hope to expand this later, but we are starting small.'])</li>
            </ol>
            <p>A standard example would be any place with two single occupancy bathrooms: one marked "men", one marked "women". They should only need to change the bathroom signs, so why not?</p>
            <p>Only the business name is required - but please enter as much information as you can!</p>
            @include('partials._messages')

            {!! Form::open(['route' => 'business.store', 'method' =>'post', 'class' => 'form-horizontal', 'role' => 'form', 'files' => 'true']) !!}
               <div class="form-group">
                    <label class="col-sm-3 control-label" for="name"><span style="color:red; padding-right:3px">*</span>Business Name</label>
                    <div class="col-sm-9">
                        {!! Form::text('name', null, [
                            'id' => 'name',
                            'class' => 'form-control',
                            'required' => 'required',
                            'placeholder' => 'e.g., Frank\'s Franks'
                        ]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">What do they do?</label>
                    <div class="col-sm-9">
                        {!! Form::text('name', null, [
                            'id' => 'name',
                            'class' => 'form-control',
                            'placeholder' => 'Restaurant, Grocery Store, Dentist Office ... '
                        ]) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="email">@include('partials._tooltip', ['text' => 'Please enter an email address that the business publicly displays', 'placement' => 'top'])Email</label>
                    <div class="col-sm-9">
                        {!! Form::email('email', null, [
                            'id' => 'email',
                            'class' => 'form-control',
                            'placeholder' => 'example@business.com'
                        ]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="phone">@include('partials._tooltip', ['text' => '10 digits, please', 'placement' => 'top']) Phone </label>
                    <div class="col-sm-9">
                        {!! Form::text('phone', null, [
                            'id' => 'phone',
                            'class' => 'form-control',
                            'placeholder' => '123-456-7890'
                        ]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="address">Street Address</label>
                    <div class="col-sm-9">
                        {!! Form::text('address', null, [
                            'id' => 'address',
                            'class' => 'form-control',
                            'placeholder' => '1234 5th Ave., S., Minneapolis, MN 55001'
                        ]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="description">Notes / Description</label>
                    <div class="col-sm-9">
                        {!! Form::textarea('description', null, [
                            'id' => 'description',
                            'class' => 'form-control',
                            'rows' => '5',
                            'maxlength' => '500',
                            'placeholder' => 'Any information you feel is relevant'
                        ]) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary">Flag 'em!</button>
                    </div>
                </div>
            
            {!! Form::close() !!}

        </div>
    </div>

    @section('scripts')
        @parent
        <script type="text/javascript">
            function initialize() {
                var mapCanvas = window.document.getElementById('map');
                var mapOptions = {
                    //center: new google.maps.LatLng({{-- $biz->latitude }}, {{ $biz->longitude --}}),
                    zoom: 14
                };
                var map = new google.maps.Map(mapCanvas, mapOptions);
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    @endsection
@stop