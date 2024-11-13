<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function enviarAvisoAula($pdo, $school_year, $scheduling_time, $end_time, $teacher_name) {
    // Consulta para obter os emails dos alunos na turma
    $stmt = $pdo->prepare("SELECT email FROM students WHERE year_school = ?");
    $stmt->execute([$school_year]);
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Configurações do PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.seudominio.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sesiinterclasse380@gmail.com';
    $mail->Password = 'suasenha';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->setFrom('sesiinterclasse380@gmail.com', 'SmartClass');

    // Envio do email para cada aluno
    foreach ($alunos as $aluno) {
        try {
            $mail->addAddress($aluno['email']);
            $mail->isHTML(true);
            $mail->Subject = 'Nova aula agendada!';
            $mail->Body = "<p>Olá!</p><p>Uma nova aula foi agendada para a sua turma:</p>
                           <p><strong>Professor:</strong> $teacher_name</p>
                           <p><strong>Início:</strong> $scheduling_time</p>
                           <p><strong>Término:</strong> $end_time</p>";

            $mail->send();
            $mail->clearAddresses();
        } catch (Exception $e) {
            echo "Erro ao enviar email: {$mail->ErrorInfo}";
        }
    }
}
?>




sesiinterclasse380@gmail.com