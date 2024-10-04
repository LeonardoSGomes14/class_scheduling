<?php
session_start();
include_once '../Config/config.php';
include_once '../App/Controller/ClassroomController.php';
include_once '../App/Controller/SchedulingController.php';
include_once '../App/Controller/GroupsController.php';

if (!isset($_SESSION['userID']) || $_SESSION['nao_autenticado'] === true) {
    header('Location: sign-in.php');
    exit();
}

$id_class = $_GET['id'];
$teacher = $_SESSION['userName'];

$groupController = new GroupController($pdo);
$classroomController = new ClassroomController($pdo);
$schedulingController = new SchedulingController($pdo);



if (isset($_POST['id_class']) &&
    isset($_POST['scheduling_time']) &&
    isset($_POST['end_time']) &&
    isset($_POST['school_year'])) {

        $schedulingController->createScheduling($_POST['id_class'], $_POST['scheduling_time'], $_POST['end_time'], $_POST['school_year']);
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
$groups = $groupController->selectGroups($teacher);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sala Disponível  </title>
    <link rel="shortcut icon" href="../Resources/Images/sesi-logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Resources/Css/scheduling.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../Resources/Css/sandwich-menu.css">
    
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
        <section class="esq">
        <header>
        <div class="menu-toggle" id="menu-toggle">
            <svg class="menu-open-button" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 72 72">
                <path d="M56 48c2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4-1.202 0-38.798 0-40 0-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4C17.202 48 54.798 48 56 48zM56 32c2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4-1.202 0-38.798 0-40 0-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4C17.202 32 54.798 32 56 32zM56 16c2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4-1.202 0-38.798 0-40 0-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4C17.202 16 54.798 16 56 16z"></path>
            </svg>
        </div>
        <nav id="menu" class="menu">
            <div class="close-logout">
                <div class="close-menu" id="close-menu">
                    <img class="menu-close-button" src="../Resources/Images/close.png" alt="close-icon">
                </div>
                <div class="logout">
                    <a href="../App/Providers/logout.php">
                        <img class="logout-button" src="../Resources/Images/sign-out.png" alt="logout-icon">
                    </a>    
                </div>
            </div>
            <div class="list-nav">
                <ul class="ul-nav">
                    <li class="button-nav">
                        <a class="link-nav" href="index.php">
                            <img class="icons" src="../Resources/Images/voltar.png" alt="Calendario-icon">
                            <p class="nav-text">PÁGINA INICIAL</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="list-nav">
                <ul class="ul-nav">
                    <li class="button-nav">
                        <a class="link-nav" href="calendario/views/user/">
                            <img class="icons" src="../Resources/Images/calendar.png" alt="Calendario-icon">
                            <p class="nav-text">CALENDÁRIO</p>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
            

            <div class="id-class">
            <h1>Sala Disponível</h1>
            <div class="img-sc">
            <img src="../Resources/Images/img-1.png">  
            <h1 id="id">  
                <?php echo $classrooms['identification'] ?>
            </h1>
            </div>
            </div>
            </section>
            <section class="dir">
            <div class="eq-class"></div>
            <p><strong><i class="fas fa-wrench"></i>Equipamentos: </strong><?php echo $classrooms['equipaments'] ?></p>
            <p><strong><i class="fas fa-file-alt"></i>Descrição: </strong><?php echo $classrooms['description'] ?></p>
            <p><strong><i class="fas fa-check"></i>Status da Sala: </strong><?php echo $classrooms['conditionstatus'] ? 'Reservado' : 'Livre'; ?></p>
        
            <?php if($_SESSION['userType'] == 1 || $_SESSION['userType'] == 3): ?>
        <section>
            <?php if($classrooms['conditionstatus'] == 0 ): ?>
            <h2>Reservar Sala</h2>
            <form  method="post">
                <div class="hp">
                <label>
                    <span><i class="fas fa-clock"></i>Horário de Reserva:</span><br>
                    <input type="datetime-local" name="scheduling_time" required>
                </label><br><br>
                <label>
                    <span><i class="fas fa-clock"></i>Horário de Término:</span><br>
                    <input type="datetime-local" name="end_time" required>
                </label><br><br>
                <label>
                    <span><i class="fas fa-clock"></i>Turma:</span><br>
                    <select name="school_year" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php foreach ($groups as $group): ?>
                            <option value="<?php echo $group['year_school'] ?>"><?php echo $group['year_school'] ?></option>
                        <?php endforeach ?>
                    </select>
                </label><br><br>    
                </div>
                <br><br>
                <div class="bp">
                <input type="hidden" name="id_class" value="<?php echo $id_class ?>">
                <button type="submit">Finalizar</button>
                </div>
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
            <?php endif; ?>
        </section>
        </section>

    </main>
    
</body>
</html>
<script src="../Resources/Js/sandwich-menu.js"></script>