@extends('layouts.cube')
@section('content')
    @for ($i = 1; $i <= $m; $i++)
        <h4 class="page-title" id="tittle_{{ $i }}">Seleccione el comando {{ $i }}</h4>
        <div class="form-group">
            <button class="btn btn-success query" type="button" queryId="query_{{ $i }}" m="{{ $i }}">Consulta</button>
            <button class="btn btn-info update" type="button" updateId="update_{{ $i }}" m="{{ $i }}">Actualizar</button>
        </div>
        <div id="query_{{ $i }}" style="display:none;">
            <form id="formularioQuery_{{ $i }}">
                <div class="form-group">
                    <label for="x1">x1</label>
                    <input type="number" class="form-control" id="x1" name="x1" required/>
                    <label for="y1">y1</label>
                    <input type="number" class="form-control" id="y1" name="y1" required/>
                    <label for="z1">z1</label>
                    <input type="number" class="form-control" id="z1" name="z1" required/>
                </div>
                <div class="form-group">
                    <label for="x2">x2</label>
                    <input type="number" class="form-control" id="x2" name="x2" required/>
                    <label for="y2">y2</label>
                    <input type="number" class="form-control" id="y2" name="y2" required/>
                    <label for="z2">z2</label>
                    <input type="number" class="form-control" id="z2" name="z2" required/>
                </div>
            </form>
            <button id="buttonQuery_{{ $i }}" class="btn btn-info buttonQuery" formId="formularioQuery_{{ $i }}" m="{{ $i }}">Ejecutar</button>
        </div>
        <label id="resultado_{{ $i }}" style="display:none;"></label>
        <div id="update_{{ $i }}" style="display:none;">
            <form id="formularioUpdate_{{ $i }}">
                <div class="form-group">
                    <label for="x">x</label>
                    <input type="number" class="form-control" id="x" name="x" required/>
                    <label for="y">y</label>
                    <input type="number" class="form-control" id="y" name="y" required/>
                    <label for="z">z</label>
                    <input type="number" class="form-control" id="z" name="z" required/>
                    <label for="value">valor</label>
                    <input type="number" class="form-control" id="value" name="value" required/>
                </div>
            </form>
            <button id="buttonUpdate_{{ $i }}" class="btn btn-info buttonUpdate" formId="formularioUpdate_{{ $i }}" m="{{ $i }}">Ejecutar</button>
        </div>
    @endfor
@endsection
@section('page-script')
	<script type="text/javascript">
		$(function(){
			initializeQuery();
			initializeUpdate();
			serializeForm();
		});
		function serializeForm(){
			$.fn.serializeObject = function () {
                var o = {};
                var a = this.serializeArray();
                $.each(a, function () {
                    if (o[this.name] !== undefined) {
                        if (!o[this.name].push) {
                            o[this.name] = [o[this.name]];
                        }
                        o[this.name].push(this.value || '');
                    } else {
                        o[this.name] = this.value || '';
                    }
                });
                return o;
            };
		}
		function initializeQuery(){
			$(".query").click(function(){
				var m = $(this).attr('m');
				var id = $(this).attr('queryId');
				$("#" + id).show();
				$("#update_" + m).hide();
			});
			$(".buttonQuery").click(function(){
				var m = $(this).attr('m');
				var formId = $(this).attr('formId');
				var obj = $("#" + formId).serializeObject();
				$.ajax(
				{
					url: "{{ url('query') }}",
					type: 'POST',
					data: obj,
					success: function (data)
					{
						$("#query_" + m).hide();
                        $("#update_" + m).hide();
                        $(".query[queryId=query_" + m + "]").hide();
                        $(".update[updateId=update_" + m + "]").hide();
                        $("#tittle_" + m).text('Comando ejecutado exitosamente')
                        $("#tittle_" + m).attr('class','alert alert-success')
                        $("#resultado_" + m).text('El resultado de la consulta es: ' + data.result)
                        $("#resultado_" + m).show()
					}
				});
			});
		}
		function initializeUpdate(){
			$(".update").click(function(){
				var m = $(this).attr('m');
				var id = $(this).attr('updateId');
				$("#" + id).show();
				$("#query_" + m).hide();
			});
			$(".buttonUpdate").click(function(){
				var m = $(this).attr('m');
				var formId = $(this).attr('formId');
				var obj = $("#" + formId).serializeObject();
				$.ajax(
				{
					url: "{{ url('update') }}",
					type: 'POST',
					data: obj,
					success: function (data)
					{
						if(data)
                            $("#query_" + m).hide();
                            $("#update_" + m).hide();
                            $(".query[queryId=query_" + m + "]").hide();
                            $(".update[updateId=update_" + m + "]").hide();
                            $("#tittle_" + m).text('Comando ejecutado exitosamente')
                            $("#tittle_" + m).attr('class','alert alert-success')
					}
				});
			});
		}
	</script>
@endsection