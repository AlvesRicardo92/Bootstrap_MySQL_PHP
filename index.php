<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','utf-8');
# Substitua abaixo os dados, de acordo com o banco criado
$user = "root"; 
$password = "root"; 
$database = "teste_semaforica"; 

# O hostname deve ser sempre localhost 
$hostname = "localhost"; 

$mysqli = new mysqli($hostname,$user,$password,$database);

// Checar conexão
if ($mysqli -> connect_errno) {
  echo "Falha ao conectar ao banco: " . $mysqli -> connect_error;
  exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Título</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!--<link rel="stylesheet" href="css/font-awesome.min.css">-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <!-- Responsive navbar
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>-->
        <!-- Page content-->
        <div class="container">
            <form action="/teste.php" method="post" id="formulario" name="formulario">
                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <button type="button" class="btn btn-primary" onclick="gerarNovo()" id="novo">Novo</button>
                            <button type="button" class="btn btn-primary" id="pesquisar">Pesquisar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="diariaNumero" class="form-label">Diária nº</label>
                            <input type="text" class="form-control" id="diariaNumero" placeholder="Nº da Diária" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="diariaData" class="form-label">Data</label>
                            <input type="date" class="form-control" id="diariaData" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating col-md-9 mt-3 mb-3">
                            <select class="form-select" id="origem" aria-label="Origem" disabled>
                            <!--<option selected>Open this select menu</option>-->
                            <option value="0">Selecione a origem</option>
                            <?php
                                $sql = "SELECT * FROM origem WHERE desativado =0 order by descricao";
                                $result = $mysqli->query($sql);
                                $data = $result->fetch_all(MYSQLI_ASSOC);
                                foreach($data as $row) {
                                    echo "<option value=".$row['id'].">".$row['descricao']."</option>";
                                }  
                                $result -> free_result();  
                                //$mysqli->close();
                            ?>
                            <!--<option value="1">Prodigi</option>
                            <option value="2">Ronda</option>
                            <option value="3">Paulo</option>
                            <option value="4">Marcos - Coordenador</option>-->
                            </select>
                            <label for="origem">Origem da ocorrência</label>
                        </div>
                        <div class="col-md-3">
                            <label for="numTalao" class="form-label">Nº Talão</label>
                            <input type="text" class="form-control" id="numTalao" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="responsavel" class="form-label">Responsável pelo cadastro da Diária</label>
                            <input type="text" class="form-control" id="responsavel" placeholder="Nome do funcionário que está cadastrando a Diária" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary" id="buscaEndereco" data-bs-toggle="modal" data-bs-target="#staticBackdrop" disabled>Digitar endereço</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <label for="logradouro" class="form-label">Logradouro</label>
                            <input type="text" class="form-control" id="logradouro" placeholder="Logradouro" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" placeholder="Bairro" disabled>
                        </div>
                        <div class="col-md-2">
                            <label for="numEndereco" class="form-label">Nº</label>
                            <input type="text" class="form-control" id="numEndereco" placeholder="Número" disabled>
                        </div>
                    </div>
                    <div class="row mb-3 mt-2">
                        <div class="form-floating">
                            <textarea class="form-control" id="ocorrencia" placeholder="&nbsp;&nbsp;Descrição da ocorrência" style="height: 100px;resize: none;" disabled></textarea>
                            <label for="ocorrencia">&nbsp;&nbsp;Descrição/Histórico da ocorrência</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating col-md-5 mb-3">
                            <select class="form-select" id="tipoServico" aria-label="Tipo Serviço" disabled>
                                <!--<option selected>Open this select menu</option>-->
                                <option value="0" selected>Selecione o tipo de serviço</option>
                                <?php
                                    $sql = "SELECT * FROM tiposervico WHERE desativado =0 order by descricao";
                                    $result = $mysqli->query($sql);
                                    $data = $result->fetch_all(MYSQLI_ASSOC);
                                    foreach($data as $row) {
                                        echo "<option value=".$row['id'].">".$row['descricao']."</option>";
                                    }  
                                    $result -> free_result();  
                                    //$mysqli->close();
                                ?>
                            </select>
                            <label for="tipoServico">Tipo Serviço</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating col-md-11">
                            <select class="form-select" id="tipoAtividade" aria-label="Atividade executada" disabled>
                                <!--<option selected>Open this select menu</option>-->
                                <option value="0" selected>Selecione a atividade executada</option>
                                <?php
                                    $sql = "SELECT * FROM tipoatividade WHERE desativado =0 order by descricao";
                                    $result = $mysqli->query($sql);
                                    $data = $result->fetch_all(MYSQLI_ASSOC);
                                    foreach($data as $row) {
                                        echo "<option value=".$row['id'].">".$row['descricao']."</option>";
                                    }  
                                    $result -> free_result();  
                                    //$mysqli->close();
                                ?>
                            </select>
                            <label for="tipoAtividade">Atividade executada</label>
                        </div>
                        <div class="col-md-1 mt-2">
                        <button class="btn btn-primary" type="button" id="incluirNaLista" style="border-top-right-radius: 0.3rem;border-bottom-right-radius: 0.3rem;" onclick="inserirLinhaTabela(document.getElementById('tipoAtividade').selectedOptions[0].innerText)" disabled>Incluir</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <table class="table table-primary table-striped" id="tabelaAtividade">
                                <tbody>
                                <!--<tr>
                                    <td class="align-middle">Descrição do serviço adicionado</td>
                                    <td><button type="button" class="btn" onclick="removerLinha()"><i class="fas fa-trash" style="font-size:16px;"> Excluir</i></button></td>
                                </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating col-md-4 mb-3">
                            <select class="form-select" id="tipoMaterial" aria-label="Material utilizado" disabled>
                                <!--<option selected>Open this select menu</option>-->
                                <option value="0" selected>Selecione o material utilizado</option>
                                <?php
                                    $sql = "SELECT * FROM material WHERE desativado =0 order by descricao";
                                    $result = $mysqli->query($sql);
                                    $data = $result->fetch_all(MYSQLI_ASSOC);
                                    foreach($data as $row) {
                                        echo "<option value=".$row['id'].">".$row['descricao']."</option>";
                                    }  
                                    $result -> free_result();  
                                    //$mysqli->close();
                                ?>
                            </select>
                            <label for="tipoMaterial">Material utilizado</label>
                        </div>
                        <div class="col-md-3 mb-3" style="padding-top:9px;">
                            <input type="text" class="form-control" placeholder="Quantidade" aria-label="Quantidade" aria-describedby="incluirNaListaMaterial" id="quantidadeMaterial" disabled>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div style="padding-top:15px;">&nbsp;&nbsp;
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="origemMaterial" id="retirada" value="Retirada" disabled>
                                    <label class="form-check-label" for="retirada">Retirada</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="origemMaterial" id="pmsbc" value="PMSBC" disabled>
                                    <label class="form-check-label" for="pmsbc">PMSBC</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="origemMaterial" id="consorcio" value="Consórcio" disabled>
                                    <label class="form-check-label" for="consorcio">Consórcio</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 mt-2">
                            <button class="btn btn-primary" type="button" id="incluirNaListaMaterial" style="border-top-right-radius: 0.3rem;border-bottom-right-radius: 0.3rem;" onclick="inserirLinhaTabelaMaterial(document.getElementById('tipoMaterial').selectedOptions[0].innerText,document.getElementById('quantidadeMaterial').value)" disabled>Incluir</button>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <table class="table table-success table-striped" id="tabelaMaterial">
                                <tbody>
                                <!--<tr>
                                    <td class="align-middle">Descrição do serviço adicionado</td>
                                    <td><button type="button" class="btn" onclick="removerLinha()"><i class="fas fa-trash" style="font-size:16px;"> Excluir</i></button></td>
                                </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="horaRecebeu" class="form-label">Horário que recebeu o serviço</label>
                            <input type="time" class="form-control" id="horaRecebeu" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="horaChegou" class="form-label">Horário que chegou ao local</label>
                            <input type="time" class="form-control" id="horaChegou" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="horaInicio" class="form-label">Horário que iniciou o serviço</label>
                            <input type="time" class="form-control" id="horaInicio" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="horaFim" class="form-label">Horário que terminou o serviço</label>
                            <input type="time" class="form-control" id="horaFim" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating col-md-4 mt-3 mb-3">
                            <select class="form-select" id="veiculo" aria-label="veiculo" disabled>
                                <!--<option selected>Open this select menu</option>-->
                                <option value="0">Selecione o veículo</option>
                                <?php 
                                    $sql = "select id,CONCAT(modelo, ' ',placa) as carro from veiculo order by carro";
                                    $result = $mysqli->query($sql);
                                    $data = $result->fetch_all(MYSQLI_ASSOC);
                                    foreach($data as $row) {
                                        echo "<option value=".$row['id'].">".$row['carro']."</option>";
                                    }  
                                    $result -> free_result();    
                                    //$mysqli->close();
                                ?>
                            </select>
                            <label for="veiculo">Veículo</label>
                        </div>
                        <div class="col-md-4">
                            <label for="kmInicial" class="form-label">KM Inicial</label>
                            <input type="text" class="form-control" id="kmInicial" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="kmFinal" class="form-label">KM Final</label>
                            <input type="text" class="form-control" id="kmFinal" disabled>
                        </div>
                    </div>
                    <div class="row mb-3 mt-2">
                        <div class="form-floating">
                            <textarea class="form-control" id="obs" placeholder="&nbsp;&nbsp;Observações" style="height: 100px;resize: none;" disabled></textarea>
                            <label for="obs">&nbsp;&nbsp;Observações</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-5 text-center">
                            <button type="button" id="salvar" class="btn btn-primary" onclick="enviarForm()" disabled>Salvar</button>
                            <button type="button" id="voltar" class="btn btn-primary">Voltar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Localize o endereço</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-floating col-md-3 mb-2">
                            <select class="form-select" id="tipoLogradouro" aria-label="Tipo Logradouro">
                                <!--<option selected>Open this select menu</option>-->
                                <option value="0"></option>
                                <?php
                                    $sql = "SELECT * FROM origem WHERE desativado =0 order by descricao";
                                    $result = $mysqli->query($sql);
                                    $data = $result->fetch_all(MYSQLI_ASSOC);
                                    foreach($data as $row) {
                                        echo "<option value=".$row['id'].">".$row['descricao']."</option>";
                                    }  
                                    $result -> free_result();  
                                    //$mysqli->close();
                                ?>
                            </select>
                            <label for="tipoMaterial">Tipo Logradouro</label>
                        </div>
                        <div class="col-md-5 mb-2" style="padding-top:9px;">
                            <input type="text" class="form-control" placeholder="Endereço" aria-label="Endereço" aria-describedby="pesquisarEndereco" id="endereco">
                        </div>
                        <div class="col-md-1 mt-2">
                            <button class="btn btn-primary mb-2" type="button" id="pesquisarEndereco" style="border-top-right-radius: 0.3rem;border-bottom-right-radius: 0.3rem;" onclick="buscarEndereco(document.getElementById('endereco').value)">Pesquisar</button>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-2" style="max-height:300px;height:300px;border: 1px solid #ced4da">
                            <table class="table table-hover" id="tabelaResultadoEndereco">
                                <tbody>
                                <!--<tr>
                                    <td class="align-middle">Descrição do serviço adicionado</td>
                                    <td><button type="button" class="btn" onclick="removerLinha()"><i class="fas fa-trash" style="font-size:16px;"> Excluir</i></button></td>
                                </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
