<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
        <a href="{{ url('curso/'.$curso->cur_url) }}">
            <img src="{{ url('imagenes/'.$curso->cur_icono)  }}" alt="product-img">
        </a>
    </div>
    <div class="card-content">
        <div class="row">
            <div class="col s2">
                <img src="{{ url('imagenes/'.$curso->profesor->prof_foto) }}" alt="" class="circle responsive-img valign profile-image">
            </div>
            <div class="col s7 no-padding">
                <p class="card-title grey-text text-darken-4">
                    <a href="{{ url('curso/'.$curso->cur_url) }}" class="grey-text truncate text-darken-4">{{ $curso->cur_nombre }}</a>
                    <span class="truncate descri">{{ $curso->cur_slogan }}</span>
                </p>
            </div>
            <div class="col s3">
                <p class="precio"><a href="" class="">@if($curso->cur_gratuito == 1) Gratis @else {!! formatMon($curso->cur_precio) !!} @endif</a></p>
            </div>
        </div>
    </div>
    <div class="card-action">
        <ul>
            <li>Por <a href="">{{ $curso->profesor->prof_nombre }}</a></li>
            <li><a href="">{{ $curso->categoria->cat_nombre }}</a></li>
            <!--<li><a href="">Premium</a></li>-->
        </ul>
    </div>
</div>
