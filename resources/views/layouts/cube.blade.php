<!DOCTYPE html>
<html>
    <head>
        <title>Cube Summation</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav class="navbar navbar-default ">
            <div class="container-fluid bg-warning">
                <div class="navbar-header ">
                    <a class="navbar-brand" href="#">Cube Summation</a>
                </div>
            </div>
        </nav>
        <div class="container" id="main">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @yield('content')
                </div>
            </div>
        </div>    
    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
@yield('page-script')