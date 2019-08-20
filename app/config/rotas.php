<?php
/**
 * ======================================================
 *
 *  Este arquivo é responsavel por todas as configurações de
 *  rotas do sistema.
 *
 * ======================================================
 *
 *  Autor: Igor Cacerez
 *  Data: 17/04/2019
 *
 */

//ROTA DE ERRO 404
$Rotas->onError("404","Principal::erro404");

//ROTA RAIZ PRINCIPAL
$Rotas->on("GET","","Principal::index");

//CRIANDO GRUPO PAINEL
$Rotas->group("Principal","painel","Principal");

//ROTAS DO GRUPO PAINEL
$Rotas->onGroup("Principal","GET","","index");
$Rotas->onGroup("Principal","GET","login","login");
$Rotas->onGroup("Principal","GET","sair","sair");

//ROTAS DO GRUPO PAINEL VIA AJAX
$Rotas->onGroup("Principal","POST","ajaxLogin","ajaxLogin");
$Rotas->onGroup("Principal","POST","ajaxBusca","ajaxBusca");
$Rotas->onGroup("Principal","POST","ajaxNovaMeta","ajaxNovaMeta");
$Rotas->onGroup("Principal","POST","ajaxNovaMetaClinica","ajaxNovaMetaClinica");
$Rotas->onGroup("Principal","POST","ajaxNovoValor","ajaxNovoValor");
$Rotas->onGroup("Principal","POST","ajaxNovoValorClinica","ajaxNovoValorClinica");
$Rotas->onGroup("Principal","POST","ajaxAlterarMeta","ajaxAlterarMeta");
$Rotas->onGroup("Principal","POST","ajaxAlterarMetaClinica","ajaxAlterarMetaClinica");


$Rotas->on("GET","painel/{p}/{p}","Principal::index");
$Rotas->on("GET","painel/{p}/{p}/{p}/{p}","Principal::index");



