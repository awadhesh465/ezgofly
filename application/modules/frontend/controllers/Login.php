<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index($msg = NULL)
    {
        if (!empty($this->session->userdata['user_role'])) {
            $log = $this->session->userdata['user_role'];
            if ($log == 1) {
                redirect('superadmin/dashboard');
            } else if ($log == 2) {
                redirect('admin/dashboard');
            } else if ($log == 3) {
                redirect('staffs/dashboard');
            } else {
                $this->load->view('superadmin/login', $msg);
            }
        } else {
            if (isset($msg) && !empty($msg)) {
                $data['msg'] = $msg;
            } else {
                $data['msg'] = '';
            }
            $this->load->view('superadmin/login', $data);
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
            $data['body']          = 'dashboard';
            $where                 = array(
                'is_active' => 1
            );
            $where4                = array(
                'sender_id' => $this->session->userdata('id')
            );
            
            $data['total_task'] = $this->model->getcount('task',array('is_active'=>1));
            
            $data['assigned_task'] = $this->model->getcount('assigned_to',array('status'=>1,'completed'=>0));
            $data['completed_task'] = $this->model->getcount('assigned_to',array('status'=>1,'completed'=>2));
            $data['admin']  = $this->model->getcount('users', array(
                    'user_role' => 2));
            $data['staff']  = $this->model->getcount('users', array(
                    'user_role' => 3));
             
            $this->controller->load_view($data);
        } else {
            redirect('superadmin/index');
        }
    }
    
    public function check_database($password)
    {
        $username = $this->input->post('email', TRUE);
        $where    = array(
            'email' => $username,
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
                
            );
           
            if ($result->user_role == 4) {
                $where                = array(
                    'user_id' => $result->id
                );
               // $sess_array['rights'] = $this->model->getsingle('user_rights', $where);
            }
            
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
            redirect('superadmin/index');
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
            redirect('superadmin/index');
        }
    }

    public function task_delete()
    {
        if ($this->controller->checkSession()) {
            $id    = $this->input->post('id');
            $table = $this->input->post('table');
            $where = array(
                'task_id' => $id
            );
            $this->model->delete($table, $where);
        } else {
            redirect('superadmin/index');
        }
    }

    
    public function change_status_old()
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
            redirect('superadmin/index');
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
            redirect('superadmin/index');
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
                redirect('/superadmin/profile', 'refresh');
                
            }
        } else {
            redirect('superadmin/index');
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
    
    public function add_admin($id = NULL)
    {
        if ($this->controller->checkSession()) {
            //$this->form_validation->set_rules('speciality_name', 'Speciality Name', 'trim|required|is_unique[speciality.name]');
            if (empty($id)) {
                $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[users.email]');
                $this->form_validation->set_rules('password', 'password', 'trim|required');
            } else {
                $this->form_validation->set_rules('email', 'email', 'trim|required');

            }
              $this->form_validation->set_rules('name', 'Admin name', 'trim|required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('errors', validation_errors());
                if (!empty($id)) {
                    $where              = array(
                        'id ' => $id,
                        'user_role' => 2
                    );
                    $data['admin'] = $this->model->getAllwhere('users', $where);
                }
                $data['body'] = 'add_admin';
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
                redirect('superadmin/admin_list');
            }
        } else {
            redirect('superadmin/index');
        }
    }

    public function admin_list()
    {
        if ($this->controller->checkSession()) {
            $data['admin'] = $this->model->getAllwhere('users',array('user_role'=>2));
            $data['body']       = 'admin_list';
            $this->controller->load_view($data);
        } else {
            redirect('superadmin/index');
        }
    }

    public function staff($id = NULL)
    {
        if ($this->controller->checkSession()) {
            //$this->form_validation->set_rules('speciality_name', 'Speciality Name', 'trim|required|is_unique[speciality.name]');
            if (empty($id)) {
                $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[users.email]');
                
                $this->form_validation->set_rules('password', 'password', 'trim|required');

            } else {
                $this->form_validation->set_rules('email', 'email', 'trim|required');
            }
            $this->form_validation->set_rules('name', 'Staff name', 'trim|required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
            $this->form_validation->set_rules('admin_id', 'Admin', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('errors', validation_errors());
                if (!empty($id)) {
                    $where              = array(
                        'id '       => $id,
                        'user_role' => 3
                    );
                    $data['staff'] = $this->model->getAllwhere('users', $where);
                }
                $data['admin_list']  = $this->model->getAllwhere('users',array('user_role' => 2));
                $data['body'] = 'staff';
                $this->controller->load_view($data);
            } else {
                
                $name          = $this->input->post('name');
                $email         = $this->input->post('email');
                $number        = $this->input->post('phone_number');
                $is_active     = $this->input->post('status');
                $password      = md5($this->input->post('password'));
                $admin_id      = $this->input->post('admin_id');
                $data = array(
                    'username' => $name,
                    'email' => $email,
                    'phone_no' => $number,
                    'password'  => $password,
                    'is_active' => $is_active,
                    'created_at' => date('Y-m-d H:i:s'),
                    'admin_id'   => $admin_id,
                    'user_role'  =>3
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
                redirect('superadmin/staff_list');
            }
        } else {
            redirect('superadmin/index');
        }
    }
    
    public function staff_list()
    {
        if ($this->controller->checkSession()) {
            $data['staff'] = $this->model->getAllwhere('users',array('user_role'=>3));

            if(!empty($data['staff'])){
                foreach ($data['staff'] as $key => $value) {
                    
                    $admin_id = $value->admin_id;
                    $name = $this->model->getAllwhere('users',array('id' => $admin_id));
                    if(!empty($name)){
                        $data['staff'][$key]->admin_name  = $name[0]->username;
                    }
                }
            }
           
            $data['body']       = 'staff_list';
            $this->controller->load_view($data);
        } else {
            redirect('superadmin/index');
        }
    }
    
    public function task($id = NULL)
    {

        if ($this->controller->checkSession()) {
            //$this->form_validation->set_rules('speciality_name', 'Speciality Name', 'trim|required|is_unique[speciality.name]');
            
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('url', 'Url', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('time', 'time', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('errors', validation_errors());
                if (!empty($id)) {
                    $where              = array(
                        'task_id' => $id,
                       
                    );
                    $data['task'] = $this->model->getAllwhere('task', $where);
                }

                $data['body'] = 'task';
                $this->controller->load_view($data);
            } else {
                
                $name            = $this->input->post('name');
                $url             = $this->input->post('url');
                $description     = $this->input->post('description');
                $time            = $this->input->post('time');
                $is_active       = $this->input->post('status');
                
                $data = array(
                    'name'          => $name,
                    'url'           => $url,
                    'description'   => $description,
                    'time'          => $time,
                    'is_active'     => $is_active,
                    'created_at'    => date('Y-m-d H:i:s')
                    
                );
                
                if (!empty($id)) {
                    $where = array(
                        'task_id' => $id
                    );
                    unset($data['created_at']);
                   
                    $result = $this->model->updateFields('task', $data, $where);
                } else {
                    $task_id = $this->model->insertData('task', $data);
                    $admin   = $this->model->getAllwhere('users',array('user_role'=>2));
                    $staff  = $this->model->getAllwhere('users',array('user_role'=>3));
                    
                    $days   = round((sizeof($admin))/$time);

                    if(!empty($admin)){
                        foreach ($admin as $key => $value) {
                        $insertData['task_id'] = $task_id;
                        $insertData['assignedto_role_id']  = '2';
                        $insertData['assigned_to'] = $value->id; 
                        $insertData['assigned_by'] =  $this->session->userdata['id'];
                        $insertData['created_at']  = date('Y-m-d H:i:s');
                        $insertData['task_days']   = $days;
                        $insertData['status']      = 1;

                        $userDetail  = $this->model->getAllwhere('users',array('id'=>$value->id));
                     
                        $task_detail  = $this->model->getAllwhere('task',array('task_id'=>$task_id));
                         
                         
                        $task_name           = $task_detail[0]->name;
                        $task_url            = $task_detail[0]->url;
                        $task_description    = $task_detail[0]->description;
                        $task_time           = $days;
                        $name               = $userDetail[0]->username;
                       
                        $message = "hi $name,
                                   Super admin has assign the task for you. Please have a review.
     
                            
                         Your task details are as follows:

                             Task Name              : $task_name,
                             Task Url               : $task_url,
                             Task Description       : $task_description,
                             Task Time              : $task_time
                        
                        Best Regards
                        Super Admin     
                        ";
                         $to_email  = $userDetail[0]->email;
                        
                        $this->email->from('info@onedigi.in', 'Task Assign');
                        $this->email->to($to_email);
                      //  $this->email->to('gaurav.webdesky@gmail.com');
                        $this->email->subject('Task Assign Detail');
                        $this->email->message($message);
                        $this->email->send();   
                        $this->model->insertData('assigned_to',$insertData);
                        }
                    }



                    if(!empty($staff)){
                        foreach ($staff as $key => $value) {
                        $insertData['task_id'] = $task_id;
                        $insertData['assignedto_role_id']  = '3';
                        $insertData['assigned_to'] = $value->id; 
                        $insertData['assigned_by'] =  $this->session->userdata['id'];
                        $insertData['created_at']  = date('Y-m-d H:i:s');
                        $insertData['task_days']   = $days;
                        $insertData['status']      = 1;

                        $userDetail  = $this->model->getAllwhere('users',array('id'=>$value->id));
                     
                        $task_detail  = $this->model->getAllwhere('task',array('task_id'=>$task_id));
                         
                         
                        $task_name           = $task_detail[0]->name;
                        $task_url            = $task_detail[0]->url;
                        $task_description    = $task_detail[0]->description;
                        $task_time           = $days;
                        $name               = $userDetail[0]->username;
                       
                        $message = "hi $name,
                                   Super admin has assign the task for you. Please have a review.
     
                            
                         Your task details are as follows:

                             Task Name              : $task_name,
                             Task Url               : $task_url,
                             Task Description       : $task_description,
                             Task Time              : $task_time
                        
                        Best Regards
                        Super Admin     
                        ";
                         $to_email  = $userDetail[0]->email;
                        
                        $this->email->from('info@onedigi.in', 'Task Assign');
                        $this->email->to($to_email);
                      //  $this->email->to('gaurav.webdesky@gmail.com');
                        $this->email->subject('Task Assign Detail');
                        $this->email->message($message);
                        $this->email->send();   
                        $this->model->insertData('assigned_to',$insertData);
                        }
                    }
                  
                    
                }
                redirect('superadmin/task_list');
            }
        } else {
            redirect('superadmin/index');
        }
    }


    public function task_list()
    {
        if ($this->controller->checkSession()) {
            $data['task'] = $this->model->getAllwhere('task');
            if(!empty($data['task'])){
                foreach ($data['task'] as $key => $value) {

                    $assigned_task = $this->model->getcount('assigned_to',array('status'=>1,'task_id'=>$value->task_id));
                    $completed_task = $this->model->getcount('assigned_to',array('status'=>1,'completed'=>2,'task_id'=>$value->task_id));


                    $percentage = ($completed_task * 100)/$assigned_task;
                   
                    $data['task'][$key]->percentage  = round($percentage,2);
                    $task_id  = $this->model->getAllwhere('assigned_to',array('task_id'=>$value->task_id));
                   if(!empty($task_id)){
                    $data['task'][$key]->assigned_status  = '1';

                    if($task_id[0]->completed==2){
                     if($percentage==100){
                     unset($data['task'][$key]);
                     }
                   }
                   }else{
                    $data['task'][$key]->assigned_status  = '0';
                   }


                }
            }

            
            $data['admin']        = $this->model->getAllwhere('users',array('user_role'=>2),'id,username');

            $data['staff']        = $this->model->getAllwhere('users',array('user_role'=>3),'id,username');
            $data['body']       = 'task_list';
            $this->controller->load_view($data);
        } else {
            redirect('superadmin/index');
        }
    }
   

   public function leads()
    {
        if ($this->controller->checkSession()) {
            $data['leads'] = $this->model->GetJoinRecord('leads', 'entry_by', 'users', 'id', 'leads.*,users.username','');

            
            $data['body']       = 'leads_list';
            $this->controller->load_view($data);
        } else {
            redirect('superadmin/index');
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
            redirect('superadmin/index');
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
            redirect('superadmin/index');
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
            redirect('superadmin/index');
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
                    'created_at' => date('Y-m-d H:i:s'),
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
            redirect('superadmin/index');
        }
    }

    public function size_range_list()
    {
        if ($this->controller->checkSession()) {
            $data['size_range'] = $this->model->getAllwhere('size_range');
            $data['body']       = 'size_range_list';
            $this->controller->load_view($data);
        } else {
            redirect('superadmin/index');
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
                    'created_at' => date('Y-m-d H:i:s'),
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
            redirect('superadmin/index');
        }
    }

    public function budget_range_list()
    {
        if ($this->controller->checkSession()) {
            $data['budget_range'] = $this->model->getAllwhere('budget_range');
            $data['body']       = 'budget_range_list';
            $this->controller->load_view($data);
        } else {
            redirect('superadmin/index');
        }
    }
    

    public function assigntask($id){
        if ($this->controller->checkSession()) {

            $data['task']         = $this->model->getAllwhere('task',array('task_id' => $id));
            if(!empty($data['task'])){
                foreach ($data['task'] as $key => $value) {
                   $task_id  = $this->model->getAllwhere('assigned_to',array('task_id'=>$value->task_id));
                   if(!empty($task_id)){
                    $data['task'][$key]->assigned_status  = '1';
                   }else{
                    $data['task'][$key]->assigned_status  = '0';
                   }
                }
            }
            $data['assigned_detail'] = $this->model->getAllwhere('assigned_to',array('task_id'=>$id,'status'=>1));


            $data['task_detail']  = $this->model->GetJoinRecord('assigned_to','assigned_to','users','id','',array('task_id'=>$id));
            
            $data['admin']        = $this->model->getAllwhere('users',array('user_role'=>2),'id,username');

            $data['staff']        = $this->model->getAllwhere('users',array('user_role'=>3),'id,username');


            
            $data['body']       = 'assigntask';
            $this->controller->load_view($data);
        } else {
            redirect('superadmin/index');
        }
    }

    
    public function task_assign($id){
        if ($this->controller->checkSession()) {
           
            $data = $this->input->post();
            $role = $data['role'];
            $insertData['task_id'] = $id;
            
            if($role =='admin'){
                $insertData['assignedto_role_id']  = '2';
                $insertData['assigned_to'] = $data['admin_id']; 

            }elseif ($role =='staff') {
                $insertData['assignedto_role_id']  = '3';
                $insertData['assigned_to'] = $data['staff_id'];                # 
            }

                $insertData['assigned_by'] =  $this->session->userdata['id'];
                $insertData['created_at']  = date('Y-m-d H:i:s');
                $insertData['status']      = 1;
            
            $task_datail  = $this->model->getAllwhere('task',array('task_id'=>$id));
            $insertData['task_days']  = $task_detail[0]->days;
                $where  = array(
                    'task_id'               => $id,
                    'assigned_to'           => $insertData['assigned_to'],
                    'assignedto_role_id'    =>$insertData['assignedto_role_id']);
                $check = $this->model->getAllwhere('assigned_to',$where);
                if(!empty($check)){
                    $this->session->set_flashdata('error_message','Already Assigned Task to this User');
                    $this->assigntask($id);
                }else{
                 // $task_where = array(
                 //    'task_id' => $id,
                 //    'assignedto_role_id'=>$insertData['assignedto_role_id']
                 //    );
                 // $task_check = $this->model->getAllwhere('assigned_to',$task_where);
                 // if(!empty($task_check)){
                 //    $this->model->updateFields('assigned_to',array('status'=>0),$task_where);
                   
                 // }

                 $this->model->insertData('assigned_to',$insertData);

                  $userDetail  = $this->model->getAllwhere('users',array('id'=>$insertData['assigned_to']));
                     
                    $task_detail  = $this->model->getAllwhere('task',array('task_id'=>$id));
                     
                     
                   $task_name  = $task_detail[0]->name;
                   $task_url   = $task_detail[0]->url;
                   $task_description  = strip_tags($task_detail[0]->description);
                   $task_time  = $task_detail[0]->time;
                   
                   $name  = $userDetail[0]->username;
                   
                    $message = "hi $name,
                               Super admin has assign the task for you. Please have a review.
 
                        
                     Your task details are as follows:

                         Task Name              : $task_name,
                         Task Url               : $task_url,
                         Task Description       : $task_description,
                         Task Time              : $task_time
                    
                    Best Regards
                    Super Admin     
                    ";
                    
                     $to_email  = $userDetail[0]->email;
                    
                     $this->email->from('info@onedigi.in', 'Task Assign');
                    //$this->email->to($to_email);
                    $this->email->to('gaurav.webdesky@gmail.com');
                    $this->email->subject('Task Assign Detail');
                    $this->email->message($message);
                    $this->email->send();
                 $this->assigntasklist();
                 
                 }
        } else {
            redirect('superadmin/index');
        }     
    }


    public function assigntasklist(){
        if ($this->controller->checkSession()) {
            $data['assigntask']  = $this->model->GetJoinRecord('assigned_to','task_id','task','task_id','',array('assigned_to.status'=>1,'assigned_to.completed'=>0));

            if(!empty($data['assigntask'])){
                foreach ($data['assigntask'] as $key => $value) {
                    $datas =$this->model->getAllwhere('users',array('id'=>$value->assigned_to));
                    if(!empty($datas)){
                        $data['assigntask'][$key]->username = $datas[0]->username;
                    }
                  
                }
            }
           
            $data['body']  = 'assigntasklist';
            $this->controller->load_view($data); 
        } else {
            redirect('superadmin/index');
        }  
    }
    
    public function completedtask(){
        if ($this->controller->checkSession()) {
            $data['assigntask']  = $this->model->GetJoinRecord('assigned_to','task_id','task','task_id','',array('assigned_to.completed'=>2));

            if(!empty($data['assigntask'])){
                foreach ($data['assigntask'] as $key => $value) {
                    $datas =$this->model->getAllwhere('users',array('id'=>$value->assigned_to));
                    if(!empty($datas)){
                        $data['assigntask'][$key]->username = $datas[0]->username;
                    }
                  
                }
            }
           
            $data['body']  = 'completedtasklist';
            $this->controller->load_view($data); 
        } else {
            redirect('superadmin/index');
        }  
    }
   
    public function get_search_data(){
        if ($this->controller->checkSession()) {
           
             $start_date = date("Y-m-d", strtotime($this->input->post('start_date')));
             $end_date   = date("Y-m-d", strtotime($this->input->post('end_date')));
             $role       = $this->input->post('role');
           // $entry_by   = $this->session->userdata('id');
             $where = array();
             if(!empty($role)){
                $where['assignedto_role_id'] =$role;
             }
             if (!empty($this->input->post('start_date'))) {
                $where['assigned_to.created_at>='] =$start_date;
                 
             }
             if (!empty($this->input->post('end_date'))) {
                $where['assigned_to.created_at<='] =$end_date;
                 
             }
             $where['assigned_to.status'] = 1;
             $where['assigned_to.completed'] = 0;
             $data['assigntask']  = $this->model->GetJoinRecord('assigned_to','task_id','task','task_id','',$where);

            
           

            if(!empty($data['assigntask'])){
                foreach ($data['assigntask'] as $key => $value) {
                    $datas =$this->model->getAllwhere('users',array('id'=>$value->assigned_to));
                    if(!empty($datas)){
                        $data['assigntask'][$key]->username = $datas[0]->username;
                    }
                  
                }
            }
           

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
             $role       = $this->input->post('role');
           // $entry_by   = $this->session->userdata('id');
             $where = array();
             if(!empty($role)){
                $where['assignedto_role_id'] =$role;
             }
             if (!empty($this->input->post('start_date'))) {
                $where['assigned_to.created_at>='] =$start_date;
                 
             }
             if (!empty($this->input->post('end_date'))) {
                $where['assigned_to.created_at<='] =$end_date;
                 
             }
             
            $where['assigned_to.completed'] = 2;


            $data['assigntask']  = $this->model->GetJoinRecord('assigned_to','task_id','task','task_id','',$where);

                if(!empty($data['assigntask'])){
                foreach ($data['assigntask'] as $key => $value) {
                    $datas =$this->model->getAllwhere('users',array('id'=>$value->assigned_to));
                    if(!empty($datas)){
                        $data['assigntask'][$key]->username = $datas[0]->username;
                    }
                  
                }
            }
            
           

            if(!empty($data)){
                echo json_encode($data);
            }
            
        } else {
            redirect('superadmin/index');
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
                $where['task.created_at>='] =$start_date;
                 
             }
             if (!empty($this->input->post('end_date'))) {
                $where['task.created_at<='] =$end_date;
                 
             }
            $data['task'] = $this->model->getAllwhere('task',$where);
            if(!empty($data['task'])){
                foreach ($data['task'] as $key => $value) {

                   $assigned_task = $this->model->getcount('assigned_to',array('status'=>1,'task_id'=>$value->task_id));
                    $completed_task = $this->model->getcount('assigned_to',array('status'=>1,'completed'=>2,'task_id'=>$value->task_id));


                    $percentage = ($completed_task * 100)/$assigned_task;
                   
                    $data['task'][$key]->percentage  = $percentage;
                   $task_id  = $this->model->getAllwhere('assigned_to',array('task_id'=>$value->task_id));
                   if(!empty($task_id)){
                    $data['task'][$key]->assigned_status  = '1';
                   }else{
                    $data['task'][$key]->assigned_status  = '0';
                   }
                }
            }
            

            if(!empty($data)){
                echo json_encode($data);
            }
            
        } else {
            redirect('superadmin/index');
        }  
    }

    public function multiple_task_assigned(){
        if ($this->controller->checkSession()) {
            $data  = $this->input->post();
            
            $role  = $data['role'];
                if($role =='admin'){
                    $insertData['assignedto_role_id']  = '2';
                    

                }elseif ($role =='staff') {
                    $insertData['assignedto_role_id']  = '3';
                              # 
                }

                $insertData['assigned_by'] =  $this->session->userdata['id'];
                $insertData['created_at']  = date('Y-m-d H:i:s');
                $insertData['status']      = 1;
                $insertData['assigned_to'] =  $data['assigned_to'];
                $task_id  = $this->input->post('task_id');
                foreach ($task_id as $key => $value) {
                      $task_datail  = $this->model->getAllwhere('task',array('task_id'=>$value));
                    $insertData['task_days']  = $task_detail[0]->days;
                    $insertData['task_id']  = $value;
                    $where  = array(
                        'task_id'               => $value,
                        'assigned_to'           => $insertData['assigned_to'],
                        'assignedto_role_id'    => $insertData['assignedto_role_id']);
                    $check = $this->model->getAllwhere('assigned_to',$where);
                    if(!empty($check)){
                        // $this->session->set_flashdata('error_message','Already Assigned Task to this User');
                        // $this->assigntask($id);
                    }else{
                     // $task_where = array(
                     //    'task_id' => $value,
                     //    'assignedto_role_id'=>$insertData['assignedto_role_id']
                     //    );
                     // $task_check = $this->model->getAllwhere('assigned_to',$task_where);
                     // if(!empty($task_check)){
                     //    $this->model->updateFields('assigned_to',array('status'=>0),$task_where);
                       
                     // }
                    $userDetail  = $this->model->getAllwhere('users',array('id'=>$insertData['assigned_to']));
                     
                    $task_detail  = $this->model->getAllwhere('task',array('task_id'=>$value));
                     
                     
                   $task_name  = $task_detail[0]->name;
                   $task_url   = $task_detail[0]->url;
                   $task_description  = $task_detail[0]->description;
                   $task_time  = $task_detail[0]->time;
                    $name  = $userDetail[0]->username;
                   
                    $message = "hi $name,
                               Super admin has assign the task for you. Please have a review.
 
                        
                     Your task details are as follows:

                         Task Name              : $task_name,
                         Task Url               : $task_url,
                         Task Description       : $task_description,
                         Task Time              : $task_time
                    
                    Best Regards
                    Super Admin     
                    ";
                     $to_email  = $userDetail[0]->email;
                    
                     $this->email->from('info@onedigi.in', 'Task Assign');
                    $this->email->to($to_email);
                  //  $this->email->to('gaurav.webdesky@gmail.com');
                    $this->email->subject('Task Assign Detail');
                    $this->email->message($message);
                    $this->email->send();   
                    $this->model->insertData('assigned_to',$insertData);
                     
                }
                     echo  "1";
        } 
        }else {
            redirect('superadmin/index');
        }  
    }


    public function task_history(){
        if ($this->controller->checkSession()) {
           $data['task_history']  = $this->model->GetJoinRecord('assigned_to','task_id','task','task_id','','');


            if(!empty($data['task_history'])){
                foreach ($data['task_history'] as $key => $value) {
                    $datas =$this->model->getAllwhere('users',array('id'=>$value->assigned_to));
                    if(!empty($datas)){
                        $data['task_history'][$key]->username = $datas[0]->username;
                    }
                  
                }
            }

        $data['body']  = 'task_history';
        $this->controller->load_view($data); 
        }else {
            redirect('superadmin/index');
        }  
    }


    public function change_status(){
        if ($this->controller->checkSession()) {

            $data = $this->input->post();
            $table  = $data['table'];
            $status = $data['status'];
            $id     = $data['user_id'];
            $where  = array(
                'id' => $id
            );
            $data   = array(
                'is_active' => $status
            );
            $result = $this->model->updateFields($table, $data, $where);
            }else {
            redirect('superadmin/index');
        } 
    }

    public function admin_detail($id){
        if ($this->controller->checkSession()) {
            $data['user_detail'] = $this->model->getAllwhere('users',array('id'=>$id)); 
            $data['task_detail']  = $this->model->GetJoinRecord('assigned_to','task_id','task','task_id','',array('assigned_to'=>$id));

            $data['body']       = 'admin_detail';
            $this->controller->load_view($data);
            
        } else {
            redirect('superadmin/index');
        }
    }

    public function staff_detail($id){
        if ($this->controller->checkSession()) {
            $data['user_detail']  = $this->model->getAllwhere('users',array('id'=>$id)); 
            $data['task_detail']  = $this->model->GetJoinRecord('assigned_to','task_id','task','task_id','',array('assigned_to'=>$id));

            $data['body']       = 'staff_detail';
            $this->controller->load_view($data);
            
        } else {
            redirect('superadmin/index');
        }
    }

    public function complete_task(){
        if ($this->controller->checkSession()) {

            $data = $this->input->post();
            $id  = $data['id'];
            
            $where  = array(
                'assigned_id' => $id
            );
            $data   = array(
                'completed' => 2
            );
            $result = $this->model->updateFields('assigned_to', $data, $where);
            }else {
            redirect('superadmin/index');
        } 
    }
    
}