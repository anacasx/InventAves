<?php
namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email{
    //Variables públicas
    public $email;
    public $nombre;
    public $token;

    //Constructor
    public function __construct($email, $nombre, $token)
    {
        $this->email=$email;
        $this->nombre=$nombre;
        $this->token=$token;
    }

    //función para confirmar el envío del correo
    public function enviarConfirmacion(){
        //crear un objeto
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = '3d4ef1f37fae6d';
        $phpmailer->Password = '90cfdaf24c078a';

        $phpmailer->setFrom('cuentas@appsalon.com');
        $phpmailer->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $phpmailer->Subject='Confirma tu cuenta';

        //html
        $phpmailer->isHTML(TRUE);
        $phpmailer->CharSet='UTF-8';
        
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->email .  "</strong> Has Creado tu cuenta en App Salón, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";        
        //$contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $phpmailer->Body = $contenido;

        //enviar email
        $phpmailer->send();
    }
}
?>