<header>
    <h1><span>{{$area->area_name}}@if ($local_id && count($local_id)==1)
                ・{{$area->subarea->where('id', '=', $local_id[0])->first()->area_name}}@endif 美食查詢</span></h1>
    <div class="headerLogo">
        <a href="/shoplist/"><img src="{{ URL::asset('/img/logo.png') }}" alt="LOGO"></a>
    </div>
</header>
