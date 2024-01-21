<?php
require_once 'config.php';

$senhaSecreta = "123";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senhadigitada = $_POST['senha'];

    if ($senhadigitada === $senhaSecreta) {
        $sql = "SELECT * FROM mensagens";
        $result = $conn->query($sql);
    } else {
        echo "<h1>Senha incorreta! </h1>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver mensagens</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./scr/styles/reset.css">
    <link rel="stylesheet" href="./scr/styles/styles.css">
    

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ephesis&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Bootstrao-icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>



<body>

    <form method="post">
        <input type="password" name="senha" placeholder="digite sua senha" required>
        <div class="btn-enviar"><input type="submit" value="Enviar"></div>
    </form>

    <div class="mensagens" >
        <?php if (isset($result) && $result->num_rows > 0) : ?>
            <h2 style="margin-bottom:30px">Mensagens</h2>
            <ul>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <li>
                        <strong>Nome: </strong> <?php echo $row["nome"];  ?><br>
                        <strong>Email: </strong> <?php echo $row["email"];  ?><br>
                        <strong>Mensagem: </strong> <?php echo $row["mensagem"];  ?><br>
                        <strong>Data e hora: </strong> <?php echo $row["data"] . " às " . $row["hora"];  ?><br><br>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else : ?>
            <p>Nenhuma mensagem. </p>
        <?php endif; ?>
    </div>

</body>

</html>