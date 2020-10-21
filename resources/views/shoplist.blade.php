@extends('user.layouts.default')

@section('title', "美食查詢-$area->area_name".($local_id && count($local_id)==1)?'・'.$area->subarea->where('id', '=', $local_id[0])->first()->area_name:''."-")

@section('bread_crumbs')
    @parent
    <li>></li>
    @if ($local_id && count($local_id)==1)
        <li><a href="/shoplist/{{$area->id}}/{{$local_id[0]}}">{{$area->area_name}}
                ・{{$area->subarea->where('id', '=', $local_id[0])->first()->area_name}}</a></li>
        <li>></li>
    @endif
    <li><span>查詢結果</span></li>
@endsection
