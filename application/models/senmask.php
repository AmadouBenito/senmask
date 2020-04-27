<?php 

    class Senmask extends CI_Model{

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
		    $this->load->helper('url', 'form', 'date');
            
        }

        public function publier($data)
        {
            $user = $this->db->get_where('initiative',array("num_tel" => $data['num_tel']));
            
            if ($user->num_rows() == '0') {//jamais pub
                if ($this->db->insert('initiative',$data)) {
                    $this->session->set_flashdata('message', 'insc_succed');
                    return true;
                }else{
                    $this->session->set_flashdata('message', 'insc_error');
                    redirect('Welcome/publier');
                }
            }else{ // Une fois pub alors undate
                $this->db->update('initiative',$data);
                $this->session->set_flashdata('message', 'updated');
                return true;
            }

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
        public function login($data_user)
        {  
            $query = $this->db->get_where("users", array("user_login" => $data_user['user_login'],"motdepasse" => $data_user['motdepasse']));
            if ($query->num_rows() == 1) {
                return $query->result();
            } else {# Sinon on cherche s'il est client
                return false;
            }
        }
    }

?>