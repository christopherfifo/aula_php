<?php 

require '../backend/config.php';

session_start();

// Verificando se o usuário está logado
if (!isset($_SESSION['user_email'])) {
    echo "Você precisa estar logado.";
    exit; 
}

$email_usuario = $_SESSION['user_email'];

$sql = "SELECT nome, numero_celular, rg, cpf, data_nascimento, sexo FROM usuarios WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email_usuario]);

if ($stmt->rowCount() > 0) {
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Usuário não encontrado.";
    exit; // Adicionar uma saída para evitar processamento desnecessário
}

// Atribuindo um valor padrão para sexo caso não esteja presente
$sexo_usuario = isset($usuario['sexo']) ? $usuario['sexo'] : 'm'; // 'm' como padrão

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $numero_celular = $_POST['numero_celular'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo']; // O valor de sexo agora será capturado do formulário

    $sql = "UPDATE usuarios SET nome = ?, numero_celular = ?, rg = ?, cpf = ?, data_nascimento = ?, sexo = ? WHERE email = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nome, $numero_celular, $rg, $cpf, $data_nascimento, $sexo, $email_usuario])) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Clinica Oftalmofológica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="../css/barraLateral.css" />
    <link rel="stylesheet" href="../css/perfil.css" />
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/geral.css" />
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../libraries/aula02.php') ?>
        <?php include('../includes/component/navbar.php') ?>
        <?php include('../includes/component/saidebar.php') ?>

        <div class="content-wrapper color">
            <?php include('../includes/component/wrapper.php') ?>

            <div class="profile-container">
                <div class="profile-info">
                    <form action="" method="POST">
                        <label>Nome:
                            <input type="text" id="nome" name="nome" placeholder="Digite seu nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required readonly />
                            <button type="button" onclick="toggleEdit('nome')">Editar</button>
                        </label>

                        <label>Número de Celular:
                            <input type="tel" id="numero_celular" name="numero_celular" placeholder="Digite seu número de celular" value="<?php echo htmlspecialchars($usuario['numero_celular']); ?>" required readonly />
                            <button type="button" onclick="toggleEdit('numero_celular')">Editar</button>
                        </label>

                        <label>RG:
                            <input type="text" id="rg" name="rg" placeholder="Digite seu RG" value="<?php echo htmlspecialchars($usuario['rg']); ?>" required readonly />
                            <button type="button" onclick="toggleEdit('rg')">Editar</button>
                        </label>

                        <label>CPF:
                            <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" value="<?php echo htmlspecialchars($usuario['cpf']); ?>" required readonly />
                            <button type="button" onclick="toggleEdit('cpf')">Editar</button>
                        </label>

                        <label>Data de Nascimento:
                            <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($usuario['data_nascimento']); ?>" required readonly />
                            <button type="button" onclick="toggleEdit('data_nascimento')">Editar</button>
                        </label>

                        <label>Sexo:
                            <select id="sexo" name="sexo" required disabled>
                                <option value="m" <?php echo ($sexo_usuario == 'm') ? 'selected' : ''; ?>>Masculino</option>
                                <option value="f" <?php echo ($sexo_usuario == 'f') ? 'selected' : ''; ?>>Feminino</option>
                            </select>
                            <button type="button" onclick="toggleEdit('sexo')">Editar</button>
                        </label>

                        <button id="save" type="submit">Salvar</button>
                    </form>
                </div>
            </div>

            <aside class="control-sidebar control-sidebar-dark"></aside>
        </div>

        <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
        <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../adminlte/dist/js/adminlte.min.js"></script>
        <script src="../adminlte/dist/js/demo.js"></script>

        <script>
            function toggleEdit(fieldId) {
                const inputField = document.getElementById(fieldId);
                if (inputField.tagName === 'SELECT' || inputField.readOnly) {
                    inputField.readOnly = false;
                    inputField.removeAttribute('disabled'); // Remover atributo disabled para o select
                    inputField.focus();
                } else {
                    inputField.readOnly = true;
                    inputField.setAttribute('disabled', 'disabled'); // Adicionar atributo disabled de volta
                }
            }
        </script>
    </body>
</html>
