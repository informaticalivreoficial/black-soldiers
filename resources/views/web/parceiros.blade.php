@extends('web.master.master')


@section('content')

<div class="pagehding-sec" style="background-image: url({{$configuracoes->gettopodosite()}});">
    <div class="pagehding-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-heading">
                    <h1>Parceiros</h1>
                    <ul>
                        <li><a href="{{route('web.home')}}">Início</a></li>
                        <li><a href="{{route('web.parceiros')}}">Parceiros</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@if (!empty($parceiros && $parceiros->count() > 0))
<div class="blog-sec pt-100 pb-80">
    <div class="container">
       <div class="row">
            @foreach ($parceiros as $parceiro)
                <div class="col-12 col-xs-6 col-sm-4 col-md-4 col-lg-3">
                    <div class="media">
                        <div class="single-post">
                            <div> 
                                <a href="{{route('web.parceiro',$parceiro->slug)}}">
                                    <img src="{{$parceiro->cover()}}" alt="{{$parceiro->name}}" />
                                </a>                                                            
                            </div>                            
                        </div>
                    </div>
                </div> 
            @endforeach         
       </div>
       <div class="row">
           <div class="col-12" style="text-align: center;">
            {{ $parceiros->links() }}
           </div>
       </div>
    </div>
 </div>
 @endif

@endsection