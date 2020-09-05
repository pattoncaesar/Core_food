<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no,address=no,email=no">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="{{ URL::asset('/css/common.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/search.css') }}" rel="stylesheet">
    <title>美食查詢-{{$area->area_name}}@if ($local_id && count($local_id)==1)
            ・{{$area->subarea->where('id', '=', $local_id[0])->first()->area_name}}@endif-</title>
</head>
<body>
<header>
    <h1><span>{{$area->area_name}}@if ($local_id && count($local_id)==1)
                ・{{$area->subarea->where('id', '=', $local_id[0])->first()->area_name}}@endif 美食查詢</span></h1>
    <div class="headerLogo">
        <a href="/shoplist/"><img src="{{ URL::asset('/img/logo.png') }}" alt="LOGO"></a>
    </div>
</header>
<div class="f-breadCrumbs u-container">
    <ul>
        <li><a href="search">首頁</a></li>
        <li>></li>
        <li><a href="/shoplist/{{$area->id}}">{{$area->area_name}}</a></li>
        <li>></li>
        @if ($local_id && count($local_id)==1)
            <li><a href="/shoplist/{{$area->id}}/{{$local_id[0]}}">{{$area->area_name}}
                    ・{{$area->subarea->where('id', '=', $local_id[0])->first()->area_name}}</a></li>
            <li>></li>
        @endif
        <li><span>查詢結果</span></li>
    </ul>
</div>
<div class="f-mainContents u-container">
    <div class="mainWrap">
        <h2>{{$area->area_name}} @if ($local_id && count($local_id)==1)
                ・{{$area->subarea->where('id', '=', $local_id[0])->first()->area_name}}@endif
            查詢結果</h2>
        <div class="m-pager">
            {{--            {!! $shop->links('pagination.default') !!}--}}
            {!! $shop->links() !!}
        </div>
        <div class="m-shopList">
            <ul>
                @foreach ($shop as $shop_item)
                    <li class="shopData">
                        <div class="shopHead">
                            <a href="/shop/{{$shop_item->id}}">{{$shop_item->shop_name}}</a>
                        </div>
                        <div class="shopDetail">
                            <div class="photo">
                                <img src="{{ URL::asset('/img/shop/'.$shop_item->photos[0]->photo_num.'.png') }}"
                                     alt="">
                            </div>
                            <div class="info">
                                <div class="shopTitle">
                                    <p>{{$shop_item->main_title}}</p>
                                </div>
                                <table>
                                    <tr>
                                        <th>分類</th>
                                        <td>{{$shop_item->foodmain->food_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>標籤</th>
                                        <td>
                                            <ul class="foodTags">
                                                @foreach ($shop_item->foodTags as $food_tag)
                                                    <li>{{$food_tag->foodsub->food_name}}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>營業時間</th>
                                        <td>{{$shop_item->open_time}}</td>
                                    </tr>
                                    <tr>
                                        <th>地址</th>
                                        <td>{{$shop_item->address}}</td>
                                    </tr>
                                </table>
                                <div class="linkBtn">
                                    <button class="like u-hoverOpacity" value="{{$shop_item->id}}">LIKE</button>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="m-pager">
            {!! $shop->links() !!}
        </div>
    </div>
    <div class="rightWrap">
        <form action="{{url('shopsearch')}}" method="POST">
            {{ csrf_field() }}
            <div class="r-searchMenu">
                <p class="searchTitle"><span>查詢</span></p>
                <div class="searchArea">
                    <p class="typeTitle">地點</p>
                    <ul class="main metismenu" id="areaMenu">
                        @foreach ($area_list as $area_item)
                            <li class="m-list @if ($area->id==$area_item->id) is-active @endif">
                                <p class="mainList"><span>{{$area_item->area_name}}</span></p>
                                <ul class="sub">
                                    <li>
                                        <input type="checkbox" id="master-area{{$area_item->id}}" name="master_area"
                                               value="{{$area_item->id}}"
                                               @if ($area->id==$area_item->id && !$local_id)  checked @endif>
                                        <label for="master-area{{$area_item->id}}">全{{$area_item->area_name}}</label>
                                    </li>
                                    @foreach ($area_item->subarea->sortBy('order') as $area_sub)
                                        <li>
                                            <input type="checkbox" id="s-area{{$area_sub->id}}" name="sub_area[]"
                                                   value="{{$area_sub->id}}"
                                                   @if ($local_id && in_array($area_sub->id, $local_id)) checked @endif>
                                            <label for="s-area{{$area_sub->id}}">{{$area_sub->area_name}}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        <input id="m_list" name="m_list_id" type="hidden" value="{{$area_item->id}}">
                    </ul>
                </div>
                <div class="searchFood">
                    <p class="typeTitle">分類</p>
                    <ul class="main">
                        @foreach ($food_list as $food_item)
                            @if ($loop->first)
                                <li class="f-list is-active">
                            @else
                                <li class="f-list ">
                                    @endif
                                    <p class="mainList"><span>{{$food_item->food_name}}</span></p>
                                    <ul class="sub">
                                        <li>
                                            <input type="checkbox" id="s-genre0" checked>
                                            <label for="s-genre0">全{{$food_item->food_name}}</label>
                                        </li>
                                        @foreach ($food_item->subfoodlist->sortBy('order') as $food_sub)
                                            <li>
                                                <input type="checkbox" id="s-genre{{$food_sub->id}}">
                                                <label for="s-genre{{$food_sub->id}}">{{$food_sub->food_name}}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                    </ul>
                </div>
                <div class="btnArea">
                    <button type="submit" name="action" value="search" class="searchBtn">查詢</button>
                    <button type="submit" name="action" value="ranking" class="rankingBtn" disabled>排行榜</button>
                </div>
            </div>
        </form>
    </div>
</div>
<footer class="f-footer">
    <div class="footerLogo">
        <a href="">
            <img src="{{ URL::asset('/img/logo.png') }}" alt="LOGO">
        </a>
    </div>
</footer>

<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
<script src="{{ URL::asset('/js/js.cookie.js') }}"></script>
<script>
    $(window).on('load', function () {
        //  area menu
        $('li.m-list').click(function () {
            var $m_list_old = $('.m-list.is-active').find('ul > li > input');
            $m_list_old.prop("checked", false);
            $('.m-list.is-active').removeClass('is-active');

            var $m_list_new = $(this).closest('li').find('ul > li:first > input');
            $m_list_new.prop("checked", true);
            $(this).addClass('is-active');

            $('#m_list').val($m_list_new.val());
        });

        $("input[id^='master-area'], label[for^='master-area']").click(function () {
            var $sub_area = $(this).closest('ul').find('li > input').slice(1);
            $sub_area.prop("checked", false);
            event.stopPropagation();
        });

        $("input[id^='s-area'], label[for^='s-area']").click(function () {
            var $master_area = $(this).closest('ul').find('li:first > input');
            $master_area.prop("checked", false);
            event.stopPropagation();

            $('#m_list').val($master_area.val());
        });

        //  food menu
        //  TODO

        //  like -> cookie
        $("button.like").each(function () {
            id = $(this).attr("value");
            if (typeof Cookies.get('shop_' + id + '_liked') === 'undefined' || Cookies.get('shop_' + id + '_liked') === 0) {
                //no cookie
                $(this).removeClass('is-active');
            } else {
                $(this).addClass('is-active');
            }
        });

        $("button.like").on("click", function (evt) {
            id = $(evt.target).attr("value");
            //alert(Cookies.get('shop_'+id+'_liked'));
            if (typeof Cookies.get('shop_' + id + '_liked') === 'undefined' || Cookies.get('shop_' + id + '_liked') === 0) {
                //no cookies
                Cookies.set('shop_' + id + '_liked', 1, {expires: 365});
                $(evt.target).addClass('is-active');
            } else {
                //have cookies
                $(evt.target).removeClass('is-active');
                Cookies.remove('shop_' + id + '_liked');
            }
        });
    });
</script>
</body>
</html>
