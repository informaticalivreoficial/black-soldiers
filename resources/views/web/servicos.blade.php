@extends('web.master.master')

@section('content')
<div class="pagehding-sec" style="background-image: url({{$configuracoes->gettopodosite()}});">
    <div class="pagehding-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-heading">
                    <h1>Serviços</h1>
                    <ul>
                        <li><a href="{{route('web.home')}}">Início</a></li>
                        <li><a href="{{route('web.servicos')}}">Serviços</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="service-sec pt-100 pb-100">
    <div class="container">
        <div class="row">
            @if (!empty($servicos) && $servicos->count() > 0)
                <div class="service-item">
                    @foreach ($servicos as $servico)
                        <div class="col-md-4 col-sm-6 col-lg-4">
                            <div class="service-inner">
                                <a href="{{route('web.pagina', $servico->slug)}}">
                                    <img style="max-height: 257px !important;" src="{{$servico->cover()}}" alt="{{$servico->titulo}}" style="background-size: cover; background-position: center center;">
                                </a>
                                <div class="service-details">
                                    <h2><a href="{{route('web.pagina', $servico->slug)}}">{{$servico->titulo}}</a></h2>
                                    {!!$servico->content_web!!}
                                </div>
                            </div>
                        </div>
                    @endforeach                    
                </div>
            @endif            
        </div>
    </div>
</div>
@endsection