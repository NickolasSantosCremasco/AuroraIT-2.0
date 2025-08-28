<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../PHPMailer-master/src/PHPMailer.php';
require_once '../PHPMailer-master/src/Exception.php';
require_once '../PHPMailer-master/src/SMTP.php'; 

// Apenas executa a lógica de envio se o método for POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitiza e valida os dados do formulário
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));


    // Verifica se os campos obrigatórios estão preenchidos
    if (empty($fullname) || empty($email) || empty($subject) || empty($message)) {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');</script>";
    } else {

        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor 
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nck.tec.suporte@gmail.com';
            $mail->Password = 'derg wxfe slpa swyf'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';

            // Destinatários e Remetente
            $mail->setFrom($email, $fullname); 
            $mail->addAddress('nck.tec.suporte@gmail.com', 'AuroraIT'); 
            $mail->addReplyTo($email, $fullname); 

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = "
                <h3>Nova Mensagem de Contato</h3>
                <p><strong>Nome:</strong> {$fullname}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Telefone:</strong> {$phone}</p>
                <p><strong>Assunto:</strong> {$subject}</p>
                <p><strong>Mensagem:</strong><br>{$message}</p>
            ";
            $mail->AltBody = "Nova Mensagem de Contato\nNome: {$fullname}\nEmail: {$email}\nTelefone: {$phone}\nAssunto: {$subject}\nMensagem: {$message}";

            $mail->send();
           
            $_SESSION['form_message'] = "Mensagem enviada com sucesso! Entraremos em contato em breve.";
            header('Location: ../pages/faleconosco.php');
            exit;
            
        } catch (Exception $e) {
            $_SESSION['form_message'] = "A mensagem não pôde ser enviada. Erro: {$mail->ErrorInfo}";
            header('Location: ../pages/faleconosco.php');
            exit;
        }
    }
}
?>