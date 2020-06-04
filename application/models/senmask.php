<?php 

    class senmask extends CI_Model{

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
		    $this->load->helper('url', 'form', 'date');
            
        }

        public function publier($data, $data_image)
        {
            $user = $this->db->get_where('initiative',array("num_tel" => $data['num_tel']));
            
            if ($user->num_rows() == 0) {//jamais pub
                //debut transaction
                $this->db->trans_start();
               
                if ($this->db->insert('initiative',$data)) {
                    $this->session->set_flashdata('message', 'insc_succed');
                    if($this->db->insert('galerie',$data_image)){
                        $this->session->set_flashdata('message', 'insc_succed');
                    }
                
                $this->db->trans_complete();
                //fin transaction
                return true;

                }else{
                    $this->session->set_flashdata('message', 'insc_error');
                    redirect('Welcome/publier');
                }

            }else{ // Une fois pub alors upate

		        $this->db->where('num_tel',$data['num_tel']);
                $this->db->update('initiative',$data);
                $this->session->set_flashdata('message', 'updated');
                return true;
            }

        }

       /* public function updateStock($data){
            if($data['num_tel']){

            $this->db->where('num_tel',$data['num_tel']);
            $this->db->update('initiative',$data);
            return true;
            }
        }*/

        public function updateProfile($data){
            if($data['num_tel']){

                $this->db->where('num_tel',$data['num_tel']);
                $this->db->update('initiative',$data);
                return true;
                } 
        }

        public function deleteImage($id){

                $this->db->delete('galerie',['id' => $id]);
                return true;
                
        }

        public function insert_photo($data)
        {
            $this->db->insert('galerie',$data);
            return true;
        }

        public function getAllImages()
        { 
            $this->db->select('*');
            $this->db->from('galerie');
            $query = $this->db->get();
            return $query->result();
        }
        public function getCommandesByNum_tel($num){
            $q = $this->db->get_where('commande',array('initiative_id_init' => $num));
            return $q->result();
        }
        public function getImagesByNum_tel($num){
            $q = $this->db->get_where('galerie',array('initiative_id_init' => $num));
            return $q->result();
        }
        public function getOneInit($num){
            $q = $this->db->get_where('initiative',array('num_tel' => $num));
            return $q->result();
        }
        public function get($table)
        {
            $query = $this->db->get($table);
            return $query->result();
        }

        public function getCityDepartment($data)
        {
            
            $response = array();

            $q = $this->db->get_where('departement', array('codedepartement' => $data['coderegion']) );
            $response = $q->result_array();

            return $response;
        }
        public function getRegionById($id)
        {
            $q = $this->db->get_where('region',array('coderegion' => $id));
            return $q->result();
        }

        public function getDepartementById($coderegion)
        {   
            $this->db->select('*');
            $this->db->from('departement');
            $this->db->like('codedepartement', $coderegion, 'after');
            $q = $this->db->get();
            return $q->result();
        }
        public function getCommuneById($coderegion)
        {   
            $this->db->select('*');
            $this->db->from('commune');
            $this->db->like('codecommune', $coderegion, 'after');
            $q = $this->db->get();
            return $q->result();
        }
        public function getQuartierById($coderegion)
        {   
            $this->db->select('*');
            $this->db->from('quartier');
            $this->db->like('codequartier', $coderegion, 'after');
            $q = $this->db->get();
            return $q->result();
        }
        public function getInfoPromoteur($coderegion)
        {
            $this->db->select('*');
            $this->db->from('initiative');
            $this->db->where('archivé' ,0);
            $this->db->like('id_departement', $coderegion, 'after');
            $q = $this->db->get();
            return $q->result();  
        }
        public function getNbPromoteur($coderegion)
        {
            $this->db->select('*');
            $this->db->from('initiative');
            $this->db->where('archivé' ,0);
            $this->db->like('id_departement', $coderegion, 'after');
            $q = $this->db->get();
            return $q->num_rows();  
        }
        function fetch_dep($coderegion)
        {

            $this->db->select('*');
            $this->db->from('departement');
            $this->db->like('codedepartement', $coderegion, 'after');
            $query = $this->db->get();
            $output = '<option value="">Selectionnez un departement</option>';
            foreach ($query->result() as $row) {
                $output .= '<option value="' . $row->codedepartement . '">' . $row->nomdepartement . '</option>';
            }
            return $output;
        }
        function fetch_com($codedepartement)
        {

            $this->db->select('*');
            $this->db->from('commune');
            $this->db->like('codecommune', $codedepartement, 'after');
            $query = $this->db->get();
            $output = '<option value="">Selectionnez une commune</option>';
            foreach ($query->result() as $row) {
                $output .= '<option value="' . $row->codecommune . '">' . $row->nomcommune . '</option>';
            }
            return $output;
        }
        function fetch_qrt($codecommune)
        {

            $this->db->select('*');
            $this->db->from('quartier');
            $this->db->like('codequartier', $codecommune, 'after');
            $query = $this->db->get();
            $output = '<option value="">Selectionnez un quartier</option>';
            foreach ($query->result() as $row) {
                $output .= '<option value="' . $row->codequartier . '">' . $row->nomquartier . '</option>';
            }
            return $output;
        }
        
        public function getNomCommune($codecommune)
        {
            $q = $this->db->get_where('commune',array('codecommune' => $codecommune));
            return $q->result();
        }

        public function getNomQuartier($codequartier)
        {
            $q = $this->db->get_where('quartier',array('codequartier' => $codequartier));
            return $q->result();
        } 

        public function prom_cert()
        {
            $q = $this->db->get_where('initiative',array('certificat !=' => NULL, 'archivé' => 0) );
            return $q->result();
        }
        public function getNomRegion($coderegion)
        {
            $q = $this->db->get_where('region',array('coderegion', $coderegion));
            return $q->result();
        }
        public function getNomDepartement($codedepartement)
        {
            $q = $this->db->get_where('departement',array('codedepartement', $codedepartement));
            return $q->result();
        }
        public function uploadImages($data)
        {
            return $this->db->insert($data);
        }
        public function certifier($id)
        {
            $data = [
                'certifié' => '1',
            ];
            $this->db->where('id_init', $id);
            $q = $this->db->update('initiative',$data);
            if ($q) {
                $this->session->set_flashdata('message', 'update_succes');
                redirect('welcome/home_admin');
            }
        }
        public function archiver($id)
        {
            $data = [
                'archivé' => '1',
            ];
            $this->db->where('id_init', $id);
            $q = $this->db->update('initiative',$data);
            if ($q) {
                $this->session->set_flashdata('message', 'archive_succes');
                redirect('welcome/home_admin');
            }
        }

        /* Modif du 25 Mai 2020 */
        public function login($data_user)
        {   /* Cherhcez un admin */
            $query = $this->db->get_where("users", array("user_login" => $data_user['user_login'],"motdepasse" => md5($data_user['motdepasse'])));
            if ($query->num_rows() == 1) {
            /* print_r($query->result());
            die; */
                return $query->result();
            } else { # Sinon on cherche s'il est client
                $query = $this->db->get_where("initiative", array("num_tel" => $data_user['user_login'], "mdp" => md5($data_user['motdepasse'])));
                if ($query->num_rows() == 1) {
                    return $query->result();
                }else {
                    return false;
                }
            }
        }

        
    }

?>
