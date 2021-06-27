<div class="euro-box">
    <div class="triangle"></div>
    <div class="item-box p-4" style="">
        <h4 class="font-size-16 font-weight-bold text-center mb-4">أسعار العملات</h4>
        @if($currency)
            @foreach($currency as $curr)
        <div class="itm d-flex align-items-center  border-bottom pb-3  mt-3">
            <span class="ml-auto">{{$curr->getCurrency($curr->currency)}} /شيكل</span>
            <span class="text-gray-600">{{$curr->equivalentILS}}</span>
        </div>
            @endforeach
        @endif

    </div>
</div>
