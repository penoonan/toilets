@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header"><h2>Send Your Message To {{ $biz->name }}</h2></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('partials._messages')

                    {!!
                        Form::open([
                            'class' => 'form-horizontal',
                            'role' => 'form',
                            'method' => 'post',
                            'route' => ['business.message.store', $biz->slug]
                        ])
                    !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="body">Your Message</label>
                            <div class="col-md-6">
                                {!! Form::textarea('body', null, [
                                    'id' => 'body',
                                    'rows' => 5,
                                    'class' => 'form-control'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('anonymous', null, true) !!} Hide my email address
                                        @include('partials._tooltip', ['text' => 'Uncheck this if you want the business owner to see your email address'])
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
