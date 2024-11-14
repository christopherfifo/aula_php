<?php
require '../backend/config.php';

session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_email'])) {
    echo "Você precisa estar logado.";
    exit; 
}

$email_usuario = $_SESSION['user_email'];

// Consulta os dados do usuário
$sql = "SELECT nome, numero_celular, rg, cpf, data_nascimento, sexo FROM usuarios WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email_usuario]);

if ($stmt->rowCount() > 0) {
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Usuário não encontrado.";
    exit;
}

$sexo_usuario = isset($usuario['sexo']) ? $usuario['sexo'] : 'm';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificando se a imagem foi enviada corretamente
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['imagem']['tmp_name'];
        $fileSize = $_FILES['imagem']['size'];
        $fileType = mime_content_type($fileTmpPath);

        // Verifica se o arquivo é uma imagem
        if (strpos($fileType, 'image/') === 0) {
            // Verifica se o tamanho da imagem é menor que 500MB
            if ($fileSize <= 500 * 1024 * 1024) {
                // Lê o conteúdo do arquivo e verifica se está sendo lido corretamente
                $fileData = file_get_contents($fileTmpPath);

                if ($fileData !== false) {
                    // Atualiza o banco de dados com a imagem
                    $sql = "UPDATE usuarios SET imagem = ? WHERE email = ?";
                    $stmt = $pdo->prepare($sql);

                    if ($stmt->execute([$fileData, $email_usuario])) {
                        echo "Imagem de perfil atualizada com sucesso!";
                    } else {
                        echo "Erro ao atualizar a imagem no banco de dados.";
                    }
                } else {
                    echo "Erro ao ler o conteúdo da imagem.";
                }
            } else {
                echo "A imagem deve ter no máximo 500MB.";
            }
        } else {
            echo "O arquivo enviado não é uma imagem válida.";
        }
    } else {
        echo "Erro ao fazer upload da imagem. Código de erro: " . $_FILES['imagem']['error'];
    }

    // Atualizando demais informações do usuário
    $nome = $_POST['nome'];
    $numero_celular = $_POST['numero_celular'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];

    $sql = "UPDATE usuarios SET nome = ?, numero_celular = ?, rg = ?, cpf = ?, data_nascimento = ?, sexo = ? WHERE email = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nome, $numero_celular, $rg, $cpf, $data_nascimento, $sexo, $email_usuario])) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados.";
    }
}
?>
