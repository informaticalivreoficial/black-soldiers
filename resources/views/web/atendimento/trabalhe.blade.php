@extends('web.master.master')


@section('content')
<div class="pagehding-sec" style="background-image: url({{$configuracoes->gettopodosite()}});">
    <div class="pagehding-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-heading">
                    <h1>Cadastrar Currículo</h1>
                    <ul>
                        <li><a href="{{route('web.home')}}">Início</a></li>
                        <li><a href="{{route('web.trabalhe')}}">Cadastrar Currículo</a></li>
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
            <div class="row">
                <div class="col-12">
                    @if($errors->all())
                        @foreach($errors->all() as $error)
                            @message(['color' => 'danger'])
                            {!! $error !!}
                            @endmessage
                        @endforeach
                    @endif    
                    
                    @if(session()->exists('message'))
                        @message(['color' => session()->get('color')])
                        {!! session()->get('message') !!}
                        @endmessage
                    @endif
                </div>            
            </div>
              <form method="post" action="{{route('web.sendEmailCurriculum')}}" autocomplete="off" enctype="multipart/form-data">
              @csrf
                <!-- HONEYPOT -->
                <input type="hidden" class="noclear" name="bairro" value="" />
                <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                <div class="contact-field form_hide">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-input-field">
                            <input placeholder="Seu Nome" name="nome" type="text" value="{{old('nome')}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-input-field">
                            <input inputmode="email" placeholder="Seu Email" name="email" type="text" value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-input-field">
                            <input inputmode="tel" placeholder="Seu Telefone" name="telefone" type="text" value="">
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="single-input-field">
                            <input name="curriculo" type="file">
                        </div>
                    </div>                    
                    <div class="col-md-12" style="margin-top: 20px;">
                        <div class="single-input-fieldsbtn">
                            <input value="Enviar Agora" id="js-contact-btn" type="submit">
                        </div>
                    </div>
                    
                </div>
              </form>
          </div>
          <div class="col-md-4">
              <div class="contact-info" style="margin-top: 30px;">
                  <div class="contact-info-item">
                      <div class="contact-info-text">
                          <h2>Curriculum</h2>
                          <p>
                            Agora você pode enviar seu currículo pelo site e fazer parte do time de 
                            colaboradores da {{$configuracoes->nomedosite}}, uma empresa com mais de 10 
                            anos de experiência. Preencha o formulário e anexe Seu currículo. Boa Sorte!
                          </p>
                      </div>
                  </div> 
              </div>  
          </div>
      </div>
  </div>
</div>
@endsection

@section('css')
    
@endsection

@section('js')
  
@endsection
  
  