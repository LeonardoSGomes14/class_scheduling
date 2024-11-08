<?php
require 'vendor/autoload.php';
    
include 'Config/config.php';

$school_year = $_POST['school_year'];


$sql = "SELECT name, email FROM users WHERE school_year = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $school_year);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $name_student = $row['name'];
        $email_student = $row['email'];

        // Configurar o PHPMailer
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Habilitar o SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.seuservidor.com';  // Endereço do servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'sesiinterclasse380@gmail.com';  // Usuário do SMTP
        $mail->Password = 'suasenha';           // Senha do SMTP
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configurar remetente e destinatário
        $mail->setFrom('sesiinterclasse380@gmail.com', 'Sua Escola');
        $mail->addAddress($email_student, $name_student); 

        // Conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = 'Nova Aula Agendada!';
        $mail->Body    = "Olá, $name_student, <br><br>Uma nova aula foi agendada para a sua turma.<br>Confira os detalhes no sistema da escola.<br><br>Atenciosamente,<br>Sua Escola";
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


$stmt->close();
$conn->close();
