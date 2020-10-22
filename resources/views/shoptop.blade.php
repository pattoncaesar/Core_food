<?php
//  TODO:  Refactor
$bread_crumbs = [
    ['url' => '/shoplist/' . $shop->areamain->id, 'context' => $shop->areamain->area_name],
    ['url' => '/shoplist/' . $shop->areamain->id . '/' . $shop->areasub->id, 'context' => $shop->areamain->area_name . '・' . $shop->areasub->area_name],
    ['url' => '', 'context' => '<span>' . $shop->shop_name . '-' . $shop->areamain->area_name . '-</span>'],
];

$header_h1 = $shop->shop_name . '-' . $shop->areamain->area_name . ' ' . $shop->areasub->area_name . '-';

?>


@extends('user.layouts.default',['data' => ['bread_crumbs' => $bread_crumbs, 'header_h1' => $header_h1]])

@push('styles')
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shoptop.css') }}" rel="stylesheet">
    <link href="{{ asset('js/woocommerce-FlexSlider-53570ee/flexslider.css') }}" rel="stylesheet">
@endpush

@section('title', $shop->shop_name.'-'.$shop->areamain->area_name."-")

@section('content')
    <h2>
        {{$shop->shop_name}}
    </h2>
    <div class="linkBtn">
        <button class="like u-hoverOpacity">LIKE</button>
        {{--        <a href="shopcomment/{{$shop->id}}" class="comment">分享文</a>--}}
    </div>
    <p class="shopTitle">
        {{$shop->main_title}}
    </p>
    <div class="introduction">
        {{$shop->shop_text}}
    </div>
    <div class="shopContents">
        <h3><span class="photo">PHOTO GALLERY</span></h3>
        @if (count($photos) > 1)
            <div class="flexslider photoSlider">
                <ul class="slides">
                    @foreach($photos as $photo)
                        <li><img src="{{ URL::asset('/img/shop/'.$photo) }}" alt=""></li>
                    @endforeach
                </ul>
                <div class="pagination"></div>
                <a href="#" class="flex-prev button-prev">Prev</a>
                <a href="#" class="flex-next button-next">Next</a>
            </div>
        @else
            <div class="photoSlider">
                <ul class="">
                    @foreach($photos as $photo)
                        <li><img src="{{ URL::asset('/img/shop/'.$photo) }}" alt=""></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="shopContents">
        <h3><span class="access">ACCESS</span></h3>
        <div class="accessmap">
            <iframe frameborder="0" scrolling="no" style="width:100%;height:380px; border-right:0px;"
                    src="//maps.google.com.tw/maps?f=q&amp;hl=zh-TW&amp;q={{$shop->lat_long}}&amp;z=17&amp;output=embed"></iframe>
        </div>
    </div>
    <div class="shopContents">
        <h3><span class="imformation">IMFORMATION</span></h3>
        <div class="shopInfo">
            <table>
                <tr>
                    <th>商家名稱</th>
                    <td>{{$shop->shop_name}}</td>
                </tr>
                <tr>
                    <th>商家分類</th>
                    <td>{{$foodmain_name}}</td>
                </tr>
                <tr>
                    <th>標籤</th>
                    <td>{{$food_name_sub}}</td>
                </tr>
                <tr>
                    <th>電話</th>
                    <td>{{$shop->tel}}</td>
                </tr>
                <tr>
                    <th>地址</th>
                    <td>{{$shop->address}}</td>
                </tr>
                <tr>
                    <th>捷運資訊</th>
                    <td>{{$shop->station}}</td>
                </tr>
                <tr>
                    <th>公休日</th>
                    <td>{{$shop->holiday}}</td>
                </tr>
                <tr>
                    <th>營業時間</th>
                    <td>{{$shop->open_time}}</td>
                </tr>
                <tr>
                    <th>營業資訊</th>
                    <td>{{$shop->shop_info}}</td>
                </tr>
                <tr>
                    <th>更新時間</th>
                    <td>{{$shop->updated_at}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.min.js') }}"></script>
    <script src="{{ asset('js/woocommerce-FlexSlider-53570ee/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('js/js.cookie.js') }}"></script>
@endpush
