<div class="card">
    <div class="card-image waves-effect waves-block waves-light">   
        <a href="{{ url('post/'.$post->post_url) }}">
             <img src="{{ url('imagenes/'.$post->post_imagen) }}" alt="{{ $post->post_nombre }}">
        </a>                                            
    </div>                                        
    <div class="card-content">
        <div class="row sin-margin">
            <div class="col s3">
             <div class="fecha">
             <h5>{{ date("d",strtotime($post->created_at)) }}</h5>
                 <span>{{ getIniMes($post->created_at) }}.</span>
             </div>                                                   
         </div>
         <div class="col s9">
            <p class="card-title grey-text text-darken-4">                                    
                <a href="{{ url('post/'.$post->post_url) }}" class="grey-text truncate text-darken-4">{{ $post->post_nombre }}</a>
                <span class="descri">{{ $post->post_resumen }}.</span>
            </p>
        </div>
    </div>
</div>
<div class="card-action">
    <ul>
        <li>Por <a href="">{{ $post->profesor->prof_nombre }}</a></li>  
        <li><a href="">{{ $post->categoria->pos_cat_nombre }}</a></li>      
        <li><a href=""><i class="fa fa-comments" aria-hidden="true"></i></a> 21</li>      
    </ul>                                            
</div>
</div> 