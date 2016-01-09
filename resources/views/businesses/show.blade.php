@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header"><h2>{{ $biz->name }} <small><a class="pull-right" id="send-message-top-link" href="{{ route('businesses.message_form', ['business' => $biz]) }}">send a message</a></small></h2></div>

                <ul class="list-group">
                    @if(!empty($biz->description))
                        <li class="list-group-item">{{ $biz->description }}</li>
                    @endif

                    @if (!empty($biz->industry))
                        <li class="list-group-item">{{ $biz->industry }}</li>
                    @endif

                    @if($biz->hasGeo())
                        <li class="list-group-item">
                            <div id="map"></div>
                        </li>
                    @endif

                    @if (!empty($biz->address))
                        <li class="list-group-item">{{ $biz->address }}</li>
                    @endif

                    @if (!empty($biz->phone))
                        <li class="list-group-item">{{ $biz->phone }}</li>
                    @endif
                </ul>
        </div>
    </div>

    @if($biz->hasGeo())
        @section('scripts')
            @parent
            <script type="text/javascript">
                function initialize() {
                    var mapCanvas = window.document.getElementById('map');
                    var mapOptions = {
                        center: new google.maps.LatLng({{ $biz->latitude }}, {{ $biz->longitude }}),
                        zoom: 14
                    };
                    var map = new google.maps.Map(mapCanvas, mapOptions);
                }

                google.maps.event.addDomListener(window, 'load', initialize);
            </script>
        @endsection
    @endif
@stop