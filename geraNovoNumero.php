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
    $comando = $_POST["comando1"];
    //var_dump($_POST);
    //echo "\ncommando: ".$comando."\n";
    $data = date("Y-m-d");
    //echo "data: ".$data."\n";
    $hora=date("H:i:s");
    //echo "hora: ".$hora."\n";
    if(!isset($comando)){
        echo "erro sem comando";
    }
    elseif($comando==="diariaNova"){
        $sql = "INSERT INTO ocorrencia (data, horaAbertura,status) VALUES ('".$data."', '".$hora."',1);";
        //echo $sql."\n";
        if ($result = $mysqli->query($sql)) {
            $sql = "SELECT LAST_INSERT_ID() as 'id';";
            if ($result2 = $mysqli->query($sql)) {
                $fieldInfo = $result2 -> fetch_array(MYSQLI_ASSOC);
                $resultado2 = $fieldInfo['id'];
                $result2 -> free_result();
                $resultado2 = (int)$resultado2;
                //$result -> free_result();
                echo $resultado2;
            } else {
                echo "Erro no last_insert_id\n";
            }
        }
        else{
            echo $sql."\n";
            echo "erro ao fazer o insert\n";
        }

        $mysqli->close();
    }
    else{
        echo "comando errado: ". $comando;
    }
}
?>