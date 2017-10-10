
<!-- FUNCOES AUXILIARES -->

<?php  

	function traduz_prioridade($codigo){
		$prioridade = '';
		switch ($codigo) {
			case 1:
				$prioridade = 'Baixa';
				break;

			case 2:
				$prioridade = 'Media';
				break;

			case 3:
				$prioridade = 'Alta';
				break;
		}
		return $prioridade;
	}

	function traduz_data_mysql($data){
		if($data == ''){
			return '';
		} else{
			$separador = explode("/", $data);
			
			if(count($separador) != 3){
				return $data;
			}

			$data_mysql = "{$separador[2]}/{$separador[1]}/{$separador[0]}";
			return $data_mysql;
		}
	}

	function traduz_data_exibicao($data){
		if($data == ''){
			return '';
		} else{
			$separador = explode("-", $data);
			
			if(count($separador) != 3){
				return $data;
			}
			
			$data_exibir = "{$separador[2]}/{$separador[1]}/{$separador[0]}";
			return $data_exibir;
		}
	}

	function data($data){
		if($data == ''){
			return '';
		} else{
			return $data;
		}
	}

	function traduz_concluida($concluida){
		if($concluida == 1){
			return "Sim";
		} else{
			return "Não";
		}
	}

	function verifica_post(){
		if(count($_POST) > 0){
			return true;
		} else{
			return false;
		}
	}

	function validar_data($data){
		$padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
		$resultado = preg_match($padrao, $data);

		if (! $resultado) {
			return false;
		}

		$separador = explode('/', $data);
		$dia = $separador[0];
		$mes = $separador[1];
		$ano = $separador[2];

		$resultado = checkdate($mes, $dia, $ano);
		return $resultado;
	}

	function tratar_anexo($anexo){
		$padrao = '/^.+(\.pdf|\.zip)$/';
		$resultado = preg_match($padrao, $anexo['name']);

		if(! $resultado){
			return false;
		} else{
			move_uploaded_file($anexo['tmp_name'], "anexos/{$anexo['name']}");
			return true;
		}

	}


?>
