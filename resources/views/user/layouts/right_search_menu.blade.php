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
                    <input id="m_list" name="m_list_id" type="hidden" value="{{$area->id}}">
                </ul>
            </div>
            <div class="searchFood">
                <p class="typeTitle">分類</p>
                <ul class="main" id="food_menu">
                    @foreach ($food_list as $food_item)
                        <li class="f-list @if (isset($food) && $food->id==$food_item->id) is-active @endif">
                            <p class="mainList"><span>{{$food_item->food_name}}</span></p>
                            <ul class="sub">
                                <li>
                                    <input type="checkbox" id="master-food{{$food_item->id}}" name="master_food"
                                           value="{{$food_item->id}}"
                                           @if (isset($food) && $food->id==$food_item->id && !isset($sub_food_id))  checked @endif>
                                    <label for="master-food{{$food_item->id}}">全{{$food_item->food_name}}</label>
                                </li>
                                @foreach ($food_item->subfood->sortBy('order') as $food_sub)
                                    <li>
                                        <input type="checkbox" id="s-food{{$food_sub->id}}" name="sub_food[]"
                                               value="{{$food_sub->id}}"
                                               @if (isset($sub_food_id) && in_array($food_sub->id, $sub_food_id)) checked @endif>
                                        <label for="s-food{{$food_sub->id}}">{{$food_sub->food_name}}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    <input id="f_list" name="f_list_id" type="hidden" value="{{$food->id??null}}">
                </ul>
            </div>
            <div class="btnArea">
                <button type="submit" name="action" value="search" class="searchBtn">查詢</button>
                <button type="submit" name="action" value="ranking" class="rankingBtn" disabled>排行榜</button>
            </div>
        </div>
    </form>
</div>
