<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 26/03/2019
 * Time: 18:29
 */

namespace Controller;

use Sistema\Controller as CI_controller;

use Model\Usuario;
use Model\Meta;
use Model\MetaClinica;
use Model\CargoAltera;

class Principal extends CI_controller
{
    private $objUsuario;
    private $objMeta;
    private $objMetaClinica;
    private $objCargoAltera;

    // Método construtor
    function __construct(){
        // Carrega o contrutor da classe pai
        parent::__construct();
        $this->objUsuario = new Usuario();
        $this->objMeta = new Meta();
        $this->objMetaClinica = new MetaClinica();
        $this->objCargoAltera = new CargoAltera();
    }

    public function index($ano = null, $mes = null, $anoCompara = null, $mesCompara = null){

        //Verifica se o usuario está logado
        $this->VerificaLogin();

        //CARREGA A INDEX CASO FOR UMA BUSCA
        if($ano != null && $mes != null && $anoCompara == null && $mesCompara == null){

            $busca = $this->objMeta->get(["ano" => $ano, "mes" => $mes],"Id_meta ASC","");

            //BUSCA A META CLINICA
            $buscaMetaClinica = $this->objMetaClinica->get(['ano' => $ano, 'mes' => $mes]);

            if($busca->rowCount() > 0){

                $dashMetaClinica = $buscaMetaClinica->fetch(\PDO::FETCH_OBJ);

                $dashMetas = $busca->fetchAll(\PDO::FETCH_OBJ);

                foreach ($dashMetas as $dashMeta){

                    //BUSCA SE ALTEROU O NOME DA META
                    $nomeAlterado = $this->objCargoAltera->get(["Id_meta" => $dashMeta->Id_meta])->rowCount();

                    if($nomeAlterado > 0){
                        $buscaNomeAlterado = $this->objCargoAltera->get(["Id_meta" => $dashMeta->Id_meta])->fetch(\PDO::FETCH_OBJ);
                        $dashMeta->nomeAlterado = $buscaNomeAlterado->nome;
                    }


                }

                $por_total = $this->objMeta->get("SELECT SUM(por_total) AS total FROM metas WHERE mes = '{$mes}' AND ano = '{$ano}'")->fetchAll(\PDO::FETCH_OBJ);
                $totalPorcentagem = ceil(round($por_total[0]->total)) / 7; ;
                $mesAtual  = $this->NumeroMes($dashMetas[0]->mes);
                $mesMeta = $mesAtual.'/'.$dashMetas[0]->ano;
                $dados = [
                    "metas" => $dashMetas,
                    "mesAtual" => $mesMeta,
                    "metaClinica" => $dashMetaClinica,
                    "totalPorcentagem" => round($totalPorcentagem, 1),
                ];

            }else{
                $dashMetas = $this->objMeta->get("","ano DESC, mes DESC, Id_meta ASC","0,9")->fetchAll(\PDO::FETCH_OBJ);

                //BUSCA A META CLINICA
                $buscaMetaClinica = $this->objMetaClinica->get(['ano' => $dashMetas[0]->ano, 'mes' => $dashMetas[0]->mes]);

                if($buscaMetaClinica->rowCount() > 0){

                    $totalPorcentagem = 0;
                    foreach ($dashMetas as $dashMeta){
                        $totalPorcentagem += $dashMeta->por_total;

                        //BUSCA SE ALTEROU O NOME DA META
                        $nomeAlterado = $this->objCargoAltera->get(["Id_meta" => $dashMeta->Id_meta])->rowCount();

                        if($nomeAlterado > 0){
                            $buscaNomeAlterado = $this->objCargoAltera->get(["Id_meta" => $dashMeta->Id_meta])->fetch(\PDO::FETCH_OBJ);
                            $dashMeta->nomeAlterado = $buscaNomeAlterado->nome;
                        }

                    }
                    $totalPorcentagem = $totalPorcentagem / 7; ;
                    $mesAtual  = $this->NumeroMes($dashMetas[0]->mes);
                    $mesMeta = $mesAtual.'/'.$dashMetas[0]->ano;

                    $dashMetaClinica = $buscaMetaClinica->fetch(\PDO::FETCH_OBJ);

                    $dados = [
                        "metas" => $dashMetas,
                        "mesAtual" => $mesMeta,
                        "metaClinica" => $dashMetaClinica,
                        "totalPorcentagem" => round($totalPorcentagem, 1),
                        "mensagem" => "Erro, nenhuma meta cadastrada para essa data ".$mes."/".$ano.""
                    ];

                }else{

                    $totalPorcentagem = 0;
                    foreach ($dashMetas as $dashMeta){
                        $totalPorcentagem += $dashMeta->por_total;

                        //BUSCA SE ALTEROU O NOME DA META
                        $nomeAlterado = $this->objCargoAltera->get(["Id_meta" => $dashMeta->Id_meta])->rowCount();

                        if($nomeAlterado > 0){
                            $buscaNomeAlterado = $this->objCargoAltera->get(["Id_meta" => $dashMeta->Id_meta])->fetch(\PDO::FETCH_OBJ);
                            $dashMeta->nomeAlterado = $buscaNomeAlterado->nome;
                        }

                    }
                    $totalPorcentagem = $totalPorcentagem / 7; ;
                    $mesAtual  = $this->NumeroMes($dashMetas[0]->mes);
                    $mesMeta = $mesAtual.'/'.$dashMetas[0]->ano;

                    $dados = [
                        "metas" => $dashMetas,
                        "mesAtual" => $mesMeta,
                        "totalPorcentagem" => round($totalPorcentagem, 1),
                        "mensagem" => "Erro, nenhuma meta cadastrada para essa data ".$mes."/".$ano.""
                    ];
                }

            }

        //CARREGA A INDEX CASO FOR UMA COMPARAÇÃO
        }else if($ano != null && $mes != null && $anoCompara != null && $mesCompara != null){

            $buscaMeta1 = $this->objMeta->get(["ano" => $ano, "mes" => $mes],"Id_meta ASC","");
            $buscaMeta2 = $this->objMeta->get(["ano" => $anoCompara, "mes" => $mesCompara],"Id_meta ASC","");

            //BUSCA A META CLINICA
            $buscaMetaClinica1 = $this->objMetaClinica->get(['ano' => $ano, 'mes' => $mes]);
            $buscaMetaClinica2 = $this->objMetaClinica->get(['ano' => $anoCompara, 'mes' => $mesCompara]);

            if($buscaMeta1->rowCount() > 0 && $buscaMeta2->rowCount() > 0){

                $dashMeta1 = $buscaMeta1->fetchAll(\PDO::FETCH_OBJ);
                foreach ($dashMeta1 as $dash1){

                    //BUSCA SE ALTEROU O NOME DA META
                    $nomeAlterado = $this->objCargoAltera->get(["Id_meta" => $dash1->Id_meta])->rowCount();

                    if($nomeAlterado > 0){
                        $buscaNomeAlterado = $this->objCargoAltera->get(["Id_meta" => $dash1->Id_meta])->fetch(\PDO::FETCH_OBJ);
                        $dash1->nomeAlterado = $buscaNomeAlterado->nome;
                    }

                }
                $dashMeta2 = $buscaMeta2->fetchAll(\PDO::FETCH_OBJ);
                foreach ($dashMeta2 as $dash2){

                    //BUSCA SE ALTEROU O NOME DA META
                    $nomeAlterado = $this->objCargoAltera->get(["Id_meta" => $dash2->Id_meta])->rowCount();

                    if($nomeAlterado > 0){
                        $buscaNomeAlterado = $this->objCargoAltera->get(["Id_meta" => $dash2->Id_meta])->fetch(\PDO::FETCH_OBJ);
                        $dash2->nomeAlterado = $buscaNomeAlterado->nome;
                    }

                }

                $dashMetaClinica1 = $buscaMetaClinica1->fetch(\PDO::FETCH_OBJ);
                $dashMetaClinica2 = $buscaMetaClinica2->fetch(\PDO::FETCH_OBJ);


                $por_total1 = $this->objMeta->get("SELECT SUM(por_total) AS total FROM metas WHERE mes = '{$mes}' AND ano = '{$ano}'")->fetchAll(\PDO::FETCH_OBJ);
                $totalPorcentagem1 = ceil(round($por_total1[0]->total)) / 7; ;

                $por_total2 = $this->objMeta->get("SELECT SUM(por_total) AS total FROM metas WHERE mes = '{$mesCompara}' AND ano = '{$anoCompara}'")->fetchAll(\PDO::FETCH_OBJ);
                $totalPorcentagem2 = ceil(round($por_total2[0]->total)) / 7; ;

                $mesAtual  = $this->NumeroMes($dashMeta1[0]->mes);
                $mesAtual2  = $this->NumeroMes($dashMeta2[0]->mes);
                $mesMeta = $mesAtual.'/'.$dashMeta1[0]->ano;
                $mesMeta2 = $mesAtual2.'/'.$dashMeta2[0]->ano;



                $dados = [
                    "metas" => $dashMeta1,
                    "metas2" => $dashMeta2,
                    "metaClinica" => $dashMetaClinica1,
                    "metaClinica2" => $dashMetaClinica2,
                    "totalPorcentagem" => round($totalPorcentagem1, 1),
                    "totalPorcentagem2" => round($totalPorcentagem2, 1),
                    "mesAtual" => $mesMeta,
                    "mesAtual2" => $mesMeta2,
                ];



            }else{

                $dashMetas = $this->objMeta->get("","ano DESC, mes DESC, Id_meta ASC","0,9")->fetchAll(\PDO::FETCH_OBJ);
                $por_total = $this->objMeta->get("SELECT SUM(por_total) AS total FROM metas WHERE mes = '{$mes}' AND ano = '{$ano}'")->fetchAll(\PDO::FETCH_OBJ);
                $totalPorcentagem = ceil(round($por_total[0]->total)) / 7; ;
                $mesAtual  = $this->NumeroMes($dashMetas[0]->mes);
                $mesMeta = $mesAtual.'/'.$dashMetas[0]->ano;
                $dados = [
                    "metas" => $dashMetas,
                    "mesAtual" => $mesMeta,
                    "mensagem" => "Erro, data sem meta cadastrada",
                    "totalPorcentagem" => round($totalPorcentagem, 1),
                ];
            }

        //CARREGA A INDEX
        } else {
            $buscaRecente = $this->objMeta->get("","ano DESC, mes DESC, Id_meta ASC","")->fetch(\PDO::FETCH_OBJ);
            $mes = $buscaRecente->mes;
            $ano = $buscaRecente->ano;

            //BUSCANDO A META CLINICA
            $dashMetaClinicaQtde = $this->objMetaClinica->get(['mes' => $mes, $ano => $ano])->rowCount();
            if($dashMetaClinicaQtde > 0){

                $dashMetaClinica = $this->objMetaClinica->get(['mes' => $mes, $ano => $ano])->fetch(\PDO::FETCH_OBJ);

                $dashMetas = $this->objMeta->get(['mes' => $mes, 'ano' => $ano],"ano DESC, mes DESC, Id_meta ASC","0,9")->fetchAll(\PDO::FETCH_OBJ);
                $totalPorcentagem = 0;
                foreach ($dashMetas as $dashMeta){
                    $totalPorcentagem += $dashMeta->por_total;

                    //BUSCA SE ALTEROU O NOME DA META
                    $nomeAlterado = $this->objCargoAltera->get(["Id_meta" => $dashMeta->Id_meta])->rowCount();

                    if($nomeAlterado > 0){
                        $buscaNomeAlterado = $this->objCargoAltera->get(["Id_meta" => $dashMeta->Id_meta])->fetch(\PDO::FETCH_OBJ);
                        $dashMeta->nomeAlterado = $buscaNomeAlterado->nome;
                    }


                }
                $totalPorcentagem = $totalPorcentagem / 7; ;
                $mesAtual  = $this->NumeroMes($dashMetas[0]->mes);
                $mesMeta = $mesAtual.'/'.$dashMetas[0]->ano;

                $dados = [
                    "metas" => $dashMetas,
                    "mesAtual" => $mesMeta,
                    "totalPorcentagem" => round($totalPorcentagem, 1),
                    "metaClinica" => $dashMetaClinica
                ];


            }else{

                $dashMetas = $this->objMeta->get(['mes' => $mes, 'ano' => $ano],"ano DESC, mes DESC, Id_meta ASC","0,9")->fetchAll(\PDO::FETCH_OBJ);
                $totalPorcentagem = 0;
                foreach ($dashMetas as $dashMeta){
                    $totalPorcentagem += $dashMeta->por_total;
                }
                $totalPorcentagem = $totalPorcentagem / 7; ;
                $mesAtual  = $this->NumeroMes($dashMetas[0]->mes);
                $mesMeta = $mesAtual.'/'.$dashMetas[0]->ano;
                $dados = [
                    "metas" => $dashMetas,
                    "mesAtual" => $mesMeta,
                    "totalPorcentagem" => round($totalPorcentagem, 1),
                ];
            }

        }

        $this->view("index", $dados);
    }

    public function login(){
        $this->view("login");
    }

    public function sair(){
        unset($_SESSION['usuario']);
        header("location:".BASE_URL);
    }

    public function erro404(){
        $this->view("erro/404");
    }

    /*
     ==================================================
                 FUNCTION DO SISTEMA
     ==================================================
     */
    function VerificaLogin(){

        if(!isset($_SESSION['usuario'])){
            header("location:".BASE_URL."painel/login");
        }

    }

    function PadraoMeta($param = null){
        $param = str_replace(".","",$param);
        $param = str_replace(",",".",$param);
        return $param;
    }

    function NumeroMes($param = null){
        $param = explode("/",$param);
        $mes = $param[0];
        switch ($mes){
            case 1:
                $mes = "Janeiro";
                break;
            case 2:
                $mes = "Fevereiro";
                break;
            case 3:
                $mes = "Março";
                break;
            case 4:
                $mes = "Abril";
                break;
            case 5:
                $mes = "Maio";
                break;
            case 6:
                $mes = "Junho";
                break;
            case 7:
                $mes = "Julho";
                break;
            case 8:
                $mes = "Agosto";
                break;
            case 9:
                $mes = "Setembro";
                break;
            case 10:
                $mes = "Outubro";
                break;
            case 11:
                $mes = "Novembro";
                break;
            case 12:
                $mes = "Dezembro";
                break;
        }

        return $mes;
    }

    // Função de porcentagem: N é X% de N
    function CalculaPorcentagem ( $parcial = 0, $total = 0 ) {
        if($parcial > 0){
            return ($parcial * 100) / $total;
        }
    }

    function PorcentagemMeta($param){

        $realizado = $param["realizado"];
        $metas = [
            $param["MB"],
            $param["MP"],
            $param["MO"],
            $param["MS"],
            $param["MD"],
        ];
        $porcentagem = [0,0,0,0,0];

        for($i=0; $i < 5; $i++){
            if($realizado >= $metas[$i]){
                $porcentagem[$i] = 100;
            }else{

                if($i > 1)
                {
                    if($realizado == $metas[$i-1]){
                        $porcentagem[$i] = 0;
                        break;
                    }
                }

                $porcentagem[$i] = $this->CalculaPorcentagem($realizado,$metas[$i]);
                //$porcentagem[$i] = $porcentagem[$i] / 5;
                $porcentagem[$i] = $porcentagem[$i];
                $porcentagem[$i] = round($porcentagem[$i],0);

                break;
            }
        }

        return $porcentagem;
    }

    /*
     ==================================================
                    FUNCTION AJAX
     ==================================================
     */

    public function ajaxLogin(){

        if(isset($_POST)){

            $email = $_POST['email'];
            $senha = md5($_POST['senha']);

            $dadosUsuario = $this->objUsuario->get(["email" => $email, "senha" => $senha]);
            $buscaUsuario = $dadosUsuario->fetch(\PDO::FETCH_OBJ);
            $qtdeUsuario = $dadosUsuario->rowCount();

            if($qtdeUsuario == 1){

                $_SESSION['usuario']['nome'] = $buscaUsuario->nome;
                $_SESSION['usuario']['email'] = $buscaUsuario->email;
                $_SESSION['usuario']['senha'] = $buscaUsuario->senha;

                $dados = [
                    "tipo" => true,
                    "mensagem" => "Logado com sucesso, aguarde..."
                ];

            }else{
                $dados = [
                    "tipo" => false,
                    "mensagem" => "Usuário não encontrado no sistema"
                ];
            }

        }else{
            $dados = [
                "tipo" => false,
                "mensagem" => "Dados não enviado"
            ];
        }

        echo json_encode($dados);
    }

    public function ajaxBusca(){

        if(isset($_POST)){

            $mes = $_POST['mes'];
            $ano = $_POST['ano'];

            $busca = $this->objMeta->get(["ano" => $ano, "mes" => $mes],"Id_meta ASC","");

            if($busca->rowCount() > 0){

                $dashMetas = $busca->fetchAll(\PDO::FETCH_OBJ);
                $mesAtual  = $this->NumeroMes($dashMetas[0]->mes);
                $mesMeta = $mesAtual.'/'.$dashMetas[0]->ano;
                $dados = [
                    "metas" => $dashMetas,
                    "mesAtual" => $mesMeta
                ];

                $this->view("index", $dados);

            }else{
                $dados = [
                    "tipo" => false,
                    "mensagem" => "Erro, nenhuma meta cadastrada para essa data ".$mes."/".$ano.""
                ];
            }

        }else{
            $dados = [
                "tipo" => false,
                "mensagem" => "Erro ao carregar"
            ];
        }

        echo json_encode($dados);
    }

    public function ajaxNovaMeta(){

        if(isset($_POST)){

            $contador = 0;

            //PEGANDO OS DADOS DO POST
            $dadosMeta = [
                "cargo" => $_POST['cargo'],
                "mes" => $_POST['metaMes'],
                "ano" => $_POST['metaAno'],
                "tipo_meta" => $_POST['tipo_meta'],
                "meta_bronze" => $this->PadraoMeta($_POST['metaBronze']),
                "meta_prata" => $this->PadraoMeta($_POST['metaPrata']),
                "meta_ouro" => $this->PadraoMeta($_POST['metaOuro']),
                "meta_safira" => $this->PadraoMeta($_POST['metaSafira']),
                "meta_diamante" => $this->PadraoMeta($_POST['metaDiamante'])
            ];


            //BUSCANDO A META POR MES, PARA VER SE JÁ CADASTRADA
            $buscaMetas = $this->objMeta->get(["mes" => $dadosMeta['mes'], "ano" => $dadosMeta['ano']])->fetchAll(\PDO::FETCH_OBJ);
            foreach ($buscaMetas as $buscaMeta){
                if ($dadosMeta['cargo'] == $buscaMeta->cargo) {
                    $contador += 1;
                }
            }

            if($contador == 0){

                if($this->objMeta->insert($dadosMeta)){
                    $dados = [
                        "tipo" => true,
                        "mensagem" => "Meta cadastrada com sucesso"
                    ];
                }else{
                    $dados = [
                        "tipo" => false,
                        "mensagem" => "Erro ao cadastrar, tente novamente"
                    ];
                }

            }else{
                $dados = [
                    "tipo" => false,
                    "mensagem" => "O cargo ".$dadosMeta['cargo']." já está cadastrado nessa data ".$dadosMeta['mes']."/".$dadosMeta['ano']."."
                ];
            }

        }else{
            $dados = [
                "tipo" => false,
                "mensagem" => "Erro, tente novamente"
            ];
        }
        echo json_encode($dados);

    }

    public function ajaxNovoValor(){

        if(isset($_POST)){

            $dadosValor = [
                "cargo" => $_POST['cargo'],
                "valor" => $this->PadraoMeta($_POST['valor']),
                "mes" => $_POST['metaMes'],
                "ano" => $_POST['metaAno']
            ];

            //BUSCA A META SELECIONADA
            $buscaQtde = $this->objMeta->get("SELECT * FROM metas WHERE mes = '{$dadosValor['mes']}' AND ano = '{$dadosValor['ano']}' AND cargo = '{$dadosValor['cargo']}'")->rowCount();

            if($buscaQtde == 1){
                $buscaMeta = $this->objMeta->get("SELECT * FROM metas WHERE mes = '{$dadosValor['mes']}' AND ano = '{$dadosValor['ano']}' AND cargo = '{$dadosValor['cargo']}'")->fetchAll(\PDO::FETCH_OBJ);
                $valor = $buscaMeta[0]->valor + $dadosValor['valor'];

                //ADICIONA O VALOR ENVIADO.
                if ($this->objMeta->update(["valor" => $valor],["Id_meta" => $buscaMeta[0]->Id_meta])){

                    $buscaMeta = $this->objMeta->get("SELECT * FROM metas WHERE mes = '{$dadosValor['mes']}' AND ano = '{$dadosValor['ano']}' AND cargo = '{$dadosValor['cargo']}'")->fetchAll(\PDO::FETCH_OBJ);
                    $metaValor = $buscaMeta[0]->valor;

                    //CALCULANDO A PORCENTAGEM TOTAL
                    $por_total = $this->CalculaPorcentagem($metaValor,$buscaMeta[0]->meta_diamante);

                    //ATUALIZANDO A PORCENTAGEM TOTAL
                    $this->objMeta->update(["por_total" => $por_total],["Id_meta" => $buscaMeta[0]->Id_meta]);

                    $metasCalcular = [
                        "realizado" => $metaValor,
                        "MB" => $buscaMeta[0]->meta_bronze,
                        "MP" => $buscaMeta[0]->meta_prata,
                        "MO" => $buscaMeta[0]->meta_ouro,
                        "MS" => $buscaMeta[0]->meta_safira,
                        "MD" => $buscaMeta[0]->meta_diamante
                    ];
                    $metasCalculada = $this->PorcentagemMeta($metasCalcular);

                    //ATUALIZANDO A PORCENTAGEM DE TODAS METAS
                    $this->objMeta->update(["por_bronze" => $metasCalculada[0],
                        "por_prata" => $metasCalculada[1],
                        "por_ouro" => $metasCalculada[2],
                        "por_safira" => $metasCalculada[3],
                        "por_diamante" => $metasCalculada[4]],
                        ["Id_meta" => $buscaMeta[0]->Id_meta]);

                    $dados = [
                        "tipo" => true,
                        "mensagem" => "Valor adicionado com sucesso!"
                    ];
                }else{
                    $dados = [
                        "tipo" => false,
                        "mensagem" => "Erro ao adicionar valor"
                    ];
                }
            }else{
                $dados = [
                    "tipo" => false,
                    "mensagem" => "Não foi possivél encontrar o cargo nesse mês."
                ];
            }

        }else{
            $dados = [
                "tipo" => false,
                "mensagem" => "Erro, tente novamente"
            ];
        }
        echo json_encode($dados);
    }

    public function ajaxNovoValorClinica(){

        if(isset($_POST)){

            $mes = $_POST['valorClinicaMes'];
            $ano = $_POST['valorClinicaAno'];
            $valor =  $this->PadraoMeta($_POST['valorClinicaRealizado']);

            $buscaMetaClinica = $this->objMetaClinica->get(['ano' => $ano, 'mes' => $mes]);

            if($buscaMetaClinica->rowCount() > 0){

                $buscaMetaClinica = $this->objMetaClinica->get(['ano' => $ano, 'mes' => $mes])->fetch(\PDO::FETCH_OBJ);
                $valorAtual = $buscaMetaClinica->realizado;
                $valor = $valor + $valorAtual;

                $porcentagem = $this->CalculaPorcentagem($valor,$buscaMetaClinica->meta);
                $porcentagem =  round($porcentagem,1);

                if ($this->objMetaClinica->update(['realizado' => $valor, 'porcentagem' => $porcentagem],['Id_meta_clinica' => $buscaMetaClinica->Id_meta_clinica])){

                    $dados = [
                        "tipo" => true,
                        "mensagem" => "Valor adicionado com sucesso"
                    ];

                }else{
                    $dados = [
                        "tipo" => false,
                        "mensagem" => "Erro ao adicionar valor"
                    ];
                }

            }else{
                $dados = [
                    "tipo" => false,
                    "mensagem" => "Meta clínica não encontrada para data ".$this->NumeroMes($mes)."/".$ano
                ];
            }

        }else{
            $dados = [
                "tipo" => false,
                "mensagem" => "Erro, tente novamente"
            ];
        }
        echo json_encode($dados);
    }

    public  function ajaxAlterarMetaClinica(){

        if(isset($_POST)){

            $id = $_POST['Id_meta_clinica'];
            $realizado =  $this->PadraoMeta($_POST['metaClinicaRealizado']);
            $meta = $this->PadraoMeta($_POST['metaClinica']);
            $tipo = $_POST['tipo_meta'];
            $porcentagem = $this->CalculaPorcentagem($realizado,$meta);
            $porcentagem = round($porcentagem,1);

            $dadosAlterar = [
                "tipo_meta" => $tipo,
                "realizado" => $realizado,
                "meta" => $meta,
                "porcentagem" => $porcentagem
            ];

            if($this->objMetaClinica->update($dadosAlterar,['Id_meta_clinica' => $id])){
                $dados = [
                    "tipo" => true,
                    "mensagem" => "Meta clínica alterada com sucesso"
                ];
            }else{
                $dados = [
                    "tipo" => false,
                    "mensagem" => "Erro ao alterar meta"
                ];
            }


        }else{
            $dados = [
                "tipo" => false,
                "mensagem" => "Dados não enviado"
            ];
        }

        echo  json_encode($dados);
    }

    public function ajaxAlterarMeta(){

        if(isset($_POST)){


            //SEPARANDO O ID PARA O UPDATE
            $Id_meta = $_POST['Id_meta'];

            //PASSANDO OS DADOS DO POST PARA UMA ARRAY
            $dadosMeta = [
                "tipo_meta" => $_POST['tipo_meta'],
                "valor" => $this->PadraoMeta($_POST['metaValor']),
                "meta_bronze" => $this->PadraoMeta($_POST['metaBronze']),
                "meta_prata" => $this->PadraoMeta($_POST['metaPrata']),
                "meta_ouro" => $this->PadraoMeta($_POST['metaOuro']),
                "meta_safira" => $this->PadraoMeta($_POST['metaSafira']),
                "meta_diamante" => $this->PadraoMeta($_POST['metaDiamante']),
            ];

            //BUSCA A META SELECIONADA
            $buscaQtde = $this->objMeta->get(['Id_meta' => $Id_meta])->rowCount();

            if($buscaQtde == 1){


                //INSERINDO NA TABELA CARGO ALTERAR PARA TROCAR APENAS O NOME DO CARGO
                $buscaCargoAlterar = $this->objCargoAltera->get(["Id_meta" => $Id_meta])->rowCount();

                //VERIFICA SE JÁ POSSUI O CARGO ALTERADO, SE TIVER ELE ALTERA SE NÃO FAZ O INSERT
                if ($buscaCargoAlterar > 0){

                    //FAZENDO O UPDATE
                    $this->objCargoAltera->update(["nome" => $_POST['metaCargo']], ["Id_meta" => $Id_meta]);

                }else{

                    //MONTANDO ARRAY DO INSERT
                    $dadosCargoAlterar = [
                        "Id_meta" => $Id_meta,
                        "nome" => $_POST['metaCargo'],
                        "mes" => $_POST['metaMes'],
                        "ano" => $_POST['metaAno']
                    ];

                    //FAZENDO O INSERT
                    $this->objCargoAltera->insert($dadosCargoAlterar);

                }

                $buscaMeta = $this->objMeta->get(['Id_meta' => $Id_meta])->fetch(\PDO::FETCH_OBJ);
                $metaValor = $buscaMeta->valor;

                //MONTADO A ARRAY PARA SER CALCULADA AS PORCENTAGEM DE CADA META
                //JÁ COM O NOVO VALOR ADICIONADO
                $metasCalcular = [
                    "realizado" => $dadosMeta['valor'],
                    "MB" => $dadosMeta['meta_bronze'],
                    "MP" => $dadosMeta['meta_prata'],
                    "MO" => $dadosMeta['meta_ouro'],
                    "MS" => $dadosMeta['meta_safira'],
                    "MD" => $dadosMeta['meta_diamante']
                ];

                //CALCULA A PORCENTAGEM DE CADA META
                $metasCalculada = $this->PorcentagemMeta($metasCalcular);

                //CALCULA A PORCENTAGEM TOTAL DE TODAS AS METAS
                $por_total = $this->CalculaPorcentagem($dadosMeta['valor'],$dadosMeta['meta_diamante']);

                //ARRAY DE UPDATE COM TODOS OS DADOS A SEREM ALTERADO
                //TODAS METAS E PORCENTAGEM JÁ FORAM CALCULADAS.
                $metaUpdate = [
                    "valor" => $dadosMeta['valor'],
                    "tipo_meta" => $dadosMeta['tipo_meta'],
                    "meta_bronze" => $dadosMeta['meta_bronze'],
                    "por_bronze" => $metasCalculada[0],
                    "meta_prata" => $dadosMeta['meta_prata'],
                    "por_prata" => $metasCalculada[1],
                    "meta_ouro" => $dadosMeta['meta_ouro'],
                    "por_ouro" => $metasCalculada[2],
                    "meta_safira" => $dadosMeta['meta_safira'],
                    "por_safira" => $metasCalculada[3],
                    "meta_diamante" => $dadosMeta['meta_diamante'],
                    "por_diamante" => $metasCalculada[4],
                    "por_total" => $por_total
                ];

                //ALTERA TODOS OS DADOS DA META.
                if ($this->objMeta->update($metaUpdate,["Id_meta" => $Id_meta])){

                    $dados = [
                        "tipo" => true,
                        "mensagem" => "Meta alterada com sucesso!"
                    ];

                }else{

                    $dados = [
                        "tipo" => false,
                        "mensagem" => "Erro ao alterar meta"
                    ];

                }
            }else{
                $dados = [
                    "tipo" => false,
                    "mensagem" => "Não foi possivél encontrar essa meta."
                ];
            }

        }else{
            $dados = [
                "tipo" => false,
                "mensagem" => "Erro, dados não enviado"
            ];
        }
        echo json_encode($dados);
    }

    public function ajaxNovaMetaClinica(){

        if(isset($_POST)){

            $mes = $_POST['metaClinicaMes'];
            $ano = $_POST['metaClinicaAno'];

            //VERIFICAR SE EXISTE ALGUMA META CADASTRADA NESSA DATA ENVIADO
            $buscaPorData = $this->objMeta->get(['ano' => $ano, 'mes' => $mes])->rowCount();

            //CASO ELE ENCONTRAR PELO MENOS 1 ELE CADASTRA A META CLINICA
            if($buscaPorData > 0){

                //VERIFICANDO SE JÁ EXISTE UMA META CADASTRADA NA TABELA metas_clinica, NESSA MESMA
                //DATA, ELA PRECISA SER DIFERENTE PARA SER INSERIDA NO BANCO
                $buscaPorDataClinica = $this->objMetaClinica->get(['ano' => $ano, 'mes' => $mes])->rowCount();

                if ($buscaPorDataClinica == 0){

                    //PASSANDO OS DADOS NO PADRÃO
                    $realizado = $this->PadraoMeta($_POST['metaClinicaRealizado']);
                    $meta = $this->PadraoMeta($_POST['metaClinica']);
                    $porcentagem = $this->CalculaPorcentagem($realizado,$meta);

                    //MONTANDO A ARRAY DE INSERT DA META
                    $metaClinicaInsert = [
                        "tipo_meta" => $_POST['tipo_meta'],
                        "realizado" => $realizado,
                        "meta" => $meta,
                        "porcentagem" => round($porcentagem,1),
                        "mes" => $mes,
                        "ano" => $ano,
                    ];

                    //FAZENDO O INSERT NO BANCO
                    if($this->objMetaClinica->insert($metaClinicaInsert)){
                        $dados = [
                            "tipo" => true,
                            "mensagem" => "Meta cadastrada com sucesso"
                        ];
                    }else{
                        $dados = [
                            "tipo" => false,
                            "mensagem" => "Ocorreu um erro ao cadastrar a meta"
                        ];
                    }

                }else{
                    $dados = [
                        "tipo" => false,
                        "mensagem" => "Já existe nenhuma meta cadastrada em ".$this->NumeroMes($mes)."/".$ano
                    ];
                }

            }else{
                $dados = [
                    "tipo" => false,
                    "mensagem" => "Não existe nenhuma meta cadastrada em ".$this->NumeroMes($mes)."/".$ano
                ];
            }

        }else{

            $dados = [
                "tipo" => false,
                "mensagem" => "Os dados não foram enviados"
            ];

        }

        echo json_encode($dados);

    }


} // END::Class Principal