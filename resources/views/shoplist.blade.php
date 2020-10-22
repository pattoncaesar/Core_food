<?php
//  TODO:  Refactor
$bread_crumbs = [
    ['url' => '/shoplist/' . $area->id, 'context' => $area->area_name],
];

if (isset($local_id) && count($local_id) == 1)
    array_push($bread_crumbs,
        ['url' => '/shoplist/' . $area->id . '/' . $local_id[0], 'context' => $area->area_name . '・' . $area->subarea->where('id', '=', $local_id[0])->first()->area_name]
    );

array_push($bread_crumbs,
    ['url' => '', 'context' => '<span>查詢結果</span>']
);

$header_h1 = $area->area_name . ((isset($local_id) && count($local_id) == 1) ? '・{{$area->subarea->where("id", "=", $local_id[0])->first()->area_name' : '') . '美食查詢';

$b_right_search_menu = true;
?>

@extends('user.layouts.default',['data' => ['bread_crumbs' => $bread_crumbs, 'header_h1' => $header_h1, 'b_right_search_menu' => $b_right_search_menu]])

@push('styles')
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
@endpush

@section('title', "美食查詢-".$area->area_name.((isset($local_id) && count($local_id)==1)?('・'.$area->subarea->where('id', '=', $local_id[0])->first()->area_name):'')."-")

@section('content')
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
@endsection

