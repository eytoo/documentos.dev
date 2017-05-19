@extends('admin.partials.formTemplate')

@section('formTitle')
	@if(isset($planta))
	Editar datos de la venta
	@else
	Nueva venta
	@endif
@stop

@section('formAction')
{{ route("ventas.store") }}
@stop

@section('form')
	@if(isset($venta))
	<input type="hidden" name="id" value="{{ $venta->id }}">
	@endif
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="name">Código</label>
				<div class="input-group">
                    <span class="input-group-addon"><i class="icon-hashtag"></i></span>
                    <input value="{{ $codigo }}" type="text" class="form-control" disabled>
                </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label" for="productor">Cliente</label>
				<select name="cliente" required id="productor" class="form-control select2">
					<option value=""> -- Selecciona -- </option>
					@forelse($clientes as $p)
						<option {{ isset($venta) && $venta->planta_id == $p->id ? 'selected' : '' }} value="{{$p->id}}">{{ $p->nombre }}</option>
					@empty
					@endforelse
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label" for="fecha">Fecha</label>
				<input value="{{isset($venta)?date('Y-m-d',strtotime($venta->fecha)):date('Y-m-d')}}" type="date" name="fecha" class="form-control" id="fecha">
			</div>
		</div>
	</div>
	<legend><strong>Detalles de la venta | </strong><small>{{ getMoneda(conf()->precio_venta,3) }} * Kg</small></legend>
    <div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">Peso total</label>
				<div class="input-group">
					<input id="cant-1" value="{{ isset($venta)?$venta->peso:'' }}" type="text" class="form-control inPesoTotal" required name="pesoTotal" placeholder="0.0">
					<span class="input-group-addon">Kg.</span>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">Precio total</label>
				<div class="input-group">
					<span class="input-group-addon">L.</span>
					<input id="prec-1" value="{{ isset($venta)?$venta->total_venta:'' }}" type="text" class="form-control inPrecioTotal" name="ptotal" placeholder="0.00">
				</div>
			</div>
		</div>
	</div>
@stop

@section("js")
	<script>
		var venta={
		    comp:{
				divCont: $(".venta-detalle"),
				btnAddNew: $("#btnAddNew"),
				txtCant: $(".inCantidad"),
				txtPrecio: $(".inPrecio"),
				txtPesoTotal: $(".inPesoTotal"),
				txtPrecioTotal: $(".inPrecioTotal")
			},
			init : function(){
				this.comp.btnAddNew.click(function () {
					venta.addNew();
                });
                venta.eventos({
                    "inPeso": $(".inPesoTotal"),
                    "tInPeso": $(".inPesoTotal"),
                    "inPrecio": $(".inPrecio"),
                    "tInPrecio": $(".inPrecioTotal"),
                    "inBoni": $(".inBoni")
                });
            },
			addNew : function () {
                this.comp.divCont.append(this.htmlAdd());
                venta.eventos({
                    "inPeso": $(".inCantidad"),
					"tInPeso": $(".inPesoTotal"),
					"inPrecio": $(".inPrecio"),
					"tInPrecio": $(".inPrecioTotal"),
					"inBoni": $(".inBoni")
				});
            },
			eventos: function (params) {
                params.inPeso.change(function() {
                    var s = 0;
                    var pre_venta = {{ conf()->precio_venta }};
                    var id = $(this).attr("id").split("-")[1];
                    var inPre = $("#prec-"+ id);
                    inPre.val(venta.redondeo($(this).val() * pre_venta));
                });
            },
            redondeo: function(numero)
			{
				var flotante = parseFloat(numero);
				var resultado = Math.round(flotante*100)/100;
				return resultado;
			},
			htmlAdd:function () {
				return 	'' +
					'<div class="row">'+
                    '<div class="col-md-9">'+
                    '<div class="form-group">'+
                    '<div class="input-group">'+
                    '<input type="text" placeholder="0.0" pattern="^\\$?(([1-9](\\d*|\\d{0,2}(,\\d{3})*))|0)(\\.\\d{1,2})?$" class="form-control inCantidad" required name="cantidad[]">'+
                    '<span class="input-group-addon">Kg</span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-md-3">'+
                    '<div class="form-group">'+
                    '<div class="input-group">'+
                    '<span class="input-group-addon">L.</span>'+
                    '<input type="text" placeholder="0.00" pattern="^\\$?(([1-9](\\d*|\\d{0,2}(,\\d{3})*))|0)(\\.\\d{1,2})?$" class="form-control inPrecio" required name="precio[]">'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>';
            }
		};

		$(document).ready(function () {
			venta.init();

        });
	</script>
@stop