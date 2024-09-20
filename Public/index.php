<?php
session_start();
include_once '../Config/config.php';
include_once '../App/Controller/ClassroomController.php';

$classroomController = new ClassroomController($pdo);
$classrooms = $classroomController->listClassrooms();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/Css/sandwich-menu.css">
    <link rel="stylesheet" href="../Resources/Css/sandwich-menu-responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap" rel="stylesheet">
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
            <div class="container-up-SM">
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
                        <a class="link-nav" href="">
                            <img class="icons" src="../Resources/Images/calendar.png" alt="Calendario-icon">
                            <p class="nav-text">CALENDÁRIO</p>
                        </a>
                    </li>
                    <li class="button-nav">
                        <a class="link-nav" href="">
                            <img class="icons-arrow" src="../Resources/Images/play_arrow.png" alt="Calendario-icon">
                            <p class="nav-text">SALAS DISPONÍVEIS</p>
                        </a>
                    </li>
                    <li class="button-nav">
                        <a class="link-nav" href="">
                            <img class="icons-arrow" src="../Resources/Images/play_arrow.png" alt="Calendario-icon">
                            <p class="nav-text">SALAS AGENDADAS</p>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section>
            <?php foreach ($classrooms as $classroom): ?>
                <a href="scheduling.php?id=<?php echo $classroom['id_class']; ?>">
                    <img src="../Resources/Images/login-bg.jpeg" style="width: 200px; height: 200px;">
                </a>
            <?php endforeach; ?>
        </section>
    </main>
    <script src="../Resources/Js/sandwich-menu.js"></script>
</body>
</html>