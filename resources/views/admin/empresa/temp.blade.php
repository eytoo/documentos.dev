@extends('layouts.admin.app')

@section('content')
<section id="basic-tag-input">
  <div class="row">
    <div class="col-lg-3">
      <ul class="list-group">
        <li class="list-group-item"><a href="/admin/empresa"><i class="icon-cog"></i> Precios</a></li>
        <li class="list-group-item"><a href="/admin/emp/bono"><i class="icon-cog"></i> Bonificación</a></li>
        <li class="list-group-item"><a href="/admin/emp/cantidad"><i class="icon-cog"></i> Cantidad</a></li>
        <li class="list-group-item"><a href="/admin/emp/backups"><i class="icon-cog"></i> Backups</a></li>
      </ul>
    </div>
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">@yield("title")</h4>
          <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
              <li><a data-action="close"><i class="icon-cross2"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse in">
          <div class="card-block">
            @yield("cont")
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@yield("add")

@endsection