@extends('web.master.master')

@section('content')
<div class="pagehding-sec" style="background-image: url({{$configuracoes->gettopodosite()}});">
    <div class="pagehding-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-heading">
                    <h1>Redes Sociais</h1>
                    <ul>
                        <li><a href="{{route('web.home')}}">Início</a></li>
                        <li><a href="{{route('web.redes')}}">Redes Sociais</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="about-us-sec pt-100 pb-100">
    <div class="container">
        @if ($configuracoes->facebook)
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="abt-img">
                        <a target="_blank" href="{{$configuracoes->facebook}}">
                            <img src="{{url(asset('frontend/assets/images/facebook.jpg'))}}" alt="Facebook" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="abt-lft">
                        <h2>Facebook</h2>
                        <p>Em nossa página no Facebook você pode acompanhar informações e publicações 
                            mais recentes da {{$configuracoes->nomedosite}}. Aproveite todos os recursos 
                            da Rede Social e acompanhe o que acontece.
                        </p>
                        <a target="_blank" class="botao-acompanhe facebook-btn" href="{{$configuracoes->facebook}}">Acompanhe</a>
                    </div>
                </div>
            </div>
        @endif        
        @if ($configuracoes->instagram)
            <div class="row" style="padding: 50px 0;background-color: #EFEFEF;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="abt-img">
                        <a target="_blank" href="{{$configuracoes->instagram}}">
                            <img src="{{url(asset('frontend/assets/images/instagram.jpg'))}}" alt="Instagram" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="abt-lft">
                        <h2>Instagram</h2>
                        <p>Em nossa página no Instagram você também pode acompanhar informações e publicações 
                            mais recentes da {{$configuracoes->nomedosite}}. Aproveite todos os recursos 
                            da Rede Social e acompanhe o que acontece.
                        </p>
                        <a target="_blank" class="botao-acompanhe instagram-btn" href="{{$configuracoes->instagram}}">Acompanhe</a>
                    </div>
                </div>
            </div>
        @endif 
        @if ($configuracoes->twitter)
            <div class="row" style="padding: 50px 0;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="abt-img">
                        <a target="_blank" href="{{$configuracoes->twitter}}">
                            <img src="{{url(asset('frontend/assets/images/twitter.jpg'))}}" alt="Twitter" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="abt-lft">
                        <h2>Twitter</h2>
                        <p>Em nossa conta no Twitter você também pode acompanhar publicações 
                            mais recentes da {{$configuracoes->nomedosite}}. Aproveite todos os recursos 
                            da Rede Social e acompanhe o que acontece.
                        </p>
                        <a target="_blank" class="botao-acompanhe twitter-btn" href="{{$configuracoes->twitter}}">Acompanhe</a>
                    </div>
                </div>
            </div>
        @endif
        @if ($configuracoes->linkedin)
            <div class="row" style="padding: 50px 0;background-color: #EFEFEF;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="abt-img">
                        <a target="_blank" href="{{$configuracoes->linkedin}}">
                            <img src="{{url(asset('frontend/assets/images/linkedin.png'))}}" alt="Linkedin" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="abt-lft">
                        <h2>Linkedin</h2>
                        <p>Em nossa conta no Linkedin você também pode acompanhar publicações e as vagas e oportunidades
                            mais recentes da {{$configuracoes->nomedosite}}. Aproveite todos os recursos 
                            da Rede Social e acompanhe o que acontece.
                        </p>
                        <a target="_blank" class="botao-acompanhe linkedin-btn" href="{{$configuracoes->linkedin}}">Acompanhe</a>
                    </div>
                </div>
            </div>
        @endif 
        @if ($configuracoes->youtube)
            <div class="row" style="padding: 50px 0;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="abt-img">
                        <a target="_blank" href="{{$configuracoes->youtube}}">
                            <img src="{{url(asset('frontend/assets/images/youtube.png'))}}" alt="Youtube" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="abt-lft">
                        <h2>Youtube</h2>
                        <p>Em nosso canal no Youtube você também pode acompanhar os vídeos e publicações 
                            mais recentes da {{$configuracoes->nomedosite}}. Aproveite todos os recursos 
                            da Rede Social e acompanhe o que acontece.
                        </p>
                        <a target="_blank" class="botao-acompanhe youtube-btn" href="{{$configuracoes->youtube}}">Acompanhe</a>
                    </div>
                </div>
            </div>
        @endif       
    </div>
</div>

@endsection

@section('css')
    <style>
        .botao-acompanhe{            
            color: #fff;
            display: inline-block;
            font-weight: 600;
            padding: 14px 55px;
            text-transform: uppercase;
            border-radius: 50px;
        }
        .facebook-btn{
            background-color: #3A589E;
        }
        .instagram-btn{
            background-color: #7B44C2;
        }
        .twitter-btn{
            background-color: #1DA1F3;
        }
        .linkedin-btn{
            background-color: #0A66C2;
        }
        .youtube-btn{
            background-color: #FF0000;
        }
    </style>
@endsection