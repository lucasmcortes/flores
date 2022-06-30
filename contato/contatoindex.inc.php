<?php

include_once __DIR__.'/../includes/setup.inc.php';

if (isset($_POST['submitcontato']) ) {
	$resposta_envio_contato = '';
	$windowWidth = $_POST['wwidth'];

	$nome = $_SESSION['nome_contato'] = $_POST['connome'];
	$email = $_SESSION['email_contato'] = $_POST['conemail'];
	$telefone = $_SESSION['telefone_contato'] = $_POST['contelefone'];
	$assunto = $_SESSION['assunto_contato'] = $_POST['conassunto'];
	$mensagem = $_SESSION['mensagem_contato'] = $_POST['conmensagem'];

	if (empty($nome) || empty($email) || empty($telefone) || empty($mensagem)) {
		$resposta_envio_contato .= 'Preencha todos os campos para enviar sua mensagem!';
	} else {
		$cartinha = new Cartinha();
		$cartinha->enviarCartinha('contato','lmattoscortes@gmail.com');

		$resposta_envio_contato .= 'Mensagem enviada com sucesso!';

		unset($_SESSION['nome_contato']);
		unset($_SESSION['email_contato']);
		unset($_SESSION['telefone_contato']);
		unset($_SESSION['assunto_contato']);
		unset($_SESSION['mensagem_contato']);

	}
} else {
	$resposta_envio_contato = ':((';
}

echo $resposta_envio_contato;

?>
