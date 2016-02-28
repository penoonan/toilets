@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header"><h2>Search For Businesses</h2></div>
            <div class="form-group">
                <label class="sr-only">Type a Business Name</label>
                <input class="typeahead form-control" id="business-search" placeholder="Type a business name ...">
            </div>

        </div>
    </div>

    @section('scripts')
        @parent

        <script type="text/javascript">

            var businesses = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: "{!! route('api.business.index') !!}",
                remote: {
                    url: "{!! route('api.business.query') !!}?query=%QUERY",
                    wildcard: '%QUERY'
                }
            });

            businesses.initialize();

            var searchElement = $('#business-search');

            searchElement.typeahead({
                hint: true,
                highlight: true,
                minLength: 2
            },
            {
                name: 'slug',
                displayKey: 'name',
                source: businesses,
                templates: {
                    empty: [
                        '<div class="tt-empty-message">',
                        'No businesses match your query ...',
                        '</div>'
                    ].join('\n')
                }
            });

            searchElement.bind('typeahead:selected', function(obj, datum, name) {
                window.location.href = "{!! route('business.index') !!}" + "/" + datum.slug;
            });
        </script>
    @endsection

@stop