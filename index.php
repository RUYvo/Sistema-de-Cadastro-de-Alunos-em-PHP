<?php


require_once "../Sistema-de-Cadastro-de-Alunos-em-PHP/controllers/cadastrarAlunos.php";

$cadastroAlunos = new CadastrarAlunos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nome"]) && isset($_POST["matricula"]) && isset($_POST["curso"])) {
        $novoAluno = new Aluno($_POST["nome"], $_POST["matricula"], $_POST["curso"]);
        $cadastroAlunos->cadastrarAluno($novoAluno);
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">

    <style>
        .card-login {
            padding: 30px 0 0 0;
            width: 350px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a href="#" class="navbar-brand">
        Software - Cadastrar Aluno
    </a>
    <a type="submit" class="btn btn-primary" href="./login.php">Logout</a>
</nav>
<div class="container">
    <div class="row">
        <div class="card-login">
            <div class="card">
                <div class="card-header">
                    Cadastrar Aluno
                </div>
                <div class="card-body">
                    <!-- Formulário para cadastrar um novo aluno -->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="matricula">Matrícula:</label>
                            <input type="text" class="form-control" id="matricula" name="matricula" required>
                        </div>
                        <div class="form-group">
                            <label for="curso">Curso:</label>
                            <input type="text" class="form-control" id="curso" name="curso" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Lista de Alunos Cadastrados
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Matrícula</th>
                            <th>Curso</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        # Obtendo a lista de alunos cadastrados
                        $alunosCadastrados = $cadastroAlunos->listarAluno();
                        # Iterando sobre a lista e exibindo os alunos
                        foreach ($alunosCadastrados as $aluno) {
                            echo "<tr>";
                            echo "<td>{$aluno->getNome()}</td>";
                            echo "<td>{$aluno->getMatricula()}</td>";
                            echo "<td>{$aluno->getCurso()}</td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
