<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Professor</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container container-form">
        <h2>Cadastrar Novo Professor</h2>
        <form action="../actions/processar_cadastro.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="disciplina">Disciplina Lecionada:</label>
                <input type="text" id="disciplina" name="disciplina_lecionada">
            </div>
            <button type="submit" class="btn btn-submit">Cadastrar</button>
        </form>

        <a href="../index.php" class="btn btn-back">Voltar para o Início</a>
    </div>
</body>
</html>