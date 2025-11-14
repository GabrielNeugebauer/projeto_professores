Para criar a tabela em http://localhost/phpmyadmin/:
CREATE TABLE professores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    disciplina_lecionada VARCHAR(100)
);



Minha conclusão final: Achei interessante a forma como o PHP implementa os métodos de segurança contra ciberataques, mas ainda prefiro o node.js por questões de sintaxe.