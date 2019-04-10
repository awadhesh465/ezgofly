<?php 	
        $this->load->view("../../../../common/site_header");
         $this->load->view("frontend/".$body);
        $this->load->view("../../../../common/site_footer");

		/*
		$this->load->view("../../../../common/admin_header");
	  	$this->load->view('superadmin/common/admin_sidebar');
	  	$this->load->view("superadmin/".$body);
	  	$this->load->view("../../../../common/admin_footer");   
	  	*/

?>
<?php
//#################################################################
//SCAN CONTENT
//#################################################################
function findURLTurnToClickableLink($string){
  
  //FIND URLS INSIDE TEXT
  //The Regular Expression filter
  $reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";
  
  // Check if there is a url in the text
  if(preg_match($reg_exUrl, $string, $url)) {
    
      if(strpos( $url[0], ":" ) === false){
        $link = 'http://'.$url[0];
      }else{
        $link = $url[0];
      }
      
       // make the urls hyper links
       $string = preg_replace($reg_exUrl, '<a href="'.$link.'" title="'.$url[0].'" target="_blank" class="blue-link">'.$url[0].'</a>', $string);
  
  }
  
  return $string;
}
?>
