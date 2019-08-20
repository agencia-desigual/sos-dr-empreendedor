var Dados = {
    // "url": "http://localhost/Desigual/sosdr-empreendedor/",
    "url": "http://desigual.com.br/sos-empreendedor/",
}



function Comparar(){

    $("#formBusca").css('display','none');
    $("#formCompara").css('display','block');
}

function Cancelar(){
    $("#formBusca").css('display','block');
    $("#formCompara").css('display','none');
}
/*
==================================================
                  FORM BUSCA
==================================================
*/
$("#formBusca").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var mes = null;
    var ano = null;
    var form = new FormData(this);

    mes = form.get('mes');
    ano = form.get('ano');

    document.getElementById("btnBuscaMeta").disabled = true;
    document.getElementById("btnBuscaMeta").innerHTML = "Aguarde...";

    setTimeout(() => {
        location.href = Dados.url+'painel/'+ano+'/'+mes ;
    }, 1000);

    return false;
});




/*
==================================================
                  FORM COMPARA
==================================================
*/
$("#formCompara").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var mes = null;
    var ano = null;
    var mes_compara = null;
    var ano_compara = null;
    var form = new FormData(this);

    mes = form.get('mes');
    ano = form.get('ano');
    mes_compara = form.get('mes_compara');
    ano_compara = form.get('ano_compara');

    document.getElementById("comparaMeta").disabled = true;
    document.getElementById("comparaMeta").innerHTML = "Aguarde...";

    setTimeout(() => {
        location.href = Dados.url+'painel/'+ano+'/'+mes+'/'+ano_compara+'/'+mes_compara ;
    }, 1000);

    return false;
});




/*
==================================================
                  MASCARAS
==================================================
*/
$('.mes_ano').mask("99/9999");
$('.maskValor').mask("#.##0,00",{reverse : true});




/*
==================================================
             FORMULARIO NOVO VALOR
==================================================
*/
$("#formNovoValor").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);

    document.getElementById("btnNovaMeta").disabled = true;
    document.getElementById("btnNovaMeta").innerHTML = "Aguarde...";

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: Dados.url + 'painel/ajaxNovoValor',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            if(data.tipo == true){
                console.log(data);
                Swal.fire({
                    type: 'success',
                    title: 'Sucesso',
                    text: data.mensagem,
                })
                document.getElementById("formNovoValor").reset();
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Erro...',
                    text: data.mensagem,
                })
            }
            document.getElementById("btnNovaMeta").disabled = false;
            document.getElementById("btnNovaMeta").innerHTML = "Adicionar";

        },
        error: function (data) {
            Swal.fire({
                type: 'error',
                title: 'Erro...',
                text: data.mensagem,
            })
            document.getElementById("btnNovaMeta").disabled = false;
            document.getElementById("btnNovaMeta").innerHTML = "Adicionar";
        }

    });

    return false;
});




/*
==================================================
                FORMULARIO NOVA META
==================================================
*/
$("#formNovaMeta").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = new FormData(this);
    var formEnvia = $(this).serialize();

    document.getElementById("btnNovaMeta").disabled = true;
    document.getElementById("btnNovaMeta").innerHTML = "Aguarde...";

    var tipoMeta = form.get('tipo_meta');
    var cargo = form.get('cargo');
    var mensagem = "";
    var mB = form.get('metaBronze');
    var mP = form.get('metaPrata');
    var mO = form.get('metaOuro');
    var mS = form.get('metaSafira');
    var mD = form.get('metaDiamante');

    if(tipoMeta == "dinheiro"){
        mensagem = "<p style='text-align: left'>Será adicionada uma meta no cargo de <b>"+cargo+"</b> do tipo <b>Dinheiro</b> com os seguintes valores:</p><br>" +
            "<p style='text-align: left'><b>Meta Bronze: </b>R$ "+mB+"</p>" +
            "<p style='text-align: left'><b>Meta Prata: </b>R$ "+mP+"</p>" +
            "<p style='text-align: left'><b>Meta Ouro: </b>R$ "+mO+"</p>" +
            "<p style='text-align: left'><b>Meta Safira: </b>R$ "+mS+"</p>" +
            "<p style='text-align: left'><b>Meta Diamante: </b>R$ "+mD+"</p>";

    }else if(tipoMeta == "porcentagem"){

        mB = mB.replace(",", ".");
        mP = mP.replace(",", ".");
        mO = mO.replace(",", ".");
        mS = mS.replace(",", ".");
        mD = mD.replace(",", ".");
        mensagem = "<p style='text-align: left'>Será adicionada uma meta no cargo de <b>"+cargo+"</b> do tipo <b>Porcentagem</b> com os seguintes valores:</p><br>" +
            "<p style='text-align: left'><b>Meta Bronze: </b>"+mB+"%</p>" +
            "<p style='text-align: left'><b>Meta Prata: </b>"+mP+"%</p>" +
            "<p style='text-align: left'><b>Meta Ouro: </b>"+mO+"%</p>" +
            "<p style='text-align: left'><b>Meta Safira: </b>"+mS+"%</p>" +
            "<p style='text-align: left'><b>Meta Diamante: </b>"+mD+"%</p>";
    }else{
        mensagem = "<p style='text-align: left'>Será adicionada uma meta no cargo de <b>"+cargo+"</b> do tipo <b>Número</b> com os seguintes valores:</p><br>" +
            "<p style='text-align: left'><b>Meta Bronze: </b>"+mB+"</p>" +
            "<p style='text-align: left'><b>Meta Prata: </b>"+mP+"</p>" +
            "<p style='text-align: left'><b>Meta Ouro: </b>"+mO+"</p>" +
            "<p style='text-align: left'><b>Meta Safira: </b>"+mS+"</p>" +
            "<p style='text-align: left'><b>Meta Diamante: </b>"+mD+"</p>";
    }

    Swal.fire({
        title: 'Confira os dados',
        html: mensagem,
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, cadastrar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: Dados.url + 'painel/ajaxNovaMeta',
                data: formEnvia,
                cache : false,
                processData: false,
                success: function (data) {
                    if(data.tipo == true){
                        console.log(data);
                        Swal.fire({
                            type: 'success',
                            title: 'Sucesso',
                            text: data.mensagem,
                        })
                        document.getElementById("formNovaMeta").reset();
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }else {
                        Swal.fire({
                            type: 'error',
                            title: 'Erro...',
                            text: data.mensagem,
                        })
                    }
                    document.getElementById("btnNovaMeta").disabled = false;
                    document.getElementById("btnNovaMeta").innerHTML = "Adicionar";

                },
                error: function (data) {
                    Swal.fire({
                        type: 'error',
                        title: 'Erro...',
                        text: data.mensagem,
                    })
                    document.getElementById("btnNovaMeta").disabled = false;
                    document.getElementById("btnNovaMeta").innerHTML = "Adicionar";
                }

            });
        }
    })

    document.getElementById("btnNovaMeta").disabled = false;
    document.getElementById("btnNovaMeta").innerHTML = "Adicionar";

    return false;
});




/*
==================================================
             FORMULARIO NOVA META CLINICA
==================================================
*/
$("#formMetaClinica").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    // var formGet = new FormData(this);
    var form = $(this);

    document.getElementById("btnMetaClinica").disabled = true;
    document.getElementById("btnMetaClinica").innerHTML = "Aguarde...";

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: Dados.url + 'painel/ajaxNovaMetaClinica',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            if(data.tipo == true){
                console.log(data);
                Swal.fire({
                    type: 'success',
                    title: 'Sucesso',
                    text: data.mensagem,
                })
                document.getElementById("formMetaClinica").reset();
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Erro...',
                    text: data.mensagem,
                })
            }
            document.getElementById("btnMetaClinica").disabled = false;
            document.getElementById("btnMetaClinica").innerHTML = "Adicionar";

        },
        error: function (data) {
            Swal.fire({
                type: 'error',
                title: 'Erro...',
                text: data.mensagem,
            })
            document.getElementById("btnMetaClinica").disabled = false;
            document.getElementById("btnMetaClinica").innerHTML = "Adicionar";
        }

    });

    return false;
});




/*
==================================================
             FORMULARIO NOVO VALOR
==================================================
*/
$(".formEditarMeta").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var formGet = new FormData(this);
    var form = $(this);

    var id = formGet.get('Id_meta');

    document.getElementById("btnEditarMeta").disabled = true;
    document.getElementById("btnEditarMeta").innerHTML = "Aguarde...";

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: Dados.url + 'painel/ajaxAlterarMeta',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            if(data.tipo == true){
                console.log(data);
                Swal.fire({
                    type: 'success',
                    title: 'Sucesso',
                    text: data.mensagem,
                })
                document.getElementById("formNovoValor").reset();
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Erro...',
                    text: data.mensagem,
                })
            }
            document.getElementById("btnNovaMeta").disabled = false;
            document.getElementById("btnNovaMeta").innerHTML = "Adicionar";

        },
        error: function (data) {
            Swal.fire({
                type: 'error',
                title: 'Erro...',
                text: data.mensagem,
            })
            document.getElementById("btnNovaMeta").disabled = false;
            document.getElementById("btnNovaMeta").innerHTML = "Adicionar";
        }

    });

    return false;
});



/*
==================================================
         FORMULARIO NOVO VALOR CLINICA
==================================================
*/
$("#formValorClinica").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var formGet = new FormData(this);
    var form = $(this);

    document.getElementById("btnValorClinica").disabled = true;
    document.getElementById("btnValorClinica").innerHTML = "Aguarde...";

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: Dados.url + 'painel/ajaxNovoValorClinica',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            if(data.tipo == true){
                console.log(data);
                Swal.fire({
                    type: 'success',
                    title: 'Sucesso',
                    text: data.mensagem,
                })
                document.getElementById("formValorClinica").reset();
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Erro...',
                    text: data.mensagem,
                })
            }
            document.getElementById("btnValorClinica").disabled = false;
            document.getElementById("btnValorClinica").innerHTML = "Adicionar";

        },
        error: function (data) {
            Swal.fire({
                type: 'error',
                title: 'Erro...',
                text: data.mensagem,
            })
            document.getElementById("btnValorClinica").disabled = false;
            document.getElementById("btnValorClinica").innerHTML = "Adicionar";
        }

    });

    return false;
});




/*
==================================================
         FORMULARIO ALTERAR CLINICA
==================================================
*/
$("#formMetaClinicaAlterar").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var formGet = new FormData(this);
    var form = $(this);

    document.getElementById("btnMetaValorClinica").disabled = true;
    document.getElementById("btnMetaValorClinica").innerHTML = "Aguarde...";

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: Dados.url + 'painel/ajaxAlterarMetaClinica',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            if(data.tipo == true){
                console.log(data);
                Swal.fire({
                    type: 'success',
                    title: 'Sucesso',
                    text: data.mensagem,
                })
                document.getElementById("formMetaClinicaAlterar").reset();
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Erro...',
                    text: data.mensagem,
                })
            }
            document.getElementById("btnMetaValorClinica").disabled = false;
            document.getElementById("btnMetaValorClinica").innerHTML = "Alterar";

        },
        error: function (data) {
            Swal.fire({
                type: 'error',
                title: 'Erro...',
                text: data.mensagem,
            })
            document.getElementById("btnMetaValorClinica").disabled = false;
            document.getElementById("btnMetaValorClinica").innerHTML = "Alterar";
        }

    });

    return false;
});




/*
==================================================
                FORMULARIO LOGIN
==================================================
*/
$("#formLogin").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);

    document.getElementById("btnLogin").disabled = true;
    document.getElementById("btnLogin").innerHTML = "VALIDANDO, AGUARDE...";

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: Dados.url + 'painel/ajaxLogin',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            if(data.tipo == true){
                console.log(data);
                Swal.fire({
                    type: 'success',
                    title: 'Sucesso',
                    text: data.mensagem,
                })
                document.getElementById("formLogin").reset();
                setTimeout(() => {
                    location.href = Dados.url+'painel' ;
                }, 2000);
            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Erro...',
                    text: data.mensagem,
                })
            }
            document.getElementById("btnLogin").disabled = false;
            document.getElementById("btnLogin").innerHTML = "ENTRAR";

        },
        error: function (data) {
            Swal.fire({
                type: 'error',
                title: 'Erro...',
                text: data.mensagem,
            })
            document.getElementById("btnLogin").disabled = false;
            document.getElementById("btnLogin").innerHTML = "ENTRAR";
        }

    });

    return false;
});
