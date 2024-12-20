<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/Css/sandwich-menu.css">
    <link rel="stylesheet" href="../Resources/Css/footer.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        video {
            width: 100%;
            height: auto;
            max-height: 80vh;
        }
        .video {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>
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
        <main>
            <div class="videos">
                <video src="../Resources/Tutorial Narrado SmartClass.mp4" autoplay loop controls></video>
            </div>
        </main>
    <footer>
        <p>&copy; 2024 SmartClass. Todos os direitos reservados.</p>
        <p>Desenvolvido por <a href="">Empresa Example</a></p>
    </footer>
</body>
</html>
<script src="../Resources/Js/sandwich-menu.js"></script>