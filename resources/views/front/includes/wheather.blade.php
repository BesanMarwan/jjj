<div class="wheather-box">
    <div class="triangle"></div>
    <div class="item-box px-4 py-3">
        <h5 class="font-size-16 font-weight-bold text-center mb-1">حالة الطقس </h5>
        <p>القدس / فلسطين </p>
        <i class="fas fa-cloud-sun fa-3x"></i>
        <span class="d-block">{{getDateArabic(date('l'))}}</span>
        <span class="d-block">{{$weather->temp}}</span>


    </div>

</div>
