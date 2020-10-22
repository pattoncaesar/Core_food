<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no,address=no,email=no">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    @stack('styles')
    <title>@yield('title')</title>
</head>
<body>

@include('user.layouts.header', ['data' => $data['header_h1']])

@include('user.layouts.bread_crumbs', ['data' => $data['bread_crumbs']])

<div class="f-mainContents u-container">
    <div class="mainWrap">
        @yield('content')
    </div>

    @includeWhen(isset($data['b_right_search_menu'])&&$data['b_right_search_menu']==true,'user.layouts.right_search_menu')

</div>

@include('user.layouts.footer')

@stack('scripts')
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
        $('li.f-list').click(function () {
            var $f_list_old = $('.f-list.is-active').find('ul > li > input');
            $f_list_old.prop("checked", false);
            $('.f-list.is-active').removeClass('is-active');

            var $f_list_new = $(this).closest('li').find('ul > li:first > input');
            $f_list_new.prop("checked", true);
            $(this).addClass('is-active');

            $('#f_list').val($f_list_new.val());
        });

        $("input[id^='master-food'], label[for^='master-food']").click(function () {
            var $sub_food = $(this).closest('ul').find('li > input').slice(1);
            $sub_food.prop("checked", false);
            event.stopPropagation();
        });

        $("input[id^='s-food'], label[for^='s-food']").click(function () {
            var $master_food = $(this).closest('ul').find('li:first > input');
            $master_food.prop("checked", false);
            event.stopPropagation();

            $('#f_list').val($master_food.val());
        });

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
