<?php
session_start();
include_once '../Config/config.php';
include_once '../App/Controller/ClassroomController.php';

if (!isset($_SESSION['userID']) || $_SESSION['nao_autenticado'] === true) {
    header('Location: sign-in.php');
    exit();
}

$classroomController = new ClassroomController($pdo);
$classrooms = $classroomController->listClassrooms();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> <!-- Impede zoom excessivo no mobile -->
    <link rel="stylesheet" href="../Resources/Css/sandwich-menu.css">
    <link rel="stylesheet" href="../Resources/Css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Resources/Css/footer.css">
    <link rel="shortcut icon" href="../Resources/Images/logo.png" type="image/x-icon">
    <title>Página Inicial</title>
</head>

<body>
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
                        <a class="link-nav" href="calendario/views/user/">
                            <img class="icons" src="../Resources/Images/calendar.png" alt="Calendario-icon">
                            <p class="nav-text">CALENDÁRIO</p>
                        </a><br>
                        <a class="link-nav" href="tutorial.php">
                            <img class="icons" src="../Resources/Images/tuto.png" alt="Calendario-icon">
                            <p class="nav-text">TUTORIAL</p>
                        </a>
                        <br>
                        <?php
                        if (isset($_SESSION['userType']) && $_SESSION['userType'] == 3) {
                            echo  "<a class='link-nav' href='Adm/index.php'>";
                            echo  "<img class='icons' src='../Resources/Images/multiple-users-silhouette.png' alt='Administrador'>";
                            echo  "<p class='nav-text'>ADMINISTRADOR</p>";
                            echo  "</a>";
                        } else {
                            echo "";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section>
            <!--DC é "Disponible Classroom"-->
            <div class="div-DC">
                <div class="tittle-DC">
                    <p>SALAS DISPONÍVEIS</p>
                </div>
                <div class="section-DC">
                    <?php
                    $availableClassrooms = array_filter($classrooms, function ($classrooms) {
                        return $classrooms['conditionstatus'] == 0;
                    });
                    $availableClassrooms = array_slice($availableClassrooms, -3);
                    foreach ($availableClassrooms as $classroom):
                    ?>
                        <div class="container-DC">
                            <a href="scheduling.php?id=<?php echo $classroom['id_class']; ?>">
                                <div class="overlay-DC">
                                    <img src="../Resources/Images/img-1.png" alt="<?php echo $classroom['identification'] ?>">
                                    <p class="text-over-image"><?php echo $classroom['identification']; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>

                <div class="view-more-DC">
                    <a href="disp_classrooms_list.php">VER TODAS AS SALAS</a>
                </div>
            </div>

            <div class="div-SC">
                <div class="tittle-SC">
                    <p>SALAS AGENDADAS</p>
                </div>
                <div class="section-SC">
                    <?php
                    $disableClassrooms = array_filter($classrooms, function ($classrooms) {
                        return $classrooms['conditionstatus'] == 1;
                    });
                    $disableClassrooms = array_slice($disableClassrooms, -3);
                    foreach ($disableClassrooms as $classroom):
                    ?>
                        <div class="container-SC">
                            <a href="scheduling.php?id=<?php echo $classroom['id_class']; ?>">
                                <div class="overlay-DC">
                                    <img src="../Resources/Images/img-1.png" alt="<?php echo $classroom['identification'] ?>">
                                    <p class="text-over-image"><?php echo $classroom['identification']; ?></p>
                                    <?php //aqui ó 
                                    ?>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>

                <div class="view-more-SC">
                    <a href="ind_classrooms_list.php">VER TODAS AS SALAS</a>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 SmartClass. Todos os direitos reservados.</p>
        <p>Desenvolvido por <a href="">Empresa Example</a></p>
    </footer>
</body>

</html>
<script src="../Resources/Js/sandwich-menu.js"></script>

