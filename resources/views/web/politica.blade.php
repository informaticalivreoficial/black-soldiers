@extends('web.master.master')

@section('content')

<div class="pagehding-sec" style="background-image: url({{$configuracoes->gettopodosite()}});">
    <div class="pagehding-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-heading">
                    <h1>Políticas de Privacidade</h1>
                    <ul>
                        <li><a href="{{route('web.home')}}">Início</a></li>
                        <li><a href="{{route('web.politica')}}">Políticas de Privacidade</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-us-sec pt-100">
    <div class="container">
        <div class="row">           
            <div class="col-12">
                <div class="abt-lft">
                    {!! $configuracoes->politicas_de_privacidade !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection