<?php
include '../actions/conexao.php';

// Verifica se o ID veio na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Busca professor
    $sql = "SELECT * FROM professores WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $professor = $resultado->fetch_assoc();
    
    if (!$professor) {
        header("Location: editar.php");
        exit;
    }
} else {
    header("Location: editar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Dados</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container container-form">
        <h2>Atualizar Dados</h2>
        <form action="../actions/processar_edicao.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $professor['id']; ?>">

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($professor['nome']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($professor['email']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="disciplina">Disciplina Lecionada:</label>
                <input type="text" id="disciplina" name="disciplina_lecionada" value="<?php echo htmlspecialchars($professor['disciplina_lecionada']); ?>">
            </div>
            
            <button type="submit" class="btn btn-submit">Salvar Alterações</button>
        </form>

        <a href="editar.php" class="btn btn-back">Cancelar</a>
    </div>
</body>
</html>