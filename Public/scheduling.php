<?php
session_start();
include_once '../Config/config.php';
include_once '../App/Controller/ClassroomController.php';
include_once '../App/Controller/SchedulingController.php';

if (!isset($_SESSION['userID']) || $_SESSION['nao_autenticado'] === true) {
    header('Location: sign-in.php');
    exit();
}

$id_class = $_GET['id'];

$classroomController = new ClassroomController($pdo);
$schedulingController = new SchedulingController($pdo);

if (isset($_POST['id_class']) &&
    isset($_POST['scheduling_time']) &&
    isset($_POST['end_time'])) {

        $schedulingController->createScheduling($_POST['id_class'], $_POST['scheduling_time'], $_POST['end_time']);
        $classroomController->updateClassroomStatus($id_class, 1);

        $_SESSION['message'] = 'Agendamento feito com sucesso!';
        header('Location: scheduling.php?id=' . $id_class);
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
        isset($_POST['undo_reservation']) &&
        isset($_POST['id_teacher'])) {
            $id_class = $_GET['id'];
            $id_teacher = $_POST['id_teacher'];
            $schedulingController->undoScheduling($id_class, $id_teacher);

            $classroomController->updateClassroomStatus($id_class, 0);
            header('Location: scheduling.php?id=' . $id_class);
            exit();
}

$classrooms = $classroomController->listClassroomsByID($id_class);
$schedulings = $schedulingController->listSchedulings();
$scheduling = $schedulingController->getSchedulingByClassroom($id_class);
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
                <input type="hidden" name="id_class" value="<?php echo $id_class ?>">
                <button type="submit">Finalizar</button>
            </form>
            <?php else: ?>
                <h2>Sala Reservada pelo(a) professor(a) <?php echo $scheduling['teacher_name']; ?></h2>

                <?php 
                $datetime = $scheduling['scheduling_time'];
                $datetime_formatted = date('d/m/Y H:i:s', strtotime($datetime));

                $endtime = $scheduling['end_time'];
                $endtime_formatted = date('d/m/Y H:i:s', strtotime($endtime));
                ?>
                
                <p>Para o dia <?php echo $datetime_formatted ?></p>
                <p>Até <?php echo $endtime_formatted ?></p>

                <?php if ($_SESSION['userID'] == $scheduling['id_teacher']): ?>
                <form method="post">
                    <input type="hidden" name="id_teacher" value="<?php echo $_SESSION['userID'] ?>">
                    <button type="submit" name="undo_reservation">Desfazer Reserva</button>
                </form>
                <?php endif; ?>
            <?php endif; ?>
        </section>

    </main>
</body>
</html>