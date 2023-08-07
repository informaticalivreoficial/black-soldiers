@extends('web.master.master')


@section('content')
<div class="pagehding-sec" style="background-image: url({{$configuracoes->gettopodosite()}});">
    <div class="pagehding-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-heading">
                    <h1>Fale Conosco</h1>
                    <ul>
                        <li><a href="{{route('web.home')}}">Início</a></li>
                        <li><a href="{{route('web.atendimento')}}">Fale Conosco</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact-page-sec pt-100 pb-100">
  <div class="container">
      <div class="row">
          <div class="col-md-8">
              <form method="post" action="" class="j_formsubmit" autocomplete="off">
                @csrf
                <div id="js-contact-result"></div>
                <!-- HONEYPOT -->
                <input type="hidden" class="noclear" name="bairro" value="" />
                <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                <div class="contact-field form_hide">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-input-field">
                            <input placeholder="Seu Nome" name="nome" type="text" value="">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-input-field">
                            <input inputmode="email" placeholder="Seu Email" name="email" type="text" value="">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-input-field">
                            <input inputmode="tel" placeholder="Seu Telefone" name="telefone" type="text" value="">
                        </div>
                    </div>                    
                    <div class="col-md-12" style="margin-top: 20px;">
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
          <div class="col-md-4">
              <div class="contact-info">
                  <div class="contact-info-item">
                      <div class="contact-info-text">
                          <h2>Atendimento</h2>
                          @if($configuracoes->telefone1)
                            <span><a href="callto:{{$configuracoes->telefone1}}">{{$configuracoes->telefone1}}</a></span>
                          @endif
                          @if($configuracoes->telefone2)
                            <span><a href="callto:{{$configuracoes->telefone2}}">{{$configuracoes->telefone2}}</a></span>
                          @endif
                          @if($configuracoes->telefone3)
                            <span><a href="callto:{{$configuracoes->telefone3}}">{{$configuracoes->telefone3}}</a></span>
                          @endif
                          @if($configuracoes->whatsapp)
                           <span><i class="fa fa-whatsapp"></i> <a target="_blank" class="sharezap" href="">{{$configuracoes->whatsapp}}</a></span>
                          @endif
                          
                          
                      </div>
                  </div> 
              </div>
              <div class="contact-info">
                  <div class="contact-info-item">
                      <div class="contact-info-text">
                          <h2>Email</h2>
                          @if ($configuracoes->email)
                            <span><a href="mailto:{{$configuracoes->email}}">{{$configuracoes->email}}</a></span>
                          @endif
                          @if ($configuracoes->email1)
                            <span><a href="mailto:{{$configuracoes->email1}}">{{$configuracoes->email1}}</a></span>
                          @endif
                      </div>
                  </div>
              </div>
              <div class="contact-info">
                  <div class="contact-info-item">
                      <div class="contact-info-text">
                      <h2>Endereço</h2>
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
          </div>
      </div>
  </div>
</div>
@endsection

@section('css')
<style>
  iframe{
    height: 450px;
    width: 100%;
    display: inline-block;
    overflow: hidden"
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
                url: "{{ route('web.sendEmail') }}",
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
  @endsection
  
  