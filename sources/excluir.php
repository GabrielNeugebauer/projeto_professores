<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Professor</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container container-table">
        <h2>Excluir Professor</h2>
        <p>Clique em "Excluir" ao lado do professor que deseja remover.</p>
        <table class="table-delete">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../actions/conexao.php';
                $sql = "SELECT id, nome, email FROM professores";
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows > 0) {
                    while($linha = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $linha["id"] . "</td>";
                        echo "<td>" . htmlspecialchars($linha["nome"]) . "</td>"; // Segurança XSS
                        echo "<td>" . htmlspecialchars($linha["email"]) . "</td>";
                        // Link de exclusão
                        echo "<td><a href='../actions/processar_exclusao.php?id=" . $linha["id"] . "' class='btn-delete' onclick='return confirm(\"Tem certeza que deseja excluir " . htmlspecialchars($linha["nome"]) . "?\");'>Excluir</a></td>";
                        //Deleta por meio de url param... I doesn't feel very secure but ok for this simple app...
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