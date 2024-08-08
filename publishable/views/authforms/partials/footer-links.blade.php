@if(!empty(config('authforms.footer_links')))
    <hr>
    <div class="footer-links">
        @foreach(config('authforms.footer_links') as $item)
            <a href="@if(!empty($item['link'])) {{ $item['link'] }} @else @makeUrl($item['docId']) @endif">
                {{ $item['trans_key'] ? __($item['trans_key']) : $item['title'] }}
            </a>
        @endforeach
    </div>
@endif
