@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header">
                <h1>Toilets For Trans Folk <small>- more of them would be nice</small></h1>
                <p>A Trans Activist Project for Minneapolis / St. Paul</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <h3>About Toilets</h3>
                    <p>Lots of businesses that <em>could</em> have gender-neutral bathrooms <em>don't</em>. Why is this important?</p>
                    <p><a href="{{ route('home.about') }}" class="btn btn-default" role="button">Learn More</a></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Talk To a Business</h3>
                    <p>Send an email to businesses and let them know you how they can do better.</p>
                    <p><a href="{{ route('business.index') }}" class="btn btn-default" role="button">Find Businesses</a></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Flag a Business For Us!</h3>
                    <p>Do you know of a business that meets the criteria? Flag them - we'll review and add them to the list!</p>
                    <p><a href="{{ route('business.create') }}" class="btn btn-default" role="button">Flag a Business</a></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Emergency?</h3>
                    <p>Find the nearest safe bathroom <strong>right now</strong> on Refuge Restrooms. Bookmark it.</p>
                    <p><a href="http://www.refugerestrooms.org" class="btn btn-default" role="button">Restroom Finder</a></p>
                </div>
            </div>
        </div>

    </div>
@stop