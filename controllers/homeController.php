<?php
class homeController extends controller {

	public function index() {
		$this->loadTemplate('home');
	}

	public function enviar(){
		$n = new Newsletter();
		$dados = $n->getAll();

		if (!empty($_POST['mensagem'])) {
			$c = 0;
			foreach ($dados as $key => $value) {
				$c++;
				if ($c <= 100) {
					$status = $n->mail($value['id'], $value['emails'], $_POST['mensagem']);
					$n->upStatus($status['id'], $status['status']);
					header('Location: '.BASE_URL);
				}
			}
		} else {
			$_SESSION['error'] = 'true';
			header('Location: '.BASE_URL);
		}
	}
}