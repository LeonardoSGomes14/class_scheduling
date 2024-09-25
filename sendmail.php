<?php
// Inclua o autoload do Composer para usar o PHPMailer
require 'vendor/autoload.php';

// Inclua sua conexão com o banco de dados
include 'Config\config.php';

// Defina a turma para a qual a aula foi agendada (provavelmente será passada pelo formulário de agendamento)
$school_year = $_POST['school_year']; // ou o valor que você obtém do agendamento

// Consulta para buscar os emails dos students da turma
$sql = "SELECT name, email FROM users WHERE school_year = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $school_year);
$stmt->execute();
$result = $stmt->get_result();

// Verifique se encontrou students na turma
if ($result->num_rows > 0) {
    // Itere sobre os students e envie um email para cada um deles
    while ($row = $result->fetch_assoc()) {
        $name_student = $row['name'];
        $email_student = $row['email'];

        // Configurar o PHPMailer
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Habilitar o SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.seuservidor.com';  // Endereço do servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'seuemail@seuservidor.com';  // Usuário do SMTP
        $mail->Password = 'suasenha';           // Senha do SMTP
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configurar remetente e destinatário
        $mail->setFrom('seuemail@seuservidor.com', 'Sua Escola');
        $mail->addAddress($email_student, $name_student); // Email e name do student

        // Conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = 'Nova Aula Agendada!';
        $mail->Body    = "Olá, $name_student, <br><br>Uma nova aula foi agendada para a sua turma.<br>Confira os detalhes no sistema da escola.<br><br>Atenciosamente,<br>Sua Escola";
        $mail->AltBody = "Olá, $name_student, Uma nova aula foi agendada para a sua turma. Confira os detalhes no sistema da escola. Atenciosamente, Sua Escola";

        // Tente enviar o email
        if ($mail->send()) {
            echo "Email enviado para: $email_student<br>";
        } else {
            echo "Erro ao enviar email para: $email_student. Erro: " . $mail->ErrorInfo . "<br>";
        }
    }
} else {
    echo "Nenhum estudante encontrado para a turma.";
}

// Fechar a conexão
$stmt->close();
$conn->close();
