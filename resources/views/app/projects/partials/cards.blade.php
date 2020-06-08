<div class="row d-flex align-items-stretch">
    @foreach ($trelloBoard as $item)
        <div class="col-xs-1 col- col-xs-6 col-md-4 align-items-stretch">
            <blockquote class="trello-card">
                <a href="{{ $item->shortUrl }}">Trello Card</a>
            </blockquote>
        </div>
    @endforeach
</div>


@push('other_js')

<script src="https://p.trellocdn.com/embed.min.js"></script>

@endpush
