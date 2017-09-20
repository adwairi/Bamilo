<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Dashboard - PixelAdmin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,800,300&subset=latin" rel="stylesheet" type="text/css">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">

<!-- DEMO ONLY: Function for the proper stylesheet loading according to the demo settings -->
<script>function _pxDemo_loadStylesheet(a,b,c){var c=c||decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-theme")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"default"),d="rtl"===document.getElementsByTagName("html")[0].getAttribute("dir");document.write(a.replace(/^(.*?)((?:\.min)?\.css)$/,'<link href="$1'+(c.indexOf("dark")!==-1&&a.indexOf("/css/")!==-1&&a.indexOf("/themes/")===-1?"-dark":"")+(d&&a.indexOf("assets/")===-1?".rtl":"")+'$2" rel="stylesheet" type="text/css"'+(b?'class="'+b+'"':"")+">"))}</script>

<!-- DEMO ONLY: Set RTL direction -->
<script>"1"===decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-rtl")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"0")&&document.getElementsByTagName("html")[0].setAttribute("dir","rtl");</script>

<!-- DEMO ONLY: Load PixelAdmin core stylesheets -->
<script>
    _pxDemo_loadStylesheet('{{ asset('assets/pixel/dist/css/bootstrap.css') }}', 'px-demo-stylesheet-core');
    _pxDemo_loadStylesheet('{{ asset('assets/pixel/dist/css/pixeladmin.css') }}', 'px-demo-stylesheet-bs');
    _pxDemo_loadStylesheet('{{ asset('assets/pixel/dist/css/widgets.css') }}', 'px-demo-stylesheet-widgets');
</script>

<!-- DEMO ONLY: Load theme -->
<script>
    function _pxDemo_loadTheme(a){var b=decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-theme")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"default");_pxDemo_loadStylesheet(a+b+".min.css","px-demo-stylesheet-theme",b)}
    _pxDemo_loadTheme('{{ asset('assets/pixel/dist/css/themes/') }}/');
</script>

<!-- Demo assets -->
<script>_pxDemo_loadStylesheet('{{ asset('assets/pixel/dist/demo/demo.css') }}');</script>
<!-- / Demo assets -->

<script src="{{ asset('assets/pixel/dist/demo/demo.js') }}"></script>

<!-- holder.js -->
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.js"></script>


{{--<script src="{{ asset('assets/jsTree/dist/jstree.js') }}"></script>--}}
{{--<link rel="stylesheet" href="{{ asset('assets/jsTree/dist/themes/default/style.min.css') }}" />--}}