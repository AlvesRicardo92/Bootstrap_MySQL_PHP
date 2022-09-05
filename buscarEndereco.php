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

$comando="";
// Checar conexão
if ($mysqli -> connect_errno) {
    exit();
}
else{
    $endereco = $_POST["endereco"];
    $data = date("Y-m-d");
    $hora=date("H:i:s");
    if(!isset($endereco)){
        echo "erro sem endereço";
        exit;
    }
    else{
        $tabela="";
        $linhas =0;
        $sql = "SELECT * FROM logradouro WHERE endereco like '%".$endereco."%' and desativado=0";
        if ($result = $mysqli->query($sql)) {
            $linhas = count($result);
            $contador=1;
            if($linhas>0){ 
                while($row = mysqli_fetch_array($result)) {
                    $tabela= $tabela . "<tr id='".$contador."' style='width:0px;'><td class='end'>".utf8_encode($row['endereco'])."</td><td class='bai'>".utf8_encode($row['bairro'])."</td><td><button type='button' class='btn escolherEndereco'><i class='fas fa-check' style='font-size:16px;'>Escolher</i></button></td></tr>";
                    $contador++;
                }
                $result -> free_result();
                echo $tabela;
            }
            else{
                $result -> free_result();
                echo "Não encontrado";
            }
        }
        else{
            echo $sql."\n";
            echo "erro na busca do endereço\n";
        }
        $mysqli->close();
    }
}
?>