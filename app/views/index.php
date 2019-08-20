<?php $this->view("includes/header"); ?>

    <!-- CABEÇALHO COM FILTROS -->
    <div style="margin-top: 30px" class="container-dashboard">
        <?php if(isset($mensagem)): ?>
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                <strong><?= $mensagem ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-8">
                <?php
                $dataAtual = explode("/",$mesAtual);
                $mes = $dataAtual[0];
                $ano = $dataAtual[1];
                ?>
                <form id="formBusca">

                    <!-- BUSCA NORMAL -->
                    <div class="row">

                        <!-- ANO -->
                        <div class="input-group col-md-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Ano</label>
                            </div>
                            <select required name="ano" class="custom-select" id="inputGroupSelect01">
                                <option  value="<?= $ano ?>" selected><?= $ano ?></option>
                            </select>
                        </div>
                        <!-- FIM ANO -->

                        <!-- MES -->
                        <div class="input-group col-md-4">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Mês</label>
                            </div>
                            <select required name="mes" class="custom-select" id="inputGroupSelect01">
                                <option  value="" selected><?= $mes ?></option>
                                <option value="1">Janeiro</option>
                                <option value="2">Fevereiro</option>
                                <option value="3">Março</option>
                                <option value="4">Abril</option>
                                <option value="5">Maio</option>
                                <option value="6">Junho</option>
                                <option value="7">Julho</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                        </div>
                        <!-- FIM MES -->

                        <!-- BTN BUSCA -->
                        <div class="input-group col">
                            <button id="btnBuscaMeta" style="background-color: #45a3e6" class="btn btn-primary" type="submit">
                                <i style="color: #27448b" class="fas fa-search"></i> BUSCAR
                            </button>
                        </div>
                        <!-- FIM BTN BUSCA -->

                        <!-- BTN COMPARAR -->
                        <div class="input-group col">
                            <button id="btnComparar" onclick="Comparar()" style="background-color: #45a3e6" class="btn btn-primary" type="button">
                                <i style="color: #27448b" class="fas fa-align-center"></i> COMPARAR
                            </button>
                        </div>
                        <!-- FIM BTN COMPARAR -->

                    </div>
                    <!-- FIM BUSCA NORMAL -->

                </form>

                <form style="display: none" id="formCompara">

                    <!-- COMPARA CAMPOS 1 -->
                    <div class="row">

                        <!-- ANO -->
                        <div class="input-group col-md-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Ano</label>
                            </div>
                            <select required name="ano" class="custom-select" id="inputGroupSelect01">
                                <option  value="<?= $ano ?>" selected><?= $ano ?></option>
                            </select>
                        </div>
                        <!-- FIM ANO -->

                        <!-- MES -->
                        <div class="input-group col-md-4">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Mês</label>
                            </div>
                            <select required name="mes" class="custom-select" id="inputGroupSelect01">
                                <option  value="" selected><?= $mes ?></option>
                                <option value="1">Janeiro</option>
                                <option value="2">Fevereiro</option>
                                <option value="3">Março</option>
                                <option value="4">Abril</option>
                                <option value="5">Maio</option>
                                <option value="6">Junho</option>
                                <option value="7">Julho</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                        </div>
                        <!-- FIM MES -->

                    </div>
                    <!-- FIM COMPARA CAMPOS 1 -->

                    <!-- COMPARA CAMPOS 2 -->
                    <div style="margin-top: 30px" class="row">

                        <!-- ANO -->
                        <div class="input-group col-md-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Ano</label>
                            </div>
                            <select required name="ano_compara" class="custom-select" id="inputGroupSelect01">
                                <option  value="<?= $ano ?>" selected><?= $ano ?></option>
                            </select>
                        </div>
                        <!-- FIM ANO -->

                        <!-- MES -->
                        <div class="input-group col-md-4">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Mês</label>
                            </div>
                            <select required name="mes_compara" class="custom-select" id="inputGroupSelect01">
                                <option  value="" selected><?= $mes ?></option>
                                <option value="1">Janeiro</option>
                                <option value="2">Fevereiro</option>
                                <option value="3">Março</option>
                                <option value="4">Abril</option>
                                <option value="5">Maio</option>
                                <option value="6">Junho</option>
                                <option value="7">Julho</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                        </div>
                        <!-- FIM MES -->

                        <!-- BTN BUSCA -->
                        <div class="input-group col">
                            <button onclick="Cancelar()" class="btn btn-danger" type="button">
                                <i style="color: #ffffff" class="fas fa-times"></i> CANCELAR
                            </button>
                        </div>
                        <!-- FIM BTN BUSCA -->

                        <!-- BTN COMPARAR -->
                        <div class="input-group col">
                            <button id="comparaMeta" style="background-color: #45a3e6" class="btn btn-primary" type="submit">
                                <i style="color: #27448b" class="fas fa-align-center"></i> COMPARAR
                            </button>
                        </div>
                        <!-- FIM BTN COMPARAR -->

                    </div>
                    <!-- FIM COMPARA CAMPOS 2 -->

                </form>

            </div>
            <div class="col-md-4">
                <div class="dropdown">
                    <button style="float: right; background-color: #45a3e6" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i style="color: #27448b" class="fas fa-plus-circle"></i> ADICIONAR
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalMeta"><i class="fas fa-chart-line"></i> &nbsp; Metas</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalValor"><i class="fas fa-coins"></i> &nbsp; Valor</a>
                        <hr>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalMetaClinica"><i class="fas fa-hospital-alt"></i> &nbsp; Meta Clínica</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalValorClinica"><i class="fas fa-coins"></i> &nbsp; Valor Clínica</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIM CABEÇALHO COM FILTROS -->

    <!-- GRAFICOS -->
    <div class="container-dashboard">

        <?php if(isset($metas2)): ?>
            <div style="margin-top: 30px;margin-left: 10px" class="row">
                <div style="height: 30px;width: 30px;background-color: #45A3E6"></div><p style="color: #45A3E6; font-weight: bold; margin-left: 5px"><?= $mesAtual ?></p>
                <div style="height: 30px;width: 30px;background-color: #27448B; margin-left: 20px"></div><p style="color: #27448B; font-weight: bold; margin-left: 5px"><?= $mesAtual2 ?></p>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">

                <div class="add-overflow">

                    <!-- GRAFICO BARRAS -->
                    <div style="float: left; width: 800px; height: auto;" class="card-graficos">
                        <!-- CABECALHO TABELA -->
                        <div class="row">
                            <div style="border-left: none;" class="coluna-cargo borda-coluna">
                                <p style="color: white"></p>
                            </div>
                            <div class="coluna-progesso borda text-center">
                                <img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/bronze.png">
                            </div>
                            <div class="coluna-progesso borda text-center">
                                <img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/prata.png">
                            </div>
                            <div class="coluna-progesso borda text-center">
                                <img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/ouro.png">
                            </div>
                            <div class="coluna-progesso borda text-center">
                                <img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/safira.png">
                            </div>
                            <div class="coluna-progesso borda text-center">
                                <img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/diamante.png">
                            </div>
                        </div>
                        <!-- FIM CABECALHO TABELA -->

                        <!-- CONTEUDO GRAFICO -->
                        <?php if(isset($metas2)): ?>
                            <?php for($i=0; $i<=8; $i++): ?>
                                <div class="row">
                                    <div class="coluna-cargo borda">
                                        <p>
                                            <?php if(isset($metas[$i]->nomeAlterado)): ?>
                                                <?= $metas[$i]->nomeAlterado ?>
                                            <?php else: ?>
                                                <?= $metas[$i]->cargo ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>

                                    <div class="coluna-progesso borda ">
                                        <div class="barra-progresso-compara1" style="max-width: 100%; width: calc((<?= $metas[$i]->por_bronze ?>%))"></div>
                                        <div class="barra-progresso-compara2" style="max-width: 100%; width: calc((<?= $metas2[$i]->por_bronze ?>%))"></div>
                                    </div>

                                    <div class="coluna-progesso borda">
                                        <div class="barra-progresso-compara1" style="max-width: 100%; width: calc((<?= $metas[$i]->por_prata ?>%))"></div>
                                        <div class="barra-progresso-compara2" style="max-width: 100%; width: calc((<?= $metas2[$i]->por_prata ?>%))"></div>
                                    </div>
                                    <div class="coluna-progesso borda">
                                        <div class="barra-progresso-compara1" style="max-width: 100%; width: calc((<?= $metas[$i]->por_ouro ?>%))"></div>
                                        <div class="barra-progresso-compara2" style="max-width: 100%; width: calc((<?= $metas2[$i]->por_ouro ?>%))"></div>
                                    </div>
                                    <div class="coluna-progesso borda">
                                        <div class="barra-progresso-compara1" style="max-width: 100%; width: calc((<?= $metas[$i]->por_safira ?>%))"></div>
                                        <div class="barra-progresso-compara2" style="max-width: 100%; width: calc((<?= $metas2[$i]->por_safira ?>%))"></div>
                                    </div>
                                    <div class="coluna-progesso borda">
                                        <div class="barra-progresso-compara1" style="max-width: 100%; width: calc((<?= $metas[$i]->por_diamante?>%))"></div>
                                        <div class="barra-progresso-compara2" style="max-width: 100%; width: calc((<?= $metas2[$i]->por_diamante ?>%))"></div>
                                    </div>

                                </div>
                            <?php endfor;?>
                        <?php else: ?>

                            <?php foreach ($metas as $meta): ?>
                                <div class="row">
                                    <div class="coluna-cargo borda">
                                        <p>
                                            <?php if(isset($meta->nomeAlterado)): ?>
                                                <?= $meta->nomeAlterado ?>
                                            <?php else: ?>
                                                <?= $meta->cargo ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>

                                    <div class="coluna-progesso borda ">
                                        <div class="barra-progresso" style="max-width: 100%; width: calc((<?= $meta->por_bronze ?>%))"></div>
                                    </div>

                                    <div class="coluna-progesso borda">
                                        <div class="barra-progresso" style="max-width: 100%; width: calc((<?= $meta->por_prata ?>%))"></div>
                                    </div>

                                    <div class="coluna-progesso borda">
                                        <div class="barra-progresso" style="max-width: 100%; width: calc((<?= $meta->por_ouro ?>%))"></div>
                                    </div>

                                    <div class="coluna-progesso borda">
                                        <div class="barra-progresso" style="max-width: 100%; width: calc((<?= $meta->por_safira ?>%))"></div>
                                    </div>

                                    <div class="coluna-progesso borda">
                                        <div class="barra-progresso" style="max-width: 100%; width: calc((<?= $meta->por_diamante ?>%))"></div>
                                    </div>

                                </div>
                            <?php endforeach;?>

                        <?php endif; ?>
                        <!-- FIM CONTEUDO GRAFICO -->

                    </div>
                    <!-- FIM GRAFICO BARRAS -->
                </div>


                <!-- EM CASO DE COMPARAÇÃO ELE MOSTRAS AS 2 DIVS -->
                <!-- PORCENTAGEM -->

                <?php if(isset($metaClinica)): ?>
                    <?php if($metaClinica != null): ?>
                        <div class="card-graficos card-porcentagem">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="#" data-toggle="modal" data-target="#ModalEditarMetaClinica-<?= $metaClinica->Id_meta_clinica ?>" ><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/editar.png"></a>

                                    <p style="color: #45A3E6; font-weight: bold; margin-left: 5px"><?= $mesAtual ?></p>

                                    <!-- Modal Editar Meta Clínica -->
                                    <div class="modal fade" id="ModalEditarMetaClinica-<?= $metaClinica->Id_meta_clinica ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="TituloModalCentralizado">Editar Meta Clínica</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="formMetaClinicaAlterar">

                                                        <input type="hidden" name="Id_meta_clinica" value="<?= $metaClinica->Id_meta_clinica ?>">

                                                        <!-- META / REALIZADO -->
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">MÊS / ANO</label><br>
                                                                    <p><?= $metaClinica->mes ?> / <?= $metaClinica->ano ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIM META / REALIZADO -->

                                                        <!-- TIPO META -->
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div style="margin-bottom: 20px;margin-top: 20px;" class="col-md-12 text-center">
                                                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">TIPO META</label>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <?php if($metaClinica->tipo_meta == "dinheiro"): ?>
                                                                                <input checked value="dinheiro" type="radio" name="tipo_meta">
                                                                            <?php else: ?>
                                                                                <input checked value="dinheiro" type="radio" name="tipo_meta">
                                                                            <?php endif; ?>
                                                                            <label>Dinheiro</label>
                                                                        </div>

                                                                        <div class="col">
                                                                            <?php if($metaClinica->tipo_meta == "porcentagem"): ?>
                                                                                <input checked value="porcentagem" type="radio" name="tipo_meta">
                                                                            <?php else: ?>
                                                                                <input  value="porcentagem" type="radio" name="tipo_meta">
                                                                            <?php endif; ?>
                                                                            <label>Porcentagem</label>
                                                                        </div>

                                                                        <div class="col">
                                                                            <?php if($metaClinica->tipo_meta == "numero"): ?>
                                                                                <input checked value="numero" type="radio" name="tipo_meta">
                                                                            <?php else: ?>
                                                                                <input value="numero" type="radio" name="tipo_meta">
                                                                            <?php endif; ?>
                                                                            <label>Número</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIM TIPO META -->

                                                        <!-- META / REALIZADO -->
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">META</label><br>
                                                                    <input required name="metaClinica" type="text" class="form-control maskValor" value="<?= number_format($metaClinica->meta, 2, ',', '.') ?>">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">REALIZADO</label><br>
                                                                    <input required name="metaClinicaRealizado" type="text" class="form-control maskValor" value="<?= number_format($metaClinica->realizado, 2, ',', '.') ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIM META / REALIZADO -->

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                            <button type="submit" id="btnMetaValorClinica" class="btn btn-primary">Alterar</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 text-center">
                                    <h1 style="font-size: 100px; color: #27448B"><?= $metaClinica->porcentagem ?><p style="display:inline;font-size: 50px;margin-left: -5px;color: #27448B;">%</p></h1><br>
                                    <?php if ($metaClinica->tipo_meta == "dinheiro"): ?>
                                        <h3 style="color: #007BFF; font-weight: bold; font-size: 20px"><p style="display:inline;font-size: 12px;margin-left: -5px;color: #27448B;">REALIZADO:</p>R$<?= number_format($metaClinica->realizado, 2, ',', '.') ?></h3>
                                        <h3 style="color: #007BFF; font-weight: bold; font-size: 20px"><p style="display:inline;font-size: 12px;margin-left: -5px;color: #27448B;">META:</p>R$<?= number_format($metaClinica->meta, 2, ',', '.') ?></h3>
                                    <?php elseif ($metaClinica->tipo_meta == "porcentagem"): ?>
                                        <h3 style="color: #007BFF; font-weight: bold; font-size: 20px"><p style="display:inline;font-size: 12px;margin-left: -5px;color: #27448B;">REALIZADO:</p><?= number_format($metaClinica->realizado, 2, '.', '.') ?>%</h3>
                                        <h3 style="color: #007BFF; font-weight: bold; font-size: 20px"><p style="display:inline;font-size: 12px;margin-left: -5px;color: #27448B;">META:</p><?= number_format($metaClinica->meta, 2, '.', '.') ?>%</h3>
                                    <?php else: ?>
                                        <h3 style="color: #007BFF; font-weight: bold; font-size: 20px"><p style="display:inline;font-size: 12px;margin-left: -5px;color: #27448B;">REALIZADO:</p><?= number_format($metaClinica->realizado, 2, '.', '.') ?></h3>
                                        <h3 style="color: #007BFF; font-weight: bold; font-size: 20px"><p style="display:inline;font-size: 12px;margin-left: -5px;color: #27448B;">META:</p><?= number_format($metaClinica->meta, 2, '.', '.') ?></h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                    <div class="card-graficos card-porcentagem">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 style="font-size: 18px; color: #27448B">Nenhuma meta clínica cadastrada nessa data <?= $mesAtual ?></h1><br>
                                <a href="#" data-toggle="modal" data-target="#ModalMetaClinica">ADICIONAR</a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(isset($metaClinica2)): ?>
                    <?php if($metaClinica2 != null): ?>
                    <div class="card-graficos card-porcentagem">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p style="color: #45A3E6; font-weight: bold; margin-left: 5px"><?= $mesAtual2 ?></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <h1 style="font-size: 100px; color: #27448B"><?= $metaClinica2->porcentagem ?><p style="display:inline;font-size: 50px;margin-left: -5px;color: #27448B;">%</p></h1><br>
                                <?php if ($metaClinica2->tipo_meta == "dinheiro"): ?>
                                    <h3 style="color: #007BFF; font-weight: bold; font-size: 20px"><p style="display:inline;font-size: 12px;margin-left: -5px;color: #27448B;">REALIZADO:</p>R$<?= number_format($metaClinica2->realizado, 2, ',', '.') ?></h3>
                                    <h3 style="color: #007BFF; font-weight: bold; font-size: 20px"><p style="display:inline;font-size: 12px;margin-left: -5px;color: #27448B;">META:</p>R$<?= number_format($metaClinica2->meta, 2, ',', '.') ?></h3>
                                <?php elseif ($metaClinica2->tipo_meta == "porcentagem"): ?>
                                    <h3 style="color: #007BFF; font-weight: bold; font-size: 20px"><p style="display:inline;font-size: 12px;margin-left: -5px;color: #27448B;">REALIZADO:</p><?= number_format($metaClinica2->realizado, 2, '.', '.') ?>%</h3>
                                    <h3 style="color: #007BFF; font-weight: bold; font-size: 20px"><p style="display:inline;font-size: 12px;margin-left: -5px;color: #27448B;">META:</p><?= number_format($metaClinica2->meta, 2, '.', '.') ?>%</h3>
                                <?php else: ?>
                                    <h3 style="color: #007BFF; font-weight: bold; font-size: 20px"><p style="display:inline;font-size: 12px;margin-left: -5px;color: #27448B;">REALIZADO:</p><?= number_format($metaClinica2->realizado, 2, '.', '.') ?></h3>
                                    <h3 style="color: #007BFF; font-weight: bold; font-size: 20px"><p style="display:inline;font-size: 12px;margin-left: -5px;color: #27448B;">META:</p><?= number_format($metaClinica2->meta, 2, '.', '.') ?></h3>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                        <div class="card-graficos card-porcentagem">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 style="font-size: 18px; color: #27448B">Nenhuma meta clínica cadastrada nessa data <?= $mesAtual2 ?></h1><br>
                                    <a href="#" data-toggle="modal" data-target="#ModalMetaClinica">ADICIONAR</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- FIM PORCENTAGEM -->

            </div>
        </div>
    </div>
    <!-- FIM GRAFICOS -->

    <br>
    <br>
    <br>

    <?php if(!isset($metas2)) : ?>
        <!-- TABELA META -->
        <div class="container-dashboard">
            <h3 style="color: #27448B"><?= $mesAtual ?></h3>
            <div class="row">
                <div class="col-md-12">
                    <div style="overflow-x: auto">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Cargo</th>
                                <th scope="col">Realizado</th>
                                <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/bronze.png"></th>
                                <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/prata.png"></th>
                                <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/ouro.png"></th>
                                <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/safira.png"></th>
                                <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/diamante.png"></th>
                                <th scope="col">Meta Bronze</th>
                                <th scope="col">Meta Prata</th>
                                <th scope="col">Meta Ouro</th>
                                <th scope="col">Meta Safira</th>
                                <th scope="col">Meta Diamante</th>
                                <th class="text-center" scope="col">Alterar</th>


                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($metas as $meta): ?>

                                <tr>
                                    <th class="coluna-cargo" scope="row">
                                        <p>
                                            <?php if(isset($meta->nomeAlterado)): ?>
                                                <?= $meta->nomeAlterado ?>
                                            <?php else: ?>
                                                <?= $meta->cargo ?>
                                            <?php endif; ?>
                                        </p>
                                    </th>
                                    <!-- VALOR DA META -->
                                    <?php if($meta->tipo_meta == "dinheiro"): ?>
                                        <td class="text-center">R$<?= number_format($meta->valor, 2, ',', '.') ?></td>
                                    <?php elseif($meta->tipo_meta == "porcentagem"): ?>
                                        <td class="text-center"><?= $meta->valor ?>%</td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->valor ?></td>
                                    <?php endif; ?>
                                    <!-- FIM VALOR DA META -->


                                    <!-- PROGRESSO DAS METAS -->
                                    <?php if($meta->por_bronze == 100): ?>
                                        <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                    <?php elseif($meta->por_bronze == 0): ?>
                                        <td class="text-center"></td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->por_bronze ?>%</td>
                                    <?php endif; ?>


                                    <?php if($meta->por_prata == 100): ?>
                                        <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                    <?php elseif($meta->por_prata == 0): ?>
                                        <td class="text-center"></td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->por_prata ?>%</td>
                                    <?php endif; ?>


                                    <?php if($meta->por_ouro == 100): ?>
                                        <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                    <?php elseif($meta->por_ouro == 0): ?>
                                        <td class="text-center"></td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->por_ouro ?>%</td>
                                    <?php endif; ?>


                                    <?php if($meta->por_safira == 100): ?>
                                        <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                    <?php elseif($meta->por_safira == 0): ?>
                                        <td class="text-center"></td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->por_safira ?>%</td>
                                    <?php endif; ?>


                                    <?php if($meta->por_diamante == 100): ?>
                                        <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                    <?php elseif($meta->por_diamante == 0): ?>
                                        <td class="text-center"></td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->por_diamante ?>%</td>
                                    <?php endif; ?>

                                    <!-- FIM PROGRESSO DAS METAS -->

                                    <!-- VALORES DA META -->
                                    <!-- META BRONZE -->
                                    <?php if($meta->tipo_meta == "dinheiro"): ?>
                                        <td class="text-center">R$<?= number_format($meta->meta_bronze, 2, ',', '.') ?></td>
                                    <?php elseif($meta->tipo_meta == "porcentagem"): ?>
                                        <td class="text-center"><?= $meta->meta_bronze ?>%</td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->meta_bronze ?></td>
                                    <?php endif; ?>
                                    <!-- FIM META BRONZE -->

                                    <!-- META PRATA -->
                                    <?php if($meta->tipo_meta == "dinheiro"): ?>
                                        <td class="text-center">R$<?= number_format($meta->meta_prata, 2, ',', '.') ?></td>
                                    <?php elseif($meta->tipo_meta == "porcentagem"): ?>
                                        <td class="text-center"><?= $meta->meta_prata ?>%</td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->meta_prata ?></td>
                                    <?php endif; ?>
                                    <!-- FIM META PRATA -->

                                    <!-- META OURO -->
                                    <?php if($meta->tipo_meta == "dinheiro"): ?>
                                        <td class="text-center">R$<?= number_format($meta->meta_ouro, 2, ',', '.') ?></td>
                                    <?php elseif($meta->tipo_meta == "porcentagem"): ?>
                                        <td class="text-center"><?= $meta->meta_ouro ?>%</td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->meta_ouro ?></td>
                                    <?php endif; ?>
                                    <!-- FIM META OURO -->

                                    <!-- META SAFIRA -->
                                    <?php if($meta->tipo_meta == "dinheiro"): ?>
                                        <td class="text-center">R$<?= number_format($meta->meta_safira, 2, ',', '.') ?></td>
                                    <?php elseif($meta->tipo_meta == "porcentagem"): ?>
                                        <td class="text-center"><?= $meta->meta_safira ?>%</td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->meta_safira ?></td>
                                    <?php endif; ?>
                                    <!--FIM META SAFIRA -->

                                    <!-- META DIAMANTE -->
                                    <?php if($meta->tipo_meta == "dinheiro"): ?>
                                        <td class="text-center">R$<?= number_format($meta->meta_diamante, 2, ',', '.') ?></td>
                                    <?php elseif($meta->tipo_meta == "porcentagem"): ?>
                                        <td class="text-center"><?= $meta->meta_diamante ?>%</td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->meta_diamante ?></td>
                                    <?php endif; ?>
                                    <!-- FIM META DIAMANTE -->
                                    <!-- FIM VALORES DA META -->

                                    <td class="text-center">
                                        <a href="#" data-toggle="modal" data-target="#ModalEditar-<?= $meta->Id_meta ?>" ><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/editar.png"></a>
                                    </td>
                                </tr>

                                <!-- Modal Editar Meta -->
                                <div class="modal fade" id="ModalEditar-<?= $meta->Id_meta ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Meta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="formEditarMeta">
                                                    <input type="hidden" name="Id_meta" value="<?= $meta->Id_meta ?>">
                                                    <input type="hidden" name="metaMes" value="<?= $meta->mes ?>">
                                                    <input type="hidden" name="metaAno" value="<?= $meta->ano ?>">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">CARGO</label>
                                                                <?php if(isset($meta->nomeAlterado)): ?>
                                                                    <input required name="metaCargo" type="text" class="form-control" value="<?= $meta->nomeAlterado ?>">
                                                                <?php else: ?>
                                                                    <input required name="metaCargo" type="text" class="form-control" value="<?= $meta->cargo ?>">
                                                                <?php endif; ?>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">MÊS / ANO</label>
                                                                <p><?= $meta->mes ?>/<?= $meta->ano ?></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div style="margin-bottom: 20px;margin-top: 20px;" class="col-md-12 text-center">
                                                                <label style="font-weight: bold; color: #27448b" class="text-center" for="exampleFormControlSelect1">TIPO META</label>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <?php if($meta->tipo_meta == "dinheiro"): ?>
                                                                            <input checked value="dinheiro" type="radio" name="tipo_meta">
                                                                        <?php else: ?>
                                                                            <input type="radio" value="dinheiro" name="tipo_meta">
                                                                        <?php endif; ?>
                                                                        <label>Dinheiro</label>
                                                                    </div>

                                                                    <div class="col">
                                                                        <?php if($meta->tipo_meta == "porcentagem"): ?>
                                                                            <input checked type="radio" value="porcentagem" name="tipo_meta">
                                                                        <?php else: ?>
                                                                            <input type="radio" value="porcentagem" name="tipo_meta">
                                                                        <?php endif; ?>
                                                                        <label>Porcentagem</label>
                                                                    </div>

                                                                    <div class="col">
                                                                        <?php if($meta->tipo_meta == "numero"): ?>
                                                                            <input checked type="radio" value="numero" name="tipo_meta">
                                                                        <?php else: ?>
                                                                            <input type="radio" value="numero" name="tipo_meta">
                                                                        <?php endif; ?>
                                                                        <label>Número</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">REALIZADO</label>
                                                                <input required name="metaValor" type="text" class="form-control maskValor" value="<?= number_format($meta->valor, 2, ',', '.') ?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">META BRONZE</label>
                                                                <input required name="metaBronze" type="text" class="form-control maskValor" value="<?= number_format($meta->meta_bronze, 2, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">META PRATA</label>
                                                                <input required name="metaPrata" type="text" class="form-control maskValor" value="<?= number_format($meta->meta_prata, 2, ',', '.') ?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">META OURO</label>
                                                                <input required name="metaOuro" type="text" class="form-control maskValor" value="<?= number_format($meta->meta_ouro, 2, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">META SAFIRA</label>
                                                                <input required name="metaSafira" type="text" class="form-control maskValor" value="<?= number_format($meta->meta_safira, 2, ',', '.') ?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">META DIAMANTE</label>
                                                                <input required name="metaDiamante" type="text" class="form-control maskValor" value="<?= number_format($meta->meta_diamante, 2, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                        <button type="submit" id="btnEditarMeta" class="btn btn-primary">Alterar</button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Fim Editar Meta -->

                            <?php endforeach;?>


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- FIM TABELA META -->
    <?php endif; ?>

    <!-- LISTAGEM DA META X EM CASO DE COMPARAÇÕES -->
    <?php if(isset($metas2)) : ?>

        <!-- META 1 -->
        <div class="container-dashboard">
            <h3 style="color: #27448B"><?= $mesAtual ?></h3>
            <div class="row">
                <div class="col-md-12">
                    <div style="overflow-x: auto">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Cargo</th>
                                <th scope="col">Realizado</th>
                                <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/bronze.png"></th>
                                <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/prata.png"></th>
                                <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/ouro.png"></th>
                                <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/safira.png"></th>
                                <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/diamante.png"></th>
                                <th scope="col">Meta Bronze</th>
                                <th scope="col">Meta Prata</th>
                                <th scope="col">Meta Ouro</th>
                                <th scope="col">Meta Safira</th>
                                <th scope="col">Meta Diamante</th>


                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($metas as $meta): ?>

                                <tr>
                                    <th class="coluna-cargo" scope="row">
                                        <p>
                                            <?php if(isset($meta->nomeAlterado)): ?>
                                                <?= $meta->nomeAlterado ?>
                                            <?php else: ?>
                                                <?= $meta->cargo ?>
                                            <?php endif; ?>
                                        </p>
                                    </th>
                                    <!-- VALOR DA META -->
                                    <?php if($meta->tipo_meta == "dinheiro"): ?>
                                        <td class="text-center">R$<?= number_format($meta->valor, 2, ',', '.') ?></td>
                                    <?php elseif($meta->tipo_meta == "porcentagem"): ?>
                                        <td class="text-center"><?= $meta->valor ?>%</td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->valor ?></td>
                                    <?php endif; ?>
                                    <!-- FIM VALOR DA META -->


                                    <!-- PROGRESSO DAS METAS -->
                                    <?php if($meta->por_bronze == 100): ?>
                                        <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                    <?php elseif($meta->por_bronze == 0): ?>
                                        <td class="text-center"></td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->por_bronze ?>%</td>
                                    <?php endif; ?>


                                    <?php if($meta->por_prata == 100): ?>
                                        <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                    <?php elseif($meta->por_prata == 0): ?>
                                        <td class="text-center"></td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->por_prata ?>%</td>
                                    <?php endif; ?>


                                    <?php if($meta->por_ouro == 100): ?>
                                        <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                    <?php elseif($meta->por_ouro == 0): ?>
                                        <td class="text-center"></td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->por_ouro ?>%</td>
                                    <?php endif; ?>


                                    <?php if($meta->por_safira == 100): ?>
                                        <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                    <?php elseif($meta->por_safira == 0): ?>
                                        <td class="text-center"></td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->por_safira ?>%</td>
                                    <?php endif; ?>


                                    <?php if($meta->por_diamante == 100): ?>
                                        <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                    <?php elseif($meta->por_diamante == 0): ?>
                                        <td class="text-center"></td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->por_diamante ?>%</td>
                                    <?php endif; ?>
                                    <!-- FIM PROGRESSO DAS METAS -->

                                    <!-- VALORES DA META -->
                                    <!-- META BRONZE -->
                                    <?php if($meta->tipo_meta == "dinheiro"): ?>
                                        <td class="text-center">R$<?= number_format($meta->meta_bronze, 2, ',', '.') ?></td>
                                    <?php elseif($meta->tipo_meta == "porcentagem"): ?>
                                        <td class="text-center"><?= $meta->meta_bronze ?>%</td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->meta_bronze ?></td>
                                    <?php endif; ?>
                                    <!-- FIM META BRONZE -->

                                    <!-- META PRATA -->
                                    <?php if($meta->tipo_meta == "dinheiro"): ?>
                                        <td class="text-center">R$<?= number_format($meta->meta_prata, 2, ',', '.') ?></td>
                                    <?php elseif($meta->tipo_meta == "porcentagem"): ?>
                                        <td class="text-center"><?= $meta->meta_prata ?>%</td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->meta_prata ?></td>
                                    <?php endif; ?>
                                    <!-- FIM META PRATA -->

                                    <!-- META OURO -->
                                    <?php if($meta->tipo_meta == "dinheiro"): ?>
                                        <td class="text-center">R$<?= number_format($meta->meta_ouro, 2, ',', '.') ?></td>
                                    <?php elseif($meta->tipo_meta == "porcentagem"): ?>
                                        <td class="text-center"><?= $meta->meta_ouro ?>%</td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->meta_ouro ?></td>
                                    <?php endif; ?>
                                    <!-- FIM META OURO -->

                                    <!-- META SAFIRA -->
                                    <?php if($meta->tipo_meta == "dinheiro"): ?>
                                        <td class="text-center">R$<?= number_format($meta->meta_safira, 2, ',', '.') ?></td>
                                    <?php elseif($meta->tipo_meta == "porcentagem"): ?>
                                        <td class="text-center"><?= $meta->meta_safira ?>%</td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->meta_safira ?></td>
                                    <?php endif; ?>
                                    <!--FIM META SAFIRA -->

                                    <!-- META DIAMANTE -->
                                    <?php if($meta->tipo_meta == "dinheiro"): ?>
                                        <td class="text-center">R$<?= number_format($meta->meta_diamante, 2, ',', '.') ?></td>
                                    <?php elseif($meta->tipo_meta == "porcentagem"): ?>
                                        <td class="text-center"><?= $meta->meta_diamante ?>%</td>
                                    <?php else: ?>
                                        <td class="text-center"><?= $meta->meta_diamante ?></td>
                                    <?php endif; ?>
                                    <!-- FIM META DIAMANTE -->
                                    <!-- FIM VALORES DA META -->

                                </tr>

                            <?php endforeach;?>


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- FIM META 1 -->

        <!-- META 2 -->
        <div class="container-dashboard">
        <h3 style="color: #27448B"><?= $mesAtual2 ?></h3>
        <div class="row">
            <div class="col-md-12">
                <div style="overflow-x: auto">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Cargo</th>
                            <th scope="col">Realizado</th>
                            <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/bronze.png"></th>
                            <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/prata.png"></th>
                            <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/ouro.png"></th>
                            <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/safira.png"></th>
                            <th scope="col"><img style="padding: 10px;" src="<?= BASE_URL; ?>arquivos/assets/img/diamante.png"></th>
                            <th scope="col">Meta Bronze</th>
                            <th scope="col">Meta Prata</th>
                            <th scope="col">Meta Ouro</th>
                            <th scope="col">Meta Safira</th>
                            <th scope="col">Meta Diamante</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($metas2 as $meta2): ?>

                            <tr>
                                <th class="coluna-cargo" scope="row">
                                    <p>
                                        <?php if(isset($meta2->nomeAlterado)): ?>
                                            <?= $meta2->nomeAlterado ?>
                                        <?php else: ?>
                                            <?= $meta2->cargo ?>
                                        <?php endif; ?>
                                    </p>
                                </th>
                                <!-- VALOR DA META -->
                                <?php if($meta2->tipo_meta == "dinheiro"): ?>
                                    <td class="text-center">R$<?= number_format($meta2->valor, 2, ',', '.') ?></td>
                                <?php elseif($meta2->tipo_meta == "porcentagem"): ?>
                                    <td class="text-center"><?= $meta2->valor ?>%</td>
                                <?php else: ?>
                                    <td class="text-center"><?= $meta2->valor ?></td>
                                <?php endif; ?>
                                <!-- FIM VALOR DA META -->


                                <!-- PROGRESSO DAS METAS -->
                                <?php if($meta2->por_bronze == 100): ?>
                                    <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                <?php elseif($meta2->por_bronze == 0): ?>
                                    <td class="text-center"></td>
                                <?php else: ?>
                                    <td class="text-center"><?= $meta2->por_bronze ?>%</td>
                                <?php endif; ?>


                                <?php if($meta2->por_prata == 100): ?>
                                    <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                <?php elseif($meta2->por_prata == 0): ?>
                                    <td class="text-center"></td>
                                <?php else: ?>
                                    <td class="text-center"><?= $meta2->por_prata ?>%</td>
                                <?php endif; ?>


                                <?php if($meta2->por_ouro == 100): ?>
                                    <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                <?php elseif($meta2->por_ouro == 0): ?>
                                    <td class="text-center"></td>
                                <?php else: ?>
                                    <td class="text-center"><?= $meta2->por_ouro ?>%</td>
                                <?php endif; ?>


                                <?php if($meta2->por_safira == 100): ?>
                                    <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                <?php elseif($meta2->por_safira == 0): ?>
                                    <td class="text-center"></td>
                                <?php else: ?>
                                    <td class="text-center"><?= $meta2->por_safira ?>%</td>
                                <?php endif; ?>


                                <?php if($meta2->por_diamante == 100): ?>
                                    <td class="text-center"><img style="width: 20px;" src="<?= BASE_URL ?>arquivos/assets/img/completo.png"></td>
                                <?php elseif($meta2->por_diamante == 0): ?>
                                    <td class="text-center"></td>
                                <?php else: ?>
                                    <td class="text-center"><?= $meta2->por_diamante ?>%</td>
                                <?php endif; ?>
                                <!-- FIM PROGRESSO DAS METAS -->

                                <!-- VALORES DA META -->
                                <!-- META BRONZE -->
                                <?php if($meta2->tipo_meta == "dinheiro"): ?>
                                    <td class="text-center">R$<?= number_format($meta2->meta_bronze, 2, ',', '.') ?></td>
                                <?php elseif($meta2->tipo_meta == "porcentagem"): ?>
                                    <td class="text-center"><?= $meta2->meta_bronze ?>%</td>
                                <?php else: ?>
                                    <td class="text-center"><?= $meta2->meta_bronze ?></td>
                                <?php endif; ?>
                                <!-- FIM META BRONZE -->

                                <!-- META PRATA -->
                                <?php if($meta2->tipo_meta == "dinheiro"): ?>
                                    <td class="text-center">R$<?= number_format($meta2->meta_prata, 2, ',', '.') ?></td>
                                <?php elseif($meta2->tipo_meta == "porcentagem"): ?>
                                    <td class="text-center"><?= $meta2->meta_prata ?>%</td>
                                <?php else: ?>
                                    <td class="text-center"><?= $meta2->meta_prata ?></td>
                                <?php endif; ?>
                                <!-- FIM META PRATA -->

                                <!-- META OURO -->
                                <?php if($meta2->tipo_meta == "dinheiro"): ?>
                                    <td class="text-center">R$<?= number_format($meta2->meta_ouro, 2, ',', '.') ?></td>
                                <?php elseif($meta2->tipo_meta == "porcentagem"): ?>
                                    <td class="text-center"><?= $meta2->meta_ouro ?>%</td>
                                <?php else: ?>
                                    <td class="text-center"><?= $meta2->meta_ouro ?></td>
                                <?php endif; ?>
                                <!-- FIM META OURO -->

                                <!-- META SAFIRA -->
                                <?php if($meta2->tipo_meta == "dinheiro"): ?>
                                    <td class="text-center">R$<?= number_format($meta2->meta_safira, 2, ',', '.') ?></td>
                                <?php elseif($meta2->tipo_meta == "porcentagem"): ?>
                                    <td class="text-center"><?= $meta2->meta_safira ?>%</td>
                                <?php else: ?>
                                    <td class="text-center"><?= $meta2->meta_safira ?></td>
                                <?php endif; ?>
                                <!--FIM META SAFIRA -->

                                <!-- META DIAMANTE -->
                                <?php if($meta2->tipo_meta == "dinheiro"): ?>
                                    <td class="text-center">R$<?= number_format($meta2->meta_diamante, 2, ',', '.') ?></td>
                                <?php elseif($meta2->tipo_meta == "porcentagem"): ?>
                                    <td class="text-center"><?= $meta2->meta_diamante ?>%</td>
                                <?php else: ?>
                                    <td class="text-center"><?= $meta2->meta_diamante ?></td>
                                <?php endif; ?>
                                <!-- FIM META DIAMANTE -->
                                <!-- FIM VALORES DA META -->

                            </tr>


                        <?php endforeach;?>


                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
        <!-- FIM META 2 -->

    <?php endif; ?>
    <!-- FIM LISTAGEM -->

    <!-- Modal Valor -->
    <div class="modal fade" id="ModalValor" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Novo Valor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formNovoValor">

                        <div class="form-group">
                            <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">CARGO</label>
                            <select required name="cargo" style="border-radius: 25px" class="form-control">
                                <option selected disabled>Selecione</option>
                                <option value="Medicina e Segurança do Trabalho">Medicina e Segurança do Trabalho</option>
                                <option value="Laboratório">Laboratório</option>
                                <option value="Recepção">Recepção</option>
                                <option value="Gestão da agenda">Gestão da agenda</option>
                                <option value="Call Center (Receptivo)">Call Center (Receptivo)</option>
                                <option value="Promotor quiosque">Promotor quiosque</option>
                                <option value="Call Center (Ativo)">Call Center (Ativo)</option>
                                <option value="Promotor Oftalmo">Promotor Oftalmo</option>
                                <option value="Promotor Odonto">Promotor Odonto</option>
                            </select>
                        </div>

                        <div style="margin-top: 1.5rem;" class="form-group">
                            <div class="row">

                                <!-- MES -->
                                <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Mês</label>
                                    </div>
                                    <select required name="metaMes" class="custom-select" id="inputGroupSelect01">
                                        <option  value="" selected disabled>Selecione</option>
                                        <option value="1">01 - Janeiro</option>
                                        <option value="2">02 - Fevereiro</option>
                                        <option value="3">03 - Março</option>
                                        <option value="4">04 - Abril</option>
                                        <option value="5">05 - Maio</option>
                                        <option value="6">06 - Junho</option>
                                        <option value="7">07 - Julho</option>
                                        <option value="8">08 - Agosto</option>
                                        <option value="9">09 - Setembro</option>
                                        <option value="10">10 - Outubro</option>
                                        <option value="11">11 - Novembro</option>
                                        <option value="12">12 - Dezembro</option>
                                    </select>
                                </div>
                                <!-- FIM MES -->

                                <!-- ANO -->
                                <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Ano</label>
                                    </div>
                                    <select required name="metaAno" class="custom-select" id="inputGroupSelect01">
                                        <option  value="" selected disabled>Selecione</option>
                                        <option  value="2019">2019</option>
                                        <option  value="2020">2020</option>
                                        <option  value="2021">2021</option>
                                        <option  value="2022">2022</option>
                                        <option  value="2023">2023</option>
                                        <option  value="2024">2024</option>
                                        <option  value="2025">2025</option>
                                    </select>
                                </div>
                                <!-- FIM ANO -->

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">Valor</label><br>
                                    <input required name="valor" type="text" class="form-control maskValor">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" id="btnNovoValor" class="btn btn-primary">Adicionar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Meta-->
    <div class="modal fade" id="ModalMeta" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Nova Meta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formNovaMeta">

                        <!-- CARGO -->
                        <div class="form-group">
                            <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">CARGO</label>
                            <select required name="cargo" style="border-radius: 25px" class="form-control" id="exampleFormControlSelect1">
                                <option selected disabled>Selecione</option>
                                <option value="Medicina e Segurança do Trabalho">Medicina e Segurança do Trabalho</option>
                                <option value="Laboratório">Laboratório</option>
                                <option value="Recepção">Recepção</option>
                                <option value="Gestão da agenda">Gestão da agenda</option>
                                <option value="Call Center (Receptivo)">Call Center (Receptivo)</option>
                                <option value="Promotor quiosque">Promotor quiosque</option>
                                <option value="Call Center (Ativo)">Call Center (Ativo)</option>
                                <option value="Promotor Oftalmo">Promotor Oftalmo</option>
                                <option value="Promotor Odonto">Promotor Odonto</option>
                            </select>
                        </div>
                        <!-- FIM CARGO -->

                        <!-- MES / ANO -->
                        <div style="margin-top: 1.5rem;" class="form-group">
                            <div class="row">

                                <!-- MES -->
                                <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">MÊS</label>
                                    </div>
                                    <select required name="metaMes" class="custom-select" id="inputGroupSelect01">
                                        <option  value="" selected disabled>Selecione</option>
                                        <option value="1">01 - Janeiro</option>
                                        <option value="2">02 - Fevereiro</option>
                                        <option value="3">03 - Março</option>
                                        <option value="4">04 - Abril</option>
                                        <option value="5">05 - Maio</option>
                                        <option value="6">06 - Junho</option>
                                        <option value="7">07 - Julho</option>
                                        <option value="8">08 - Agosto</option>
                                        <option value="9">09 - Setembro</option>
                                        <option value="10">10 - Outubro</option>
                                        <option value="11">11 - Novembro</option>
                                        <option value="12">12 - Dezembro</option>
                                    </select>
                                </div>
                                <!-- FIM MES -->

                                <!-- ANO -->
                                <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">ANO</label>
                                    </div>
                                    <select required name="metaAno" class="custom-select" id="inputGroupSelect01">
                                        <option  value="" selected disabled>Selecione</option>
                                        <option selected value="2019">2019</option>
                                        <option  value="2020">2020</option>
                                        <option  value="2021">2021</option>
                                        <option  value="2022">2022</option>
                                        <option  value="2023">2023</option>
                                        <option  value="2024">2024</option>
                                        <option  value="2025">2025</option>
                                    </select>
                                </div>
                                <!-- FIM ANO -->

                            </div>
                        </div>
                        <!-- FIM MES / ANO -->

                        <!-- TIPO META -->
                        <div class="form-group">
                            <div class="row">
                                <div style="margin-bottom: 20px;margin-top: 20px;" class="col-md-12 text-center">
                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">TIPO META</label>
                                    <div class="row">
                                        <div class="col">
                                            <input checked value="dinheiro" type="radio" name="tipo_meta">
                                            <label>Dinheiro</label>
                                        </div>

                                        <div class="col">
                                            <input  value="porcentagem" type="radio" name="tipo_meta">
                                            <label>Porcentagem</label>
                                        </div>

                                        <div class="col">
                                            <input value="numero" type="radio" name="tipo_meta">
                                            <label>Número</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIM TIPO META -->

                        <!-- META BRONZE -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">META BRONZE</label>
                                    <input required name="metaBronze" type="text" class="form-control maskValor" id="MetaBronze">
                                </div>
                            </div>
                        </div>
                        <!-- FIM META BRONZE -->

                        <!-- META PRATA / OURO -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">META PRATA</label>
                                    <input required name="metaPrata" type="text" class="form-control maskValor" id="MetaPrata">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">META OURO</label>
                                    <input required name="metaOuro" type="text" class="form-control maskValor" id="MetaOuro">
                                </div>
                            </div>
                        </div>
                        <!-- FIM META -->

                        <!-- META SAFIRA / DIAMANTE -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">META SAFIRA</label>
                                    <input required name="metaSafira" type="text" class="form-control maskValor" id="MetaSafira">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">META DIAMANTE</label>
                                    <input required name="metaDiamante" type="text" class="form-control maskValor" id="MetaDiamante">
                                </div>
                            </div>
                        </div>
                        <!-- FIM META -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" id="btnNovaMeta" class="btn btn-primary">Adicionar</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Meta Clínica -->
    <div class="modal fade" id="ModalMetaClinica" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Meta Clínica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formMetaClinica">

                        <!-- TIPO META -->
                        <div class="form-group">
                            <div class="row">
                                <div style="margin-bottom: 20px;margin-top: 20px;" class="col-md-12 text-center">
                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">TIPO META</label>
                                    <div class="row">
                                        <div class="col">
                                            <input checked value="dinheiro" type="radio" name="tipo_meta">
                                            <label>Dinheiro</label>
                                        </div>

                                        <div class="col">
                                            <input  value="porcentagem" type="radio" name="tipo_meta">
                                            <label>Porcentagem</label>
                                        </div>

                                        <div class="col">
                                            <input value="numero" type="radio" name="tipo_meta">
                                            <label>Número</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIM TIPO META -->

                        <!-- MES / ANO -->
                        <div style="margin-top: 1.5rem;" class="form-group">
                            <div class="row">

                                <!-- MES -->
                                <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Mês</label>
                                    </div>
                                    <select required name="metaClinicaMes" class="custom-select" id="inputGroupSelect01">
                                        <option  value="" selected disabled>Selecione</option>
                                        <option value="1">01 - Janeiro</option>
                                        <option value="2">02 - Fevereiro</option>
                                        <option value="3">03 - Março</option>
                                        <option value="4">04 - Abril</option>
                                        <option value="5">05 - Maio</option>
                                        <option value="6">06 - Junho</option>
                                        <option value="7">07 - Julho</option>
                                        <option value="8">08 - Agosto</option>
                                        <option value="9">09 - Setembro</option>
                                        <option value="10">10 - Outubro</option>
                                        <option value="11">11 - Novembro</option>
                                        <option value="12">12 - Dezembro</option>
                                    </select>
                                </div>
                                <!-- FIM MES -->

                                <!-- ANO -->
                                <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Ano</label>
                                    </div>
                                    <select required name="metaClinicaAno" class="custom-select" id="inputGroupSelect01">
                                        <option  value="" selected disabled>Selecione</option>
                                        <option  value="2019">2019</option>
                                        <option  value="2020">2020</option>
                                        <option  value="2021">2021</option>
                                        <option  value="2022">2022</option>
                                        <option  value="2023">2023</option>
                                        <option  value="2024">2024</option>
                                        <option  value="2025">2025</option>
                                    </select>
                                </div>
                                <!-- FIM ANO -->

                            </div>
                        </div>
                        <!-- FIM MES / ANO -->

                        <!-- META / REALIZADO -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">META</label><br>
                                    <input required name="metaClinica" type="text" class="form-control maskValor">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">REALIZADO</label><br>
                                    <input required name="metaClinicaRealizado" type="text" class="form-control maskValor">
                                </div>
                            </div>
                        </div>
                        <!-- FIM META / REALIZADO -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" id="btnMetaClinica" class="btn btn-primary">Adicionar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Valor Clínica -->
    <div class="modal fade" id="ModalValorClinica" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Valor Clínica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formValorClinica">

                        <!-- MES / ANO -->
                        <div style="margin-top: 1.5rem;" class="form-group">
                            <div class="row">

                                <!-- MES -->
                                <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Mês</label>
                                    </div>
                                    <select required name="valorClinicaMes" class="custom-select" id="inputGroupSelect01">
                                        <option  value="" selected disabled>Selecione</option>
                                        <option value="1">01 - Janeiro</option>
                                        <option value="2">02 - Fevereiro</option>
                                        <option value="3">03 - Março</option>
                                        <option value="4">04 - Abril</option>
                                        <option value="5">05 - Maio</option>
                                        <option value="6">06 - Junho</option>
                                        <option value="7">07 - Julho</option>
                                        <option value="8">08 - Agosto</option>
                                        <option value="9">09 - Setembro</option>
                                        <option value="10">10 - Outubro</option>
                                        <option value="11">11 - Novembro</option>
                                        <option value="12">12 - Dezembro</option>
                                    </select>
                                </div>
                                <!-- FIM MES -->

                                <!-- ANO -->
                                <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Ano</label>
                                    </div>
                                    <select required name="valorClinicaAno" class="custom-select" id="inputGroupSelect01">
                                        <option  value="" selected disabled>Selecione</option>
                                        <option  value="2019">2019</option>
                                        <option  value="2020">2020</option>
                                        <option  value="2021">2021</option>
                                        <option  value="2022">2022</option>
                                        <option  value="2023">2023</option>
                                        <option  value="2024">2024</option>
                                        <option  value="2025">2025</option>
                                    </select>
                                </div>
                                <!-- FIM ANO -->

                            </div>
                        </div>
                        <!-- FIM MES / ANO -->

                        <!-- META / REALIZADO -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label style="font-weight: bold; color: #27448b" for="exampleFormControlSelect1">REALIZADO</label><br>
                                    <input required name="valorClinicaRealizado" type="text" class="form-control maskValor">
                                </div>
                            </div>
                        </div>
                        <!-- FIM META / REALIZADO -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" id="btnValorClinica" class="btn btn-primary">Adicionar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



<?php $this->view("includes/footer"); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("input[name='tipo_meta']").click(function(){
            $('.campo-meta').addClass('maskValor');
        });
    });
</script>
