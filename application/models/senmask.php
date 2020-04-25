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
                    redirect('');
                }else{
                    $this->session->set_flashdata('message', 'insc_error');
                    redirect('Welcome/register');
                }
            }else{ // Une fois pub alors undate
                $this->db->update('initiative',$data);
                $this->session->set_flashdata('message', 'updated');
                redirect('');
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

        public function getInfoPromoteur($coderegion)
        {
            $this->db->select('*');
            $this->db->from('initiative');
            $this->db->like('id_departement', $coderegion, 'after');
            $q = $this->db->get();
            return $q->result();  
        }
        function fetch_dep($coderegion)
        {

            $this->db->select('*');
            $this->db->from('departement');
            $this->db->like('codedepartement', $coderegion, 'after');
            $query = $this->db->get();
            $output = '<option value="">Select departement</option>';
            foreach ($query->result() as $row) {
                $output .= '<option value="' . $row->codedepartement . '">' . $row->nomdepartement . '</option>';
            }
            return $output;
        }
    }

?>