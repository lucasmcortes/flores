<?php

	class ConsultaDatabase extends Conexao {
		public $uid;

		public function __construct($user) {
			$this->uid = $user;
		}

		public function CadastroUid($email) {
			$sql = "
				SELECT * FROM cadastros
				WHERE cadastros.email=?
				ORDER BY cadastros.uid
				DESC
				LIMIT 1
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute([$email]);
			$cadastro = $stmt->fetch();
			return $this->resultado = $resultado = $cadastro['uid']??0;
		} // CadastroUid

		public function UserInfo($uid) {
			$sql = "
				SELECT * FROM cadastros
				INNER JOIN cadastro_confirmado
					ON cadastro_confirmado.uid=cadastros.uid
				INNER JOIN cadastro_nivel
					ON cadastro_nivel.uid=cadastros.uid
				WHERE cadastros.uid=?
				ORDER BY cadastro_nivel.nid
				DESC
				LIMIT 1
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute([$uid]);
			$cadastro = $stmt->fetch();
			return $this->resultado = $resultado = array(
				'uid'=>$this->uid = $cadastro['uid']??0,
				'nivel'=>$this->nivel = $cadastro['nivel']??0,
				'nome'=>$this->nome = $cadastro['nome']??0,
				'cpf'=>$this->cpf = $cadastro['cpf']??0,
				'telefone'=>$this->telefone = $cadastro['telefone']??0,
				'email'=>$this->telefone = $cadastro['email']??0,
				'data_cadastro'=>$this->data_cadastro = $cadastro['data_cadastro']??0
			);
		} // UserInfo

		public function EncontraAdmin($email) {
			$sql = "
				SELECT * FROM cadastros
				INNER JOIN cadastro_confirmado
					ON cadastro_confirmado.uid=cadastros.uid
				INNER JOIN cadastro_nivel
					ON cadastro_nivel.uid=cadastros.uid
				WHERE cadastros.email=?
				ORDER BY cadastro_nivel.nid
				DESC
				LIMIT 1
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute([$email]);
			$cadastro = $stmt->fetch();
			return $this->resultado = $resultado = array(
				'uid'=>$this->uid = $cadastro['uid']??0,
				'nivel'=>$this->nivel = $cadastro['nivel']??0,
				'nome'=>$this->nome = $cadastro['nome']??0,
				'cpf'=>$this->cpf = $cadastro['cpf']??0,
				'telefone'=>$this->telefone = $cadastro['telefone']??0,
				'email'=>$this->telefone = $cadastro['email']??0,
				'data_cadastro'=>$this->data_cadastro = $cadastro['data_cadastro']??0
			);
		} // EncontraAdmin

		public function CadastroCategoria($nivel) {
			switch ($nivel) {
				case 0:
				$categoria='desativado';
				break;
				case 1:
				$categoria='cliente';
				break;
				case 2:
				$categoria='administrador';
				break;
				case 3:
				$categoria='direcao';
				break;
				default:
				$categoria='desativado';
			} // switch
			return $this->categoria = $categoria;
		} // CadastroCategoria

		public function Confirmado($uid) {
			$sql = "
				SELECT * FROM cadastro_confirmado
				WHERE uid=?
				ORDER BY uid
				DESC
				LIMIT 1
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute([$uid]);
			$cadastro = $stmt->fetch();
			return $this->resultado = $resultado = $cadastro['uid']??0;
		} // Confirmado

		public function AuthAdmin($email,$pwd) {
			$sql = "
				SELECT * FROM cadastros
				INNER JOIN cadastro_confirmado
					ON cadastro_confirmado.uid=cadastros.uid
				WHERE cadastros.email=?
				ORDER BY cadastros.uid
				DESC
				LIMIT 1
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute([$email]);

			foreach ($stmt->fetchAll() as $row) {
				$hashedPwdCheck = password_verify($pwd, $row['senha']);
				if ($hashedPwdCheck == false) {
					$resultado = 0;
				} elseif ($hashedPwdCheck == true) {
					$resultado = array(
						'uid'=>$this->uid = $row['uid']??0,
						'nome'=>$this->nome = $row['nome']??0,
						'cpf'=>$this->cpf = $row['cpf']??0,
						'telefone'=>$this->telefone = $row['telefone']??0,
						'data_cadastro'=>$this->data_cadastro = $row['data_cadastro']??0
					);
				} // pwd
			} // foreach

			return $this->resultado = $resultado;
		} // AuthAdmin

		public function EncontraChave($chave) {
			$sql = "
				SELECT * FROM recuperar
				WHERE chave=?
				ORDER BY rec_id
				DESC
				LIMIT 1
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute([$chave]);
			$chave = $stmt->fetch();
			return $this->resultado = $resultado = $chave['chave']??0;
		} // EncontraChave

		public function ListaAdmin() {
			$sql = "
				SELECT * FROM cadastros
				INNER JOIN cadastro_confirmado
					ON cadastro_confirmado.uid=cadastros.uid
				INNER JOIN cadastro_nivel
					ON cadastro_nivel.uid=cadastros.uid
				GROUP BY cadastros.uid
				ORDER BY cadastros.uid
				DESC
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute();
			$cadastros = $stmt->fetchAll();

			if (count($cadastros)>=1) {
				foreach ($cadastros as $cadastro) {
					$resultado[] = array(
						'uid'=>$this->uid = $cadastro['uid'],
						'nivel'=>$this->nivel = $cadastro['nivel'],
						'nome'=>$this->nome = $cadastro['nome'],
						'cpf'=>$this->cpf = $cadastro['cpf'],
						'telefone'=>$this->telefone = $cadastro['telefone'],
						'email'=>$this->email = $cadastro['email'],
						'data_cadastro'=>$this->data_cadastro = $cadastro['data_cadastro']
					);
				} // foreach
			} else {
				$resultado[] = array(
					'uid'=>$this->uid = 0,
					'nivel'=>$this->nivel = 0,
					'nome'=>$this->nome = 0,
					'cpf'=>$this->cpf = 0,
					'telefone'=>$this->telefone = 0,
					'email'=>$this->email = 0,
					'data_cadastro'=>$this->data_cadastro = 0
				);
			} // admins

			return $this->resultado = $resultado;
		} // ListaAdmin

		public function EnviadoRecente($email,$data) {
			$sql = "
				SELECT * FROM emails_enviados
				WHERE envio_email=?
					AND envio_data=?
				ORDER BY envio_id
				DESC
				LIMIT 1
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute([$email,$data]);
			$enviado = $stmt->fetch();
			return $this->resultado = array(
				'envio_id'=>$this->envio_id = $enviado['envio_id']??0,
				'data'=>$this->envio_data = $enviado['envio_data']??0
			);
		} // EnviadoRecente

		public function LembreteEnviado($aid) {
			$sql = "
				SELECT * FROM lembrete
				WHERE aid=?
				ORDER BY lemid
				DESC
				LIMIT 1
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute([$aid]);
			$enviado = $stmt->fetch();
			return $this->resultado = array(
				'resposta'=>($enviado!='') ? 'Enviado' : 'Não enviado',
				'enviado'=>$this->envio_id = $enviado['lemid']??0,
				'data'=>$this->envio_data = $enviado['data']??0
			);
		} // LembreteEnviado

		public function Enderecos($uid) {
			$sql = "
				SELECT * FROM endereco
				WHERE uid=?
				AND ativo=1
				ORDER BY eid
				DESC
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute([$uid]);
			$enderecos = $stmt->fetchAll();
			if (count($enderecos)>0) {
				foreach ($enderecos as $endereco) {
					$resultado[] = array(
						'eid'=>$this->eid = $endereco['eid']??0,
						'uid'=>$this->uid = $endereco['uid']??0,
						'denominacao'=>$this->denominacao = $endereco['denominacao']??0,
						'cep'=>$this->cep = $endereco['cep']??0,
						'rua'=>$this->rua = $endereco['rua']??0,
						'numero'=>$this->numero = $endereco['numero']??0,
						'bairro'=>$this->bairro = $endereco['bairro']??0,
						'cidade'=>$this->cidade = $endereco['cidade']??0,
						'estado'=>$this->estado = $endereco['estado']??0,
						'complemento'=>$this->complemento = $endereco['complemento']??0,
						'data_cadastro'=>$this->data_cadastro = $endereco['data_cadastro']??0
					);
				}
			} else {
				$resultado[] = array(
					'eid'=>$this->eid = 0,
					'uid'=>$this->uid = 0,
					'denominacao'=>$this->denominacao = 0,
					'cep'=>$this->cep = 0,
					'rua'=>$this->rua = 0,
					'numero'=>$this->numero = 0,
					'bairro'=>$this->bairro = 0,
					'cidade'=>$this->cidade = 0,
					'estado'=>$this->estado = 0,
					'complemento'=>$this->complemento = 0,
					'data_cadastro'=>$this->data_cadastro = 0,
				);
			}
			return $this->resultado = $resultado;
		} // Enderecos

		public function Produtos() {
			$sql = "
				SELECT *
				FROM produtos
				ORDER BY pid
				DESC
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute();
			$produtos = $stmt->fetchAll();
			if (count($produtos)>0) {
				foreach ($produtos as $produto) {
					$resultado[] = array(
						'pid'=>$this->pid = $produto['pid']??0,
						'url'=>$this->url = $produto['url']??0,
						'ativo'=>$this->ativo = $produto['ativo']??0,
						'cadastrado'=>$this->cadastrado = $produto['cadastrado']??0
					);
				}
			} else {
				$resultado[] = array(
					'pid'=>$this->pid = 0,
					'ativo'=>$this->ativo = 0,
					'cadastrado'=>$this->cadastrado = 0
				);
			}
			return $this->resultado = $resultado;
		} // Produtos

		public function Produto($pid) {
			$sql = "
				SELECT *
				FROM produtos
				WHERE pid=?
				AND ativo=1
				ORDER BY pid
				DESC
				LIMIT 1
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute([$pid]);
			$produto = $stmt->fetch();
			return $this->resultado = array(
				'pid'=>$this->pid = $produto['pid']??0,
				'url'=>$this->url = $produto['url']??0,
				'ativo'=>$this->ativo = $produto['ativo']??0,
				'cadastrado'=>$this->cadastrado = $produto['cadastrado']??0
			);
		} // Produto

		public function ProdutoURL($url) {
			$sql = "
				SELECT *
				FROM produtos
				WHERE url=?
				AND ativo=1
				ORDER BY pid
				DESC
				LIMIT 1
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute([$url]);
			$produto = $stmt->fetch();
			return $this->resultado = array(
				'pid'=>$this->pid = $produto['pid']??0,
				'url'=>$this->url = $produto['url']??0,
				'ativo'=>$this->ativo = $produto['ativo']??0,
				'cadastrado'=>$this->cadastrado = $produto['cadastrado']??0
			);
		} // ProdutoURL

		public function Carrinho($uid) {
			$sql = "
				SELECT *
				FROM carrinho
				WHERE uid=?
				AND presente=1
				ORDER BY cid
				DESC
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute([$uid]);
			$produtos = $stmt->fetchAll();
			if (count($produtos)>0) {
				foreach ($produtos as $produto) {
					$resultado[] = array(
						'cid'=>$this->cid = $produto['cid']??0,
						'uid'=>$this->uid = $produto['uid']??0,
						'pid'=>$this->pid = $produto['pid']??0,
						'sku'=>$this->sku = $produto['sku']??0,
						'quantidade'=>$this->quantidade = $produto['quantidade']??0,
						'modificado'=>$this->modificado = $produto['modificado']??0,
						'presente'=>$this->presente = $produto['presente']??0
					);
				} // foreach
			} else {
				$resultado[] = array(
					'cid'=>$this->cid = 0,
					'uid'=>$this->uid = 0,
					'pid'=>$this->pid = 0,
					'sku'=>$this->sku = 0,
					'quantidade'=>$this->quantidade = 0,
					'modificado'=>$this->modificado = 0,
					'presente'=>$this->presente = 0,
				);
			}
			return $this->resultado = $resultado;
		} // Carrinho

		public function Carrinhos() {
			$sql = "
				SELECT *
				FROM carrinho
			";
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute();
			$produtos = $stmt->fetchAll();
			if (count($produtos)>0) {
				foreach ($produtos as $produto) {
					$resultado[] = array(
						'cid'=>$this->cid = $produto['cid']??0,
						'uid'=>$this->uid = $produto['uid']??0,
						'pid'=>$this->pid = $produto['pid']??0,
						'sku'=>$this->sku = $produto['sku']??0,
						'quantidade'=>$this->quantidade = $produto['quantidade']??0,
						'modificado'=>$this->modificado = $produto['modificado']??0,
						'presente'=>$this->presente = $produto['presente']??0
					);
				} // foreach
			} else {
				$resultado[] = array(
					'cid'=>$this->cid = 0,
					'uid'=>$this->uid = 0,
					'pid'=>$this->pid = 0,
					'sku'=>$this->sku = 0,
					'quantidade'=>$this->quantidade = 0,
					'modificado'=>$this->modificado = 0,
					'presente'=>$this->presente = 0,
				);
			}
			return $this->resultado = $resultado;
		} // Carrinhos

	} // class updaterow

?>
