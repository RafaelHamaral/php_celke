<?php


//Incluir a conexao com o banco de dados
include_once './conexao.php';


$dados_requisicao = $_REQUEST;

//Obter a quantidade de registros no banco de dados
$query_qnt_usuarios = "SELECT COUNT(id) AS qnt_usuarios FROM usuarios";
//preparar a query
$result_qnt_usuarios = $conn->prepare($query_qnt_usuarios);
//execute a query
$result_qnt_usuarios->execute();
//ler valores (fetch) PDO (tipo de conexao) FETCH_ASSOC (imprimir atraves do nome da coluna (qnt_usuarios))
$row_qnt_usuarios = $result_qnt_usuarios->fetch(PDO::FETCH_ASSOC);

//var_dump($row_qnt_usuarios);

//Recuperar os registros do banco de dados
$query_usuarios = "SELECT id, nome, salario, idade 
                   FROM usuarios
                   ORDER BY id ASC
                   LIMIT :inicio, :quantidade";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
$result_usuarios->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);

$result_usuarios->execute();


while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){ //ler e imprimir
    //var_dump($row_usuario);
    extract($row_usuario);
    $registro = [];
    $registro[] = $id;
    $registro[] = $nome;
    $registro[] = $salario;
    $registro[] = $idade;
    $dados[] = $registro;
}

//var_dump($dados);

//Criar o array de informacoes a serem retornadas para o Javascript
$resultado = [
    "draw" => intval($dados_requisicao['draw']), //para cada requisicao eh enviado um numero como parametro
    "recordsTotal" => intval($row_qnt_usuarios['qnt_usuarios']), //qtd de registros ha no banco de dados
    "recordsFiltred" => intval($row_qnt_usuarios['qnt_usuarios']), //total de registros quando houver pesquisa
    "data" => $dados //array de dados com os registros retornados da tabela de usuarios
];

//var_dump($resultado);


//Retornar os dados em formato de objeto para o JavaScript
echo json_encode($resultado);