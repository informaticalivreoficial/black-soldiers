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
                        <li><a href="{{route('web.parceiro',$parceiro->slug)}}">{{$parceiro->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-us-sec pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="abt-img">
                    <img src="{{$parceiro->nocover()}}" alt="{{$parceiro->name}}" />
                </div>
                <aside class="single_sidebar_widget post_category_widget" style="margin-top: 20px;">
                    <h4 class="widget_title">Atendimento</h4>
                    <ul class="list cat-list">
                        @if ($parceiro->link)
                             <li>                                
                                 <p class="mb-0">
                                     Site: <a target="_blank" href="{{$parceiro->link}}" class="d-flex">{{$parceiro->link}}</a>
                                 </p>
                             </li>
                        @endif
                        @if ($parceiro->email)
                             <li>                                
                                 <p class="mb-0">
                                     Email: <a target="_blank" href="mailto:{{$parceiro->email}}" class="d-flex">{{$parceiro->email}}</a>
                                 </p>
                             </li>
                        @endif
                        @if ($parceiro->telefone)
                             <li>                                
                                 <p class="mb-0">
                                     Telefone: <a target="_blank" href="tel:{{$parceiro->telefone}}" class="d-flex">{{$parceiro->telefone}}</a>
                                 </p>
                             </li>
                        @endif
                        @if ($parceiro->celular)
                             <li>                                
                                 <p class="mb-0">
                                     Celular: <a target="_blank" href="tel:{{$parceiro->celular}}" class="d-flex">{{$parceiro->celular}}</a>
                                 </p>
                             </li>
                        @endif
                        @if ($parceiro->whatsapp)
                             <li>                                
                                 <p class="mb-0">
                                     WhatsApp: <a target="_blank" href="tel:{{$parceiro->whatsapp}}" class="d-flex">{{$parceiro->whatsapp}}</a>
                                 </p>
                             </li>
                        @endif
                    </ul>
                 </aside>
                 <aside class="single_sidebar_widget">
                     {!!$parceiro->mapa_google!!}
                 </aside>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="abt-lft">
                    <h1>{{$parceiro->name}}</h1>
                    <ul class="blog-info-link" style="margin-top: 10px;margin-bottom:10px;">
                        <div style="top:2px;" class="fb-share-button" data-href="{{url()->current()}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>
                        <a class="btn-front" target="_blank" href="https://web.whatsapp.com/send?text={{url()->current()}}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i> Compartilhar</a>
                   </ul>
                    {!!$parceiro->content!!}
                </div>
                <div style="justify-content:space-between;display: flex!important;">
                    <p class="like-info">
                        <span class="align-middle"><i class="fa fa-eye"></i></span> {{$parceiro->views}}
                    </p>                                    
                    <ul>
                         @if (!empty($parceiro->facebook))
                             <li style="float: right;" class="mr-2"><a target="_blank" href="{{$parceiro->facebook}}"><i class="fa fa-facebook"></i></a></li>
                         @endif                                
                         @if (!empty($parceiro->twitter))
                             <li style="float: right;" class="mr-2"><a target="_blank" href="{{$parceiro->twitter}}"><i class="fa fa-twitter"></i></a></li>
                         @endif                                
                         @if (!empty($parceiro->instagram))
                             <li style="float: right;" class="mr-2"><a target="_blank" href="{{$parceiro->instagram}}"><i class="fa fa-instagram"></i></a></li>
                         @endif                                
                         @if (!empty($parceiro->youtube))
                             <li style="float: right;" class="mr-2"><a target="_blank" href="{{$parceiro->youtube}}"><i class="fa fa-youtube"></i></a></li>
                         @endif                                
                         @if (!empty($parceiro->linkedin))
                             <li style="float: right;" class="mr-2"><a target="_blank" href="{{$parceiro->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                         @endif                                
                         @if (!empty($parceiro->vimeo))
                             <li style="float: right;" class="mr-2"><a target="_blank" href="{{$parceiro->vimeo}}"><i class="fa fa-vimeo"></i></a></li>
                         @endif                                
                         @if (!empty($parceiro->fliccr))
                             <li style="float: right;" class="mr-2"><a target="_blank" href="{{$parceiro->fliccr}}"><i class="fa fa-flickr"></i></a></li>
                         @endif                                
                         @if (!empty($parceiro->soundclound))
                             <li style="float: right;" class="mr-2"><a target="_blank" href="{{$parceiro->soundclound}}"><i class="fa fa-soundcloud"></i></a></li>
                         @endif                                
                         @if (!empty($parceiro->snapchat))
                             <li style="float: right;" class="mr-2"><a target="_blank" href="{{$parceiro->snapchat}}"><i class="fa fa-snapchat"></i></a></li>
                         @endif 
                    </ul>
                 </div>
                 <p class="my-3"><b>Endereço: </b>
                    @if ($parceiro->rua)
                        {{$parceiro->rua}}
                    @endif
                    @if ($parceiro->rua && $parceiro->num)
                        , {{$parceiro->num}}
                    @endif
                    @if ($parceiro->rua && $parceiro->bairro)
                        , {{$parceiro->bairro}}
                    @endif
                    @if (!$parceiro->rua && $parceiro->bairro)
                        {{$parceiro->bairro}}
                    @endif
                    @if ($parceiro->bairro && $parceiro->uf)
                        - {{getCidadeNome($parceiro->cidade, 'cidades')}}
                    @endif
                    @if(!$parceiro->bairro && $parceiro->uf)
                        {{getCidadeNome($parceiro->cidade, 'cidades')}}
                    @endif
                    @if ($parceiro->cep)
                        - {{$parceiro->cep}}
                    @endif
                </p>
                @if($parceiro->images()->get()->count())
                    <div class="row project-sec" style="margin-top: 20px;"> 
                        @foreach($parceiro->images()->get() as $image)
                            <div class="col-xs-6 col-sm-4 col-md-4">
                                <div class="item wow zoomIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                                    <div class="project-thumb">
                                        <img src="{{ $image->url_cropped }}" alt="{{ $image->url_cropped }}" title="{{ $parceiro->name }}">                                
                                    </div>
                                    <div class="project-hoverlay">
                                        <div class="project-text">
                                            <a href="{{ $image->url_image }}" title="{{ $parceiro->name }}" class="gallery-photo">
                                                <i class="fa fa-expand"></i> 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                
                        @endforeach
                    </div>
                @endif

                @if (!empty($parceiro->email))
                <div class="comment-form" style="margin-bottom: 30px;">
                    <h4>Enviar Mensagem</h4>
                    <form class="j_formsubmit" action="" method="post" autocomplete="off">
                    @csrf
                    <div class="row contact-field">
                        <div class="col-12">
                            <div id="js-contact-result"></div>
                        </div>
                        <input type="hidden" class="noclear" name="parceiro_id" value="{{$parceiro->id}}" />
                        <div class="form-group form_hide">
                            <!-- HONEYPOT -->
                            <input type="hidden" class="noclear" name="bairro" value="" />
                            <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                        </div> 
                        <div class="col-sm-6 form_hide">
                            <div class="form-group">
                            <input name="nome" type="text" placeholder="Nome">
                            </div>
                        </div>
                        <div class="col-sm-6 form_hide">
                            <div class="form-group">
                            <input name="email" type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-12 form_hide" style="margin-top: 20px;">
                            <div class="single-input-field">
                                <textarea placeholder="Sua Mensagem" name="mensagem"></textarea>
                            </div>
                            <div class="single-input-fieldsbtn">
                                <input value="Enviar Agora" id="js-contact-btn" type="submit">
                            </div>
                        </div>
                    </div>                    
                    </form>
                </div>
             @endif
            </div>
        </div>

       
    </div>
</div>




@endsection

@section('css')
<style>
    iframe{
      height: 300px;
      width: 100%;
      display: inline-block;
      overflow: hidden"
    }
    .like-info {
        font-size: 14px;
    }
    .mr-2{
        margin-right: 10px;
    }
    .btn-front{
        background-color: #6ebf58;
        color:#fff;
        border-radius: .25rem;
        padding: 3px 8px !important;
        border:none;
    }
    .btn-front:hover, mdi:hover{
        color:#fff;
    }
</style>
@endsection

@section('js')
<script>
    $(function () {  

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });     

        // Seletor, Evento/efeitos, CallBack, Ação
        $('.j_formsubmit').submit(function (){
            var form = $(this);
            var dataString = $(form).serialize();

            $.ajax({
                url: "{{ route('web.sendEmailParceiro') }}",
                data: dataString,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function(){
                    form.find("#js-contact-btn").attr("disabled", true);
                    form.find('#js-contact-btn').val("Carregando...");                
                    form.find('.alert').fadeOut(500, function(){
                        $(this).remove();
                    });
                },
                success: function(resposta){
                    $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-190}, 'slow');
                    if(resposta.error){
                        form.find('#js-contact-result').html('<div class="alert alert-danger error-msg">'+ resposta.error +'</div>');
                        form.find('.error-msg').fadeIn();                    
                    }else{
                        form.find('#js-contact-result').html('<div class="alert alert-success error-msg">'+ resposta.sucess +'</div>');
                        form.find('.error-msg').fadeIn();                    
                        form.find('input[class!="noclear"]').val('');
                        form.find('textarea[class!="noclear"]').val('');
                        form.find('.form_hide').fadeOut(500);
                    }
                },
                complete: function(resposta){
                    form.find("#js-contact-btn").attr("disabled", false);
                    form.find('#js-contact-btn').val("Enviar Agora");                                
                }

            });

            return false;
        });

    });
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0&appId=1787040554899561&autoLogAppEvents=1" nonce="1eBNUT9J"></script>
@endsection