<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
define('EMAIL', 'thiagoalves@albicod.com');
define('SENHA', '211085100705');

class Newsletter extends model{
	public function getAll() {
		$array = array();

        $sql = $this->db->prepare("SELECT * FROM emails WHERE status = 1");
        $sql->execute();
        if ($sql->rowCount() > 0) {
        	$array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $array;
	}

	public function upStatus($id, $status){
		$sql = $this->db->prepare("
			UPDATE emails 
			SET status = :status 
			WHERE id = :id");
		$sql->bindValue(':status', $status);
		$sql->bindValue(':id', $id);
        $sql->execute();
	}

	public function mail($id, $email, $mensagem){
		$mail = new PHPMailer(true); 

		try {
	    $mail->SMTPOptions = [
	        'ssl' => [
	            'verify_peer' => false,
	            'verify_peer_name' => false,
	            'allow_self_signed' => true
	            ]
	        ];
	    //Ativa o SMTP
	    $mail->isSMTP();

	    /*Debug*/
	    //$mail->SMTPDebug = 2;
	    //smtp.live.com - hotmail / smtp.gmail.com - GMAIL
	    $mail->Host = 'mail.albicod.com'; 
	    $mail->SMTPAuth = true;                              
	    $mail->Username = EMAIL;                 
	    $mail->Password = SENHA;  
	    $mail->Port = 587; 
	    $mail->SMTPSecure = 'tls';
	    //QUEM ESTA ENVIANDO - EMAIL DA EMPRESA
	    $mail->setFrom($mail->Username);/*opcional*/
	    //AQUI VAI PARA QUEM VOU ENVIAR O EMAIL
	    $mail->addAddress($email, 'Newsletter');
	    //ATIVANDO HTML NO ENVIO DO EMAIL
	    $mail->isHTML(true);

	    //CARREGA O CONTEUDO DO TITULO
	    $mail->Subject = utf8_decode("Newsletter");

    	$mail->Body = utf8_decode($mensagem);
	    if ($mail->send()) {
	    	$array = array('id'=>$id, 'status'=>3);
	    	return $array;
	    } else {
	    	$array = array('id'=>$id, 'status'=>2);
	    	return $array;
	    }
	    
	    
	    } catch (Exception $e) {
	        echo 'Não foi possivel enviar o email.';
	        echo 'Error: '.$mail->ErrorInfo;
	    }
	}

}