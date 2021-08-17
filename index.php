<?php
    include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Pesquisar Usuários</h2>
        <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        ?>
        <form action="" method="POST">
            <label for="nome">Nome</label>
            <input type="text" name="nome_completo" id="nome" placeholder="Digite o nome" value="<?= isset($dados['nome_completo']) ? $dados['nome_completo'] : ''; ?>" />
            <input type="submit" name="pesqUsuario" value="Buscar" id="pesqUsuario" />
        </form>
        <hr>
        <h3>Lista de Usuários:</h3>
        <hr>
        <?php
        if(!empty($dados['pesqUsuario'])){
            $nome = "%" . $dados['nome_completo'] . "%";

            $query_usuarios = "SELECT id, nome_completo, email FROM app_usuario WHERE nome_completo LIKE :nome ORDER BY nome_completo ASC";
            $result_usuarios = $conn->prepare($query_usuarios);
            $result_usuarios->bindParam(':nome', $nome, PDO::PARAM_STR);

            $result_usuarios->execute();
            while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
                extract($row_usuario);
                echo "ID: " . $id . "<br>";
                echo "Nome: " . $nome_completo . "<br>";
                echo "Email: " . $email . "<br>";
                echo "<hr>";
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>