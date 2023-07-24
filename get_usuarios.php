<?php
header('Access-Control-Allow-Origin: *');

// Outros cabeçalhos de resposta para permitir solicitações de origem diferente
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Defina o cabeçalho Content-Type para indicar que o conteúdo da resposta é JSON
header('Content-Type: application/json');
    //conexao co o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testeapi";
    
    $conn = new mysqli($servername,$username,$password,$dbname);

    if ($conn -> connect_error) {
        die("Conexao falhou ". $conn->connect_error);
    }

    //consulta sql para saber os usuarios da tabela usuarios
    $sql= "SELECT id, nome, email FROM usuarios";
    $result = $conn->query($sql);

    //verifica se há resultado e cria um array para armazenar os dados
    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    //Retirna os dados no formato JSON  
    echo json_encode($data);
    }else {
        echo "O resultado encontrado. ";
    }
    $conn->close();
?>