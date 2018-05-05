<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bootstrap Example</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/player.css') }}" rel="stylesheet">
        <link href="{{ asset('css/equalizer.css') }}" rel="stylesheet">

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- -->
			<script src="{{ asset('js/routes.js') }}"></script>
        	<script src="{{ asset('js/router.js') }}"></script>
        <!-- -->
		<script src="{{ asset('js/VlcAPI.js') }}"></script>
        <script src="{{ asset('js/VlcInterface.js') }}"></script>

	</head>
<body>

</body>
</html>