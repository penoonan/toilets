@if (!empty($text))
    <i data-toggle="tooltip"
        title="{{ $text }}"
        data-placement="{{ isset($placement) ? $placement : 'right' }}"
        class="glyphicon glyphicon-question-sign">
    </i>
@endif
