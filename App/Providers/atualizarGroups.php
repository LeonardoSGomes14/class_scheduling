<?php
include_once '../../Config/config.php';
include_once '../../App/Controller/UsersController.php';

$usersController = new UserController($pdo);
$types = $usersController->selectTeacher();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        header('Location: ../../Public/Adm/Groups.php');
        exit;
    }

    $id_group = $_GET['id'];
    $teacher = $_POST['teacher'];
    $year_school = $_POST['year_school'];

    $stmt = $pdo->prepare('UPDATE groups SET teacher = ?, year_school = ? WHERE id_group = ?');
    $stmt->execute([$teacher, $year_school, $id_group]);

    header('Location: ../../Public/Adm/Groups.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: ../../Public/Adm/Groups.php');
    exit;
}

$id_group = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM groups WHERE id_group = ?');
$stmt->execute([$id_group]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: ../../Public/Adm/Groups.php');
    exit;
}

$teacher = $appointment['teacher'];
$year_school = $appointment['year_school'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta teacher="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Competidor</title>
    <link rel="stylesheet" href="../../Resources/Css/ADM/atualizarGrupos.css">
</head>
<body>
    <header>

    </header>
    <main>
        <section>
            <form method="post">
                <label>
                    <span>Professor:</span><br>
                    <select name="teacher" required>
                        <option value="" disabled selected><?php echo $teacher ?></option>
                        <?php foreach ($types as $type): ?>
                            <option value="<?php echo $type['name'] ?>"><?php echo $type['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </label><br>
                <label>
                    <span>Turma:</span><br>
                    <select name="year_school" required>
                        <option value="" disabled selected><?php echo $year_school ?></option>
                        <optgroup label="Ensino Fundamental">
                            <option value="9 Ano do Ensino Fundamental">9º Ano</option>
                            <option value="8 Ano do Ensino Fundamental">8º Ano</option>
                            <option value="7 Ano do Ensino Fundamental">7º Ano</option>
                            <option value="6 Ano do Ensino Fundamental">6º Ano</option>
                        </optgroup>
                        <optgroup label="Ensino Médio">
                            <option value="1 Ano do Ensino Médio">1º Ano</option>
                            <option value="2 Ano do Ensino Médio">2º Ano</option>
                            <option value="3 Ano do Ensino Médio">3º Ano</option>
                        </optgroup>
                    </select>
                </label><br><br>
                <button type="submit">Atualizar</button><br>
                <a href="../../Public/Adm/Groups.php">Voltar à página anterior</a>
            </form>
        </section>
    </main>
</body>
</html>
