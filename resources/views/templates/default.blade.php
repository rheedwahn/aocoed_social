<!Doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>AOCOED | S.U SOCIAL NETWORK</title>
		    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="Description" content="A social networking site for the student of aocoed">
        <meta name="Keywords" content="SHare latest news in campus, post strange thing in campus, update livescores on match going on in each school e.t.c">
        

		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

{{-- <meta http-equiv="refresh" content="5" /> --}}


	</head>
	<body>
	    <style>
            .navbar, .navbar-default .navbar-collapse, .navbar-default .navbar-form {
                background-color: #17376e;
                font-family: times
                color:white;
            }
            .navbar-default .navbar-nav li>a:hover{
            	/*background-color: #ee7600;*/
            	color: #ffffff;
            }
            .navbar-default .navbar-brand {
                color: #fff;
                font-weight: bold;
            
            }
            .collapse .nav .dropdown-toggle{
            	color: #ffffff;
            }
            .navbar-default .navbar-nav .dropdown li>a{
            	color: #fff;
            }
            .navbar-default .navbar-nav li>a{
            	color: #ffffff;
            	font-weight: bold;
            }
            .navbar-default .navbar-nav li>a:hover{
            	background-color: #fff;
            	color: #17376e;
            }
            .navbar-default .navbar-brand {
                 background-color: #17376e;
            }

	    </style>
	    </style>
		@include('templates.partials.navigation')
		<div class="container">
			@include('templates.partials.alerts')
			@yield('content')	
		</div> <hr >
		<!--<div class="row">-->
		<!--    <div class="col-lg-4 col-lg-offset-4 col-xs-4 col-xs-offset-4">-->
		        
		<!--    </div>-->
		<!--</div>-->
		
	</body>

	<script src="{{ asset('js/main.js') }}"></script> 
	<script src="{{ asset('js/jquery.scroll.min.js') }}"></script>
	<script type="text/javascript">
        $('.pagination').hide();
        $(function() {
            $('.article').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="loader.gif" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.article',
                callback: function() {
                    $('.pagination').remove();
                }
            });
        });
    </script>
</html>