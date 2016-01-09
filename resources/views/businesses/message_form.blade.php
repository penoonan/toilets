@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header"><h2>Send Your Message To {{ $biz->name }}</h2></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('partials._messages')

                    <form class="form-horizontal" role="form" method="PUT" action="{{ route('businesses.send_message', ['business' => $biz])  }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="message">Your Message</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="message" id="message" rows="8"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="identify"> Include my email address
                                        <i data-toggle="tooltip"
                                           title="Leave unchecked if you want to send your message anonymously"
                                           data-placement="right"
                                           class="glyphicon glyphicon-question-sign">
                                        </i>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection