<?php

	class UpdateRow extends Conexao {

		public function UpdateTeste($cid,$tid,$info) {
			try {
				$stmt = "UPDATE testando SET teste_data=?  WHERE teste_id=? LIMIT 1";
				$stmt = $this->conectar()->prepare($stmt);
				$stmt->execute([$cid,$tid]);
				$stmt = "UPDATE testando SET teste_info=?  WHERE teste_id=? LIMIT 1";
				$stmt = $this->conectar()->prepare($stmt);
				$stmt->execute([$info,$tid]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // UpdateTeste

		public function UpdateSenha($senha,$email) {
			try {
				$stmt = "UPDATE cadastros SET senha=?  WHERE email=? LIMIT 1";
				$stmt = $this->conectar()->prepare($stmt);
				$stmt->execute([$senha,$email]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // UpdateSenha

		public function UpdateNivel($nivel,$uid) {
			try {
				$stmt = "UPDATE cadastro_nivel SET nivel=?  WHERE uid=? LIMIT 1";
				$stmt = $this->conectar()->prepare($stmt);
				$stmt->execute([$nivel,$uid]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // UpdateNivel

		public function RemoveCarrinho($cid) {
			try {
				$stmt = "UPDATE carrinho SET presente=0 WHERE cid=? LIMIT 1";
				$stmt = $this->conectar()->prepare($stmt);
				$stmt->execute([$cid]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // RemoveCarrinho

		public function UpdateCarrinho($quantidade,$cid) {
			try {
				$stmt = "UPDATE carrinho SET quantidade=? WHERE cid=? LIMIT 1";
				$stmt = $this->conectar()->prepare($stmt);
				$stmt->execute([$quantidade,$cid]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // UpdateCarrinho

		public function RemoveEndereco($eid) {
			try {
				$stmt = "UPDATE endereco SET ativo=0 WHERE eid=? LIMIT 1";
				$stmt = $this->conectar()->prepare($stmt);
				$stmt->execute([$eid]);
				return true;
			} catch(PDOException $erro) {
				return $erro->getMessage();
			}
		} // RemoveEndereco

	} // class updaterow

?>
