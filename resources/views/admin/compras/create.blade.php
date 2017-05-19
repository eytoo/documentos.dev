@extends('admin.partials.formTemplate')

@section('formTitle')
	@if(isset($planta))
	Editar datos de la compra
	@else
	Nueva compra
	@endif
@stop

@section('formAction')
{{ route("compras.store") }}
@stop

@section('form')
	@if(isset($compra))
	<input type="hidden" name="id" value="{{ $compra->id }}">
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
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="estado">Estado</label>
                <select name="estado" required id="estado" class="form-control">
                    <option value=""> -- Selecciona -- </option>
                    <option {{ isset($compra) && $compra->estado == 1 ? 'selected' : '' }} value="1"> Abierto </option>
                    <option {{ isset($compra) && $compra->estado == 2 ? 'selected' : '' }} value="2"> Finalizado </option>
                </select>
            </div>
        </div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label" for="productor">Productor</label>
				<select name="productor" required id="productor" class="form-control select2">
					<option value=""> -- Selecciona -- </option>
					@forelse($productores as $p)
						<option {{ isset($compra) && $compra->productor_id == $p->id ? 'selected' : '' }} value="{{$p->id}}">{{ $p->nombre }}</option>
					@empty
					@endforelse
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label" for="fecha">Fecha</label>
				<input value="{{isset($compra)?date('Y-m-d',strtotime($compra->fecha)):date('Y-m-d')}}" type="date" name="fecha" class="form-control" id="fecha">
			</div>
		</div>
	</div>
	<legend><strong>Detalles de la compra | </strong><small>{{ getMoneda(conf()->precio_compra,3) }} * Kg</small></legend>
	<div class="row">
		<div class="compra-detalle col-md-12">
			@if(isset($compra))
				@forelse(json_decode($compra->detcompra->detalle) as $det)
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<div class="input-group">
									<input type="text" value="{{ $det->cantidad }}" placeholder="0.0" class="form-control inCantidad" pattern="^\\$?(([1-9](\\d*|\\d{0,2}(,\\d{3})*))|0)(\\.\\d{1,2})?$" required name="cantidad[]">
									<span class="input-group-addon">Kg</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">L.</span>
									<input type="text" value="{{ $det->precio }}" placeholder="0.00" class="form-control inPrecio" pattern="^\\$?(([1-9](\\d*|\\d{0,2}(,\\d{3})*))|0)(\\.\\d{1,2})?$" required name="precio[]">
								</div>
							</div>
						</div>
					</div>
				@empty
				@endforelse
			@else
				<div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<div class="input-group">
								<input id="cant-1" type="text" placeholder="0.0" class="form-control inCantidad" pattern="^\\$?(([1-9](\\d*|\\d{0,2}(,\\d{3})*))|0)(\\.\\d{1,2})?$" required name="cantidad[]">
								<span class="input-group-addon">Kg</span>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">L.</span>
								<input id="prec-1" type="text" placeholder="0.00" class="form-control inPrecio" pattern="^\\$?(([1-9](\\d*|\\d{0,2}(,\\d{3})*))|0)(\\.\\d{1,2})?$" required name="precio[]">
							</div>
						</div>
					</div>
				</div>
			@endif
		</div>
		<div class="compra-total col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group" style="text-align: -webkit-right">
						<button id="btnAddNew" type="button" class="btn btn-default"><i class="icon-plus"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">Peso total</label>
				<div class="input-group">
					<input value="{{ isset($compra)?$compra->detcompra->cantidad:'' }}" type="text" class="form-control inPesoTotal" required name="pesoTotal" placeholder="0.0">
					<span class="input-group-addon">Kg.</span>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">Precio total</label>
				<div class="input-group">
					<span class="input-group-addon">L.</span>
					<input value="{{ isset($compra)?$compra->detcompra->total_compra:'' }}" type="text" class="form-control inPrecioTotal" name="ptotal" placeholder="0.00">
				</div>
			</div>
		</div>
	</div>
@stop

@section("js")
	<script>
		var compra={
		    comp:{
				divCont: $(".compra-detalle"),
				btnAddNew: $("#btnAddNew"),
				txtCant: $(".inCantidad"),
				txtPrecio: $(".inPrecio"),
				txtPesoTotal: $(".inPesoTotal"),
				txtPrecioTotal: $(".inPrecioTotal")
			},
			init : function(){
				this.comp.btnAddNew.click(function () {
					compra.addNew($(".inCantidad").length + 1);
                });
                compra.eventos({
                    "inPeso": $(".inCantidad"),
                    "tInPeso": $(".inPesoTotal"),
                    "inPrecio": $(".inPrecio"),
                    "tInPrecio": $(".inPrecioTotal"),
                    "inBoni": $(".inBoni")
                });
            },
			addNew : function (cantidad) {
                this.comp.divCont.append(this.htmlAdd(cantidad));
                compra.eventos({
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
                    var pre_compra = {{ conf()->precio_compra }};
                    var id = $(this).attr("id").split("-")[1];
                    var inPre = $("#prec-"+ id);
                    inPre.val(compra.redondeo($(this).val() * pre_compra));
                    compra.eventoPrecio(params)
                    params.inPeso.each(function(index) {
                        s += parseFloat($(this).val());
                    });
                    params.tInPeso.val(compra.redondeo(s));
                    params.inBoni.val(s);
                });
                params.inPrecio.change(compra.eventoPrecio(params));
            },
            eventoPrecio:function(params){
        		var s = 0;
                params.inPrecio.each(function(index) {
                    s += parseFloat($(this).val());
                });
                if(!isNaN(s)){
                	params.tInPrecio.val(s);
                }
            },
            redondeo: function(numero)
			{
				var flotante = parseFloat(numero);
				var resultado = Math.round(flotante*100)/100;
				return resultado;
			},
			htmlAdd:function (c) {
				return 	'' +
					'<div class="row">'+
                    '<div class="col-md-9">'+
                    '<div class="form-group">'+
                    '<div class="input-group">'+
                    '<input type="text" placeholder="0.0" pattern="^\\$?(([1-9](\\d*|\\d{0,2}(,\\d{3})*))|0)(\\.\\d{1,2})?$" class="form-control inCantidad" id="cant-'+ c +'" required name="cantidad[]">'+
                    '<span class="input-group-addon">Kg</span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-md-3">'+
                    '<div class="form-group">'+
                    '<div class="input-group">'+
                    '<span class="input-group-addon">L.</span>'+
                    '<input type="text" id="prec-'+ c +'" placeholder="0.00" pattern="^\\$?(([1-9](\\d*|\\d{0,2}(,\\d{3})*))|0)(\\.\\d{1,2})?$" class="form-control inPrecio" required name="precio[]">'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>';
            }
		};

		$(document).ready(function () {
			compra.init();

        });
	</script>
@stop