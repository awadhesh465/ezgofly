<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller
{   
    var $data  = [];
    function __construct()
    {
        parent::__construct();

    }

    public function index($msg = NULL)
    { 
        
        $data['settings']      = $this->session->userdata('settings');
        $data['body']          = 'home';
        
        $this->controller->load_view($data);
    }

    public function aeromexico(){
    	$data['body']          = 'aeromexico';
        $this->controller->load_view($data);
    }

    public function amsterdam(){
    	$data['body']          = 'amsterdam';
        $this->controller->load_view($data);
    }

    public function canada(){
    	$data['body']          = 'canada';
        $this->controller->load_view($data);
    }
   	

   	public function bangkok(){
    	$data['body']          = 'bangkok';
        $this->controller->load_view($data);
    }

    public function about(){
    	$data['body']          = 'about';
        $this->controller->load_view($data);
    }

    public function credit(){
    	$data['body']          = 'credit';
        $this->controller->load_view($data);
    }

    public function cruise(){
    	$data['body']          = 'cruise';
        $this->controller->load_view($data);
    }

    public function contact(){
    	$data['body']          = 'contact';
        $this->controller->load_view($data);
    }
    
    public function faq(){
        $data['body']          = 'faq';
        $this->controller->load_view($data);   
    }

    public function insurance(){
        $data['body']          = 'insurance';
        $this->controller->load_view($data);   

    }

    public function privacy(){
        $data['body']          = 'privacy';
        $this->controller->load_view($data);        
    }

    public function terms(){
        $data['body']          = 'terms';
        $this->controller->load_view($data);   
    }
    
    public function get_airport(){
        $value  = $this->input->post('value');
        
        $where = "AirportCode LIKE '$value%' OR CityName LIKE '$value%'";
        $data  = $this->model->getAllwhere('cities',$where);
        
        echo json_encode($data);
    }


    public function search_page(){
        $form_data                  = $this->input->post();
      
        $data['search_page_data']   = $form_data;
        

       // $data['body']               = 'search_page';
         $this->load->view('frontend/search_page', $data);
      //  $this->controller->load_view($data); 
    }
    public function flight_search(){
        $data        = $this->input->post();

        $tripType    = $data['optradio'];
        $source      = $data['from_city_code'];
        $Destination = $data['to_city_code'];
        $date        = $data['date'];
        $class       = $data['trip_class'];
        $adult       = $data['adult'];
        $children    = $data['children'];
        $infant      = $data['infant'];
        
        $newDate = date("d-m-Y", strtotime($date));
       
        if($tripType=='oneway'){
            $url = "http://flightapi.milpl.in/Flights.svc/Search";



            $jsonobject = '{"ApiKey": "5b113dc3-33d4-4cfd-aa3b-2ab8b625aa37", "Sectors":[{ "Source": "'."$source".'", "Destination": "'."$Destination".'","Date":"'."$newDate".'"}], "TripType":"I", "Class": "'."$class".'", "PrefAir":"", "Adult":'.$adult.', "Child":'.$children.', "Infant":'.$infant.', "Output":"json"}';
            
            $length   = strlen($jsonobject);
            $options = array(
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Content-Length:".$length));
            $defaults = array(
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_URL => $url,
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FORBID_REUSE => 1,
            /*CURLOPT_TIMEOUT => 4,*/
            CURLOPT_POSTFIELDS => $jsonobject
            );
            $ch = curl_init();
            curl_setopt_array($ch, ($options + $defaults));
            $output = curl_exec($ch);
            $err=curl_error($ch);
            curl_close($ch);
            if($err)
            {
            echo "error";
            echo $err;
            }
            else
            {
            
            $data['search_data']  = json_decode($output);
            
            $data['body']          = 'flights_detail';
            $this->controller->load_view($data);   
            }
        }else{

            $url = "http://flightapi.milpl.in/Flights.svc/Search";
            $return = $data['flight_date_return'];
            $return_newDate = date("d-m-Y", strtotime($return));

            $jsonobject = '{"ApiKey": "5b113dc3-33d4-4cfd-aa3b-2ab8b625aa37", "Sectors":[{ "Source": "'."$source".'", "Destination": "'."$Destination".'","Date":"'."$newDate".'"},{ "Source": "'."$Destination".'", "Destination": "'."$source".'","Date":"'."$return_newDate".'"}], "TripType":"I", "Class": "'."$class".'", "PrefAir":"", "Adult":'.$adult.', "Child":'.$children.', "Infant":'.$infant.', "Output":"json"}';
            echo $jsonobject;
            $length   = strlen($jsonobject);
            $options = array(
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Content-Length:".$length));
            $defaults = array(
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_URL => $url,
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FORBID_REUSE => 1,
            /*CURLOPT_TIMEOUT => 4,*/
            CURLOPT_POSTFIELDS => $jsonobject
            );
            $ch = curl_init();
            curl_setopt_array($ch, ($options + $defaults));
            $output = curl_exec($ch);
            $err=curl_error($ch);
            curl_close($ch);
            if($err)
            {
            echo "error";
            echo $err;
            }
            else
            {

            $data['search_data']  = json_decode($output);
            $data['body']          = 'flights_detail_return';
          
            $content =  $this->controller->load_view($data);

            return $content;

            }
        }
    }

    public function search_data_form(){
       
        $data['search_data']   = $_GET['array'];

            
         $data['body']          = 'search_data_form';
        $this->controller->load_view($data);   
    }


    public function mail_send(){
        echo "<pre>";
        print_r($this->input->post());
            $message = '<html><body>';
            $message .= '<h1>Hello, World!</h1>';
            $message .= '</body></html>';
            $message = '<html><body>';
            
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td></td></tr>";
            $message .= "<tr><td><strong>Email:</strong> </td><td>/td></tr>";
            $message .= "<tr><td><strong>Type of Change:</strong> </td><td></td></tr>";
            $message .= "<tr><td><strong>Urgency:</strong> </td><td>/td></tr>";
            $message .= "<tr><td><strong>URL To Change (main):</strong> </td><td></td></tr>";
           
          
          
            $message .= "<tr><td><strong>NEW Content:</strong> </td><td></td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
            $to = "gaurav.webdesky@gmail.com";
            $subject = "My subject";
          
            $headers = "From: info@webdesky.com" . "\r\n" .
            "CC: somebodyelse@example.com";

          if(mail($to,$subject,$message,$headers)){
            echo "mail_send";
          }else{
            echo "mail_not_send";
          }
    }
}