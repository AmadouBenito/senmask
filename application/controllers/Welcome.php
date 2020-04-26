<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form', 'date');
		$this->load->library('session');
		$this->load->model('senmask');
	}
	public function index()
	{
		$this->load->view('home');
	}

	public function region($code_region)
	{
		$data = array(
			'regions' => $this->senmask->getRegionById($code_region),
			'promoteurs' => $this->senmask->getInfoPromoteur($code_region),
			'departements' => $this->senmask->getDepartementById($code_region),
			'communes' => $this->senmask->getCommuneById($code_region),
			'quartiers' => $this->senmask->getQuartierById($code_region),
		);
		$this->load->view('stocks_reg',$data);
	}
	function fetch_dep($coderegion)
	{
		if ($coderegion) {
			echo $this->senmask->fetch_dep($coderegion);
		}
	}

	function fetch_com($codedepartement)
	{
		if ($codedepartement) {
			echo $this->senmask->fetch_com($codedepartement);
		}
	}

	function fetch_qrt($codecommune)
	{
		if ($codecommune) {
			echo $this->senmask->fetch_qrt($codecommune);
		}
	}

	public function publier()
	{	
		$data = array(
			'regions' => $this->senmask->get("region"),
			'departements' => $this->senmask->get("departement"),
		);
		$this->load->view('inscription',$data);
	}
	/* public function uploadImage()
	{

		$data = [];

		$count = count($_FILES['files']['name']);

		for ($i = 0; $i < $count; $i++) {

			if (!empty($_FILES['files']['name'][$i])) {

				$_FILES['file']['name'] = $_FILES['files']['name'][$i];
				$_FILES['file']['type'] = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['files']['error'][$i];
				$_FILES['file']['size'] = $_FILES['files']['size'][$i];

				$config['upload_path'] = './assets/img/mask/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = '125000';
				$config['file_name'] = $_FILES['files']['name'][$i];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
					$data['totalFiles'][] = $filename;
				}
			}
		}

		return $data;
	} */
	public function doPublier()
	{
		$format = "Y-m-d H:i:s";
		$data_user = array(
			"prom_init" => $this->input->post("promoteur"),
			"num_tel" => $this->input->post("numero_tel"),
			"id_departement" => $this->input->post("departement"),
			"date" => date($format),
			"prix" => $this->input->post("prix"),
			"cap_prod" => $this->input->post("capacite"),
			"codeqrt" => $this->input->post("quartier"),
		);
		$config = array(
			'upload_path' => "./assets/img/album",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "6048000",
			'max_height' => "12768",
			'max_width' => "22724"
		);

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('certificat')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$fileData = $this->upload->data();
			$data_user['certificat'] = $fileData['file_name'];
		}

		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$fileData = $this->upload->data();
			$data_user['photo'] = $fileData['file_name'];
		}

		if (!$this->upload->do_upload('photo2')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$fileData = $this->upload->data();
			$data_user['photo2'] = $fileData['file_name'];
		}
		if (!$this->upload->do_upload('photo3')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$fileData = $this->upload->data();
			$data_user['photo3'] = $fileData['file_name'];
		}
		/* print_r($data_user);
		die; */
		$insrt = $this->senmask->publier($data_user);
		if ($insrt) {
			$this->session->set_flashdata('message', 'ajout_succed');
			$reg = $this->input->post("region");
			redirect("welcome/region/$reg");
		}else {
			$this->session->set_flashdata('message', 'ajout_failed');
			redirect('welcome/publier');
		}
		
	}
	
	public function getNomCommune($codecommune)
	{
		foreach ($this->senmask->getNomCommune($codecommune) as $value ) {
			$nom = $value;
		}
		return $nom->nomcommune;
	}
	public function getNomQuartier($codequartier)
	{
		foreach ($this->senmask->getNomQuartier($codequartier) as $value) {
			$nom = $value;
		}
		return $nom->nomquartier;
	}

	/* public function commune_of($coderegion)
	{
		return $this->senmask->getCommuneById($coderegion);
	}

	public function quartier_of($coderegion)
	{
		return $this->senmask->getQuartierById($coderegion);
	} */
}
?>