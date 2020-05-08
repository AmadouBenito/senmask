<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form', 'date');
		$this->load->library('session');
		$this->load->model('Senmask');
	}
	public function index()
	{	
		$data =array(
			'promoteur01' => $this->Senmask->getNbPromoteur("01"),
			'promoteur02' => $this->Senmask->getNbPromoteur("02"),
			'promoteur03' => $this->Senmask->getNbPromoteur("03"),
			'promoteur04' => $this->Senmask->getNbPromoteur("04"),
			'promoteur05' => $this->Senmask->getNbPromoteur("05"),
			'promoteur06' => $this->Senmask->getNbPromoteur("06"),
			'promoteur07' => $this->Senmask->getNbPromoteur("07"),
			'promoteur08' => $this->Senmask->getNbPromoteur("08"),
			'promoteur09' => $this->Senmask->getNbPromoteur("09"),
			'promoteur10' => $this->Senmask->getNbPromoteur("10"),
			'promoteur11' => $this->Senmask->getNbPromoteur("11"),
			'promoteur12' => $this->Senmask->getNbPromoteur("12"),
			'promoteur13' => $this->Senmask->getNbPromoteur("13"),
			'promoteur14' => $this->Senmask->getNbPromoteur("14"),
		);
		/* print_r($data);
		die; */
		$this->load->view('home',$data);
	}

	public function region($code_region)
	{
		$data = array(
			'regions' => $this->Senmask->getRegionById($code_region),
			'promoteurs' => $this->Senmask->getInfoPromoteur($code_region),
			'departements' => $this->Senmask->getDepartementById($code_region),
			'communes' => $this->Senmask->getCommuneById($code_region),
			'quartiers' => $this->Senmask->getQuartierById($code_region),
		);
		$this->load->view('stocks_reg',$data);
	}
	function fetch_dep($coderegion)
	{
		if ($coderegion) {
			echo $this->Senmask->fetch_dep($coderegion);
		}
	}

	function fetch_com($codedepartement)
	{
		if ($codedepartement) {
			echo $this->Senmask->fetch_com($codedepartement);
		}
	}

	function fetch_qrt($codecommune)
	{
		if ($codecommune) {
			echo $this->Senmask->fetch_qrt($codecommune);
		}
	}

	public function publier()
	{	
		$data = array(
			'regions' => $this->Senmask->get("region"),
			'departements' => $this->Senmask->get("departement"),
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
			'upload_path' => "./assets/img/album",
			'allowed_types' => "gif|jpg|png|jpeg|pdf|PGN|JPG|JPEG",
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
		$insrt = $this->Senmask->publier($data_user);
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
		foreach ($this->Senmask->getNomCommune($codecommune) as $value ) {
			$nom = $value;
		}
		return $nom->nomcommune;
	}
	public function getNomQuartier($codequartier)
	{
		foreach ($this->Senmask->getNomQuartier($codequartier) as $value) {
			$nom = $value;
		}
		return $nom->nomquartier;
	}

	public function getNomRegion($coderegion)
	{
		return $this->Senmask->getNomRegion($coderegion)[0];
	}
	public function getNomDepartement($codedepartement)
	{
		return $this->Senmask->getNomDepartement($codedepartement)[0];
	}
	public function Admin()
	{
		$this->load->view('admin');
	}
	public function home_admin()
	{	
		$data = array(
			'prom_cert' => $this->Senmask->prom_cert(),
			'regions' => $this->Senmask->get("region"),
			'departements' => $this->Senmask->get("departement"),
		);
		$this->load->view('home_admin',$data);
	}
	public function doLogin()
	{
		$session_data = array();
		$data = array(
			'user_login' => $this->input->post('login'),
			'motdepasse' => $this->input->post('password')
		);
		$user_data = $this->Senmask->login($data);
		if ($user_data) {
			foreach ($user_data as $row) {
				$session_data = array(
					'user_name' => $row->nom_complet,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($session_data);
				$this->session->set_flashdata('message', 'succes');
				redirect('Welcome/home_admin');
			}
		} else {
			$this->session->set_flashdata('message', 'wrong');
			redirect('Welcome/admin');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();

		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		redirect('Welcome/admin');
	}

	public function certifier($id)
	{
		$this->Senmask->certifier($id);
	}

	public function archiver($id)
	{
		$this->Senmask->archiver($id);
	}

}
?>