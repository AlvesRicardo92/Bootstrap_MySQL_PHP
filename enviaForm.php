<?php 
# Substitua abaixo os dados, de acordo com o banco criado
$user = "root"; 
$password = "root"; 
$database = "teste_semaforica"; 

# O hostname deve ser sempre localhost 
$hostname = "localhost"; 

$mysqli = new mysqli($hostname,$user,$password,$database);

$comando="";
// Checar conexão
if ($mysqli -> connect_errno) {
    exit();
}
else{
    if( !isset($_POST["numeroDiaria"])||!isset($_POST["data"])||!isset($_POST["hora"])||!isset($_POST["origemOcorrencia"])||!isset($_POST["numeroTalao"])||
        !isset($_POST["responsavelCadastro"])||!isset($_POST["logradouroOcorrencia"])||!isset($_POST["bairroOcorrencia"])||!isset($_POST["numeroEndereco"])||
        !isset($_POST["logradouroCruzamento"])||!isset($_POST["descricaoOcorrencia"])||!isset($_POST["tipoServico"])||!isset($_POST["atividadesExecutadas"])||
        !isset($_POST["materiaisUtilizados"])||!isset($_POST["quantidadeMateriaisUtilizados"])||!isset($_POST["retiradaOuOrigemMaterial"])||!isset($_POST["horaRecebeuServico"])||
        !isset($_POST["horaChegouLocal"])||!isset($_POST["horaIniciouServico"])||!isset($_POST["horaTerminouServico"])||!isset($_POST["veiculoUtilizado"])||
        !isset($_POST["kmInicialVeiculo"])||!isset($_POST["kmFinalVeiculo"])||!isset($_POST["obs"])){

        echo "falta de informações";
        exit;
    }
    else{
        $numeroDiaria= $_POST["numeroDiaria"];
        $data= $_POST["data"];
        $hora= $_POST["hora"];
        $origemOcorrencia= $_POST["origemOcorrencia"];
        $numeroTalao= $_POST["numeroTalao"];
        $responsavelCadastro= $_POST["responsavelCadastro"];
        $logradouroOcorrencia= $_POST["logradouroOcorrencia"];
        $bairroOcorrencia= $_POST["bairroOcorrencia"];
        $numeroEndereco= $_POST["numeroEndereco"];
        $logradouroCruzamento= $_POST["logradouroCruzamento"];
        $descricaoOcorrencia= $_POST["descricaoOcorrencia"];
        $tipoServico= $_POST["tipoServico"];
        $atividadesExecutadas= $_POST["atividadesExecutadas"];
        $materiaisUtilizados= $_POST["materiaisUtilizados"];
        $quantidadeMateriaisUtilizados= $_POST["quantidadeMateriaisUtilizados"];
        $retiradaOuOrigemMaterial= $_POST["retiradaOuOrigemMaterial"];
        $horaRecebeuServico= $_POST["horaRecebeuServico"];
        $horaChegouLocal= $_POST["horaChegouLocal"];
        $horaIniciouServico= $_POST["horaIniciouServico"];
        $horaTerminouServico= $_POST["horaTerminouServico"];
        $veiculoUtilizado= $_POST["veiculoUtilizado"];
        $kmInicialVeiculo= $_POST["kmInicialVeiculo"];
        $kmFinalVeiculo= $_POST["kmFinalVeiculo"];
        $obs= $_POST["obs"];

        $tabela="";
        $linhas =0;
        $sql = "UPDATE ocorrencia SET data='".$data."',horaEncerramento='".$hora."',origem='".$origemOcorrencia."',numTalao=".$numeroTalao.",responsavelCadastro='".$responsavelCadastro."',endereco='".$logradouroOcorrencia."',"
        ."bairro='".$bairroOcorrencia."',numEndereco='".$numeroEndereco."',enderecoCruzamento='".$logradouroCruzamento."',descricao='".$descricaoOcorrencia."',tipoServico='".$tipoServico."',"
        ."atividadeExecutada='".$atividadesExecutadas."',material='".$materiaisUtilizados."',quantidadeMaterial='".$quantidadeMateriaisUtilizados."',"
        ."consorcio_pmsbc='".$retiradaOuOrigemMaterial."',horarioRecebeu='".$horaRecebeuServico."',horarioChegou='".$horaChegouLocal."',horarioInicio='".$horaIniciouServico."',"
        ."horarioFim='".$horaTerminouServico."',veiculo='".$veiculoUtilizado."',kmInicial=".$kmInicialVeiculo.",kmFinal=".$kmFinalVeiculo.",obs='".$obs."',status=0 WHERE numDiaria=".$numeroDiaria.";";
        if ($result = $mysqli->query($sql)) {
            $linhasAfetadas = $mysqli->affected_rows;
            //$result -> free_result();
            echo $linhasAfetadas;
        }
        else{
            echo $sql."\n";
            echo "Erro ao cadastrar os dados da diária\n";
        }
        $mysqli->close();
    }
}
?>