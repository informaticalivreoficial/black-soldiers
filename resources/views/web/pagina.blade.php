@extends('web.master.master')

@section('content')
<div class="pagehding-sec" style="background-image: url({{$configuracoes->gettopodosite()}});">
    <div class="pagehding-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-heading">
                    <h1>{{$post->categoriaPaiObject->titulo ?? 'Página'}}</h1>
                    <ul>
                        <li><a href="{{route('web.home')}}">Início</a></li>
                        <li><a href="{{route('web.servicos')}}">{{$post->categoriaObject->titulo}}</a></li>
                        <li><a href="{{route('web.pagina',$post->slug)}}">{{$post->titulo}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-us-sec pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="about-us-img">
                    <img src="{{$post->cover()}}" alt="{{$post->titulo}}" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="abt-lft">
                    <h1>{{$post->titulo}}</h1>
                    {!!$post->content!!}
                </div>
            </div>
        </div>

        <div class="project-sec pt-100 pb-70">
            <div class="container">
                @if($post->images()->get()->count())
                    <div class="row"> 
                        @foreach($post->images()->get() as $image)
                            <div class="col-xs-6 col-sm-4 col-md-4">
                                <div class="item wow zoomIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                                    <div class="project-thumb">
                                        <img src="{{ $image->url_cropped }}" alt="{{ $image->url_cropped }}" title="{{ $post->titulo }}">                                
                                    </div>
                                    <div class="project-hoverlay">
                                        <div class="project-text">
                                            <a href="{{ $image->url_image }}" title="{{ $post->titulo }}" class="gallery-photo">
                                                <i class="fa fa-expand"></i> 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                
                        @endforeach
                    </div>
                @endif
            </div>
        </div> 
    </div>
</div>

@if (!empty($parceiros) && $parceiros->count() > 0)
    <div class="all-patner-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sec-title">
                        <h1>Nossos Parceiros</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="all-patner">
                    @foreach ($parceiros as $parceiro)
                        <div class="single-patner">
                            <a href="{{route('web.parceiro',$parceiro->slug)}}">
                                <img style="width: 166px;height: 96px !important;" src="{{$parceiro->nocover()}}" alt="{{$parceiro->name}}" />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>    
@endif

@endsection