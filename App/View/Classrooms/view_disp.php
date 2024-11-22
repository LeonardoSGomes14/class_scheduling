<?php
include_once 'C:\xampp\htdocs\class_scheduling\App\Controller\ClassroomController.php';
include_once 'C:\xampp\htdocs\class_scheduling\Config\config.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salas Disponíveis</title>
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
            <div class="list-nav">
                <ul class="ul-nav">
                    <li class="button-nav">
                        <a class="link-nav" href="tutorial.html">
                            <img class="icons" src="../Resources/Images/tuto.png" alt="Calendario-icon">
                            <p class="nav-text">TUTORIAL</p>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
        <div class="ttl-DC">
            <h2>SALAS DISPONÍVEIS</h2>
        </div>
    </div>
    
    <div class="classroom-grid">
        <?php
            try {
                foreach ($classrooms as $classroom) {
                    if ($classroom['conditionstatus'] == 0) {
                        ?>
                        <div class="container-DC">
                        <a href="scheduling.php?id=<?php echo $classroom['id_class']; ?>">
                            <div class="overlay-DC">
                                <img src="../Resources/Images/img-1.png" alt="<?php echo $classroom['identification']; ?>">
                                <div class="classroom-overlay">
                                    <p class="text-over-image"><?php echo $classroom['identification']; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                        <?php
                    }
                }
            } catch (PDOException $e) {
                echo "<p>Erro ao exibir salas de aula: " . $e->getMessage() . "</p>";
            }
        ?>
    </div>
</body>
</html>
<script src="../Resources/Js/sandwich-menu.js"></script>
