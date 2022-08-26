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
    $endereco = $_POST["endereco"];

    //var_dump($_POST);
    //echo "\ncommando: ".$comando."\n";
    $data = date("Y-m-d");
    //echo "data: ".$data."\n";
    $hora=date("H:i:s");
    //echo "hora: ".$hora."\n";
    if(!isset($endereco)){
        echo "erro sem endereço";
    }
    else{
        //fazer insert no banco
        //INSERT INTO table_name (col1, col2,...) VALUES ('val1', 'val2'...);
        //SELECT LAST_INSERT_ID();
        $tabela="";
        $linhas =0;
        $sql = "SELECT * FROM logradouro WHERE endereco like ? and desativado=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $endereco,$linhas);
        $stmt -> execute();
        $fieldInfo = $stmt -> fetch_array();
        $linhas =$stmt->num_rows();

        if($linha>0){        
            foreach ($fieldInfo as $campo) {
                $tabela+="<tr><td>".$campo['endereco']."</td><td>".$campo['bairro']."</td><td><button type='button' class='btn'><i class='fas fa-trash' style='font-size:16px;'>Escolher</i></button></tr>";
            }
            echo $tabela;
        }
        else{
            echo "Não encontrado";
        }
        $mysqli->close();
    }
}
?>