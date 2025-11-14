<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Professores</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container container-table">
        <h2>Professores Cadastrados</h2>
        <table class="table-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Disciplina</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluir a conexão
                include '../actions/conexao.php';

                // Fetch professores
                $sql = "SELECT id, nome, email, disciplina_lecionada FROM professores";
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows > 0) {
                    while($linha = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $linha["id"] . "</td>";
                        echo "<td>" . htmlspecialchars($linha["nome"]) . "</td>";
                        echo "<td>" . htmlspecialchars($linha["email"]) . "</td>";
                        echo "<td>" . htmlspecialchars($linha["disciplina_lecionada"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum professor cadastrado.</td></tr>";
                }
                $conexao->close();
                ?>
            </tbody>
        </table>

        <a href="../index.php" class="btn btn-back">Voltar para o Início</a>
    </div>
</body>
</html>