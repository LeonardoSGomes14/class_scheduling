<?php
include_once 'C:\xampp\htdocs\class_scheduling\Config\config.php';
include_once 'C:\xampp\htdocs\class_scheduling\App\Controller\ClassroomController.php';


$classroomsController = new classroomController($pdo);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_class = $_POST['id_class'];
    $identification = $_POST['identification'];
    $contitionstatus = $_POST['contitionstatus'];
    $equipaments = $_POST['equipaments'];
    $description = $_POST['description'];


    $classroomsController->updateclassroom($id_class, $identification, $contitionstatus, $equipaments,$description);

    header('Location: classrooms_list.php');
    exit();
}

if (isset($_GET['id'])) {
    $id_class = $_GET['id'];


    $classrooms = $classroomsController->listClassrooms();
    $classrooms = array_filter($classrooms, fn($t) => $t['id_class'] == $id_class);

   
    if (empty($classrooms)) {
        echo "Sala de aula não encontrado.";
        exit();
    }

 
    $classroom = reset($classroom);
} else {
    echo "ID da sala de aula não foi fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta identification="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update classroom</title>
    <style>
        .toggle-btn {
            cursor: pointer;
            color: blue;
        }
    </style>
</head>
<body>
<h1>Editar dados das salas</h1>
        <form method="POST">
            <input type="hidden" identification="id_class" value="<?php echo htmlspecialchars($classroom['id_class']); ?>">

            <div class="form-group">
                <label for="identification">Identificação:</label>
                <input type="text" id="identification" name="identification"  value="<?php echo htmlspecialchars($classroom['identification']); ?>" required>
            </div>

            <div class="form-group">
                <label for="contitionstatus">Condição:</label>
                <input type="text" id="contitionstatus" name="contitionstatus"  value="<?php echo htmlspecialchars($classroom['contitionstatus']); ?>" required>
            </div>

            <div class="form-group">
                <label for="equipaments">Equipamentos:</label>
                <input type="text" id="equipaments" name="equipaments"  step="0.01" value="<?php echo htmlspecialchars($classroom['equipaments']); ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <input type="text" id="description" name="description"  step="0.01" value="<?php echo htmlspecialchars($classroom['description']); ?>" required>
            </div>

            <button type="submit" >Atualizar</button>
        </form>


   <script>
        function mostrarSenha() {
            var senhaInput = document.getElementById("equipaments");
            var toggleBtn = document.querySelector(".toggle-btn");

            if (senhaInput.type === "equipaments") {
                senhaInput.type = "text";
                toggleBtn.innerText = "Esconder";
            } else {
                senhaInput.type = "equipaments";
                toggleBtn.innerText = "Mostrar";
            }
        }
    </script>

</body>
</html>

