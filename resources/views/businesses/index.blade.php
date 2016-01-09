@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header"><h1>These Businesses Have Been Flagged</h1></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('partials._messages')

                    @if($businesses->isEmpty())
                        <p>There are currently no businesses to display :/</p>
                    @else
                        <ul class="list-group">
                            @foreach($businesses as $biz)
                                <li class="list-group-item">
                                    <a href="{!! route('businesses.show', $biz) !!}">{{ $biz->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
