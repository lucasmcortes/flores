<?php

include_once __DIR__.'/../../includes/setup.inc.php';

if (isset($_POST['submitcadastro'])) {
	$cadastrando = '';

	$cpf = $_POST['cpf'];
	if (empty($cpf)) {
		RespostaRetorno('cpf');
		return;
	} else {
		if (preg_match('/^(\d{3}\.\d{3}\.\d{3}\-\d{2})?+$/', $cpf, $cpf, PREG_UNMATCHED_AS_NULL)) {
			$cpf = $cpf[0];
		} else {
			RespostaRetorno('cpf');
			return;
		} // regex cpf
	} // cpf

	$telefone = $_POST['telefone'];
	if (empty($telefone)) {
		RespostaRetorno('telefone');
		return;
	} else {
		if (preg_match('/^(\(\d{2}\)[ ]{1}\d{3}\-\d{3}\-\d{3})?+$/', $telefone, $telefone, PREG_UNMATCHED_AS_NULL)) {
			$telefone = $telefone[0];
		} else {
			RespostaRetorno('telefone');
			return;
		} // regex telefone
	} // telefone

	$email = $_POST['email'];
	if (empty($email)) {
		RespostaRetorno('email');
		return;
	} else {
		if (preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email, $email, PREG_UNMATCHED_AS_NULL)) {
			$_SESSION['cadastro_email'] = $email = $email[0];
		} else {
			RespostaRetorno('email');
			return;
		} // regex email
	} // email

	$nome = mb_strtoupper($_POST['nome']);
	if (empty($nome)) {
		RespostaRetorno('nomecadastro');
		return;
	} // nome
	$cadastro_nome = explode(' ',$nome);
	$cadastro_nome = ucfirst(mb_strtolower($cadastro_nome[0]));
	$_SESSION['cadastro_nome'] = $cadastro_nome;

	$nascimento = $_POST['nascimento']?:0;

	$pwd = $_POST['pwd'];
	if (empty($pwd)) {
		RespostaRetorno('senhacadastro');
		return;
	} // senha

	$nivel = $_POST['nivel'];
	if (empty($nivel)) {
		RespostaRetorno('nivelcadastro');
		return;
	} // nivel

	$cep = $_POST['cep'];
	if (preg_match('/^(\d{2}\.\d{3}\-\d{3})+$/', $cep, $cep, PREG_UNMATCHED_AS_NULL)) {
		$cep = $cep[0];
	} else {
		$cep = 0;
	} // regex cep

	$rua = $_POST['rua']?:0;
	$numero = $_POST['numero']?:0;
	$bairro = $_POST['bairro']?:0;
	$cidade = $_POST['cidade']?:0;
	$estado = $_POST['estado']?:0;
	$complemento = $_POST['complemento']?:0;

	$remote_addr = $_SERVER['REMOTE_ADDR'];

	if (empty($nome) || empty($nivel) || empty($cpf) || empty($telefone) || empty($email) || empty($pwd)) {
		RespostaRetorno('vazio');
		return;

	} else {
		$valida_documento = new ValidaCPFCNPJ($cpf);
		if ($valida_documento->valida() ) {
			$senha = password_hash($pwd, PASSWORD_DEFAULT);

			$adduser = new setRow();
			$adduser = $adduser->Cadastro($nome,$nascimento,$cpf,$telefone,$email,$senha,$data);

			if ($adduser===true) {
				$novocadastrouid = new ConsultaDatabase($uid);
				$novocadastrouid = $novocadastrouid->CadastroUid($email);

				$addnivel = new setRow();
				$addnivel = $addnivel->CadastroNivel($novocadastrouid,$nivel,$data);

				if ($addnivel===true) {

					$addendereco = new setRow();
					$addendereco = $addendereco->Endereco($novocadastrouid,'Principal',$cep,$rua,$numero,$bairro,$cidade,$estado,$complemento,1,$data);

					$cartinha = new Cartinha();
					$cartinha->enviarCartinha('cadastro',$email);

					RespostaRetorno('sucessocadastro');
				} // addnivel true
			} else {
				RespostaRetorno('novamente');
				return;
			} // adduser true
		} else {
			RespostaRetorno('cpfinvalido');
			return;
		} // documento valido
	} // campos preenchidos
} else {
	$cadastrando = ':((';
} // isset post submit

echo $cadastrando;

?>
