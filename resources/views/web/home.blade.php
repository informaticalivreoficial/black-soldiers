@extends('web.master.master')

@section('content')

@if (!empty($slides) && $slides->count() > 0)
    <div class="slider index2">
        @foreach ($slides as $slide)
            <div class="all-slide owl-item">
                <div class="single-slide" style="background-image:url({{$slide->getUrlImagemAttribute()}});"></div>       
            </div>
        @endforeach        
    </div>
@endif

@if (!empty($post))
    <div class="about-sec pt-100 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="about-desc">
                        <div class="sec-title">
                            <h1><span>Black Soldiers </span>Serviços</h1>
                            {!!$post->content!!}
                        </div>                    
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="about-us-img">
                        <img src="{{$post->cover()}}" alt="{{$post->titulo}}" title="{{$post->titulo}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if (!empty($servicos) && $servicos->count() > 0)
    <div class="project-sec pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sec-title">
                        <h1>Serviços</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($servicos as $servico)
                    <div class="col-xs-6 col-sm-4 col-md-4">
                        <div class="item">
                            <div class="project-thumb">
                                <img src="{{$servico->cover()}}" alt="{{$servico->titulo}}" />
                            </div>
                            <div class="project-hoverlay">
                                <div class="project-text">
                                    <a href="{{$servico->nocover()}}" class="gallery-photo"><i class="fa fa-expand"></i></a>
                                    <a href="{{route('web.pagina', $servico->slug)}}"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

<div class="blog-sec pt-100 pb-80 block-atendimento">
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="text-align:center;">
                <h1 style="font-weight: bold;"><a href="{{route('web.atendimento')}}">FALE CONOSCO</a></h1>
                <p style="font-size: 1.2em;"><a class="a-topbar" href="{{route('web.atendimento')}}">Envie uma mensagem ou mande sugestões para a Black Soldiers Serviços</a></p>
            </div>
            <div class="col-md-6" style="text-align:center;">
                <h1 style="font-weight: bold;"><a href="{{route('web.cotacao')}}">SOLICITE UMA COTAÇÃO</a></h1>
                <p style="font-size: 1.2em;"><a class="a-topbar" href="{{route('web.cotacao')}}">Fale com um consultor da Black Soldiers Serviços e peça já um orçamento</a></p>
            </div>
        </div>
    </div>
</div>
@endsection