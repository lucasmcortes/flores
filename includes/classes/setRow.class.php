<?php

	class setRow extends Conexao {

		public function Teste($data,$info,$dado) {
			try {
				$stmt = $this->conectar()->prepare("INSERT INTO testando (teste_data, teste_info, teste_dado) VALUES(?, ?, ?);");
				$stmt->execute([$data, $info, $dado]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // Teste

		public function errorLog($data,$erro,$pagina) {
			try {
				$stmt = $this->conectar()->prepare("INSERT INTO errorlog (data, erro, pagina) VALUES(?, ?, ?);");
				$stmt->execute([$data, $erro, $pagina]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // errorLog

		public function AddCarrinho($uid,$pid,$sku,$quantidade,$modificado,$presente) {
			try {
				$stmt = $this->conectar()->prepare("INSERT INTO carrinho (uid, pid, sku, quantidade, modificado, presente) VALUES(?, ?, ?, ?, ?, ?);");
				$stmt->execute([$uid,$pid,$sku,$quantidade,$modificado,$presente]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // AddCarrinho

		public function Cadastro($nome,$nascimento,$cpf,$telefone,$email,$senha,$data) {
			try {
				$stmt = $this->conectar()->prepare("INSERT INTO cadastros (nome, nascimento, cpf, telefone, email, senha, data_cadastro) VALUES(?, ?, ?, ?, ?, ?, ?);");
				$stmt->execute([$nome,$nascimento,$cpf,$telefone,$email,$senha,$data]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // Cadastro

		public function CadastroConfirmado($uid,$data) {
			try {
				$stmt = $this->conectar()->prepare("INSERT INTO cadastro_confirmado (uid, data) VALUES(?, ?);");
				$stmt->execute([$uid,$data]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // CadastroConfirmado

		public function CadastroNivel($uid,$nivel,$data) {
			try {
				$stmt = $this->conectar()->prepare("INSERT INTO cadastro_nivel (uid, nivel, data_mod) VALUES(?, ?, ?);");
				$stmt->execute([$uid,$nivel,$data]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // CadastroNivel

		public function Endereco($uid,$denominacao,$cep,$rua,$numero,$bairro,$cidade,$estado,$complemento,$ativo,$data_cadastro) {
			try {
				$stmt = $this->conectar()->prepare("INSERT INTO endereco (uid, denominacao, cep, rua, numero, bairro, cidade, estado, complemento, ativo, data_cadastro) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$stmt->execute([$uid,$denominacao,$cep,$rua,$numero,$bairro,$cidade,$estado,$complemento,$ativo,$data_cadastro]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // Endereco

		public function EmailsEnviados($data,$email,$conteudo,$assunto,$mensagem,$rmtaddr) {
			try {
				$stmt = $this->conectar()->prepare("INSERT INTO emails_enviados (envio_data, envio_email, envio_conteudo, envio_assunto, envio_mensagem, envio_rmt_addr) VALUES(?, ?, ?, ?, ?, ?);");
				$stmt->execute([$data,$email,$conteudo,$assunto,$mensagem,$rmtaddr]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // EmailsEnviados

		public function Login($uid,$sid,$chave,$rmt_addr,$rmt_host,$user_agent,$data) {
			try {
				$stmt = $this->conectar()->prepare("INSERT INTO login (uid, sid, chave, rmt_addr, rmt_host, user_agent, data) VALUES(?, ?, ?, ?, ?, ?, ?);");
				$stmt->execute([$uid,$sid,$chave,$rmt_addr,$rmt_host,$user_agent,$data]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // Login

		public function Recuperar($email,$chave,$data) {
			try {
				$stmt = $this->conectar()->prepare("INSERT INTO recuperar (email, chave, data) VALUES (?, ?, ?);");
				$stmt->execute([$email,$chave,$data]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // Recuperar

		public function Visitas($uid,$link,$rmt_addr,$user_agent,$data) {
			try {
				$stmt = $this->conectar()->prepare("INSERT INTO visitas (uid, link, rmt_addr, user_agent, data) VALUES(?, ?, ?, ?, ?)");
				$stmt->execute([$uid,$link,$rmt_addr,$user_agent,$data]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // Visitas

	} // class setrow

?>
