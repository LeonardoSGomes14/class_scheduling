<?php include_once("C:/xampp/htdocs/class_scheduling/Public/calendario/config/config.php"); ?>
<?php include(DIRREQ ."/lib/html/header.php"); ?>
<?php
$objEvents= new \Classes\ClassEvents();
$events= $objEvents->getEventsbyId($_GET['id']);
$date= new \DateTime($events['start']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <script src="https://kit.fontawesome.com/2cd5dc9187.js" crossorigin="anonymous"></script>
        <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'%3E%3Cpath d='M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z'/%3E%3C/svg%3E" sizes="16x16" type="image/svg+xml">
</head>
<br>
    <a class= "lixo" id= "delete" href="<?php echo DIRPAGE. '/controllers/ControllerDelete.php?id='.$_GET['id']; ?>"><img src="<?php echo DIRPAGE. '/img/download-removebg-preview.png' ?>" width="30px" height= "30px"></a>

<form class= "formulario"name="formEdit" id= "formEdit" method="post" action="<?php echo DIRPAGE.'/controllers/ControllerEdit.php'; ?>">
     <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>"><br>
    Data: <input class= "campo-input"type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>"><br>
    Hora: <input class= "campo-input"type="time" name="time" id="time" value="<?php echo $date->format("H:i"); ?>"><br>
    Evento: <input class= "campo-input"type="text" name="title" id="title" value = "<?php echo $events['title']; ?>"><br>
    Descrição: <input class= "campo-input"type="text" name="description" id="description" value = "<?php echo $events['description']; ?>"><br>
    Cor: <input class= "campo-input"type="color" name="color" id="color" value = "<?php echo $events['color']; ?>"><br>
    Quanto tempo de aula?(minutos) <input class= "campo-input" type="number" name="tempoaula" id="tempoaula" ><br>
    <input class= "campo-submit"type="submit" value="Confirmar Aula">
</form>

    <?php include(DIRREQ."/lib/html/footer.php"); ?>

