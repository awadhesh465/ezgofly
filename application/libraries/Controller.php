<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller
{
    
    var $CI;
    public function __construct($params = array())
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->config->item('base_url');
        $this->CI->load->library('session', 'form_validation');
        $this->CI->load->database();   

    }
    
    function create_thumbnail($fileName, $width, $height) 
    {
        $this->CI->load->library('image_lib');

        $config['image_library']  = 'gd2';
          $config['source_image']   = $_SERVER['DOCUMENT_ROOT'].'/demowork/studentx/asset/uploads/post/'. $fileName;       
          $imgdata=exif_read_data($config['source_image'].$fileName, 'IFD0');

        //$config['create_thumb']   = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']          = $width;
        $config['height']         = $height;
        $config['new_image']      = $_SERVER['DOCUMENT_ROOT']. '/demowork/studentx/asset/uploads/post/thumb/'. $fileName;               
        $this->CI->image_lib->initialize($config);
        if (! $this->CI->image_lib->resize()) { 
            echo $this->CI->image_lib->display_errors(); 
        }else{

                $this->image_lib->clear();
               


                switch($imgdata['Orientation']) {
                    case 3:
                        $config['rotation_angle']='180';
                        break;
                    case 6:
                        $config['rotation_angle']='270';
                        break;
                    case 8:
                        $config['rotation_angle']='90';
                        break;
                }

                $this->image_lib->initialize($config); 
                $this->image_lib->rotate();

            }
            

    }

    public function verifylogin($data)
    {
       
        if ($data) {

            $this->CI->form_validation->set_rules('email', 'email', 'trim|required');
            $this->CI->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');

            if ($this->CI->form_validation->run() == false) {
                $this->CI->session->set_flashdata('errors', validation_errors());
                $this->CI->load->view('login');
            } else {
                
                if ($this->checkSession()) {
                    $log = $this->CI->session->userdata['user_role'];
                    if ($log == 1) {
                        redirect('admin/dashboard');
                    } else if ($log == 2) {
                        redirect('frontend/home');
                    } else if ($log == 3) {
                        redirect('frontend/home');
                    }
                }
            }
        }
        else
        {

            redirect('frontend/index');
        }
    }
    
    public function checkSession()
    {
        if (!empty($this->CI->session->userdata('user_role'))) {
            $log = $this->CI->session->userdata('user_role');
            if (!empty($log)) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    
    public function last_executed_query()
    {
        echo $this->db->last_query();
        die;
    }
    
    public function print_array($data = NULL)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    
    public function load_view($page_data)
    {
        $this->CI->load->view('common/templates/default', $page_data);
    }

    public function load_view1($page_data)
    {
        $this->CI->load->view('common/templates1/default', $page_data);
    }

    public function check_required_value($chk_params, $converted_array) 
    {
        foreach ($chk_params as $param) { 
            if (array_key_exists($param, $converted_array) && ($converted_array[$param] != '')) { 
                $check_error = 0; 
            } else { 
                $check_error = array('check_error' => 1, 'param' => $param); 
                break; 
            } 
        } 
        return $check_error; 
    }
}