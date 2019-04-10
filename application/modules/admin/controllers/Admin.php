<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index($msg = NULL)
    {
        if (!empty($this->session->userdata['user_role'])) {
            $log = $this->session->userdata['user_role'];
            if ($log == 1 || $log == 4) {
                redirect('admin/dashboard');
            } else if ($log == 2) {
                redirect('admin/dashboard');
            } else if ($log == 3) {
                redirect('patient/dashboard');
            } else {
                $this->load->view('admin/login', $msg);
            }
        } else {
            if (isset($msg) && !empty($msg)) {
                $data['msg'] = $msg;
            } else {
                $data['msg'] = '';
            }
            $this->load->view('admin/login', $data);
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
    public function verifylogin()
    {
        $data = $this->input->post();

        $this->controller->verifylogin($data);
      
    }
    public function dashboard()
    {
        if ($this->controller->checkSession()) {
            $user_role             = $this->session->userdata('user_role');  
            $user_id               = $this->session->userdata('id');
            $data['body']          = 'dashboard';
            $where                 = array(
                'is_active' => 1
            );
            // $where4                = array(
            //     'sender_id' => $this->session->userdata('id')
            // );
           
            //  $data['completed_Task'] = $this->model->getcount('assigned_to', array(
            //          'assigned_to' => $this->session->userdata('id'),'completed' => 2));
            //  $data['newtask'] = $this->model->getcount('assigned_to',array(
            //          'assigned_to' => $this->session->userdata('id'),'completed' => 0)); 
              
            //   // $data['task']  = $this->model->getcount('assigned_to', array(
            //   //       'assignedto_role_id' => $user_role));
              
            //    $data['total_members']  = $this->model->getcount('users', array(
            //          'user_role' => 3,'admin_id' => $this->session->userdata('id')));
            $this->controller->load_view($data);
        } else {
            redirect('admin/index');
        }
    }
    public function check_database($password)
    {
        $email = $this->input->post('email', TRUE);
        $where    = array(
            'email' => $email,
            'password' => md5($password),
            'is_active' => 1
        );
        $result   = $this->model->getsingle('users', $where);

        if (!empty($result)) {
            $sess_array = array(
                'id' => $result->id,
                'username' => $result->username,
                'email' => $result->email,
                'user_role' => $result->user_role,
                'profile_public'=>$profile_public
            );
           
            
            $this->session->set_userdata($sess_array);
            return true;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid Credentials ! Please try again with valid username and password');
            return false;
        }
    }
    public function change_password()
    {
        if ($this->controller->checkSession()) {
            $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('errors', validation_errors());
                $data['body'] = 'change_password';
                $this->controller->load_view($data);
            } else {
                $data   = array(
                    'password' => md5($this->input->post('new_password', TRUE))
                );
                $where  = array(
                    'id' => $this->session->userdata('id')
                );
                $table  = 'users';
                $result = $this->model->updateFields($table, $data, $where);
                redirect('admin/change_password', 'refresh');
            }
        } else {
            redirect('admin/index');
        }
    }
    public function oldpass_check($oldpass)
    {
        $user_id = $this->session->userdata('id');
        $result  = $this->model->check_oldpassword($oldpass, $user_id);
        if ($result == 0) {
            $this->form_validation->set_message('oldpass_check', "%s does not match.");
            return FALSE;
        } else {
            $this->session->set_flashdata('success_msg', 'Password Successfully Updated!!!');
            return TRUE;
        }
    }
    public function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        $msg = "You have been logged out Successfully...";
        $this->index($msg);
    }
    public function get_port_data()
    {
        $val       = $this->input->get('val');
        $table     = $this->input->get('table');
        $port_data = $this->model->get_matching_record($table, $val);
        echo json_encode($port_data);
    }
    
    public function alpha_dash_space($str)
    {
        if (!preg_match("/^([-a-z_ ])+$/i", $str)) {
            $this->form_validation->set_message('check_captcha', 'Only Aplphabates allowed in this field');
        } else {
            return true;
        }
    }

    public function delete()
    {
        if ($this->controller->checkSession()) {
            $id    = $this->input->post('id');
            $table = $this->input->post('table');
            $where = array(
                'id' => $id
            );
            $this->model->delete($table, $where);
        } else {
            redirect('admin/index');
        }
    }

    public function delete_new()
    {
        if ($this->controller->checkSession()) {
            $id     = $this->input->post('id');
            $table  = $this->input->post('table');
            $column = $this->input->post('column');
            $where = array(
                $column => $id
            );
            $this->model->delete($table, $where);
        } else {
            redirect('admin/index');
        }
    }
    
    public function change_status()
    {
        if ($this->controller->checkSession()) {
            $id     = $this->input->post('id');
            $table  = $this->input->post('table');
            $where  = array(
                'id' => $id
            );
            $data   = array(
                'is_active' => 0
            );
            $result = $this->model->updateFields($table, $data, $where);
        } else {
            redirect('admin/index');
        }
    }
 
    public function update_status()
    {
        if ($this->controller->checkSession()) {
            $id     = $this->input->post('id');
            $active = $this->input->post('active');
            $data   = array(
                'is_active' => $active
            );
            $where  = array(
                'id' => $id
            );
            $this->model->update('appointment', $data, $where);
        } else {
            redirect('admin/index');
        }
    }
   
    
    public function profile()
    {
        if ($this->controller->checkSession()) {
            $where         = array(
                'id' => $this->session->userdata('id')
            );
            $data['users'] = $this->model->getAllwhere('users', $where);
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha|min_length[2]');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha|min_length[2]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'trim|required');
            
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('errors', validation_errors());
                $data['body'] = 'profile';
                $this->controller->load_view($data);
            } else {
                
                
                $first_name  = $this->input->post('first_name');
                $last_name   = $this->input->post('last_name');
                $email       = $this->input->post('email');
                $address     = $this->input->post('address');
                $phone_no    = $this->input->post('phone');
                $mobile_no   = $this->input->post('mobile');
                $dob         = $this->input->post('date_of_birth');
                $gender      = $this->input->post('gender');
                $blood_group = $this->input->post('blood_group');
                
                $data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'address' => $address,
                    'phone_no' => $phone_no,
                    'mobile' => $mobile_no,
                    'date_of_birth' => $dob,
                    'gender' => $gender,
                    'blood_group' => $blood_group
                );
                
                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    
                    if (move_uploaded_file($_FILES['image']['tmp_name'], 'asset/uploads/' . $_FILES['image']['name'])) {
                        
                        $data['profile_pic'] = $_FILES['image']['name'];
                    }
                }
                $result = $this->model->updateFields('users', $data, $where);
                redirect('/admin/profile', 'refresh');
                
            }
        } else {
            redirect('admin/index');
        }
    }
   
   
    public function check_password()
    {
        
        $old_password = $this->input->post('data');
        $where        = array(
            'id' => $this->session->userdata('id'),
            'password' => md5($old_password)
        );
        $result       = $this->model->getsingle('users', $where);
        if (!empty($result)) {
            echo '0';
        } else {
            echo '1';
        }
    }
   
    public function file_upload($file)
    {
        if (!empty($_FILES["$file"]["name"])) {
            $f_name      = $_FILES["$file"]["name"];
            $f_tmp       = $_FILES["$file"]["tmp_name"];
            $f_size      = $_FILES["$file"]["size"];
            $f_extension = explode('.', $f_name); //To breaks the string into array
            $f_extension = strtolower(end($f_extension)); //end() is used to retrun a last element to the array
            $f_newfile   = "";
            
            if ($f_name) {
                $f_newfile = uniqid() . '.' . $f_extension; // It`s use to stop overriding if the image will be same then uniqid() will generate the unique name of both file.
                $store     = 'asset/uploads/' . $f_newfile;
                $image1    = move_uploaded_file($f_tmp, $store);
                return $f_newfile;
            }
        }
    }
    

    public function get_record()
    {
        
        $id    = $this->input->get('id');
        $table = $this->input->get('table');
        $field = $this->input->get('field');
        
        if ($field == 'hospital_id') {
            $select = 'id,first_name,last_name';
            $where  = array(
                'hospital_id' => $id,
                'user_role' => 2,
                'is_active' => 1
            );
        } else {
            $where  = array(
                "$field" => $id
            );
            $select = 'id, name';
        }
        $states = $this->model->getAllwhere($table, $where, $select);
        echo json_encode($states);
    }
    
    public function find_record()
    {
        $id     = $this->input->get('id');
        $table  = $this->input->get('table');
        $field  = $this->input->get('field');
        $select = 'id,first_name,last_name';
        $where  = array(
            $field => $id,
            'user_role' => 2,
            'is_active' => 1
        );
        $states = $this->model->find_record($table, $where, $select);
        echo json_encode($states);
    }
    
    public function add_staff($id = NULL)////add_admin($id = NULL)
    {

        if ($this->controller->checkSession()) {
            //$this->form_validation->set_rules('speciality_name', 'Speciality Name', 'trim|required|is_unique[speciality.name]');
    
            if (empty($id)) {
                $this->form_validation->set_rules('name', 'Staff name', 'trim|required');
                $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[users.email]');
                $this->form_validation->set_rules('password', 'password', 'trim|required');
            } else {

                $this->form_validation->set_rules('name', 'Staff name', 'trim|required');
                $this->form_validation->set_rules('email', 'email', 'trim|required');
            }
 
            
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if ($this->form_validation->run() == false) 
            { 
                $this->session->set_flashdata('errors', validation_errors());
                if (!empty($id)) {
                    $where              = array(
                        'id ' => $id,
                        'user_role' => 3
                    );
                    $data['staff'] = $this->model->getAllwhere('users', $where);
                }

                $data['body'] = 'add_staff';//'add_admin';
                $this->controller->load_view($data);
            } else {

                
                $admin_id      = $this->session->userdata('id');
                $name          = $this->input->post('name');
                $email         = $this->input->post('email');
                $number        = $this->input->post('phone_number');
                $is_active     = $this->input->post('status');
                $password      = md5($this->input->post('password'));
                $data = array(
                    'admin_id'   => $admin_id,
                    'username'   => $name,
                    'email'      => $email,
                    'phone_no'   => $number,
                    'password'   => $password,
                    'is_active'  => $is_active,
                    'created_at' => date('Y-m-d H:i:s'),
                    'user_role'  => 3
                );
                
                if (!empty($id)) {
                    $where = array(
                        'id' => $id
                    );
                    unset($data['created_at']);
                    unset($data['password']);
                    $result = $this->model->updateFields('users', $data, $where);
                } else {
                     
                    $result = $this->model->insertData('users', $data);
                }
                redirect('admin/staff_list');
            }
        } else {
            redirect('admin/index');
        }
    }

    public function staff_list()
    {
        if ($this->controller->checkSession()) {
            $admin_id      = $this->session->userdata('id');
            $data['staff_list'] = $this->model->getAllwhere('users',array('user_role'=>3,'admin_id'=> $admin_id));
            $data['body']       = 'staff_list';

            $this->controller->load_view($data);
        } else {
            redirect('admin/index');
        }
    }

    public function telecallers($id = NULL)
    {
        if ($this->controller->checkSession()) {
            //$this->form_validation->set_rules('speciality_name', 'Speciality Name', 'trim|required|is_unique[speciality.name]');
            if (empty($id)) {
                $this->form_validation->set_rules('name', 'TeleCaller name', 'trim|required|is_unique[users.username]');
            } else {
                $this->form_validation->set_rules('name', 'TeleCaller name', 'trim|required');
            }
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('errors', validation_errors());
                if (!empty($id)) {
                    $where              = array(
                        'id ' => $id,
                        'user_role' => 2
                    );
                    $data['telecallers'] = $this->model->getAllwhere('users', $where);
                }
                $data['body'] = 'telecallers';
                $this->controller->load_view($data);
            } else {
                
                $name          = $this->input->post('name');
                $email         = $this->input->post('email');
                $number        = $this->input->post('phone_number');
                $is_active     = $this->input->post('status');
                $password      = md5($this->input->post('password'));
                $data = array(
                    'username' => $name,
                    'email' => $email,
                    'phone_no' => $number,
                    'password'  => $password,
                    'is_active' => $is_active,
                    'created_at' => date('Y-m-d H:i:s'),
                    'user_role'=>2
                );
                
                if (!empty($id)) {
                    $where = array(
                        'id' => $id
                    );
                    unset($data['created_at']);
                    unset($data['password']);
                    $result = $this->model->updateFields('users', $data, $where);
                } else {
                    $result = $this->model->insertData('users', $data);
                }
                redirect('admin/telecallers_list');
            }
        } else {
            redirect('admin/index');
        }
    }
    

  public function completedtask(){

        if ($this->controller->checkSession()) {
             
             $id = $this->session->userdata('id');
             $data['Task'] = $this->model->GetJoinRecordNew('assigned_to','task_id','assigned_to','task','task_id','users','id','assigned_to', $id,'*',array(' assigned_to.completed'=>2));

            
              $data['body']       = 'completed_view_task'; 
              // echo $this->db->last_query(); 
              // die;
             $this->controller->load_view($data);

        }else{
            redirect('superadmin/index');
        }

    }
    public function task_list()
    {
        if ($this->controller->checkSession()) {
            $id  = $this->session->userdata('id');
            $data['tasklist'] =$this->model->GetJoinRecordNew('assigned_to','task_id','assigned_to','task','task_id','users','id','assigned_to',$id,'*',array('assigned_to.status'=>1,'assigned_to.completed'=>0));
            
            $data['body']       = 'task_list';
             
            $this->controller->load_view($data);
        } else {
            redirect('admin/index');
        }
    }

    public function assigntask($id)
    { 
        if ($this->controller->checkSession()) {

            $data['task'] = $this->model->getAllwhere('task',array('task_id' => $id));
            $data['task'] = $this->model->GetJoinRecordNew('assigned_to','task_id','assigned_to','task','task_id','users','id','assigned_id',$id,'*',array(' assigned_to.status'=>1));
 
            $data['body']  = 'assigntask';
            // echo "<pre>";
            // echo $this->db->last_query();
            // print_r($data);
            // die;
            $this->controller->load_view($data);
        } else {
            redirect('superadmin/index');
        }
    }

    public function task_assign($id){
        if ($this->controller->checkSession()) {
           
            $data = $this->input->post();
            // echo "<pre>";
            // print_r($data);die;
            $image = $data['screenshot_image'];
            $completed = $data['completed'];
            $insertData['task_id'] = $id;
            $where = array(

                    'assigned_id' => $id,
                    'completed' =>2,
                );
             $check = $this->model->getAllwhere('assigned_to',$where);
             if(!empty($check)){
                    $this->session->set_flashdata('error_message','Already Completed');
                    $this->assigntask($id);
                }else{
                 $where = array(
                    'assigned_id' => $id,
                  );
                 
                 if(!empty($image)){
                     $UPLOAD_DIR    = "asset/completed_task/"; 
                     $img           = $image;   

                     $img           = str_replace('data:image/png;base64,', '', $img);
                     $img           = str_replace('data:image/jpeg;base64,', '', $img);
                        //$img           = str_replace('data:image/png;base64,', '', $img);
                     $img           = str_replace(' ', '+', $img);
                     $data1         = base64_decode($img);
                     
                     $imagename     = uniqid() . '.png';
                     $file          = $UPLOAD_DIR .  $imagename;
                    
                     $success       = file_put_contents($file, $data1); 

                     $screenshot_image   = $imagename;
                 }else{
                     $screenshot_image  = null;
                 }
                 
                 $this->model->updateFields('assigned_to',array('completed'=>$completed,'completed_date'=>date('Y-m-d H:i:s'),'screenshot_image' =>$screenshot_image),$where);
               }

                $this->completedtask();
    
        } else {
            redirect('superadmin/index');
        }     
    }



    
    // public function staff($id = NULL)
    // {

    //     if ($this->controller->checkSession()) {
    //         //$this->form_validation->set_rules('speciality_name', 'Speciality Name', 'trim|required|is_unique[speciality.name]');
    //         if (empty($id)) {
    //             $this->form_validation->set_rules('name', 'TeleCaller name', 'trim|required|is_unique[users.username]');
    //         } else {
    //             $this->form_validation->set_rules('name', 'TeleCaller name', 'trim|required');
    //         }
    //         $this->form_validation->set_rules('email', 'email', 'trim|required');
    //         $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
    //         $this->form_validation->set_rules('status', 'Status', 'trim|required');
    //         if ($this->form_validation->run() == false) {
    //             $this->session->set_flashdata('errors', validation_errors());
    //             if (!empty($id)) {
    //                 $where              = array(
    //                     'id ' => $id,
    //                     'user_role' => 3
    //                 );
    //                 $data['staff'] = $this->model->getAllwhere('users', $where);
    //             }

    //             $data['body'] = 'add_staff';
    //             $this->controller->load_view($data);
    //         } else {
                
    //             $name          = $this->input->post('name');
    //             $email         = $this->input->post('email');
    //             $number        = $this->input->post('phone_number');
    //             $is_active     = $this->input->post('status');
    //             $password      = md5($this->input->post('password'));
    //             $data = array(
    //                 'username' => $name,
    //                 'email' => $email,
    //                 'phone_no' => $number,
    //                 'password'  => $password,
    //                 'is_active' => $is_active,
    //                 'created_at' => date('Y-m-d H:i:s'),
    //                 'user_role'=>3
    //             );
                
    //             if (!empty($id)) {
    //                 echo $id; die;
    //                 $where = array(
    //                     'id' => $id
    //                 );
    //                 unset($data['created_at']);
    //                 unset($data['password']);
    //                 $result = $this->model->updateFields('users', $data, $where);
    //             } else {
    //                 $result = $this->model->insertData('users', $data);
    //             }
    //             redirect('admin/staff_list');
    //         }
    //     } else {
    //         redirect('admin/index');
    //     }
    // }


    // public function staff_list()
    // {
    //     if ($this->controller->checkSession()) {
    //         $data['staff'] = $this->model->getAllwhere('users',array('user_role'=>3));
    //         $data['body']       = 'staff_list';
    //         $this->controller->load_view($data);
    //     } else {
    //         redirect('admin/index');
    //     }
    // }
   

   public function leads()
    {
        if ($this->controller->checkSession()) {
            $data['leads'] = $this->model->GetJoinRecord('leads', 'entry_by', 'users', 'id', 'leads.*,users.username','');

            
            $data['body']       = 'leads_list';
            $this->controller->load_view($data);
        } else {
            redirect('admin/index');
        }
    }

    public function view_leads($id){

        if ($this->controller->checkSession()) {
             $where = array(
                'leads.id' => $id
             ); 
             $data['leads'] = $this->model->GetJoinRecord('leads', 'entry_by', 'users', 'id', 'leads.*,users.username',$where);  
             $location = $data['leads'][0]->location;
             $data['state']  = array();
             if(!empty($location)){
                $location  = explode(",", $location);
                foreach ($location as $key => $value) {
                    $datas    = $this->model->getAllwhere('states',array('id'=>$value),'name');
                    if(!empty($datas)){
                        $data['state'][] = $datas[0];
                    }
                }
                
             }
             $data ['builders'] = $this->model->getAllwhere('users',array('user_role'=>3));
             $data['body']       = 'view_leads1';
             $this->controller->load_view($data);

        }else{
            redirect('admin/index');
        }

    }

    public function verify_lead($id){
        if ($this->controller->checkSession()) {
                $data = $this->input->post();
                $where  = array(
                    'id' => $id
                );
                $table  = 'leads';
                $result = $this->model->updateFields($table, $data, $where);

                $this->view_leads($id);

        }else{
            redirect('admin/index');
        }
    }

    public function assign_leads($id){
        if ($this->controller->checkSession()) {
                $data = $this->input->post();
                
                $where  = array(
                    'id' => $id
                );
                $table  = 'leads';
                $result = $this->model->updateFields($table, $data, $where);

                $this->view_leads($id);

        }else{
            redirect('admin/index');
        }
    }


    public function size_range($id = NULL)
    {
        if ($this->controller->checkSession()) {
            
           
            $this->form_validation->set_rules('min_value', 'Minimum Value', 'trim|required');
            $this->form_validation->set_rules('max_value', 'Maximum Value', 'trim|required');
           
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('errors', validation_errors());
                if (!empty($id)) {
                    $where              = array(
                        'id ' => $id,
                        
                    );
                    $data['size_range'] = $this->model->getAllwhere('size_range', $where);
                }
                $data['body'] = 'size_range';
                $this->controller->load_view($data);
            } else {
                
                $min_value          = $this->input->post('min_value');
                $max_value          = $this->input->post('max_value');
                
                
                $data = array(
                    'min_value'      => $min_value,
                    'max_value'      => $max_value,
                    'created_at'     => date('Y-m-d H:i:s'),
                );
                    
                
                if (!empty($id)) {
                    $where = array(
                        'id' => $id
                    );
                    unset($data['created_at']);
                   
                    $result = $this->model->updateFields('size_range', $data, $where);
                } else {
                    $result = $this->model->insertData('size_range', $data);
                }
                redirect('admin/size_range_list');
            }
        } else {
            redirect('admin/index');
        }
    }

    public function size_range_list()
    {
        if ($this->controller->checkSession()) {
            $data['size_range'] = $this->model->getAllwhere('size_range');
            $data['body']       = 'size_range_list';
            $this->controller->load_view($data);
        } else {
            redirect('admin/index');
        }
    }



    public function budget_range($id = NULL)
    {
        if ($this->controller->checkSession()) {
            
           
            $this->form_validation->set_rules('min_value', 'Minimum Value', 'trim|required');
            $this->form_validation->set_rules('max_value', 'Maximum Value', 'trim|required');
           
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('errors', validation_errors());
                if (!empty($id)) {
                    $where              = array(
                        'id ' => $id,
                        
                    );
                    $data['budget_range'] = $this->model->getAllwhere('budget_range', $where);
                }
                $data['body'] = 'budget_range';
                $this->controller->load_view($data);
            } else {
                
                $min_value          = $this->input->post('min_value');
                $max_value          = $this->input->post('max_value');
                
                
                $data = array(
                    'min_value'      => $min_value,
                    'max_value'      => $max_value,
                    'created_at'     => date('Y-m-d H:i:s'),
                );
                    
                
                if (!empty($id)) {
                    $where = array(
                        'id' => $id
                    );
                    unset($data['created_at']);
                   
                    $result = $this->model->updateFields('budget_range', $data, $where);
                } else {
                    $result = $this->model->insertData('budget_range', $data);
                }
                redirect('admin/budget_range_list');
            }
        } else {
            redirect('admin/index');
        }
    }

    public function budget_range_list()
    {
        if ($this->controller->checkSession()) {
            $data['budget_range'] = $this->model->getAllwhere('budget_range');
            $data['body']       = 'budget_range_list';
            $this->controller->load_view($data);
        } else {
            redirect('admin/index');
        }
    }
   
    public function get_search_task(){
        if ($this->controller->checkSession()) {
           
             $start_date = date("Y-m-d", strtotime($this->input->post('start_date')));
             $end_date   = date("Y-m-d", strtotime($this->input->post('end_date')));
            // $role       = $this->input->post('role');
           // $entry_by   = $this->session->userdata('id');
             $where = array();
            
             if (!empty($this->input->post('start_date'))) {
                $where['assigned_to.created_at>='] =$start_date;
                 
             }
             if (!empty($this->input->post('end_date'))) {
                $where['assigned_to.created_at<='] =$end_date;
                 
             }
             $where['assigned_to.status'] = 1;
             $where['assigned_to.completed']= 0;
              $id = $this->session->userdata('id');
             $data['tasklist'] =$this->model->GetJoinRecordNew('assigned_to','task_id','assigned_to','task','task_id','users','id','assigned_to',$id,'*',$where);
            

            if(!empty($data)){
                echo json_encode($data);
            }
            
        } else {
            redirect('superadmin/index');
        }  
    }

   
     public function get_completed_task(){
        if ($this->controller->checkSession()) {
           
             $start_date = date("Y-m-d", strtotime($this->input->post('start_date')));
             $end_date   = date("Y-m-d", strtotime($this->input->post('end_date')));
            // $role       = $this->input->post('role');
           // $entry_by   = $this->session->userdata('id');
             $where = array();
            
             if (!empty($this->input->post('start_date'))) {
                $where['assigned_to.created_at>='] =$start_date;
                 
             }
             if (!empty($this->input->post('end_date'))) {
                $where['assigned_to.created_at<='] =$end_date;
                 
             }
             //$where['assigned_to.status'] = 1;
             $where['assigned_to.completed']= 2;
             
             $id = $this->session->userdata('id');
             $data['task'] = $this->model->GetJoinRecordNew('assigned_to','task_id','assigned_to','task','task_id','users','id','assigned_to', $id,'*',$where);
             // $data['body']       = 'completed_view_task'; 

            if(!empty($data)){
                echo json_encode($data);
            }
            
        } else {
            redirect('superadmin/index');
        }  
    }

    public function user($id = NULL)////add_admin($id = NULL)
    {

        if ($this->controller->checkSession()) {
            //$this->form_validation->set_rules('speciality_name', 'Speciality Name', 'trim|required|is_unique[speciality.name]');
    
            if (empty($id)) {
                $this->form_validation->set_rules('name', 'User name', 'trim|required');
                $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[users.email]');
                $this->form_validation->set_rules('password', 'password', 'trim|required');
            } else {

                $this->form_validation->set_rules('name', 'User name', 'trim|required');
                $this->form_validation->set_rules('email', 'email', 'trim|required');
            }
 
            
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if ($this->form_validation->run() == false) 
            { 
                $this->session->set_flashdata('errors', validation_errors());
                if (!empty($id)) {
                    $where              = array(
                        'id ' => $id,
                        'user_role' => 2
                    );
                    $data['user'] = $this->model->getAllwhere('users', $where);
                }

                $data['body'] = 'add_user';//'add_admin';
                $this->controller->load_view($data);
            } else {

                    
              
                $name          = $this->input->post('name');
                $email         = $this->input->post('email');
                $number        = $this->input->post('phone_number');
                $is_active     = $this->input->post('status');
                $password      = md5($this->input->post('password'));
                $data = array(
                   
                    'username'   => $name,
                    'email'      => $email,
                    'phone_no'   => $number,
                    'password'   => $password,
                    'is_active'  => $is_active,
                    'created_at' => date('Y-m-d H:i:s'),
                    'user_role'  => 2
                );
                
                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    
                    if (move_uploaded_file($_FILES['image']['tmp_name'], 'asset/uploads/profile/' . $_FILES['image']['name'])) {
                        
                        $data['image'] = $_FILES['image']['name'];
                    }
                }

                if (!empty($id)) {
                    $where = array(
                        'id' => $id
                    );
                    unset($data['created_at']);
                    unset($data['password']);
                    $result = $this->model->updateFields('users', $data, $where);
                } else {
                     
                    $result = $this->model->insertData('users', $data);
                }
                redirect('admin/user_list');
            }
        } else {
            redirect('admin/index');
        }
    }


    public function user_list()
    {
        if ($this->controller->checkSession()) {
            
            $data['user_list'] = $this->model->getAllwhere('users',array('user_role'=>2));
            $data['body']       = 'user_list';

            $this->controller->load_view($data);
        } else {
            redirect('admin/index');
        }
    }


    public function comment_list()
    {
        if ($this->controller->checkSession()) {
            
            $comment_list  =  $this->model->GetJoinRecord('comment','post_id','post','post_id','post.title,comment.*','');
            if(!empty($comment_list)){
                foreach ($comment_list as $key => $value) {
                    $user_name  = $this->model->getAllwhere('users',array('id'=>$value->comment_by));

                    $comment_list[$key]->user_name = $user_name[0]->username;
                  
                }
            }
            $data['comment_list']  = $comment_list;
            $data['body']          = 'comment_list';

            $this->controller->load_view($data);
        } else {
            redirect('admin/index');
        }
    }

    
    

    public function category($id = NULL)////add_admin($id = NULL)
    {

        if ($this->controller->checkSession()) {
            //$this->form_validation->set_rules('speciality_name', 'Speciality Name', 'trim|required|is_unique[speciality.name]');
    
            $this->form_validation->set_rules('name', 'Category name', 'trim|required');
 
            
            

            if ($this->form_validation->run() == false) 
            { 
                $this->session->set_flashdata('errors', validation_errors());
                if (!empty($id)) {
                    $where              = array(
                        'category_id' => $id,
                       
                    );
                    $data['category'] = $this->model->getAllwhere('postcategory', $where);
                }

                $data['body'] = 'add_category';//'add_admin';
                $this->controller->load_view($data);
            } else {

                    
              
                $name          = $this->input->post('name');
               
                $data = array(
                   
                    'category_name'   => $name,
                    'created_date'    => date('Y-m-d H:i:s')
                   
                );
                
                if (isset($_FILES['category_image']['name']) && !empty($_FILES['category_image']['name'])) {
                    
                    if (move_uploaded_file($_FILES['category_image']['tmp_name'], 'asset/images/' . $_FILES['category_image']['name'])) {
                        
                        $data['category_image'] = $_FILES['category_image']['name'];
                    }
                }

                if (!empty($id)) {
                    $where = array(
                        'category_id' => $id
                    );
                    unset($data['created_at']);
                    unset($data['password']);
                    $result = $this->model->updateFields('postcategory', $data, $where);
                } else {
                     
                    $result = $this->model->insertData('postcategory', $data);
                }
                redirect('admin/category_list');
            }
        } else {
            redirect('admin/index');
        }
    }

    public function category_list()
    {
        if ($this->controller->checkSession()) {
            
            
            $data['category_list']     = $this->model->getAllwhere('postcategory');
            $data['body']              = 'category_list';

            $this->controller->load_view($data);
        } else {
            redirect('admin/index');
        }
    }

    public function post($id = NULL)////add_admin($id = NULL)
    {

        if ($this->controller->checkSession()) {
            //$this->form_validation->set_rules('speciality_name', 'Speciality Name', 'trim|required|is_unique[speciality.name]');
            
            $this->form_validation->set_rules('title', 'Post Title', 'trim|required');
            $this->form_validation->set_rules('content', 'Post Contents', 'trim|required');
            $this->form_validation->set_rules('category_id', 'Category Name', 'trim|required');
            
            

            if ($this->form_validation->run() == false) 
            { 
                $this->session->set_flashdata('errors', validation_errors());
                if (!empty($id)) {
                    $where              = array(
                        'post_id' => $id,
                       
                    );
                    $data['post'] = $this->model->getAllwhere('post', $where);
                }
                $data['category']     =  $this->model->getAll('postcategory');
                $data['body']         = 'add_post';//'add_admin';
                $this->controller->load_view($data);
            } else {

                    
                $category_id    = $this->input->post('category_id');
                $title          = $this->input->post('title');
                $content        = $this->input->post('content');

                $data = array(
                   
                    'category_id'     => $category_id,
                    'user_id'         => $this->session->userdata('id'),
                    'title'           => $title,
                    'contents'         => $content,
                    'post_date'       => date('Y-m-d H:i:s')
                   
                );
                
                if (isset($_FILES['media_file']['name']) && !empty($_FILES['media_file']['name'])) {
                    
                    if (move_uploaded_file($_FILES['media_file']['tmp_name'], 'asset/uploads/post/' . $_FILES['media_file']['name'])) {
                        $extension = explode('/',$_FILES['media_file']['type']);
                        $data['media_filetype'] = $extension[1];
                        $data['media_file']     = $_FILES['media_file']['name'];
                    }
                }

                if (!empty($id)) {
                    $where = array(
                        'post_id' => $id
                    );
                    unset($data['created_at']);
                    unset($data['password']);
                    $result = $this->model->updateFields('post', $data, $where);
                } else {
                     
                    $result = $this->model->insertData('post', $data);
                }
                redirect('admin/post_list');
            }
        } else {
            redirect('admin/index');
        }
    }

    public function post_list()
    {
        if ($this->controller->checkSession()) {
            
            $post_list  =  $this->model->GetJoinRecord('post','category_id','postcategory','category_id','postcategory.category_name,post.*','');
            if(!empty($post_list)){
                foreach ($post_list as $key => $value) {
                    $user_name  = $this->model->getAllwhere('users',array('id'=>$value->user_id));
                    if(!empty($user_name)){
                    $post_list[$key]->user_name = $user_name[0]->username;
                    }else{
                        $post_list[$key]->user_name ='';
                    }
                }
            }
            $data['post_list']     = $post_list;
            $data['body']          = 'post_list';

            $this->controller->load_view($data);
        } else {
            redirect('admin/index');
        }
    }




    // gaurav working 30jan

    public function site_detail($id = NULL)////add_admin($id = NULL)
    {

        if ($this->controller->checkSession()) {
            //$this->form_validation->set_rules('speciality_name', 'Speciality Name', 'trim|required|is_unique[speciality.name]');
            
            $this->form_validation->set_rules('site_title', 'Site Title', 'trim|required');
            $this->form_validation->set_rules('site_email', 'Site Email', 'valid_email|xss_clean');
            $this->form_validation->set_rules('site_number', 'Site Number', 'numeric|max_length[10]|min_length[10]');


            if ($this->form_validation->run() == false) 
            { 
                $this->session->set_flashdata('errors', validation_errors());
                // if (!empty($id)) {
                    $where              = array(
                        'id' => 1,
                       
                    );
                    $data['detail'] = $this->model->getAllwhere('site_settings', $where);
               // }
                // $data['category']     =  $this->model->getAll('postcategory');
                $data['body']         = 'site_settings';//'add_admin';
                $this->controller->load_view($data);
            } else {

               
                $site_title          = $this->input->post('site_title');
                $site_email          = $this->input->post('site_email');
                $site_number         = $this->input->post('site_number');
                $facebook_url        = $this->input->post('facebook_url');
                $google_plus_url     = $this->input->post('google_plus_url');
                $twitter_url         = $this->input->post('twitter_url');
                $youtube_url         = $this->input->post('youtube_url');
                $instagram_url       = $this->input->post('instagram_url');
                $content             = $this->input->post('content');

                $data = array(
                    'site_title'          => $site_title,
                    'site_email'          => $site_email,
                    'site_number'         => $site_number,
                    'facebook_link'       => $facebook_url,
                    'google_plus_link'    => $google_plus_url,
                    'twitter_link'        => $twitter_url,
                    'youtube_link'        => $youtube_url,
                    'instagram_link'      => $instagram_url,
                    'site_subscribe_text' => $content,
                    'created_at'          => date('Y-m-d H:i:s')
                );

                if (isset($_FILES['site_favicon']['name']) && !empty($_FILES['site_favicon']['name'])) {
                    
                    if (move_uploaded_file($_FILES['site_favicon']['tmp_name'], 'asset/uploads/' . $_FILES['site_favicon']['name'])) {
                      //  $extension = explode('/',$_FILES['site_favicon']['type']);
                        //$data['media_filetype'] = $extension[1];
                        $data['site_favicon_icon']     = $_FILES['site_favicon']['name'];
                    }
                }

                if (isset($_FILES['site_logo']['name']) && !empty($_FILES['site_logo']['name'])) {
                    
                    if (move_uploaded_file($_FILES['site_logo']['tmp_name'], 'asset/uploads/' . $_FILES['site_logo']['name'])) {
                        //$extension = explode('/',$_FILES['site_logo']['type']);
                        //$data['media_filetype'] = $extension[1];
                        $data['site_logo']     = $_FILES['site_logo']['name'];
                    }
                }

                
                if (!empty($id)) {
                    $where = array(
                        'id' => $id
                    );
                     unset($data['created_at']);
                    //unset($data['password']);
                    $result = $this->model->updateFields('site_settings', $data, $where);
                } else {
                     
                    $result = $this->model->insertData('site_settings', $data);
                }
                redirect('admin/site_detail');
            }
        } else {
            redirect('admin/index');
        }
    }


    
    
}