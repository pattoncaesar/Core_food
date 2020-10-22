<div class="f-breadCrumbs u-container">
    <ul>
        <li><a href="/shoplist/">首頁</a></li>
        @foreach($data as $item)
            <li>></li>
            <li>
                @if($item['url'])
                    <a href="{{$item['url']}}">{{$item['context']}}</a>
                @else
                    {!! $item['context'] !!}
                @endif
            </li>
        @endforeach
    </ul>
</div>
