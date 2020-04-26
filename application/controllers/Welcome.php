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
			'upload_path' => "./assets/img/profiles",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "6048000", 
			'max_height' => "2768",
			'max_width' => "2724"
		);

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('eroor_p', $error);
			redirect("welcome/publier"); exit;
		} else {
			$data = $this->upload->data();
			$data_user['photo'] = $data['file_name'];
		}
		if ($this->input->post('certificat')) {
			$data['certificat'] = $this->input->post('certificat');
			$config1 = array(
				'upload_path' => "./assets/img/certificats",
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE,
				'max_size' => "6048000",
				'max_height' => "2768",
				'max_width' => "2724"
			);

			$this->load->library('upload', $config1);

			if (!$this->upload->do_upload('certificat')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('eroor_p', $error);
				redirect("welcome/publier");
				exit;
			} else {
				$data = $this->upload->data();
				$data_user['photo'] = $data['file_name'];
			}
		}
		$insrt = $this->senmask->publier($data_user);
		if ($insrt) {
			$this->session->set_flashdata('message', 'ajout_succed');
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