@extends('layouts.cube')
@section('content')
    <form id="formCube" action="{{ url('createCube') }}" method="POST">
        <input type="hidden" value="{{ $test }}" name="test" id="test"/>
        <div class="form-group">
            <label for="n">Tamaño del Cubo</label>
            <input type="number" class="form-control" id="n" name="n" required />
        </div>
        <div class="form-group">
            <label for="m">N° Operaciones</label>
            <input type="number" class="form-control" id="m" name="m" required />
        </div>
        <button type="button" class="btn btn-success" onclick="createCube()">Crear Cubo</button>
    </form>
@endsection
@section('page-script')
    <script type="text/javascript">
		$(function(){
			initialValidateForm();
		});
		function createCube(){
			if($("#formCube").valid())
				$("#formCube").submit();
			else
				return false
		}
		function initialValidateForm(){
			$("#formCube").validate({
				lang: 'es',
				errorElement: 'div',
				errorClass: 'help-block',
				rules: {
					n: {
						min: 1,
						max: 100
					},
                    m: {
						min: 1,
						max: 1000
					}
				},
				messages: {
					n: {
						required: "Digite un numero mayor a 0",
						min: "Por favor, escribe un valor mayor o igual a {0}",
						max: "Por favor, escribe un valor menor o igual a {0}"
					},
                    m: {
						required: "Digite un numero mayor a 0",
						min: "Por favor, escribe un valor mayor o igual a {0}",
						max: "Por favor, escribe un valor menor o igual a {0}"
					}
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