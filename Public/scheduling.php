<?php
session_start();
include_once '../Config/config.php';
include_once '../App/Controller/ClassroomController.php';
include_once '../App/Controller/SchedulingController.php';

$id_class = $_GET['id'];

$classroomController = new ClassroomController($pdo);
$schedulingController = new SchedulingController($pdo);

if (isset($_POST['scheduling_time']) &&
    isset($_POST['end_time'])) {

        $schedulingController->createScheduling(scheduling_time: $_POST['scheduling_time'], end_time: $_POST['end_time']);
        $classroomController->updateClassroomStatus($id_class, 1);

        $_SESSION['message'] = 'Agendamento feito com sucesso!';
        header('Location: scheduling.php?id=' . $id_class);
        exit();
    }

if (isset($_POST['undo_reservation'])) {
    $id_teacher = $_SESSION['userID'];
    $message = $schedulingController->undoScheduling($id_class, $id_teacher);
    $_SESSION['message'] = $message;

    $classroomController->updateClassroomStatus($id_class, 0);
    header('Location: scheduling.php?id=' . $id_class);
    exit();
}

$classrooms = $classroomController->listClassroomsByID($id_class);
$schedulings = $schedulingController->listSchedulings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
</head>
<body>
    <header>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<p>' . $_SESSION['message'] . '</p>';
                unset($_SESSION['message']);
            }
        ?>
    </header>
    <main>
        <section>
            <a href="index.php">Voltar</a>
            <h1>
                <?php echo $classrooms['identification'] ?>
            </h1>
            <p><strong>Equipamentos: </strong><?php echo $classrooms['equipaments'] ?></p>
            <p><strong>Descrição: </strong><?php echo $classrooms['description'] ?></p>
            <p><strong>Status da Sala: </strong><?php echo $classrooms['conditionstatus'] ? 'Reservado' : 'Livre'; ?></p>
        </section>
        <section>
            <?php if($classrooms['conditionstatus'] == 0 ): ?>
            <h2>Reservar Sala</h2>
            <form method="post">
                <label>
                    <span>Horário de Reserva:</span><br>
                    <input type="datetime-local" name="scheduling_time" required>
                </label><br><br>
                <label>
                    <span>Horário de Término:</span><br>
                    <input type="datetime-local" name="end_time" required>
                </label><br><br>
                <button type="submit">Finalizar</button>
            </form>
            <?php else: ?>
                <h2>Sala Reservada pelo(a) professor(a) <?php echo $_SESSION['userName']; ?></h2>
                <form method="post">
                    <input type="hidden" name="undo_reservation" value="1">
                    <button type="submit">Desfazer Reserva</button>
                </form>
                <?php endif; ?>
        </section>

    </main>
</body>
</html>