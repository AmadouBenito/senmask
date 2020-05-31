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
		$data =array(
			'promoteur01' => $this->senmask->getNbPromoteur("01"),
			'promoteur02' => $this->senmask->getNbPromoteur("02"),
			'promoteur03' => $this->senmask->getNbPromoteur("03"),
			'promoteur04' => $this->senmask->getNbPromoteur("04"),
			'promoteur05' => $this->senmask->getNbPromoteur("05"),
			'promoteur06' => $this->senmask->getNbPromoteur("06"),
			'promoteur07' => $this->senmask->getNbPromoteur("07"),
			'promoteur08' => $this->senmask->getNbPromoteur("08"),
			'promoteur09' => $this->senmask->getNbPromoteur("09"),
			'promoteur10' => $this->senmask->getNbPromoteur("10"),
			'promoteur11' => $this->senmask->getNbPromoteur("11"),
			'promoteur12' => $this->senmask->getNbPromoteur("12"),
			'promoteur13' => $this->senmask->getNbPromoteur("13"),
			'promoteur14' => $this->senmask->getNbPromoteur("14"),
		);
		/* print_r($data);
		die; */
		$this->load->view('home',$data);
	}

	public function region($code_region)
	{
		$data = array(
			'regions' => $this->senmask->getRegionById($code_region),
			'promoteurs' => $this->senmask->getInfoPromoteur($code_region),
			'departements' => $this->senmask->getDepartementById($code_region),
			'communes' => $this->senmask->getCommuneById($code_region),
			'quartiers' => $this->senmask->getQuartierById($code_region),
			'images' => $this->senmask->getAllImages(),
			//'nb_Image' => $this->senmask->getAllImages()->num_rows(), 
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
/* Charger la page de publication */
	public function publier()
	{	
		$data = array(
			'regions' => $this->senmask->get("region"),
			/* 'departements' => $this->senmask->get("departement"), */
		);
		$this->load->view('inscription',$data);
	}
	
	public function insert_photo($data_photo)
	{
		$config = array(
			'upload_path' => "./assets/img/album",
			'allowed_types' => "gif|jpg|png|jpeg|pdf|PNG|JPG|JPEG",
			'overwrite' => FALSE,
			'max_size' => 6000000 // 6MO
		);


		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$fileData = $this->upload->data();
			$data_photo['photo'] = $fileData['file_name'];
			/* data */
			$ins = $this->Senmask->insert_photo($data_photo);
		}	

		/* if (!$this->upload->do_upload('photo')) {
			$this->session->set_flashdata('message', 'error_photo');
			redirect('welcome/publier');
		} else {
			$fileData = $this->upload->data();
			$data_image1 = array (
				"photo" => $fileData['file_name'],
				"initiative_id_init" => $this->input->post("numero_tel"),
			);

		}

		if (!$this->upload->do_upload('photo2')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$fileData = $this->upload->data();
			$data_image2 = array (
				"photo" => $fileData['file_name'],
				"initiative_id_init" => $this->input->post("numero_tel"),
			);
		}
		if (!$this->upload->do_upload('photo3')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$fileData = $this->upload->data();
			$data_user['photo3'] = $fileData['file_name'];
		} */
	}

	
	public function doPublier()
	{ 
		$format = "Y-m-d H:i:s";
		
		$data_user = array(
			"prom_init" => $this->input->post("promoteur"),
			"num_tel" => $this->input->post("numero_tel"),
			"id_departement" => $this->input->post("departement"),
			"date" => date($format),
			"nb_mask_dispo" => $this->input->post("mask_dispo"),
			"cap_prod" => $this->input->post("capacite"),
			"codeqrt" => $this->input->post("quartier"),
			"mdp" => md5($this->input->post("password")),
			
		);

		$config = array(
			'upload_path' => "./assets/img/album",
			'allowed_types' => "gif|jpg|png|jpeg|pdf|PNG|JPG|JPEG",
			'overwrite' => FALSE,
			'max_size' => 6000 // 6MO
		);


		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('certificat')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$fileData = $this->upload->data();
			$data_user['certificat'] = $fileData['file_name'];
		}

		$data_image = array(
			"initiative_id_init" => $this->input->post("numero_tel"),
			"prix" => $this->input->post("price"),
		);
		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$fileData = $this->upload->data();
			$data_image['photo'] = $fileData['file_name'];
		}	
	

		/* print_r($data_user);
		die; */

		$insrt = $this->senmask->publier($data_user,$data_image);
		if ($insrt) {
			$this->session->set_flashdata('message', 'ajout_succed');
			/* $reg = $this->input->post("region"); */
			//redirect("welcome/region/$reg");
			redirect('welcome/doLogin');
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
	public function getNomRegion($coderegion)
	{
		return $this->senmask->getNomRegion($coderegion)[0];
	}
	public function getNomDepartement($codedepartement)
	{
		return $this->senmask->getNomDepartement($codedepartement)[0];
	}

	/* Code Admin */
	public function connexion()
	{
		$this->load->view('connexion');
	}
	public function home_admin()
	{
		$data = array(
			'prom_cert' => $this->senmask->prom_cert(),
			'regions' => $this->senmask->get("region"),
			'departements' => $this->senmask->get("departement"),
		);
		$this->load->view('home_admin', $data);
	}
	public function home_init($numero)
	{
		$user_info = array(
			'commandes' =>  $this->senmask->getCommandesByNum_tel($numero),
			'images' =>  $this->senmask->getImagesByNum_tel($numero),
			'profil' =>  $this->senmask->getOneInit($numero),
		);
		$this->load->view('home_init',$user_info);
	}
	public function doLogin()
	{
		$session_data = array();
		$data = array(
			'user_login' => $this->input->post('numero_tel'),
			'motdepasse' => $this->input->post('password')
		);
		$user_data = $this->senmask->login($data);
		if ($user_data) { 
			foreach ($user_data as $row) {
				//print_r($user_data);die;
				if ($row->niveau == 1) { //Admin
					$session_data = array(
						'user_name' => $row->nom_complet,
						'logged_in' => TRUE
					);
					$session_data['niveau'] = 1;
					$this->session->set_userdata($session_data);
					$this->session->set_flashdata('message', 'succes');
					redirect('Welcome/home_admin');
				}else { //Initiateur
					$session_data = array(
						'user_name' => $row->prom_init,
						'logged_in' => TRUE
					);
					$session_data['niveau'] = 0;
					$this->session->set_userdata($session_data);
					$this->session->set_flashdata('message', 'succes');
					$num = $this->input->post('numero_tel');
					redirect("Welcome/home_init/$num"); 
				}
				
			}
		} else {
			$this->session->set_flashdata('message', 'wrong');
			redirect('Welcome/connexion');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('niveau');
		$this->session->sess_destroy();

		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		redirect('Welcome/connexion');
	}
	public function certifier($id)
	{
		$this->senmask->certifier($id);
	}

	public function archiver($id)
	{
		$this->senmask->archiver($id);
	}

}
?>
