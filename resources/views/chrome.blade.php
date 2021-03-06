<!DOCTYPE html>
<html lang="en" ng-app>
<head>
	<title>READI Writer's Hub</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap + Template -->
	<link href="{{ asset('/css/app_template.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/app_custom.css') }}" rel="stylesheet">

	<!-- Custom Fonts -->
 	<link href='https://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{asset('owlcarousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('owlcarousel/owl.theme.default.min.css')}}">
</head>
<footer>
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/templates.js') }}"></script>
	<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'textcolor link image',
			toolbar: 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			menubar: false,
			forced_root_block : "",
			force_br_newlines : true,
			force_p_newlines : false,
			content_css: "css/app_custom.css",
			setup : function(ed){
				ed.on('init', function(){
					this.getDoc().body.style.fontSize = '14px';
				});
			}
		});
	</script>

</footer>

<body oncontextmenu="return false">
	@yield('app')
</body>

<script language="javascript">
	document.onmousedown=disableclick;
//	status="ทางการ";
	function disableclick(event)
	{
		if(event.button==2)
		{
//			alert(status);
			return false;
		}
	}
</script>

</html>
