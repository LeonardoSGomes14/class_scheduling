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
        $schedulingController->createScheduling($_SESSION['userID'], $_SESSION['userName'], $_POST['scheduling_time'], $_POST['end_time']);

        $_SESSION['message'] = 'Agendamento feito com sucesso!';
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
                <h2>Sala Reservada</h2>
                <?php endif; ?>
        </section>

    </main>
</body>
</html>