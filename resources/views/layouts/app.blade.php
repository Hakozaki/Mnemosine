<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mnemosine') }}</title>
    
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
    
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                            'csrfToken' => csrf_token(),
                        ]); ?>
    </script>
</head>

<!-- import jquery  -->
<script src="/js/jquery-3.1.1.min.js"></script>
<!-- -->
<script>
    jQuery(function ($) {
        $(".alertPrincipal").delay(4000).slideUp(200, function() {
            //console.log($(this));            
            //$(this).alert('dispose');                        
        });
    });
</script>

<body>
    <div id="app">
        @include('layouts.includes.navbar')
        
        @if(Session::has('flash_message'))
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div align="center" class="alertPrincipal alert {{ Session::get('flash_message')['class'] }}">
                             <strong>{{ Session::get('flash_message')['label'] }} !   </strong>   {{ Session::get('flash_message')['msg'] }}
                        </div>
                    </div>
                </div>
            </div>
	    @endif
        
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
