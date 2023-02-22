<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="language" content="pt-br" />  
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    
    <meta name="author" content="Informática Livre"/>
    <meta name="url" content="{{$configuracoes->dominio}}" />
    <meta name="keywords" content="{{$configuracoes->metatags}}">
    <meta name="description" content="{{$configuracoes->descricao}}"/>
    <meta name="rating" content="general">
    <meta name="distribution" content="local">
    <meta name="date" content="Dec 26">

    {!! $head ?? '' !!}

    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{$configuracoes->getfaveicon()}}"/>
    <link rel="apple-touch-icon" href="{{$configuracoes->getfaveicon()}}"/>
    <link rel="apple-touch-icon" sizes="72x72" href="{{$configuracoes->getfaveicon()}}"/>
    <link rel="apple-touch-icon" sizes="114x114" href="{{$configuracoes->getfaveicon()}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">    
        
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{url(asset('frontend/assets/css/bootstrap.min.css'))}}">
    <link rel="stylesheet" href="{{url(asset('frontend/assets/css/font-awesome.min.css'))}}">
    <link rel="stylesheet" href="{{url(asset('frontend/assets/css/owl.carousel.min.css'))}}">
    <link rel="stylesheet" href="{{url(asset('frontend/assets/css/magnific-popup.css'))}}">
    <link rel="stylesheet" href="{{url(asset('frontend/assets/css/animate.css'))}}">
    <link rel="stylesheet" href="{{url(asset('frontend/assets/css/main.css'))}}">
    <link rel="stylesheet" href="{{url(asset('frontend/assets/css/style.css'))}}">
    <link rel="stylesheet" href="{{url(asset('frontend/assets/css/meanmenu.min.css'))}}">
    <link rel="stylesheet" href="{{url(asset('frontend/assets/css/responsive.css'))}}">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @hasSection('css')
        @yield('css')
    @endif 
    
  </head>
  <body>    
    <header>
        <div class="hd-style1">
            <div class="hd-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="hd-lft">
                                <ul>
                                    @if ($configuracoes->email)
                                    <li><i class="fa fa-envelope-o"></i><a class="a-topbar" href="mailto:{{$configuracoes->email}}">{{$configuracoes->email}}</a></li>
                                    @endif
                                    @if ($configuracoes->whatsapp)
                                    <li><i class="fa fa-whatsapp"></i><a class="a-topbar" target="_blank" href="{{getNumZap($configuracoes->whatsapp ,'Atendimento '.$configuracoes->nomedosite)}}">{{$configuracoes->whatsapp}}</a></li>                                       
                                    @endif                                                                        
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="hd-rgt">
                                <ul>
                                    @if ($configuracoes->facebook)
                                        <li><a target="_blank" href="{{$configuracoes->facebook}}" class="fa fa-facebook"></a></li>
                                    @endif
                                    @if ($configuracoes->twitter)
                                        <li><a target="_blank" href="{{$configuracoes->twitter}}" class="fa fa-twitter"></a></li>
                                    @endif
                                    @if ($configuracoes->instagram)
                                        <li><a target="_blank" href="{{$configuracoes->instagram}}" class="fa fa-instagram"></a></li>
                                    @endif                                     
                                    @if ($configuracoes->linkedin)
                                        <li><a target="_blank" href="{{$configuracoes->linkedin}}" class="fa fa-linkedin"></a></li>
                                    @endif                                     
                                    @if ($configuracoes->youtube)
                                        <li><a target="_blank" href="{{$configuracoes->youtube}}" class="fa fa-youtube"></a></li>
                                    @endif                                     
                                </ul>
                                <!--<span style="margin-left: 20px;" class="follow-title">Colaborador</span>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="mnmenu-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 nav-menu">
                            <div class="col-md-3">
                                <div class="logo">
                                    <a href="{{route('web.home')}}">
                                        <img src="{{$configuracoes->getLogomarca()}}" alt="Black Soldiers Serviços" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-9"> 
                                <div class="menu">
                                    <nav id="main-menu" class="main-menu">
                                        <ul>
                                            <li class=""><a href="{{route('web.home')}}">Início</a></li>
                                            <li class=""><a href="https://localhost/Black-Soldiers/public/pagina/quem-somos">Quem Somos</a></li>
                                            <li class=""><a href="{{route('web.servicos')}}">Serviços</a></li>
                                            <li><a href="javascript:void(0)">Atendimento<i class="fa fa-angle-down"></i></a>
                                                <ul>
                                                    <li class=""><a href="{{route('web.atendimento')}}">Fale Conosco</a></li>
                                                    <li class=""><a href="{{route('web.trabalhe')}}">Trabalhe Conosco</a></li>
                                                    <li class=""><a href="{{route('web.redes')}}">Redes Sociais</a></li>
                                                    <li class=""><a href="{{route('web.fornecedores')}}">Seja Nosso Parceiro</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!--<div class="menu-icon">
                                        <div class="site-search">
                                            <i class="fa fa-search"></i>
                                            <div class="search-forum">
                                                <form action="#">
                                                    <input placeholder="Pesquisar no site" type="text">
                                                    <input type="submit" value="OK" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
        
    @yield('content')       

    <footer>
        <div class="footer-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12" style="margin-bottom: 20px;">
                        <div class="footer-wedget-one">
                            <a href="index.html">
                                <img src="{{$configuracoes->getLogomarca()}}" alt="Black Soldiers Serviços" />
                            </a>
                            <p>{{$configuracoes->descricao}}</p>
                            <div class="footer-social-profile">
                                <ul>
                                    @if ($configuracoes->facebook)
                                        <li><a target="_blank" href="{{$configuracoes->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                    @endif
                                    @if ($configuracoes->twitter)
                                        <li><a target="_blank" href="{{$configuracoes->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if ($configuracoes->instagram)
                                        <li><a target="_blank" href="{{$configuracoes->instagram}}"><i class="fa fa-instagram"></i></a></li>
                                    @endif
                                    @if ($configuracoes->linkedin)
                                        <li><a target="_blank" href="{{$configuracoes->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                                    @endif
                                    @if ($configuracoes->youtube)
                                        <li><a target="_blank" href="{{$configuracoes->youtube}}"><i class="fa fa-youtube"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>                
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-widget-menu">
                            <h2>Black Soldiers</h2>
                            <ul>
                                <li><a href="{{route('web.parceiros')}}">Parceiros</a></li>                                
                                <li><a href="{{route('web.politica')}}">LGPD</a></li>
                                <li><a href="javascript:void(0)">Covid-19 Ações</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6">
                        <div class="footer-wedget-four">
                            <h2>Atendimento </h2>
                            <div class="inner-box">
                                <div class="media">
                                    <div class="inner-item">
                                        <div class="media-left">
                                            <span class="icon"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                        <div class="media-body">
                                            @if($configuracoes->rua)	
                                                <span>{{$configuracoes->rua}}
                                                @if($configuracoes->num)
                                                , {{$configuracoes->num}}
                                                @endif
                                                @if($configuracoes->bairro)
                                                , {{$configuracoes->bairro}}
                                                @endif</span>
                                                @if($configuracoes->cidade)  
                                                <span>{{getCidadeNome($configuracoes->cidade, 'cidades')}}</span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="media">                                    
                                    @if ($configuracoes->email)
                                        <div class="inner-item">
                                            <div class="media-left">
                                                <span class="icon"><i class="fa fa-envelope-o"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <span class="inner-text"><a class="a-topbar" href="mailto:{{$configuracoes->email}}">{{$configuracoes->email}}</a></span>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($configuracoes->email1)
                                        <div class="inner-item">
                                            <div class="media-left">
                                                <span class="icon"><i class="fa fa-envelope-o"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <span class="inner-text"><a class="a-topbar" href="mailto:{{$configuracoes->email1}}">{{$configuracoes->email1}}</a></span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="media">                                        
                                    @if($configuracoes->whatsapp)
                                        <div class="inner-item">
                                            <div class="media-left">
                                                <span class="icon"><i class="fa fa-whatsapp"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <span class="inner-text"><a class="a-topbar" target="_blank" href="{{getNumZap($configuracoes->whatsapp ,'Atendimento '.$configuracoes->nomedosite)}}">{{$configuracoes->whatsapp}}</a></span>
                                            </div>
                                        </div> 
                                    @endif                                         
                                    @if($configuracoes->telefone1)
                                        <div class="inner-item">
                                            <div class="media-left">
                                                <span class="icon"><i class="fa fa-phone"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <span class="inner-text">
                                                    {{$configuracoes->telefone1}}
                                                    @if ($configuracoes->telefone2 && $configuracoes->telefone1)
                                                        - {{$configuracoes->telefone2}}
                                                    @else
                                                        {{$configuracoes->telefone2}}
                                                    @endif                                                        
                                                </span>
                                            </div>
                                        </div>
                                    @endif 
                                    @if($configuracoes->telefone3)
                                        <div class="inner-item">
                                            <div class="media-left">
                                                <span class="icon"><i class="fa fa-phone"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <span class="inner-text">{{$configuracoes->telefone3}}</span>
                                            </div>
                                        </div>
                                    @endif                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copy-right">
                            <p>&copy; Copyright {{$configuracoes->ano_de_inicio}} <span>{{$configuracoes->nomedosite}}</span>.Todos os direitos reservados.</p>
                            <p class="font-accent">
                                Feito com <i style="color:red;" class="fa fa-heart"></i> por <a style="color:#fff;" target="_blank" href="{{env('DESENVOLVEDOR_URL')}}">{{env('DESENVOLVEDOR')}}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="whatsapp-footer">
        <a target="_blank" href="{{getNumZap($configuracoes->whatsapp ,'Atendimento '. $configuracoes->nomedosite)}}" title="WhatsApp">
            <img src="{{url(asset('frontend/assets/images/zap-topo.png'))}}" alt="{{url(asset('frontend/assets/images/zap-topo.png'))}}" title="WhatsApp" />
        </a>
    </div>

    <script src="{{url(asset('frontend/assets/js/jquery-2.2.4.min.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/bootstrap.min.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/imagesloaded.pkgd.min.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/isotope.pkgd.min.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/owl.carousel.min.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/owl.animate.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/jquery.scrollUp.min.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/jquery.counterup.min.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/modernizr.min.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/jquery.magnific-popup.min.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/wow.min.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/waypoints.min.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/jquery.meanmenu.min.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/jquery.sticky.js'))}}"></script>
    <script src="{{url(asset('frontend/assets/js/custom.js'))}}"></script>

    @hasSection('js')
        @yield('js')
    @endif

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B50RN49YVK"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-B50RN49YVK');
    </script>
    
</body>
</html>