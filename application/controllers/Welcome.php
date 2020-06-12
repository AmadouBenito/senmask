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

	public function insererImage(){

	}

	public function updateStock(){
		$data = array(
			'num_tel' => $this->session->userdata('user_num'),
			'nb_mask_dispo' => $this->input->post('stock'),
		);
		$num = $this->session->userdata('user_num');
		if($this->senmask->updateProfile($data)){
			redirect("Welcome/home_init/$num");
		}
	}

	public function updateProfile(){
		$data = array(
			'prom_init' => $this->input->post('promoteurName'),
			'num_tel' => $this->session->userdata('user_num'),
			'cap_prod' => $this->input->post('capacite'),
		);
		$num = $this->session->userdata('user_num');
		if($this->senmask->updateProfile($data)){
			redirect("Welcome/home_init/$num");
		}
	}

	public function commander($num , $id){
		$commande = array(
			'id_image' => $id,
			'initiative_id_init' => $num,
			'nb_mask' => $this->input->post('nombre'),
			'nom_client'=> $this->input->post('client'),
			'num_tel'=> $this->input->post('numero_tel'),
		);
		if($this->senmask->commander($commande)){
			$this->session->set_flashdata('message', 'commande_succes');
			redirect('welcome/index');
		}
		else{
			$this->session->set_flashdata('message', 'commande_failed');
			redirect('welcome/index');
		}
	}
	
	public function insert_photo()
	{
		$config = array(
			'upload_path' => "./assets/img/album",
			'allowed_types' => "gif|jpg|png|jpeg|pdf|PNG|JPG|JPEG",
			'overwrite' => FALSE,
			'max_size' => 6000 // 6MO
		);

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data_photo = array(
				'initiative_id_init' => $this->session->userdata('user_num'),
				'prix' => $this->input->post('price'),
			);
			$fileData = $this->upload->data();

			$data_photo['photo'] = $fileData['file_name'];
			
			$num = $this->session->userdata('user_num');
			$ins = $this->senmask->insert_photo($data_photo);
			if ($ins) {
				$this->session->set_flashdata('message', 'ajout_photo_succes');
				redirect("Welcome/home_init/$num");
			}else {
				$this->session->set_flashdata('message', 'ajout_photo_failled');
				redirect("Welcome/home_init/$num");
			}
		}

	}

	public function deleteImage($id){

		$num = $this->session->userdata('user_num');

		if($this->senmask->deleteImage($id)){
			$this->session->set_flashdata('message', 'suppression_photo_succes');
			redirect("Welcome/home_init/$num");
		}else {
			$this->session->set_flashdata('message', 'suppression_photo_failled');
			redirect("Welcome/home_init/$num");
		}
	}

	public function doPublier() // inscription
	
	{ 
		/* recuperatrion de parametres */
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

		/* recuperation de parametres */
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
			if ($this->session->userdata('niveau') == 1) {//Admin  
				
				$this->session->set_flashdata('message', 'ajout_succed'); 
				redirect('Welcome/home_admin');
			}else {//initiateur
				
				$this->session->set_flashdata('message', 'ajout_succed');
				/* $reg = $this->input->post("region"); */
				//redirect("welcome/region/$reg");
				redirect('welcome/connexion'); // to be change after

		}
	}else {

			$this->session->set_flashdata('message', 'ajout_failed');
			redirect('welcome/publier');
		}	
}

	public function validerCommande($id, $nb){
		$num = $this->session->userdata('user_num');
		$nb_mask_dispo = $this->senmask->getStock($num);
		if($nb_mask_dispo >= $nb){
			$this->senmask->validerCommande($id);
			$this->session->set_flashdata('message', 'validation_commande_succes');
			redirect("Welcome/home_init/$num");
		}else {
			$this->session->set_flashdata('message', 'validation_commande_failed');
			redirect("Welcome/home_init/$num");
		}

	}
	public function declinerCommande($id){
		$num = $this->session->userdata('user_num');
		if($this->senmask->declinerCommande($id)){
		$this->session->set_flashdata('message', 'decliner_commande_succes');
			redirect("Welcome/home_init/$num");
		}else {
			$this->session->set_flashdata('message', 'decliner_commande_failed');
			redirect("Welcome/home_init/$num");
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
			'artisans' => $this->senmask->getAllArtisans(),
			'commandes' => $this->senmask->getAllCommandes(),
			'prom_non_Cert' => $this->senmask->getPromNonCert(),
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
						'logged_in' => TRUE,
						'niveau' => 1
					);
					$session_data['niveau'] = 1;
					$this->session->set_userdata($session_data);
					$this->session->set_flashdata('message', 'succes');
					redirect('Welcome/home_admin');
				}else { //Initiateur
					$session_data = array(
						'user_name' => $row->prom_init,
						'user_num' => $row->num_tel,
						'logged_in' => TRUE,
						'niveau' => 0
					);
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
