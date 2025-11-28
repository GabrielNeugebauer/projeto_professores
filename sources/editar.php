<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Professor</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container container-table">
        <h2>Editar Professor</h2>
        <p>Clique em "Editar" para alterar os dados do professor.</p>
        <table class="table-edit">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Disciplina</th> 
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../actions/conexao.php';
                // Busca todos os professores
                $sql = "SELECT id, nome, email, disciplina_lecionada FROM professores";
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows > 0) {
                    while($linha = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $linha["id"] . "</td>";
                        echo "<td>" . htmlspecialchars($linha["nome"]) . "</td>";
                        echo "<td>" . htmlspecialchars($linha["email"]) . "</td>";
                        echo "<td>" . htmlspecialchars($linha["disciplina_lecionada"]) . "</td>";
                        
                        echo "<td><a href='formulario_editar.php?id=" . $linha["id"] . "' class='btn-edit'>Editar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhum professor cadastrado.</td></tr>";
                }
                $conexao->close();
                ?>
            </tbody>
        </table>

        <a href="../index.php" class="btn btn-back">Voltar para o início</a>
    </div>
</body>
</html>