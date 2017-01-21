@extends('layouts.cube')
@section('content')
	<h4 class="page-title">Configura el cubo</h4>
	<form id="formTest" action="{{ url('create') }}" method="POST">
		<div class="form-group">
			<label for="test">N° Pruebas</label>
			<input type="number" class="form-control" id="test" name="test" required/>
		</div>
		<button class="btn btn-info" type="button" onclick="startTest()">Empezar Prueba</button>
	</form>
@endsection
@section('page-script')
	<script type="text/javascript">
		$(function(){
			initializeValidateForm();
		});
		function startTest(){
			if($("#formTest").valid())
				$("#formTest").submit();
			else
				return false
		}
		function initializeValidateForm(){
			$("#formTest").validate({
				lang: 'es',
				errorElement: 'div',
				errorClass: 'help-block',
				rules: {
					test: {
						min: 1,
						max: 50
					}
				},
				messages: {
					test: {
						required: "Digite un numero mayor a 0",
						min: "Por favor, escribe un valor mayor o igual a {0}",
						max: "Por favor, escribe un valor menor o igual a {0}"
					},
				},
				highlight: function (e) {
					$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
				},

				success: function (el) {
					$(el).closest('.form-group').removeClass('has-error');
					$(el).remove();
				},
				submitHandler: function (form) {
					form.submit();
				},
				invalidHandler: function (form) {
					console.log("validate")
				}
			});
		}
	</script>
@endsection