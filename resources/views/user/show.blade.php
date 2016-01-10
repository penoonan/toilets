@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="page-header"><h2>Welcome, {{ $user->name }}</h2></div>

                <div class="panel panel-default">
                    <div class="panel-heading">Your Activity</div>

                    <div class="panel-body">
                        @if ($user->activity->isEmpty())
                            <p>No activity? Hmm. Time to {!! link_to_route('business.index', 'get started') !!}!</p>
                        @else
                        <ul>
                            @foreach($user->activity as $activity)
                                <li>{!! $activity->render() !!}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection