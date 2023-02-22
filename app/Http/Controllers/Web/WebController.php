<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Web\Atendimento;
use App\Mail\Web\AtendimentoRetorno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\{
    Configuracoes,
    Parceiro,
    Post,
    Slide
};

class WebController extends Controller
{
    public function home()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $servicos = Post::where('tipo', 'pagina')->where('categoria', 7)->postson()->limit(6)->get();
        $post = Post::where('id', '1')->first();
        $slides = Slide::orderBy('created_at', 'DESC')->available()->get();

        $head = $this->seo->render($Configuracoes->nomedosite ?? 'Informática Livre',
            $Configuracoes->descricao ?? 'Falha',
            route('web.home'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        ); 

        return view('web.home',[
            'head' => $head,
            'post' => $post,
            'slides' => $slides,
            'servicos' => $servicos
        ]);
    }

    public function servicos()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $head = $this->seo->render('Serviços - ' . $Configuracoes->nomedosite ?? $Configuracoes->nomedosite,
            'Serviços e Soluções Completas, Customizadas e Eficientes. Análise precisa e anos de experiência em serviços de segurança totalmente customizados sob medida.',
            route('web.servicos'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        ); 

        $servicos = Post::where('tipo', 'pagina')->where('categoria', 7)->postson()->get();
        return view('web.servicos',[
            'head' => $head,
            'servicos' => $servicos
        ]);
    }

    public function trabalhe()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $head = $this->seo->render('Cadastro de Curriculum - ' . $Configuracoes->nomedosite ?? $Configuracoes->nomedosite,
            'Agora você pode enviar seu currículo pelo site e fazer parte do time de colaboradores da Black Soldiers, uma empresa com mais de 10 anos de experiência.',
            route('web.trabalhe'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        ); 

        return view('web.atendimento.trabalhe',[
            'head' => $head
        ]);
    }

    public function fornecedores()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $head = $this->seo->render('Cadastro de Parceiros e Fornecedores - ' . $Configuracoes->nomedosite ?? $Configuracoes->nomedosite,
            'Deseja ser nosso parceiro? Vamos lá! Precisamos entender melhor a sua proposta.',
            route('web.fornecedores'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        ); 

        return view('web.atendimento.parceiros',[
            'head' => $head
        ]);
    }

    public function cotacao()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $head = $this->seo->render('Cotação de Serviço - ' . $Configuracoes->nomedosite ?? $Configuracoes->nomedosite,
            'Fale com um consultor da Black Soldiers Serviços e peça já um orçamento',
            route('web.cotacao'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        ); 

        return view('web.atendimento.cotacao',[
            'head' => $head
        ]);
    }

    public function pagina($slug)
    {
        $parceiros = Parceiro::orderBy('created_at', 'DESC')->available()->limit(6)->get();
        $post = Post::where('slug', $slug)->first();

        $post->views = $post->views + 1;
        $post->save();

        $Configuracoes = Configuracoes::where('id', '1')->first();
        $head = $this->seo->render($post->titulo ?? $Configuracoes->nomedosite,
            $post->titulo ?? $Configuracoes->descricao,
            route('web.pagina', $slug),
            $post->cover() ?? 'https://informaticalivre.com/media/metaimg.jpg'
        );      

        return view('web.pagina',[
            'head' => $head,
            'post' => $post,
            'parceiros' => $parceiros
        ]);
    }

    public function politica()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        
        $head = $this->seo->render('Política de Privacidade - ' . $Configuracoes->nomedosite ?? 'Informática Livre',
            ' Política de Privacidade - ' . $Configuracoes->nomedosite,
            route('web.politica'),
            Storage::url($Configuracoes->metaimg)
        );

        return view('web.politica',[
            'head' => $head
        ]);
    }

    public function parceiros()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $parceiros = Parceiro::orderBy('created_at', 'DESC')->available()->paginate(16);
        
        $head = $this->seo->render('Parceiros - ' . $Configuracoes->nomedosite ?? 'Informática Livre',
            'Parceiros - ' . $Configuracoes->nomedosite,
            route('web.parceiros'),
            Storage::url($Configuracoes->metaimg)
        );

        return view('web.parceiros',[
            'head' => $head,
            'parceiros' => $parceiros
        ]);
    }

    public function parceiro($slug)
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $parceiro = Parceiro::where('slug', $slug)->available()->first();

        $parceiro->views = $parceiro->views + 1;
        $parceiro->save();
        
        $head = $this->seo->render($parceiro->name . ' - ' . $Configuracoes->nomedosite ?? 'Informática Livre',
            $parceiro->name . ' - ' . $Configuracoes->nomedosite,
            route('web.parceiro',['slug' => $parceiro->slug]),
            $parceiro->metaimg() ?? Storage::url($Configuracoes->metaimg)
        );

        return view('web.parceiro',[
            'head' => $head,
            'parceiro' => $parceiro
        ]);
    }

    public function redes()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $head = $this->seo->render('Redes Sociais',
            'Acompanhe as publicações e novidades da Black Soldiers nas Redes Sociais',
            route('web.redes'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        ); 
        return view('web.atendimento.redes',[
            'head' => $head
        ]);
    }

    public function atendimento()
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $head = $this->seo->render('Atendimento',
            'Nossa equipe está pronta para melhor atender as demandas de nossos clientes!',
            route('web.atendimento'),
            Storage::url($Configuracoes->metaimg ?? 'https://informaticalivre.com/media/metaimg.jpg')
        );        

        return view('web.atendimento.fale', [
            'head' => $head,
            'Configuracoes' => $Configuracoes            
        ]);
    }

}
