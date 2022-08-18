<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Web\ParceiroSend;
use App\Mail\Web\Atendimento;
use App\Mail\Web\AtendimentoRetorno;
use App\Mail\Web\Cotacao;
use App\Mail\Web\CotacaoRetorno;
use App\Mail\Web\Trabalhe;
use App\Mail\Web\TrabalheRetorno;
use App\Models\Configuracoes;
use App\Models\Parceiro;
use Error;
use Illuminate\Support\Facades\Validator;

class SendEmailController extends Controller
{
    public function sendEmailParceiro(Request $request)
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $parceiro = Parceiro::where('id', $request->parceiro_id)->first();
        if($request->nome == ''){
            $json = "Por favor preencha o campo <strong>Nome</strong>";
            return response()->json(['error' => $json]);
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $json = "O campo <strong>Email</strong> está vazio ou não tem um formato válido!";
            return response()->json(['error' => $json]);
        }
        if($request->mensagem == ''){
            $json = "Por favor preencha sua <strong>Mensagem</strong>";
            return response()->json(['error' => $json]);
        }
        if(!empty($request->bairro) || !empty($request->cidade)){
            $json = "<strong>ERRO</strong> Você está praticando SPAM!"; 
            return response()->json(['error' => $json]);
        }else{

            $data = [
                'sitename' => $parceiro->name,
                'siteemail' => $parceiro->email,
                'reply_name' => $request->nome,
                'reply_email' => $request->email,
                'mensagem' => $request->mensagem,
                'config_site_name' => $Configuracoes->nomedosite
            ];

            $parceiro->email_send_count = $parceiro->email_send_count + 1;
            $parceiro->save();
            
            Mail::send(new ParceiroSend($data));
            
            $json = 'Obrigado '.getPrimeiroNome($request->nome).' sua mensagem foi enviada para nosso parceiro <b>'.$parceiro->name.'</b> com sucesso!'; 
            return response()->json(['sucess' => $json]);
        }
    }

    public function sendEmail(Request $request)
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        if($request->nome == ''){
            $json = "Por favor preencha o campo <strong>Nome</strong>";
            return response()->json(['error' => $json]);
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $json = "O campo <strong>Email</strong> está vazio ou não tem um formato válido!";
            return response()->json(['error' => $json]);
        }
        if($request->mensagem == ''){
            $json = "Por favor preencha sua <strong>Mensagem</strong>";
            return response()->json(['error' => $json]);
        }
        if(!empty($request->bairro) || !empty($request->cidade)){
            $json = "<strong>ERRO</strong> Você está praticando SPAM!"; 
            return response()->json(['error' => $json]);
        }else{
            $data = [
                'sitename' => $Configuracoes->nomedosite,
                'siteemail' => $Configuracoes->email,
                'reply_name' => $request->nome,
                'reply_email' => $request->email,
                'mensagem' => $request->mensagem,
                'telefone' => $request->telefone
            ];

            $retorno = [
                'sitename' => $Configuracoes->nomedosite,
                'siteemail' => $Configuracoes->email,
                'reply_name' => $request->nome,
                'reply_email' => $request->email
            ];
            
            Mail::send(new Atendimento($data));
            Mail::send(new AtendimentoRetorno($retorno));
            
            $json = "Obrigado {$request->nome} sua mensagem foi enviada com sucesso!"; 
            return response()->json(['sucess' => $json]);
        }
    }

    public function sendEmailFornecedor(Request $request)
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        if($request->nome == ''){
            $json = "Por favor preencha o campo <strong>Nome</strong>";
            return response()->json(['error' => $json]);
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $json = "O campo <strong>Email</strong> está vazio ou não tem um formato válido!";
            return response()->json(['error' => $json]);
        }
        if($request->mensagem == ''){
            $json = "Por favor preencha sua <strong>Mensagem</strong>";
            return response()->json(['error' => $json]);
        }
        if(!empty($request->bairro) || !empty($request->cidade1)){
            $json = "<strong>ERRO</strong> Você está praticando SPAM!"; 
            return response()->json(['error' => $json]);
        }else{
            $data = [
                'sitename' => $Configuracoes->nomedosite,
                'siteemail' => $Configuracoes->email,
                'reply_name' => $request->nome,
                'reply_email' => $request->email,
                'mensagem' => $request->mensagem,
                'telefone' => $request->telefone
            ];

            $retorno = [
                'sitename' => $Configuracoes->nomedosite,
                'siteemail' => $Configuracoes->email,
                'reply_name' => $request->nome,
                'reply_email' => $request->email
            ];
            
            Mail::send(new Atendimento($data));
            Mail::send(new AtendimentoRetorno($retorno));
            
            $json = "Obrigado {$request->nome} sua mensagem foi enviada com sucesso!"; 
            return response()->json(['sucess' => $json]);
        }
    }

    public function sendEmailCotacao(Request $request)
    {
        $Configuracoes = Configuracoes::where('id', '1')->first();
        if($request->nome == ''){
            $json = "Por favor preencha o campo <strong>Nome</strong>";
            return response()->json(['error' => $json]);
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $json = "O campo <strong>Email</strong> está vazio ou não tem um formato válido!";
            return response()->json(['error' => $json]);
        }
        if($request->tipo == ''){
            $json = "Por favor selecione um Tipo de Serviço!";
            return response()->json(['error' => $json]);
        }
        if($request->mensagem == ''){
            $json = "Por favor preencha sua <strong>Mensagem</strong>";
            return response()->json(['error' => $json]);
        }
        if(!empty($request->bairro) || !empty($request->cidade1)){
            $json = "<strong>ERRO</strong> Você está praticando SPAM!"; 
            return response()->json(['error' => $json]);
        }else{
            $data = [
                'sitename' => $Configuracoes->nomedosite,
                'siteemail' => $Configuracoes->email,
                'reply_name' => $request->nome,
                'reply_email' => $request->email,
                'mensagem' => $request->mensagem,
                'telefone' => $request->telefone,
                'tipo' => $request->tipo
            ];

            $retorno = [
                'sitename' => $Configuracoes->nomedosite,
                'siteemail' => $Configuracoes->email,
                'reply_name' => $request->nome,
                'reply_email' => $request->email
            ];
            
            Mail::send(new Cotacao($data));
            Mail::send(new CotacaoRetorno($retorno));
            
            $json = "Obrigado {$request->nome} sua solicitação foi enviada com sucesso!"; 
            return response()->json(['sucess' => $json]);
        }
    }

    public function sendEmailCurriculum(Request $request)
    {        
        $Configuracoes = Configuracoes::where('id', '1')->first();
        if($request->nome == ''){
            return redirect()->back()->with([
                'color' => 'danger', 
                'message' => 'Por favor preencha o campo <strong>Nome</strong>'
            ]);
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->with([
                'color' => 'danger', 
                'message' => 'O campo <strong>Email</strong> está vazio ou não tem um formato válido!'
            ]);
        }
        
        if(!$request->file()){
            return redirect()->back()->with([
                'color' => 'danger', 
                'message' => 'Selecione o seu currículo para anexo!'
            ]);
        }

        $validator = Validator::make($request->file(), [
            'curriculo' => 'required|mimes:doc,docx,pdf|max:2048'
        ]);

        if ($validator->fails() === true) {
            return redirect()->back()->withInput()->with([
                'color' => 'danger',
                'message' => 'Somente é possível enviar no formato PDF ou Document!',
            ]);
        }

        if(!empty($request->bairro) || !empty($request->cidade)){
            return redirect()->back()->with([
                'color' => 'danger', 
                'message' => '<strong>ERRO</strong> Você está praticando SPAM!'
            ]);
        }else{
            $data = [
                'sitename' => $Configuracoes->nomedosite,
                'siteemail' => $Configuracoes->email,
                'reply_name' => $request->nome,
                'reply_email' => $request->email,
                'telefone' => $request->telefone,
                'curriculo' => $request->file()['curriculo']
            ];

            $retorno = [
                'sitename' => $Configuracoes->nomedosite,
                'siteemail' => $Configuracoes->email,
                'reply_name' => $request->nome,
                'reply_email' => $request->email
            ];
            
            Mail::send(new Trabalhe($data));
            //Mail::send(new TrabalheRetorno($retorno));

            return redirect()->back()->with([
                'color' => 'success', 
                'message' => "Obrigado {$request->nome} seu currículo foi enviado com sucesso!"
            ]);
            
        }
    }
}
