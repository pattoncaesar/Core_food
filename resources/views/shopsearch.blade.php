<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no,address=no,email=no">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="{{ URL::asset('/css/common.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/search.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/js/jquery-migrate-3.0.min.js') }}"></script>
    <script src="{{ URL::asset('/js/js.cookie.js') }}"></script>


    <?php if (isset($area_main_name)&&$area_main_name!=null): ?>
    <title>美食查詢-{area_main_name}-</title>
    <?php else: ?>
    <title>美食查詢</title>
    <?php endif ?>
</head>
<body>
<header>
    <?php if (isset($area_main_name)&&$area_main_name!=null): ?>
    <h1><span>{query} 美食查詢</span></h1>
    <?php else: ?>
    <h1><span>美食查詢</span></h1>
    <?php endif ?>

    <div class="headerLogo">
        <a href="search"><img src="{{ URL::asset('/img/logo.png') }}" alt="LOGO"></a>
    </div>
</header>
<div class="f-breadCrumbs u-container">
    <ul>
        <li><a href="search">首頁</a></li>
        <li>></li>
        <?php if (isset($main_area)&&$main_area!=null): ?>
        <li><a href="search/{main_area}">{area_main_name}</a></li>
        <li>></li>
        <?php if (isset($sub_area)&&$sub_area!=null): ?>
        <li><a href="search/{main_area}/{sub_area}">{area_main_name}・{area_subs_name}</a></li>
        <li>></li>
        <?php endif ?>

        <?php endif ?>
        <li><span>查詢結果</span></li>
    </ul>
</div>
<div class="f-mainContents u-container">
    <div class="mainWrap">
        <?php if (isset($area_main_name)&&$area_main_name!=null): ?>
        <h2>{query} 查詢結果</h2>
        <?php else: ?>
        <h2>查詢結果</h2>
        <?php endif ?>

        <div class="m-pager">
            <ul>
                <li><span>1</span></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">5</a></li>
                <li><a href="">＞</a></li>
            </ul>
        </div>
        <div class="m-shopList">
            <ul>
                {shops}
                <li class="shopData">
                    <div class="shopHead">
                        <a href="shoptop/{id}">{shop_name}</a>
                    </div>
                    <div class="shopDetail">
                        <div class="photo">
                            <img src="{{ URL::asset('/img/shop/{photo_num}.png') }}" alt="">
                        </div>
                        <div class="info">
                            <div class="shopTitle">
                                <p>{main_title}</p>
                            </div>
                            <table>
                                <tr>
                                    <th>分類</th>
                                    <td>{food_name_main}</td>
                                </tr>
                                <tr>
                                    <th>標籤</th>
                                    <td>
                                        <ul class="foodTags">
                                            <li>{food_name_sub}</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>營業時間</th>
                                    <td>{open_time}</td>
                                </tr>
                                <tr>
                                    <th>地址</th>
                                    <td>{address}</td>
                                </tr>
                            </table>
                            <div class="linkBtn">
                                <button class="like u-hoverOpacity" value="{id}">LIKE</button>
                            </div>
                        </div>
                    </div>
                </li>
                {/shops}
            </ul>
        </div>
        <div class="m-pager">
            <ul>
                <li><span>1</span></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">5</a></li>
                <li><a href="">＞</a></li>
            </ul>
        </div>
    </div>
    <div class="rightWrap">
        <div class="r-searchMenu">
            <p class="searchTitle"><span>查詢</span></p>
            <div class="searchArea">
                <p class="typeTitle">地點</p>
                <ul class="main">
                    <li class="m-list is-active">
                        <p class="mainList"><span>台北市</span></p>
                        <ul class="sub">
                            <li>
                                <input type="checkbox" id="s-area0">
                                <label for="s-area0">全台北市</label>
                            </li>
                            <li>
                                <input type="checkbox" id="s-area1" checked>
                                <label for="s-area1">信義區</label>
                            </li>
                            <li>
                                <input type="checkbox" id="s-area2">
                                <label for="s-area2">士林區</label>
                            </li>
                        </ul>
                    </li>
                    <li class="m-list">
                        <p class="mainList"><span>新北市</span></p>
                    </li>
                </ul>
            </div>
            <div class="searchFood">
                <p class="typeTitle">分類</p>
                <ul class="main">
                    <li class="m-list">
                        <p class="mainList"><span>中式料理</span></p>
                    </li>
                    <li class="m-list is-active">
                        <p class="mainList"><span>日式料理</span></p>
                        <ul class="sub">
                            <li>
                                <input type="checkbox" id="s-genre0">
                                <label for="s-genre0">全日式料理</label>
                            </li>
                            <li>
                                <input type="checkbox" id="s-genre1" checked>
                                <label for="s-genre1">居酒屋</label>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="btnArea">
                <button class="searchBtn">查詢</button>
                <button class="rankingBtn">排行榜</button>
            </div>
        </div>
    </div>
</div>
<footer class="f-footer">
    <div class="footerLogo">
        <a href="">
            <img src="{{ URL::asset('/img/logo.png') }}" alt="LOGO">
        </a>
    </div>
</footer>

<script type="text/javascript" charset="utf-8">
    $(window).load(function() {

        $("button.like").each(function() {
            id = $(this).attr("value");
            if (typeof Cookies.get('shop_'+id+'_liked') === 'undefined'||Cookies.get('shop_'+id+'_liked')===0){
                //no cookie
                $(this).removeClass('is-active');
            }
            else
            {
                $(this).addClass('is-active');
            }
        });




        $("button.like").on("click", function (evt) {
            id = $(evt.target).attr("value");
            //alert(Cookies.get('shop_'+id+'_liked'));
            if (typeof Cookies.get('shop_'+id+'_liked') === 'undefined'||Cookies.get('shop_'+id+'_liked')===0){
                //no cookies
                Cookies.set('shop_'+id+'_liked',1, { expires: 365 });
                $(evt.target).addClass('is-active');
            } else {
                //have cookies
                $(evt.target).removeClass('is-active');
                Cookies.remove('shop_'+id+'_liked');

            }
        });

    });
</script>

</body>
</html>
