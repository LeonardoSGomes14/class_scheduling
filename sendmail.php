<?php
require 'vendor/autoload.php';
include 'Config/config.php';

$school_year = $_POST['school_year'];

// Preparar e executar a consulta usando PDO
$sql = "SELECT name, email FROM users WHERE school_year = :school_year";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':school_year', $school_year, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    foreach ($result as $row) {
        $name_student = $row['name'];
        $email_student = $row['email'];

        // Configurar o PHPMailer
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Habilitar o SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'smartclass.educ@gmail.com';
        $mail->Password = 'smartclass123';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configurar remetente e destinatário
        $mail->setFrom('smartclass.educ@gmail.com', 'Sua Escola');
        $mail->addAddress($email_student, $name_student);

        // Conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = 'Nova Aula Agendada!';
        $mail->Body = "Olá, $name_student, <br><br>Uma nova aula foi agendada para a sua turma.<br>Confira os detalhes no sistema da escola.<br><br>Atenciosamente,<br>Sua Escola";
        $mail->AltBody = "Olá, $name_student, Uma nova aula foi agendada para a sua turma. Confira os detalhes no sistema da escola. Atenciosamente, Sua Escola";

        // Enviar o email
        if ($mail->send()) {
            echo "Email enviado para: $email_student<br>";
        } else {
            echo "Erro ao enviar email para: $email_student. Erro: " . $mail->ErrorInfo . "<br>";
        }
    }
} else {
    echo "Nenhum estudante encontrado para a turma.";
}
