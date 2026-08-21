<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
	<meta name="theme-color" content="#000000"/>
	<meta http-equiv="Content-Language" content="ru">
	<meta name="robots" content="{{ $robots }}">

	<meta name="csrf-token" content="{{ csrf_token() }}">


	<!--этот файл загружается чтоб ослиный браузер понимал html5-->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
    <![endif]-->

	<!-- <link rel="shortcut icon" href="/public/favicon.ico"/> -->
	
	<title>{{ $pageTitle }}</title> 

	<meta name="keywords"       content="{{ $pageKeywords }}">
	<meta name="description"    content="{{ $pageDescription }}">

    @if( isset( $keyName ) )
    <meta name="keyName"       content="{{ $keyName }}">
    @endif

    @if( isset( $lessonId ) )
    <meta name="lessonId"       content="{{ $lessonId }}">
    @endif

    @if( isset( $testId ) )
    <meta name="testId"       content="{{ $testId }}">
    @endif

	<link href= {{ $css_main }} rel="stylesheet">
	@yield('link_css')

    <link rel="icon" href="/public/favicon.ico" type="image/x-icon">


   

	

</head>	
		
<body>
	 
<div id = "app">
    <div class = 'backgroundContainer'>
        <div class = 'bodyContainer'>
            <div class = 'contentArea'>
                <header>
                    <nav>
                        @yield('topNav')
                    </nav>
                    <h1>{{ $pageHeader  }}</h1>

                    @yield('topHeaderInfo')
                </header>
                <main>
                    <div class = 'scrollContainer'
                        style = { maxHeight: 'calc( 100vh - 9em )' }
                    >
                        @yield('content')

                    </div>
                </main>

                <footer>
                    <span>2026г.</span>
                </footer>
            </div>
        </div>
    </div>
</div>
























    @yield('words_json')



	<script type="text/javascript" src={{ $js_vendors }}></script>
    @yield('script_js')


</body>
</html>
