<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require APP_PATH . '/app/libraries/vendor/autoload.php';

function enviarCorreoConfirmacionPersona($nombre, $correo, $evento, $corrEven)
{
	$mail = new PHPMailer(true); // Passing `true` enables exceptions
	try {
		//Server settings
		$mail->SMTPDebug = 0; // Enable verbose debug output
		$mail->isSMTP(); // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; // Enable SMTP authentication
		if ($corrEven == 1) {
			$mail->Username = 'eventos@ricaldone.edu.sv'; // SMTP username
			$mail->Password = 'eventosricaldone2019'; // SMTP password
		} else {
			$mail->Username = 'eventos_cfp@ricaldone.edu.sv'; // SMTP username
			$mail->Password = 'eventosricaldone2019'; // SMTP password
		}
		$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;
		$mail->CharSet = 'UTF-8';
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true,
			),
		); // TCP port to connect to

		//Recipients
		if ($corrEven == 1) {
			$mail->setFrom('eventos@ricaldone.edu.sv', 'Instituto Tecnico Ricaldone');
		} else {
			$mail->setFrom('eventos_cfp@ricaldone.edu.sv', 'Centro de Formación Profesional');
		}

		$mail->addAddress($correo, $nombre); // Add a recipient
		//Content
		$mail->isHTML(true); // Set email format to HTML
		$mail->Subject = $evento;
		$mail->Body = '
<div style="background-color: #eee !important;    margin: 0;">
    <div style="    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px;">
        <div style="width: 100%;
		margin-left: auto;
		left: auto;
		right: auto;
		float: left;
		box-sizing: border-box;
		padding: 0 .75rem;
		min-height: 1px;
		text-align: center;
		">
            <img src="http://sgcs.ricaldone.edu.sv/logos/RICALDONE.png" width="25%" style="margin-top: 20px;" alt="imagenEvento">
        </div>
    </div>
    <div style="    margin-left: auto;
    margin-right: auto;
	margin-bottom: 20px;
	width: 85%;
	margin: 0 auto;
	max-width: 1280px;
	background-color: #fff !important;">
        <div style="width: 100%;
		margin-left: auto;
		left: auto;
		right: auto;
		float: left;
		box-sizing: border-box;
		padding: 0 .75rem;
		min-height: 1px;">
            <h6 style="font-size: 1.15rem;
			line-height: 110%;
			display: block;
			margin: .7666666667rem 0 .46rem 0;
			margin-block-start: 2.33em;
			margin-block-end: 2.33em;
			margin-inline-start: 0px;
			margin-inline-end: 0px;">Buen día: ' . $nombre . ', se ha confirmado con exito su asistencia al evento: ' . $evento . '. Lo esperamos.</h6>
        </div>
        <div style="width: 100%;
		margin-left: auto;
		left: auto;
		right: auto;
		float: left;
		box-sizing: border-box;
		padding: 0 .75rem;
		min-height: 1px;
		background-color: black;">
            <div style="    margin-left: -.75rem;
			margin-right: -.75rem;
			margin-bottom: 20px;
			text-align: center;
			box-sizing: inherit">
                <div>
					<h6 style="    color: #fff !important;
					font-size: 1.15rem;
					line-height: 110%;
					margin: .7666666667rem 0 .46rem 0;
					box-sizing: inherit;
					display: block;
					font-size: 0.67em;
					margin-block-start: 2.33em;
					margin-block-end: 2.33em;
					margin-inline-start: 0px;
					margin-inline-end: 0px;
					font-weight: bold;">SALESIANOS</h6>
                </div>
				<div style="
				width: 100%;
				margin-left: auto;
				left: auto;
				right: auto;    float: left;
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
				padding: 0 .75rem;
				min-height: 1px;
				">
                    <a href="https://www.facebook.com/ricaldone.itr/" target="_blank"><img src="http://sgcs.ricaldone.edu.sv/web/img/redes/facebook.png" width="20px" style="margin: 20px; margin-top: 5px;" alt="imagenEvento"></a>
                    <a href="https://www.instagram.com/ricaldone/" target="_blank"><img src="http://sgcs.ricaldone.edu.sv/web/img/redes/instagram.png" width="20px" style="margin: 20px; margin-top: 5px;" alt="imagenEvento"></a>
                    <a href="https://twitter.com/ricaldone_itr" target="_blank"><img src="http://sgcs.ricaldone.edu.sv/web/img/redes/twitter.png" width="20px" style="margin: 20px; margin-top: 5px;" alt="imagenEvento"></a>
                    <a href="https://www.youtube.com/user/ITecnicoRicaldone" target="_blank"><img src="http://sgcs.ricaldone.edu.sv/web/img/redes/youtube.png" width="20px" style="margin: 20px; margin-top: 5px;" alt="imagenEvento"></a>
                </div>
            </div>
        </div>
    </div>
</div>
		';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if ($mail->send()) {
			return true;
		} else {
			return false;
		}
	} catch (Exception $e) {
		return false;
	}
}
function enviarCorreoConfirmacionEncargado($nombre, $correo, $evento, $contacto)
{
	$mail = new PHPMailer(true); // Passing `true` enables exceptions
	try {
		//Server settings
		$mail->SMTPDebug = 0; // Enable verbose debug output
		$mail->isSMTP(); // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = 'eventos@ricaldone.edu.sv'; // SMTP username
		$mail->Password = 'eventosricaldone2019'; // SMTP password
		$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;
		$mail->CharSet = 'UTF-8';
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true,
			),
		); // TCP port to connect to

		//Recipients
		$mail->setFrom('eventos@ricaldone.edu.sv', 'Instituto Tecnico Ricaldone');
		$mail->addAddress('eventos_cfp@ricaldone.edu.sv', 'CFP'); // Add a recipient
		//Content
		$mail->isHTML(true); // Set email format to HTML
		$mail->Subject = "Confirmación del Evento: " . $evento;
		$mail->Body = '
<div style="background-color: #eee !important;    margin: 0;">
    <div style="    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px;">
        <div style="width: 100%;
		margin-left: auto;
		left: auto;
		right: auto;
		float: left;
		box-sizing: border-box;
		padding: 0 .75rem;
		min-height: 1px;
		text-align: center;
		">
            <img src="http://sgcs.ricaldone.edu.sv/logos/RICALDONE.png" width="25%" style="margin-top: 20px;" alt="imagenEvento">
        </div>
    </div>
    <div style="    margin-left: auto;
    margin-right: auto;
	margin-bottom: 20px;
	width: 85%;
	margin: 0 auto;
	max-width: 1280px;
	background-color: #fff !important;">
        <div style="width: 100%;
		margin-left: auto;
		left: auto;
		right: auto;
		float: left;
		box-sizing: border-box;
		padding: 0 .75rem;
		min-height: 1px;">
            <h6 style="font-size: 1.15rem;
			line-height: 110%;
			display: block;
			margin: .7666666667rem 0 .46rem 0;
			margin-block-start: 2.33em;
			margin-block-end: 2.33em;
			margin-inline-start: 0px;
			margin-inline-end: 0px;">Buen día: ' . $nombre . ', el contacto: ' . $contacto . ' ha confirmado su asistencia al evento: ' . $evento . '. Favor confirmar en sistema la confirmacion del contacto.</h6>
        </div>
        <div style="width: 100%;
		margin-left: auto;
		left: auto;
		right: auto;
		float: left;
		box-sizing: border-box;
		padding: 0 .75rem;
		min-height: 1px;
		background-color: black;">
            <div style="    margin-left: -.75rem;
			margin-right: -.75rem;
			margin-bottom: 20px;
			text-align: center;
			box-sizing: inherit">
                <div>
					<h6 style="    color: #fff !important;
					font-size: 1.15rem;
    line-height: 110%;
	margin: .7666666667rem 0 .46rem 0;
	box-sizing: inherit;
	display: block;
    font-size: 0.67em;
    margin-block-start: 2.33em;
    margin-block-end: 2.33em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;">SALESIANOS</h6>
                </div>
				<div style="
				width: 100%;
				margin-left: auto;
				left: auto;
				right: auto;    float: left;
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
				padding: 0 .75rem;
				min-height: 1px;
				">
                    <a href="https://www.facebook.com/ricaldone.itr/" target="_blank"><img src="http://sgcs.ricaldone.edu.sv/web/img/redes/facebook.png" width="20px" style="margin: 20px; margin-top: 5px;" alt="imagenEvento"></a>
                    <a href="https://www.instagram.com/ricaldone/" target="_blank"><img src="http://sgcs.ricaldone.edu.sv/web/img/redes/instagram.png" width="20px" style="margin: 20px; margin-top: 5px;" alt="imagenEvento"></a>
                    <a href="https://twitter.com/ricaldone_itr" target="_blank"><img src="http://sgcs.ricaldone.edu.sv/web/img/redes/twitter.png" width="20px" style="margin: 20px; margin-top: 5px;" alt="imagenEvento"></a>
                    <a href="https://www.youtube.com/user/ITecnicoRicaldone" target="_blank"><img src="http://sgcs.ricaldone.edu.sv/web/img/redes/youtube.png" width="20px" style="margin: 20px; margin-top: 5px;" alt="imagenEvento"></a>
                </div>
            </div>
        </div>
    </div>
</div>
		';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if ($mail->send()) {
			return true;
		} else {
			return false;
		}
	} catch (Exception $e) {
		return false;
	}
}
