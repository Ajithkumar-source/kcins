<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
require APPPATH . '/libraries/PHPMailer_Lib.php';
class Main extends Basecontroller {

	public function __construct()
    {
        parent::__construct();
        
        
        $this->load->model('user_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        is_logged_in();
    }

	public function index()
	{
		$data['title'] = "KCINS-Dashboard";
		$this->loadViews('Dashboard', $data,NULL,NULL);
   
      
	}
        
    function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        

        // Add a recipient
        $mail->addAddress('');

        // Add cc or bcc 
        //$mail->addCC('ajithkumar.n@yandex.com');
        //$mail->addBCC('ajithkumar.n@yandex.com');

        // Email subject
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email send for Ajithkumar from smtpmail .</p>";
        $mail->Body = $mailContent;

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    } 

    function send_renewalpolicy()
    {

        if($this->input->post('pid'))
      {
        $this->load->model('User_Model');
        $policy= $this->user_model->getpolicyByPId($this->input->post('pid'));
        $client=$this->user_model->getClientByCId($policy->cid);
        $value=$client->email;
        $pto=$policy->pto;
        $convertDate = date("d-m-Y", strtotime($pto));
        
    if($value){
        
        
            // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();


        // Add a recipient
        $mail->addAddress($value);

        // Add cc or bcc 
        //$mail->addCC('ajithkumar.n@yandex.com');
        //$mail->addBCC('ajithkumar.n@yandex.com');

        // Email subject
        $mail->Subject = 'Renewal Policy';

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<h1>Your Insurance policy expired date $convertDate </h1>
            <p>policy renewal date expired please renewal the policy.</p>";
        $mail->Body = $mailContent;

        
    

        // Send email
        if(!$mail->send()){
            $data['status']="false";
            $data['message']="$mail->ErrorInfo";
        }else{
            $data['status']="true";
            $data['message']="success";
        }

        }
     else{
        $data['status']="false";
        $data['message']="Client Does Not Have Email";
       
      }
      echo json_encode($data);

    // echo "msg";
    }
}

function multiple_renewalpolicy()
    {
        
        
        
        $pids=json_decode($this->input->post('pid'),true);

        if($this->input->post('pid'))
      {
        $this->load->model('User_Model');
        $data=array();
         foreach($pids as $pid){
        $policy= $this->user_model->getpolicyByPId($pid);
        $client=$this->user_model->getClientByCId($policy->cid);
        $value=$client->email;
        $pto=$policy->pto;
        
    if($value){
        
        
            // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();


        // Add a recipient
        $mail->addAddress($value);

        // Add cc or bcc 
        //$mail->addCC('ajithkumar.n@yandex.com');
        //$mail->addBCC('ajithkumar.n@yandex.com');

        // Email subject
        $mail->Subject = 'Renewal Policy';

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<h1>Your Insurance policy expired date $pto</h1>
            <p>policy renewal date expired please renewal the policy.</p>";
        $mail->Body = $mailContent;

        // Send email

        // if(!$mail->send()){
        //     $data1['status']="false";
        //     $data1['message']="$mail->ErrorInfo";
        //     $data[]=$data1;
        // }else{
        //     $data1['status']="true";
        //     $data1['message']="success";
        //     $data[]=$data1;
        // }

            $data1['status']="true";
            $data1['message']="success";
            $data[]=$data1;

        }
     else{
        $data1['status']="false";
        $data1['message']="Client Does Not Have Email";
        $data[]=$data1;
      }
      

    // echo "msg";
    }
    echo json_encode($data);
}     
} 

function sendmail()
{
   

    // $from_email = $_POST['from_email'];
    $to_email = $_POST['to_email'];
    $subject = $_POST['sub'];
    $data=array();
    $mstatus=0;
    if($to_email){
        
        foreach($to_email as $tmail){


        // Load PHPMailer library
    $this->load->library('phpmailer_lib');

    // PHPMailer object
    $mail = $this->phpmailer_lib->load();


    // Add a recipient
    $mail->addAddress($tmail);

    // Add cc or bcc 
    // $mail->addCC('ajithkumar.n@yandex.com');
    // $mail->addBCC('ajithkumar.n@yandex.com');

    // Email subject
    $mail->Subject = $subject;


    $ckeditor_content = $_POST['editor'];

    // Set email format to HTML
    $mail->isHTML(true);

    // Email body content
    //    $mailcontent="hiii";
    $mail->Body = $ckeditor_content;

    
    //  Create a plain text version of the email body
    $mail->AltBody = strip_tags($ckeditor_content);

    // Send email

    if(!$mail->send()){
        $data1['status']="false";
        $data1['message']="$mail->ErrorInfo";
        $data[]=$data1;
        $mstatus=0;
    }else{
        $data1['status']="true";
        $data1['message']="success";
        $data[]=$data1;
        $mstatus=1;
    }

       
    }
    }
 else{
    $data1['status']="false";
    $data1['message']="Client Does Not Have Email";
    $data[]=$data1;
  } 
  if($mstatus)
                {
                    $this->session->set_flashdata('success', 'Email sent Successfully'.$val);
                }
                else
                {
                    $this->session->set_flashdata('error', 'Email sent Failed');
                }
  redirect("email");

}

function sendsms()
{
// Authorisation details.
$username = "";
$hash = "cb0434e55ae8215b0eca7c2ea2b25b78f684b80710c8a9343cedaf5f6a510ac0";

// Config variables. Consult http://api.textlocal.in/docs for more info.
$test = "1";

// Data for text message. This is the text message data.
$sender = ""; // This is who the message appears to be from.
$numbers = ""; // A single number or a comma-seperated list of numbers
$message = "This is a test message from the PHP API script.";
// 612 chars or less
// A single number or a comma-seperated list of numbers
$message = urlencode($message);
$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
$ch = curl_init('http://api.textlocal.in/send/?');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); // This is the result from the API
curl_close($ch);

}


 function email()
    {  
        
   

         $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("emailview", $permissions)) {
            
             $data['title'] = "KCINS-Email";

             $data['toemail'] = $this->user_model->getinsname();

             $this->loadViews("email", $data,  NULL);
       }else{
        redirect("dashboard");
    }
    
        
    }   
    function sms()
    {  
        

         $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("smsview", $permissions)) {
            
             $data['title'] = "KCINS-SMS";

             $data['tosms'] = $this->user_model->getinsname();

             $this->loadViews("sms", $data,  NULL);
       }else{
        redirect("dashboard");
    }
    
        
    }  

    function clients()
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("clientview", $permissions)) {
        
            $data['title'] = "KCINS-Clients";

            $data['name'] = $this->user_model->getcareof();

            $data['rep'] = $this->user_model->getRep();
            
            $this->loadViews("clients", $data,  NULL);
                 
    }else{
        redirect("dashboard");
    }
    
        
    }
        
    function clientdocs($id)
    {
        
            $data['title'] = "KCINS-Client Documents";

            $data['client'] = $this->user_model->getClientById($id);

            $data['doctype'] = $this->user_model->getdoctypeBycat("Client");

            $this->loadViews("clientdocs", $data,  NULL);
        
    }
    
    function policydocs($pid)
    {
        
            $data['title'] = "KCINS-Policy Documents";

            $data['policy'] = $this->user_model->getpolicyByPId($pid);

            $data['doctype'] = $this->user_model->getdoctypeBycat("Policy");


            $this->loadViews("policydocs", $data,  NULL);
        
    }
    
    function careof()
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("careview", $permissions)) {
        
            $data['title'] = "KCINS-Careof";

            $data['rep'] = $this->user_model->getRep();
            
            $this->loadViews("careof", $data,  NULL);
    
            
    }else{
        redirect("dashboard");
    }
     
    }
    
    function policies()
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("policyview", $permissions)) {
        
            $data['title'] = "KCINS-Policy Management";

            $data['rep'] = $this->user_model->getRep();

            $data['inscompany'] = $this->user_model->getinscompany();

            $data['name'] = $this->user_model->getinsname();

            $data['cname'] = $this->user_model->getcareof();
            
            $this->loadViews("policies", $data,  NULL);

                 
    }else{
        redirect("dashboard");
    }
    
        
    }

    function claims()

    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimview", $permissions)) {
        
        $data['title'] = "KCINS-Claims Management";

        $data['rep'] = $this->user_model->getRep();

        $data['name'] = $this->user_model->getinsname();

        $data['cname'] = $this->user_model->getcareof();

        $data['ctype'] = $this->user_model->getclaimtype();
        
        $this->loadViews("claims", $data,  NULL);

        
    }else{
        redirect("dashboard");
    }
    
}
    function renewal()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("renewview", $permissions)) {
        
            $data['title'] = "KCINS-Renewal Management";

            $data['rep'] = $this->user_model->getRep();

            $data['inscompany'] = $this->user_model->getinscompany();

            $data['name'] = $this->user_model->getinsname();

            $data['cname'] = $this->user_model->getcareof();

            
            $this->loadViews("renewal", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }

    function leading()
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("leadview", $permissions)) {
        
        
            $data['title'] = "KCINS-Leading Management";

            // $data['sum'] = $this->user_model->sum();
            $data['rep'] = $this->user_model->getRep();

            $data['inscompany'] = $this->user_model->getinscompany();

            $data['name'] = $this->user_model->getinsname();

            $this->loadViews("leading", $data, NULL);
            
            // $sql = 'SELECT SUM(TPREM) FROM `policy` WHERE INSCOMPANY';
            // $query = $this->db->query($sql);
            // return $query->num_rows();
            
         
        }else{
            redirect("dashboard");
        }   
        
    }
    
    function rep()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("repview", $permissions)) {
        
            $data['title'] = "KCINS-Representatives";
            
            $data['rep'] = $this->user_model->getRep();
            
            $this->loadViews("represent", $data,  NULL);

                 
        }else{
            redirect("dashboard");
        }
        
    }

    function quote()
    {
        
            $data['title'] = "KCINS-Quotation";
            
           
            $this->loadViews("quote", $data,  NULL);
        
    }

    function inscompany()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("insview", $permissions)) {
        
            $data['title'] = "KCINS-Insurance Companies";
            
            $data['inscompany'] = $this->user_model->getinscompany();
            
            $this->loadViews("inscompany", $data,  NULL);
                       
        }else{
            redirect("dashboard");
        }
        
    }

    
     function getpno(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
  
        // Get Policytype
        $response = $this->user_model->getpno($searchTerm);
  
        echo json_encode($response);
     }

     function getmail(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
  
        // Get Policytype
        $response = $this->user_model->getmail($searchTerm);
  
        echo json_encode($response);
     }
     function getpytype(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
  
        // Get Policytype
        $response = $this->user_model->getpytype($searchTerm);
  
        echo json_encode($response);
     }
      function gettype(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
  
        // Get Policytype
        $response = $this->user_model->gettype($searchTerm);
  
        echo json_encode($response);
     }

      function getctype(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
  
        // Get Policytype
        $response = $this->user_model->getctype($searchTerm);
  
        echo json_encode($response);
     }

      function getclaimsubtype(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
  
        // Get Policytype
        $response = $this->user_model->getclaimsubstype($searchTerm);
  
        echo json_encode($response);
     }


      function getcompany(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
  
        // Get Policytype
        $response = $this->user_model->getcompany($searchTerm);
  
        echo json_encode($response);
     }

     
      function getmodels(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
  
        // Get Policytype
        $response = $this->user_model->getmodels($searchTerm);
  
        echo json_encode($response);
     }
      function getres(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
  
        // Get Policytype
        $response = $this->user_model->getres($searchTerm);
  
        echo json_encode($response);
     }
      function getcare(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
  
        // Get Policytype
        $response = $this->user_model->getcare($searchTerm);
  
        echo json_encode($response);
     }

      function geticompany(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
  
        // Get insurancecompany
        $response = $this->user_model->geticompany($searchTerm);
  
        echo json_encode($response);
     }
     
      function getiname(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
  
        // Get Policytype
        $response = $this->user_model->getiname($searchTerm);
  
        echo json_encode($response);
     }

    

     function pytype()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("policytview", $permissions)) {          
       
            $data['title'] = "KCINS-Policy Types";
            
            $data['pytype'] = $this->user_model->getpolicytype();
            
            $this->loadViews("pytype", $data,  NULL);
        }else{
            redirect("dashboard");
        }
        
    }



    function stype()
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("subview", $permissions)) {          
       
        
            $data['title'] = "KCINS-Policy SubTypes";
            
            $data['stype'] = $this->user_model->getstype();

            $this->loadViews("stype", $data,  NULL);
        }else{
            redirect("dashboard");
        }
        
    }

    
    function ctype()
    {
        
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimtview", $permissions)) {      
        
            $data['title'] = "KCINS-Claim Types";
            
            $data['ctype'] = $this->user_model->getclaimtype();
            
            $this->loadViews("ctype", $data,  NULL);
        }else{
            redirect("dashboard");
        }
        
    }

    function cstype()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimsview", $permissions)) {      
        
            $data['title'] = "KCINS-Claim SubTypes";
            
            $data['cstype'] = $this->user_model->getcstype();
            
            $this->loadViews("cstype", $data,  NULL);
        }else{
            redirect("dashboard");
        }
    }

    function vcompany()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("vehview", $permissions)) {      
        
            $data['title'] = "KCINS-Vehicle Company";
            
            $data['vcompany'] = $this->user_model->getmake();

            $data['vcompany'] = $this->user_model->getmodel();
            
            $this->loadViews("vcompany", $data,  NULL);
        }else{
            redirect("dashboard");
        }
        
    }
    function doctype()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("docview", $permissions)) { 
            $data['title'] = "KCINS-Document Types";
            
            $data['doctype'] = $this->user_model->getdoctype();
            
            $this->loadViews("doctype", $data,  NULL);
           
        }else{
            redirect("dashboard");
        }
        
    }
    function nmtype()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("nmview", $permissions)) { 

            $data['title'] = "KCINS-Non-Motor Types";
            
            $data['nmtype'] = $this->user_model->getnmtype();
            
            $this->loadViews("nmtype", $data,  NULL);
           
        }else{
            redirect("dashboard");
        }
        
    }
    function users()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("userview", $permissions)) { 
        
            $data['title'] = "KCINS-Users";
            
            $data['usr'] = $this->user_model->getUsers();
            
            $this->loadViews("users", $data,  NULL);
           
        }else{
            redirect("dashboard");
        }
        
    }
   
    // function admin()
    // {
        
    //         $data['title'] = "KCINS-Users";
            
    //         $data['usr'] = $this->user_model->getadmin();
            
    //         $this->loadViews("editadmin", $data,  NULL);
        
    // }
   
    
    function addclient()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("clientadd", $permissions)) {

            $data['title'] = "KCINS-Add Client";
            
            $data['rep'] = $this->user_model->getRep();

            $data['name'] = $this->user_model->getcareof();
            
            $this->loadViews("addclient", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
   
    function addcareof()
    {

            $permissions=json_decode($this->session->userdata('permissions'), true);

            // print_r($permissions);
        
            if (array_key_exists("careadd", $permissions)) {
            $data['title'] = "KCINS-Add Careof";
            
            $data['rep'] = $this->user_model->getRep();

            $this->loadViews("addcareof", $data,  NULL);

            }else{
                redirect("dashboard");
            }
        
    }
    
    function addpolicy()
    {  
        
        
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("policyadd", $permissions)) {

            $data['title'] = "KCINS-Add Policy";
            
            $data['rep'] = $this->user_model->getRep();

            $data['inscompany'] = $this->user_model->getinscompany();

            $data['vcompany'] = $this->user_model->getmake();

            $data['name'] = $this->user_model->getinsname();

            $data['cname'] = $this->user_model->getcareof();
            
            $data['pytype'] = $this->user_model->getpolicytype();

            $data['nmtype'] = $this->user_model->getnmtype();

            $data['status']= json_decode($this->user_model->fetch_stype("1"));


            $this->loadViews("addpolicy", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
   
    
    function addclaims()
    {
        
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimadd", $permissions)) {

            $data['title'] = "KCINS-Add Claims";
            
            $data['rep'] = $this->user_model->getRep();

            $data['name'] = $this->user_model->getinsname();

            $data['cname'] = $this->user_model->getcareof();

            $data['ctype'] = $this->user_model->getclaimtype();

         
            $this->loadViews("addclaims", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
    function viewpolicy($pid)
    {
         
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("policyview", $permissions)) {

            $data['title'] = "KCINS-View Policy";
            
            $data['policy'] = $this->user_model->getpolicyByPId($pid);
            
            $data['rep'] = $this->user_model->getRep();
            
            $data['inscompany'] = $this->user_model->getinscompany();

            $data['vcompany'] = $this->user_model->getmake();

            $data['name'] = $this->user_model->getinsname();

            $data['cname'] = $this->user_model->getcareof();

            $data['pytype'] = $this->user_model->getpolicytype();

            $this->loadViews("viewpolicy", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
    
    function addrep()
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("repadd", $permissions)) {
        
            $data['title'] = "KCINS-Add Representative";
            
            $data['rep'] = $this->user_model->getRep();
            
            $this->loadViews("addrep", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }

 
    function addinscompany()
    {
        
        
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("insadd", $permissions)) {

            $data['title'] = "KCINS-Add Insurance company";
            
            $data['inscompany'] = $this->user_model->getinscompany();
            
            $this->loadViews("addinscompany", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
    function addpytype()
    {

         
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("policytadd", $permissions)) {
        
            $data['title'] = "KCINS-Add Policy Type";
            
            $data['pytype'] = $this->user_model->fetch_pytype();
            
            $this->loadViews("addpytype", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
    function addstype()
    {
        
           
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("subadd", $permissions)) {
        
            $data['title'] = "KCINS-Add Policy Subtype";
            
            $data['stype'] = $this->user_model->getstype();

            $data['pytype'] = $this->user_model->getpolicytype();
            
            $this->loadViews("addstype", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }

    function addctype()
    {
            
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimtadd", $permissions)) {
        
            $data['title'] = "KCINS-Add Claim Type";
            
            $data['ctype'] = $this->user_model->fetch_ctype();
            
            $this->loadViews("addctype", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }

    function addcstype()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimsadd", $permissions)) {
        
            $data['title'] = "KCINS-Add Claim SubType";
            
            $data['ctype'] = $this->user_model->getclaimtype();

            $data['cstype'] = $this->user_model->getcstype();
            
            $this->loadViews("addcstype", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }

    function addvcompany()
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("vehadd", $permissions)) {
        
        
            $data['title'] = "KCINS-Add Vehicle Company";
            
            $data['vcompany'] = $this->user_model->getmake();
            
            $this->loadViews("addvcompany", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
    function adddoctype()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("docadd", $permissions)) {
        
            $data['title'] = "KCINS-Add Document Types";
            
            $data['doctype'] = $this->user_model->getdoctype();
            
            $this->loadViews("adddoctype", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }

    function add_nmtype()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("nmadd", $permissions)) {

            $data['title'] = "KCINS-Add Non-Motor Types";
            
            $data['nmtype'] = $this->user_model->getnmtype();
            
            $this->loadViews("add_nmtype", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
    function adduser()
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("docadd", $permissions)) {
            
            $data['title'] = "KCINS-Add User";
            
            $data['usr'] = $this->user_model->getUsers();
            
            $this->loadViews("adduser", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
    
   
    function viewclient($id)
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("clientview", $permissions)) {

            $data['title'] = "KCINS-View Client";
            
            $data['client'] = $this->user_model->getClientById($id);
            
            $data['rep'] = $this->user_model->getRep();

            $data['name'] = $this->user_model->getcareof();

            $this->loadViews("viewclient", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
     function view_cfile($docname)
{
    $file = site_url()."uploads/client/".$docname;
    $ft=getcwd()."uploads//client//".$docname;
    $filename = $file; 
    $ctype=mime_content_type(getcwd()."/uploads//client//".$docname);
  //echo $ctype;
    header('Pragma: public');
    header('Expires: 0');
    header('Content-Type: '.$ctype);
    header('Content-Disposition: inline; filename="'.basename($file).'"');
    header('Content-Transfer-Encoding: binary');
    //header('Content-Length' . filesize($file));
    readfile($file);
}
 function view_pfile($docname)
//if($file=application/pdf)
{
    $file = site_url()."uploads/policy/".$docname;
    $ft=getcwd()."uploads//policy//".$docname;
    $filename = $file; 
    $ctype=mime_content_type(getcwd()."/uploads//policy//".$docname);
    
    header('Pragma: public');
    header('Expires: 0');
    header('Content-Type: '.$ctype);
    header('Content-Disposition: inline; filename="'.basename($file).'"');
    header('Content-Transfer-Encoding: binary');
   // header('Content-Length' . filesize($file));
    
    readfile($file);
 }
    

    function viewclaims($sno)
    {
        
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimview", $permissions)) {

            $data['title'] = "KCINS-View Client";
            
            $data['claims'] = $this->user_model->getClaimsById($sno);
            
            $data['rep'] = $this->user_model->getRep();
            
            $data['cname'] = $this->user_model->getcareof();

            $this->loadViews("viewclaims", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
    function viewcareof($id)
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("careview", $permissions)) {

            $data['title'] = "KCINS-View Careof";
            
            $data['careof'] = $this->user_model->getCareofById($id);
            
            $data['rep'] = $this->user_model->getRep();
            
            $this->loadViews("viewcareof", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
    function editclient($id)
    {
        
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("clientedit", $permissions)) {

            $data['title'] = "KCINS-Edit Client";
             
            $data['client'] = $this->user_model->getClientById($id);
            
            $data['rep'] = $this->user_model->getRep();
            
            $data['name'] = $this->user_model->getcareof();
            
            $this->loadViews("editclient", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
    function editclaims($sno)
    {
        
         
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimsedit", $permissions)) {

            $data['title'] = "KCINS-Edit Client";
             
            $data['claims'] = $this->user_model->getClaimsById($sno);
   
            $data['policy'] = $this->user_model->getPolicy();
          
           // $data['client'] = $this->user_model->getClientById($id);
            
            $data['rep'] = $this->user_model->getRep();

            $data['name'] = $this->user_model->getinsname();
            
            $data['cname'] = $this->user_model->getcareof();

            $data['ctype'] = $this->user_model->getclaimtype();

            $data['cstype'] = $this->user_model->getcstype();

            
            
            $this->loadViews("editclaims", $data,  NULL);
     
        }else{
            redirect("dashboard");
        }
        
    }
    function editcareof($id)
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimsedit", $permissions)) {
        
            $data['title'] = "KCINS-Edit Careof";
             
            $data['careof'] = $this->user_model->getCareofById($id);
            
            $data['rep'] = $this->user_model->getRep();
            
            $this->loadViews("editcareof", $data,  NULL);

            
        }else{
            redirect("dashboard");
        }
        
    }
    function editpolicy($pid)
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("policyedit", $permissions)) {
        
            $data['title'] = "KCINS-Edit Policy";
            
            $data['policy'] = $this->user_model->getpolicyByPId($pid);
            
            $data['rep'] = $this->user_model->getRep();

            $data['inscompany'] = $this->user_model->getinscompany();

            $data['vcompany'] = $this->user_model->getmake();

            $data['model'] = $this->user_model->getmodel();

            $data['name'] = $this->user_model->getinsname();
            
            $data['cname'] = $this->user_model->getcareof();

            $data['pytype'] = $this->user_model->getpolicytype();

            $data['stype'] = $this->user_model->getstype();

            $data['nmtype'] = $this->user_model->getnmtype();

            $this->loadViews("editpolicy", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
        
    }
    
    function renewal_policy($pid)
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("renewview", $permissions)) {
        
            $data['title'] = "KCINS-Edit Policy";
            
            $data['policy'] = $this->user_model->getpolicyByPId($pid);
            
            $data['rep'] = $this->user_model->getRep();

            $data['inscompany'] = $this->user_model->getinscompany();

            $data['vcompany'] = $this->user_model->getmake();

            $data['model'] = $this->user_model->getmodel();

            $data['name'] = $this->user_model->getinsname();
            
            $data['cname'] = $this->user_model->getcareof();

            $data['pytype'] = $this->user_model->getpolicytype();

            $data['stype'] = $this->user_model->getstype();

            $data['nmtype'] = $this->user_model->getnmtype();

            $this->loadViews("renewal_policy", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
    function editrep($id)
    {
        
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("repedit", $permissions)) {

            $data['title'] = "KCINS-Edit Representative";
            
            $data['rep'] = $this->user_model->getRepById($id);
            
            $this->loadViews("editrep", $data,  NULL);

        }else{
            redirect("dashboard");
        }
        
    }
    
    function editinscompany($id)
    {
        
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("insedit", $permissions)) {
            
            $data['title'] = "KCINS-Edit Insurance Company";
            
            $data['inscompany'] = $this->user_model->getinscompanyById($id);
            
            $this->loadViews("editinscompany", $data,  NULL);

        }else{
            redirect("dashboard");
        } 
        
    }

    function editpytype($pid)
    {

         
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("policytedit", $permissions)) {
        
            $data['title'] = "KCINS-Edit Policy Type";
            
            $data['pytype'] = $this->user_model->getpytypeBypId($pid);
            
            $this->loadViews("editpytype", $data,  NULL);

        }else{
            redirect("dashboard");
        } 
        
    }

    function edit_ctype($claimid)
    {

         
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimtedit", $permissions)) {

        
            $data['title'] = "KCINS-Edit Claim Type";
            
            $data['ctype'] = $this->user_model->getctypeById($claimid);
            
            $this->loadViews("editctype", $data,  NULL);

        }else{
            redirect("dashboard");
        } 
        
    }

    function editvcompany($id)
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("vehedit", $permissions)) {

        
            $data['title'] = "KCINS-Edit Vehicle Company";

            $data['vehicle'] = $this->user_model->getmake();
            
            $data['vcompany'] = $this->user_model->getvcompanyById($id);
 
            $this->loadViews("editvcompany", $data,  NULL);
            
        }else{
            redirect("dashboard");
        } 
        
    }
    function editdoctype($id)
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("docedit", $permissions)) {

        
            $data['title'] = "KCINS-Edit document Types";
            
            $data['doctype'] = $this->user_model->getdoctypeById($id);
            
            $this->loadViews("editdoctype", $data,  NULL);

                 
        }else{
            redirect("dashboard");
        } 
        
        
    }
    
    function editnmtype($id)
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("nmedit", $permissions)) {

        
            $data['title'] = "KCINS-Edit Nom-Motor Types";
            
            $data['nmtype'] = $this->user_model->getnmtypeById($id);
            
            $this->loadViews("editnmtype", $data,  NULL);

                 
        }else{
            redirect("dashboard");
        } 
        
        
    }

    function editstype($sid)
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("subedit", $permissions)) {


            $data['title'] = "KCINS-Edit Policy SubType";

            $data['pytype'] = $this->user_model->getpolicytype();
            
            $data['stype'] = $this->user_model->getstypeBysId($sid);
            
            $this->loadViews("editstype", $data,  NULL);

                      
        }else{
            redirect("dashboard");
        } 
        
    }
    
    function edit_cstype($id)
    {

        
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimsedit", $permissions)) {
        
            $data['title'] = "KCINS-Edit Claim SubType";

            $data['ctype'] = $this->user_model->getclaimtype();

            $data['cstype'] = $this->user_model->getcstypeById($id);
            
            $this->loadViews("editcstype", $data,  NULL);

                           
        }else{
            redirect("dashboard");
        } 
        
    }


    function edituser($id)
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("useredit", $permissions)) {

            $data['title'] = "KCINS-Edit User";
            
            $data['usr'] = $this->user_model->getUserById($id);
            
            $this->loadViews("edituser", $data,  NULL);
                            
        }else{
            redirect("dashboard");
        } 
    }
    
    
    function profile()
    {
            $data['title'] = "KCINS-Edit Profile";
        
            $data['usr'] = $this->user_model->getUserById($this->session->userdata('id'));

                   if ($this->session->userdata('role_id') == 1) {
                    $this->loadViews("profile", $data,  NULL);

                    } else if ($this->session->userdata('role_id') == 2) {
                        redirect("edituser/".$this->session->userdata('id'));

                     }
    }

  function addquote()
    {     
        
                $regno = $this->security->xss_clean($this->input->post('regno'));
                $make= $this->security->xss_clean($this->input->post('make'));
                $model = $this->security->xss_clean($this->input->post('model'));   
                $fuel = $this->security->xss_clean($this->input->post('fuel'));
                $idv = $this->security->xss_clean($this->input->post('idv'));
                $renewal=$this->security->xss_clean($this->input->post('renewal'));
                $ncb = $this->security->xss_clean($this->input->post('ncb'));
                $cd = $this->security->xss_clean($this->input->post('cd'));
                $dep = $this->security->xss_clean($this->input->post('dep'));
                $engine = $this->security->xss_clean($this->input->post('engine'));
                $consum = $this->security->xss_clean($this->input->post('consum'));
                $tyre = $this->security->xss_clean($this->input->post('tyre'));
                $lock = $this->security->xss_clean($this->input->post('lock'));
                $assis = $this->security->xss_clean($this->input->post('assis'));
                $personal = $this->security->xss_clean($this->input->post('personal'));
                 $tp = $this->security->xss_clean($this->input->post('tp'));
                
                
                $quoteInfo = array('regno'=>$regno,'make'=>$make,'model'=>$model,'fuel'=>$fuel,'idv'=>$idv,'renewal'=>$renewal,'ncb'=>$ncb,'cd'=>$cd,'dep'=>$dep,'engine'=>$engine,'consum'=>$consum,'tyre'=>$tyre,'lock'=>$lock,'assis'=>$assis,'personal'=>$personal,'tp'=>$tp);
                print_r( $quoteInfo);
                
               
                    $result=0;
                    $result = $this->user_model->addquote($quoteInfo);
                    if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Quote Added Successfully');

                }
                else
                {
                    $this->session->set_flashdata('error', 'Quote Addition Failed');
                }
               
                
                
               redirect('quote');
            
    }

    function addnewcareof()
    {
            
               
                $name = $this->security->xss_clean($this->input->post('name'));
                $address = $this->security->xss_clean($this->input->post('address'));
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $fax = $this->security->xss_clean($this->input->post('fax'));
                $credit = $this->security->xss_clean($this->input->post('credit'));
                $gstin = $this->security->xss_clean($this->input->post('gstin'));
                $tin = $this->security->xss_clean($this->input->post('tin'));
                $email = $this->security->xss_clean($this->input->post('email'));
                $ref = $this->security->xss_clean($this->input->post('ref'));
                $cp = $this->security->xss_clean($this->input->post('cp'));
                $rep = $this->security->xss_clean($this->input->post('rep'));
                $openbal = $this->security->xss_clean($this->input->post('openbal'));
                $data=$this->security->xss_clean($this->input->post('isActive'));
                if ($data=="") {
                    $data = 0;
                } else if ($data == 'on') {
                    $data = 1;
                }
                
                
                $pcid= $this->user_model->getcareid();
                
                if($pcid){
                $careid="KCC".str_pad(substr($pcid->careid, 3, 5)+1, 5, '0', STR_PAD_LEFT);
                
               // $inno=print_r($invno);
                }else{
                 $careid="KCC00001";
                }
                
                
               //echo $careid;
                
                $careofInfo = array('careid'=>$careid,'name'=>$name, 'address'=>$address,'phone'=>$phone,'mobile'=>$mobile,'fax'=>$fax,'credit'=>$credit,'gstin'=>$gstin,'tin'=>$tin,'email'=>$email,'ref'=>$ref,'cp'=>$cp,'rep'=>$rep,'openbal'=>$openbal,'isActive'=>$data,'created_by'=>$this->session->userdata("name") );
                
              
                    $result=0;
                    $result = $this->user_model->addNewCareof($careofInfo);
                    if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Careof Added Successfully');

                }
                else
                {
                    $this->session->set_flashdata('error', 'Careof Addition Failed'.print_r($this->db->error()));
                }

             
                redirect('addcareof');
            
    }
    


    function addnewclient()
    {
            
             
                $name = $this->security->xss_clean($this->input->post('name'));
                $careof=$this->security->xss_clean($this->input->post('careof'));
                $id = $this->security->xss_clean($this->input->post('careof'));
                $care= $this->user_model->getCareofById($id);
                $careof=$care->id;
                $address = $this->security->xss_clean($this->input->post('address'));
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $gstno = $this->security->xss_clean($this->input->post('gstno'));
                $gstin = $this->security->xss_clean($this->input->post('gstin'));
                $tin = $this->security->xss_clean($this->input->post('tin'));
                $email = $this->security->xss_clean($this->input->post('email'));
                $ref = $this->security->xss_clean($this->input->post('ref'));
                $cp = $this->security->xss_clean($this->input->post('cp'));
                $rep = $this->security->xss_clean($this->input->post('rep'));
                $data=$this->security->xss_clean($this->input->post('isActive'));
                if ($data=="") {
                    $data = 0;
                } else if ($data == 'on') {
                    $data = 1;
                }
                
                
                $ncid= $this->user_model->getcid();
                
                if($ncid){
                $cid="KC".str_pad(substr($ncid->cid, 3, 5)+1, 5, '0', STR_PAD_LEFT);
                
                }else{
                 $cid="KC00001";
                }
                $profile_photo="";
                $config['upload_path'] = 'uploads/client';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['file_name']  = $cid;
                $config['overwrite'] = TRUE;

                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('profile_photo')) {
                   $error = array('error' => $this->upload->display_errors()); 

                }
                else { 

                   $uploaded = $this->upload->data();
                   $profile_photo =$uploaded['file_name'];

                }
                
                //echo $cid;
                
                $clientInfo = array('cid'=>$cid,'name'=>$name,'careof'=>$careof, 'address'=>$address,'phone'=>$phone,'mobile'=>$mobile,'gstin'=>$gstin,'tin'=>$tin,'email'=>$email,'ref'=>$ref,'cp'=>$cp,'rep'=>$rep,'profile_photo'=>$profile_photo,'isActive'=>$data );
                
                
               
                    $result=0;
                    $result = $this->user_model->addNewClient($clientInfo);
                    if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Client Added Successfully');

                }
                else
                {
                    $this->session->set_flashdata('error', 'Client Addition Failed');
                }
               
                redirect('addclient');
            
    }
    function addclientdocs()
    {           $id=$this->security->xss_clean($this->input->post('id'));
                $cid=$this->security->xss_clean($this->input->post('cid'));
                $name=$this->security->xss_clean($this->input->post('name'));
                $doctype = $this->security->xss_clean($this->input->post('doctype'));
                $docno = $this->security->xss_clean($this->input->post('docno'));
                $docname= "";
                
                if(isset($_FILES["docname"]['name']) AND !empty($_FILES['docname']['name'])){
                     
                     $config['upload_path'] = 'uploads/client';
                     $config['allowed_types']        = 'jpg|jpeg|png|doc|pdf|xlsx';
                     $config['file_name']  = date('YmdHms').'-'.rand(1,999999);
                     $config['overwrite'] = TRUE;

                     $this->load->library('upload',$config);
                     $this->upload->initialize($config);
                     if ( ! $this->upload->do_upload('docname')) {
                        $error = array('error' => $this->upload->display_errors()); 
                      
                     }
                     else { 
                        
                        $uploaded = $this->upload->data();
                        $docname =$uploaded['file_name'];
                     
                     } 
                     
                     }else{
                        echo "Not Set";
                        
                     }
               
                   
                
                $clientdocsInfo = array('cid'=>$cid,'name'=>$name,'doctype'=>$doctype,'docno'=>$docno,'docname'=>$docname);

           // print_r($clientdocsInfo);
             
                    $result=0;
                    $result = $this->user_model->addclientdocs($clientdocsInfo);
                   // echo $this->db->last_query();
                    if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Clientdocs Added Successfully');

                }
                else
                {
                    $this->session->set_flashdata('error', 'Clientdocs Addition Failed');
                }
                
              
                
              redirect('clientdocs/'.$id);
            
    }
    
    
    function addpolicydocs()
    {           
               
                $pno=$this->security->xss_clean($this->input->post('pno'));
                $pid=$this->security->xss_clean($this->input->post('pid'));
                $insname=$this->security->xss_clean($this->input->post('insname'));
                $doctype = $this->security->xss_clean($this->input->post('doctype'));
                $docno = $this->security->xss_clean($this->input->post('docno'));
                $docname= "";
                
                if(isset($_FILES["docname"]['name']) AND !empty($_FILES['docname']['name'])){
                     
                     $config['upload_path'] = 'uploads/policy';
                     $config['allowed_types']        = 'jpg|jpeg|png|doc|pdf|xlsx';
                     $config['file_name']  = date('YmdHms').'-'.rand(1,999999);
                     $config['overwrite'] = TRUE;

                     $this->load->library('upload',$config);
                     $this->upload->initialize($config);
                     if ( ! $this->upload->do_upload('docname')) {
                        $error = array('error' => $this->upload->display_errors()); 
                      
                     }
                     else { 
                        
                        $uploaded = $this->upload->data();
                        $docname =$uploaded['file_name'];
                     
                     } 
                     
                     }else{
                        echo "Not Set";
                        
                     }
               
                   
                
                $policydocsInfo = array('pno'=>$pno,'pid'=>$pid,'insname'=>$insname,'doctype'=>$doctype,'docno'=>$docno,'docname'=>$docname);

           // print_r($policydocsInfo);
             
                    $result=0;
                    $result = $this->user_model->addpolicydocs($policydocsInfo);
                   // echo $this->db->last_query();
                    if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Policy DocumentsAdded Successfully');

                }
                else
                {
                    $this->session->set_flashdata('error', 'policy Documents Addition Failed');
                }
                

                 
              redirect('policydocs/'.$pid);
            
    }
    function addnewpolicy()
    {            
      
                $rno = $this->security->xss_clean($this->input->post('rno'));
                $rdate = $this->security->xss_clean($this->input->post('rdate'));
                $inscompany = $this->security->xss_clean($this->input->post('inscompany'));
                $insname = $this->security->xss_clean($this->input->post('insname'));
                $id = $this->security->xss_clean($this->input->post('insname'));
                $client= $this->user_model->getClientById($id);
                $insname=$client->name;
                $cid=$client->cid;
                $address = $this->security->xss_clean($this->input->post('address'));
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $careof=$this->security->xss_clean($this->input->post('careof'));
                $cd = $this->security->xss_clean($this->input->post('careof'));
                $care= $this->user_model->getcareofById($cd);
                $careof=$care->id;
                $pytype = $this->security->xss_clean($this->input->post('pytype'));
                $stype = $this->security->xss_clean($this->input->post('stype'));
                $pno = $this->security->xss_clean($this->input->post('pno'));
                $nmtype = $this->security->xss_clean($this->input->post('nmtype'));
                $make = $this->security->xss_clean($this->input->post('make'));
                $model = $this->security->xss_clean($this->input->post('model'));
                $vno = $this->security->xss_clean($this->input->post('vno'));
                $pfrom = $this->security->xss_clean($this->input->post('pfrom'));
                $pto = $this->security->xss_clean($this->input->post('pto'));
                $odprem = $this->security->xss_clean($this->input->post('odprem'));
                $tpprem = $this->security->xss_clean($this->input->post('tpprem'));
                $prem_wotax = $this->security->xss_clean($this->input->post('prem_wotax'));
                $tprem = $this->security->xss_clean($this->input->post('tprem'));
                $stax = $this->security->xss_clean($this->input->post('stax'));  
                $scharge = $this->security->xss_clean($this->input->post('scharge'));
                $remarks = $this->security->xss_clean($this->input->post('remarks'));
                $rep = $this->security->xss_clean($this->input->post('rep'));     
                 
                  
                $ncid= $this->user_model->getpolicyid();
                
                if($ncid){
                $policyid="KCP".str_pad(substr($ncid->policyid, 4, 5)+1, 5, '0', STR_PAD_LEFT);
                
                }else{
                 $policyid="KCP00001";
                }
                
                $PolicyInfo = array('policyid'=>$policyid,'cid'=>$cid,'rno'=>$rno,'rdate'=>$rdate,'inscompany'=>$inscompany,'insname'=>$insname,'cid'=>$cid,'address'=>$address,'phone'=>$phone,'mobile'=>$mobile,'careof'=>$careof,'pytype'=>$pytype,'stype'=>$stype,'pno'=>$pno,'nmtype'=>$nmtype,'make'=>$make,'model'=>$model,'vno'=>$vno,'pfrom'=>$pfrom,'pto'=>$pto,'odprem'=>$odprem,'tpprem'=>$tpprem,'prem_wotax'=>$prem_wotax,'tprem'=>$tprem,'stax'=>$stax,'scharge'=>$scharge,'remarks'=>$remarks,'rep'=>$rep,'CREATED_by'=>$this->session->userdata("name"));
                
                $result=0;
                $result = $this->user_model->addNewPolicy($PolicyInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Policy Added Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Policy Addition Failed');
                }

             //print_r($PolicyInfo);
               redirect('addpolicy');
            
    }

    function addnew_renewalpolicy()
    {

                $rno = $this->security->xss_clean($this->input->post('rno'));
                $rdate = $this->security->xss_clean($this->input->post('rdate'));
                $inscompany = $this->security->xss_clean($this->input->post('inscompany'));
                $insname = $this->security->xss_clean($this->input->post('insname'));
                $insid = $this->security->xss_clean($this->input->post('insid'));
                $client= $this->user_model->getClientByCId($insid);
                $insname=$client->name;
                $cid=$client->cid;
                $address = $this->security->xss_clean($this->input->post('address'));
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $careof = $this->security->xss_clean($this->input->post('careof'));
                $cd = $this->security->xss_clean($this->input->post('cd'));
                $care= $this->user_model->getcareofById($cd);
                $careof=$care->id;
                $pytype = $this->security->xss_clean($this->input->post('pytype'));
                $stype = $this->security->xss_clean($this->input->post('stype'));
                $pno = $this->security->xss_clean($this->input->post('pno'));
                $nmtype = $this->security->xss_clean($this->input->post('nmtype'));
                $make = $this->security->xss_clean($this->input->post('make'));
                $model = $this->security->xss_clean($this->input->post('model'));
                $vno = $this->security->xss_clean($this->input->post('vno'));
                $pfrom = $this->security->xss_clean($this->input->post('pfrom'));
                $pto = $this->security->xss_clean($this->input->post('pto'));
                $odprem = $this->security->xss_clean($this->input->post('odprem'));
                $tpprem = $this->security->xss_clean($this->input->post('tpprem'));
                $prem_wotax = $this->security->xss_clean($this->input->post('prem_wotax'));
                $tprem = $this->security->xss_clean($this->input->post('tprem'));
                $stax = $this->security->xss_clean($this->input->post('stax'));  
                $scharge = $this->security->xss_clean($this->input->post('scharge'));
                $remarks = $this->security->xss_clean($this->input->post('remarks'));
                $rep = $this->security->xss_clean($this->input->post('rep'));   
                $pid= $this->security->xss_clean($this->input->post('pid')); 
                $policyid= $this->security->xss_clean($this->input->post('policyid'));


        $PolicyInfo = array('policyid'=>$policyid,'rno'=>$rno,'rdate'=>$rdate,'inscompany'=>$inscompany,'insname'=>$insname,'cid'=>$cid,'address'=>$address,'phone'=>$phone,'mobile'=>$mobile,'careof'=>$careof,'pytype'=>$pytype,'stype'=>$stype,'pno'=>$pno,'nmtype'=>$nmtype,'make'=>$make,'model'=>$model,'vno'=>$vno,'pfrom'=>$pfrom,'pto'=>$pto,'odprem'=>$odprem,'tpprem'=>$tpprem,'prem_wotax'=>$prem_wotax,'tprem'=>$tprem,'stax'=>$stax,'scharge'=>$scharge,'remarks'=>$remarks,'rep'=>$rep,'CREATED_by'=>$this->session->userdata("name"));
                
        $result=0;
        $result = $this->user_model->addNewPolicy($PolicyInfo);
        
        if($result > 0)
        {
            $this->session->set_flashdata('success', 'New Policy Added Successfully');
        }
        else
        {
            $this->session->set_flashdata('error', 'Policy Addition Failed');
        }

    //    print_r($PolicyInfo );  
      redirect('addpolicy');


    }

    function addnewclaims()
    {
            
               
                $insname = $this->security->xss_clean($this->input->post('insname'));
                $id = $this->security->xss_clean($this->input->post('insname'));
                $client= $this->user_model->getClientByCId($id);
                $insname=$client->name;
                $cid=$client->cid;
                $indate=$this->security->xss_clean($this->input->post('indate'));
                $careof = $this->security->xss_clean($this->input->post('careof'));
                $ctype = $this->security->xss_clean($this->input->post('ctype'));
                $cstype = $this->security->xss_clean($this->input->post('cstype'));
                $pno = $this->security->xss_clean($this->input->post('pno'));
                $cno = $this->security->xss_clean($this->input->post('cno'));
                $camount = $this->security->xss_clean($this->input->post('camount'));
                $samount = $this->security->xss_clean($this->input->post('samount'));
                $tprem = $this->security->xss_clean($this->input->post('tprem'));
                $rep = $this->security->xss_clean($this->input->post('rep'));
                $edate=$this->security->xss_clean($this->input->post('edate'));
                $status = $this->security->xss_clean($this->input->post('status'));
                $sdate = $this->security->xss_clean($this->input->post('sdate')); 
                $remarks = $this->security->xss_clean($this->input->post('remarks')); 
                
                $claimsInfo = array('cid'=>$cid,'insname'=>$insname,'indate'=>$indate, 'careof'=>$careof, 'ctype'=>$ctype,'cstype'=>$cstype,'pno'=>$pno,'cno'=>$cno,'camount'=>$camount,'samount'=>$samount,'tprem'=>$tprem,'rep'=>$rep,'edate'=>$edate,'status'=>$status,'sdate'=>$sdate,'remarks'=>$remarks,'created_by'=>$this->session->userdata("name") );
                
              // print_r($claimsInfo);
               
                    $result=0;
                    $result = $this->user_model->addNewClaims($claimsInfo);
                    if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Claims Added Successfully');

                }
                else
                {
                    $this->session->set_flashdata('error', 'Claims Addition Failed');
                }
                

               
                redirect('addclaims');
            
    }

    function addnewrep()
    {

                $this->load->library('form_validation');
                $name = $this->security->xss_clean($this->input->post('name'));
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $email = $this->security->xss_clean($this->input->post('email'));
                
                $repInfo = array('rname'=>$name, 'rmobile'=>$mobile,'rmail'=>$email,'updated_by'=>$this->session->userdata("name"));
                
                $result=0;
                $result = $this->user_model->addNewRep($repInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Representative Added Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Representative Addition Failed');
                }
                redirect('rep');
    }
    
    
    function addnew_inscompany()
    {
                $this->load->library('form_validation');
                
                $inscompany = $this->security->xss_clean($this->input->post('inscompany')); 
                $inscompanyInfo = array('inscompany'=>$inscompany,'updated_by'=>$this->session->userdata("name"));
                
                $result=0;
                $result = $this->user_model->addinscompany($inscompanyInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Insurance company Added Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Insurance company Addition Failed');
                }
                redirect('inscompany');
    }
    
    function addnew_pytype()
    {
                $this->load->library('form_validation');
                
                $pytype = $this->security->xss_clean($this->input->post('pytype')); 
                $pytypeInfo = array('pytype'=>$pytype,'updated_by'=>$this->session->userdata("name"));
                
                $result=0;
                $result = $this->user_model->addnew_pytype($pytypeInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Policy Type Added Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Policy Type Addition Failed');
                }
                redirect('pytype');
    }

     
    function addnew_stype()
    {
                $this->load->library('form_validation');
                
                $stype = $this->security->xss_clean($this->input->post('stype')); 
                $pytype = $this->security->xss_clean($this->input->post('pytype')); 
                $stypeInfo = array('stype'=>$stype,'pid'=>$pytype,'updated_by'=>$this->session->userdata("name"));
                
                $result=0;
                $result = $this->user_model->addnew_stype($stypeInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Policy SubType Added Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Policy SubType Addition Failed');
                }
                redirect('stype');
    }
    function addnew_ctype()
    {
                $this->load->library('form_validation');
                
                $ctype = $this->security->xss_clean($this->input->post('ctype')); 
                $ctypeInfo = array('ctype'=>$ctype,'updated_by'=>$this->session->userdata("name"));
                
                $result=0;
                $result = $this->user_model->addnew_ctype($ctypeInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Claim Type Added Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Claim Type Addition Failed');
                }
                redirect('ctype');
    }


        
    function addnew_cstype()
    {
                $this->load->library('form_validation');
                
                $ctype = $this->security->xss_clean($this->input->post('ctype')); 
                $cstype = $this->security->xss_clean($this->input->post('cstype')); 
                $cstypeInfo = array('cstype'=>$cstype,'claimid'=>$ctype,'updated_by'=>$this->session->userdata("name"));
                
                $result=0;
                $result = $this->user_model->addnew_cstype($cstypeInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Claim SubType Added Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Claim SubType Addition Failed');
                }
                redirect('cstype');
    }
     
    function addnew_vcompany()
    {
                $this->load->library('form_validation');
                
                $make = $this->security->xss_clean($this->input->post('make'));
                $others = $this->security->xss_clean($this->input->post('others'));
                $model = $this->security->xss_clean($this->input->post('model'));
                $mkmdl="";
                if($make!= "Others"){
                    $mkmdl=$make;
                }else{
                    $mkmdl=$others;
                }

                $vcompanyInfo = array('make'=>$mkmdl,'model'=>$model,
                'updated_by'=>$this->session->userdata("name"));
                
                $result=0;
                $result = $this->user_model->addnew_vcompany($vcompanyInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New VehicleCompany Added Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'VehicleCompany Addition Failed');
                }
                redirect('vcompany');
    }
    function addnew_doctype()
    {
                $this->load->library('form_validation');
                
                $doctype = $this->security->xss_clean($this->input->post('doctype')); 
                $category = $this->security->xss_clean($this->input->post('category')); 
                $doctypeInfo = array('doctype'=>$doctype,'category'=>$category,'updated_by'=>$this->session->userdata("name"));
                
                $result=0;
                $result = $this->user_model->addnew_doctype($doctypeInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New DocumentType Added Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'documentType Addition Failed');
                }
                redirect('adddoctype');
    }

    function addnew_nmtype()
    {
                $this->load->library('form_validation');
                
                $nmtype = $this->security->xss_clean($this->input->post('nmtype')); 
                $nmtypeInfo = array('nmtype'=>$nmtype,'updated_by'=>$this->session->userdata("name"));
                
                $result=0;
                $result = $this->user_model->addnew_nmtype($nmtypeInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Non-MotorType Added Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Non-MotorType Addition Failed');
                }
                redirect('add_nmtype');
    }

    function addnewuser()
    {
                $this->load->library('form_validation');
                
                $usr= $this->user_model->getUserByName($this->input->post('username'));
                
                if(!$usr){
                    $name = $this->security->xss_clean($this->input->post('name'));
                $username = $this->security->xss_clean($this->input->post('username'));
                $email = $this->security->xss_clean($this->input->post('email'));
                $password = $pass = password_hash($this->security->xss_clean($this->input->post('password')), PASSWORD_DEFAULT);
                $role_id = 2;
                
            
                
                
                $result=0;
                
                $permissions=array();
                
                foreach($_POST as $key => $value ){ 
                    if(($key!="username") and ($key!="id") and ($key!="name") and ($key!="email") and ($key!="password")){
                        $permissions[$key] = $this->input->post($key);
                    }
                        
                 }
                
                 $userInfo = array('name'=>$name, 'username'=>$username,'email'=>$email,'password'=>$password,'role_id'=>$role_id,'permissions'=>json_encode($permissions));
                 
                
                $result = $this->user_model->addNewUser($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User Added Successfully');
                    //  print_r(json_encode($permissions));
                     redirect('adduser');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User Addition Failed');
                    redirect('adduser');
                }
                }
                else{
                    $this->session->set_flashdata('error', 'User Addition Failed - User Already Exists');
                    redirect('adduser');
                }
                                
                
                
    }
    
    function updateuser()
    {
                $this->load->library('form_validation');
                
                $id=$this->security->xss_clean($this->input->post('id'));
                
                $usr= $this->user_model->getUserByName($this->input->post('username'));
                
                if(count($usr)<2){
                    $name = $this->security->xss_clean($this->input->post('name'));
                $username = $this->security->xss_clean($this->input->post('username'));
                $email = $this->security->xss_clean($this->input->post('email'));
                $pwd=$this->security->xss_clean($this->input->post('password'));
                $password = $pass = password_hash($this->security->xss_clean($this->input->post('password')), PASSWORD_DEFAULT);
                $role_id = 2;


                $permissions=array();
                
                foreach($_POST as $key => $value){ 
                    if(($key!="username") and ($key!="id") and ($key!="name") and ($key!="email") and ($key!="password")){
                        $permissions[$key] = $this->input->post($key);
                    }
                        
                 }
                
                
                if($pwd!=""){
                    $userInfo = array('name'=>$name, 'username'=>$username,'email'=>$email,'password'=>$password,'role_id'=>$role_id,'permissions'=>json_encode($permissions));
                }else{
                    $userInfo = array('name'=>$name, 'username'=>$username,'email'=>$email,'role_id'=>$role_id,'permissions'=>json_encode($permissions));
                }
                
                
                
                $result=0;
                $result = $this->user_model->updateUser($userInfo,$id);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'User Updated Successfully');
                    redirect('users');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User Updation Failed');
                    redirect('users');
                }
                }
                else{
                    $this->session->set_flashdata('error', 'User Updation  Failed - User Already Exists');
                    redirect('users');
                }
                           
    }
    
    function updateprofile()
    {
                $this->load->library('form_validation');
                
                $id=$this->security->xss_clean($this->input->post('id'));
                
                $usr= $this->user_model->getUserByName($this->input->post('username'));

                if(($usr)){
                    $name = $this->security->xss_clean($this->input->post('name'));
                $email = $this->security->xss_clean($this->input->post('email'));
                $cpassword=$this->security->xss_clean($this->input->post('cpassword'));
                $npassword=password_hash($this->security->xss_clean($this->input->post('npassword')), PASSWORD_DEFAULT);
                $rpassword=password_hash($this->security->xss_clean($this->input->post('rpassword')), PASSWORD_DEFAULT);
                $role_id = 1;
                
                if($rpassword!=""){
                    $profileInfo = array('name'=>$name,'email'=>$email,'password'=>$rpassword,'role_id'=>$role_id);
                }else{
                    $profileInfo = array('name'=>$name,'email'=>$email,'role_id'=>$role_id);
                }
                
                if(password_verify($cpassword,$usr->password))
                {

                //     $this->session->set_flashdata('error','Password Updation failed');
                //    redirect('profile');
                // } 
                
                $result=0; 
                $result = $this->user_model->updateprofile($profileInfo,$id);
               // print_r($profileInfo);
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Admin Updated Successfully');
                    redirect('profile');
                }
            }
                else
                {
                    $this->session->set_flashdata('error', ' Password Updation Failed');
                    redirect('profile');
                }
                }
                else{
                    $this->session->set_flashdata('error', 'Admin Updation  Failed - User Already Exists');
                    redirect('profile');
                }
    }
    


    function deluser($id)
    {
        
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("userdelete", $permissions)) {


            $result = $this->user_model->deleteUser($id);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'User Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User Deletion Failed');
                }
            redirect('users');
        
        }else{
            redirect("dashboard");
        } 
    }
    
    function delrep($id)
    {
           
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("repdelete", $permissions)) {

         
            $result = $this->user_model->deleteRep($id);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Representative Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Representative Deletion Failed');
                }
            redirect('rep');
 
        }else{
            redirect("dashboard");
        } 
           
        
    }
    function delinscompany($id)
    {
           
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("insdelete", $permissions)) {
            
            $result = $this->user_model->deleteinscompany($id);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Insurance company Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Insurance company Deletion Failed');
                }
            redirect('inscompany');

        }else{
            redirect("dashboard");
        } 
        
    }

    function delpytype($pid)
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("policytdelete", $permissions)) {
            
            $result = $this->user_model->deletepytype($pid);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Policy Type Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Policy TypeDeletion Failed');
                }
            redirect('pytype');

        }else{
            redirect("dashboard");
        }      
        
    }
    function delstype($sid)
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("subdelete", $permissions)) {

            $result = $this->user_model->deletestype($sid);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'SubType Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'SubType Deletion Failed');
                }
            redirect('stype');

        }else{
            redirect("dashboard");
        }      
        
    }
    
    function del_ctype($claimid)
    {
        
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimtdelete", $permissions)) {

            
            $result = $this->user_model->delete_ctype($claimid);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'ClaimType Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'ClaimType Deletion Failed');
                }
            redirect('ctype');

        }else{
            redirect("dashboard");
        }      
            
        
    }

    function del_cstype($id)
    {
           
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimsdelete", $permissions)) {

            $result = $this->user_model->delete_cstype($id);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'ClaimsubType Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'ClaimsubType Deletion Failed');
                }
            redirect('cstype');
        
        }else{
            redirect("dashboard");
        }       
        
    }
    function delvcompany($id)
    {
            
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("vehdelete", $permissions)) {
            
            $result = $this->user_model->deletevcompany($id);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'VehicleCompany Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', ' VehicleCompany Deletion Failed');
                }
            redirect('vcompany');

        }else{
            redirect("dashboard");
        }  
        
    }
    
    function deldoctype($id)
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("vehdelete", $permissions)) {
            
            
            $result = $this->user_model->deletedoctype($id);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'documentType Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', ' documentType Deletion Failed');
                }
            redirect('doctype');

        }else{
            redirect("dashboard");
        }  
        
    }

    function del_nmtype($id)
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("nmdelete", $permissions)) {
            
            
            $result = $this->user_model->delete_nmtype($id);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Non-Motor Type  Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', ' Non-Motor Type Deletion Failed');
                }
            redirect('nmtype');

        }else{
            redirect("dashboard");
        }  
        
    }

    function delclient($id)
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("vehdelete", $permissions)) {
            
            $client=$this->user_model->getClientById($id);
            
            $file = FCPATH.'uploads\\client\\' . $client->profile_photo;
            
            $result = $this->user_model->deleteClient($id);
            if (file_exists($file))
                {
                  unlink($file);
                }
            
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Client Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Client Deletion Failed');
                }
            redirect('clients');

        }else{
            redirect("dashboard");
        }  
        
    }


 function del_cfile($id)
{
  $cfile=$this->user_model->getClientdocbyID($id);
  $client=$this->user_model->getClientByCId($cfile->cid);
  $file = FCPATH.'uploads//client//' . $cfile->docname;
  
  if (file_exists($file))
  {
    unlink($file);
    $this->user_model->deletecfile($cfile->id);
    $this->session->set_flashdata('success', 'File deleted successfully.');
  }
  else
  {
      
    $this->session->set_flashdata('error', 'File not found.');
  }
  redirect('clientdocs/'.$client->id);
}


 function del_pfile($id)
{
  $pfile=$this->user_model->getPolicydocbyID($id);
  $file = FCPATH.'uploads//policy//' . $pfile->docname;
  
  if (file_exists($file))
  {
    unlink($file);
    $this->user_model->deletepfile($pfile->id);
    $this->session->set_flashdata('success', 'File deleted successfully.');
  }
  else
  {
      
    $this->session->set_flashdata('error', 'File not found.');
  }
  redirect('policydocs/'.$pfile->pid);
}

    function delcareof($id)
    {
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("caredelete", $permissions)) {

            $result = $this->user_model->deleteCareof($id);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Careof Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Careof Deletion Failed');
                }
            redirect('careof');

        }else{
            redirect("dashboard");
        }  
            
        
    }
    function delpolicy($pid)
    {
        
        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("policydelete", $permissions)) {

            $result = $this->user_model->deletepolicy($pid);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Policy Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Policy Deletion Failed');
                }
            redirect('policies');

            
        }else{
            redirect("dashboard");
        }  
        
    }
    function delclaims($sno)
    {

        $permissions=json_decode($this->session->userdata('permissions'), true);

        // print_r($permissions);
    
        if (array_key_exists("claimdelete", $permissions)) {
        
            $result = $this->user_model->deleteclaims($sno);
            
            if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Claims Deleted Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Claims Deletion Failed');
                }
            redirect('claims');

        }else{
            redirect("dashboard");
        }  
        
        
    }
    function updaterep()
    {
                $this->load->library('form_validation');
                
                $name = $this->security->xss_clean($this->input->post('name'));
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $email = $this->security->xss_clean($this->input->post('email'));
                
                $repInfo = array('rname'=>$name, 'rmobile'=>$mobile,'rmail'=>$email,'updated_by'=>$this->session->userdata("name"));
                $id= $this->security->xss_clean($this->input->post('id'));
                
                $result=0;
                $result = $this->user_model->updateRep($repInfo,$id);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Representative Updated Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Representative Updation Failed');
                }
                redirect('rep');
    }
    function update_inscompany()
    {
                $this->load->library('form_validation');
                
                $inscompany = $this->security->xss_clean($this->input->post('inscompany'));
            
                $inscompanyInfo = array('inscompany'=>$inscompany,'updated_by'=>$this->session->userdata("name"));
                $id= $this->security->xss_clean($this->input->post('id'));
                
                $result=0;
                $result = $this->user_model->update_inscompany($inscompanyInfo,$id);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Insurance Company Updated Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Insurance Company Addition Failed');
                }
                redirect('inscompany');
    }

    function update_pytype()
    {
                $this->load->library('form_validation');
                
                $pytype = $this->security->xss_clean($this->input->post('pytype'));
            
                $pytypeInfo = array('pytype'=>$pytype,'updated_by'=>$this->session->userdata("name"));
                $pid= $this->security->xss_clean($this->input->post('pid'));
                
                $result=0;
                $result = $this->user_model->update_pytype($pytypeInfo,$pid);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Policytype Updated Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Policytype Updation Failed');
                }
                redirect('pytype');
    }
    
    function update_ctype()
    {
                $this->load->library('form_validation');
                
                $pytype = $this->security->xss_clean($this->input->post('ctype'));
            
                $ctypeInfo = array('ctype'=>$pytype,'updated_by'=>$this->session->userdata("name"));
                 $claimid= $this->security->xss_clean($this->input->post('claimid'));
                
                $result=0;
                $result = $this->user_model->update_ctype($ctypeInfo,$claimid);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Claimtype Updated Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Claimtype Updation Failed');
                }
                redirect('ctype');
    }

    function update_stype()
    {
                $this->load->library('form_validation');
                
                $stype = $this->security->xss_clean($this->input->post('stype'));
                $pytype= $this->security->xss_clean($this->input->post('pytype')); 
                $sid= $this->security->xss_clean($this->input->post('sid'));
                $stypeInfo = array('stype'=>$stype,'pid'=>$pytype,'updated_by'=>$this->session->userdata("name"));
                $result=0;
                $result = $this->user_model->update_stype($stypeInfo,$sid);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Subtype Updated Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Subtype Updation Failed');
                }
                redirect('stype');
    }

    function update_cstype()
    {
                $this->load->library('form_validation');
                
                $cstype = $this->security->xss_clean($this->input->post('cstype'));
                $ctype= $this->security->xss_clean($this->input->post('ctype')); 
                $id= $this->security->xss_clean($this->input->post('id'));
                $cstypeInfo = array('claimid'=>$ctype,'cstype'=>$cstype,'updated_by'=>$this->session->userdata("name"));
                $result=0;
                $result = $this->user_model->update_cstype($cstypeInfo,$id);
                 //print_r($cstypeInfo);
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Claim Subtype Updated Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Claim Subtype Updation Failed');
                }
                redirect('cstype');
    }

    function update_vcompany()
    {
                $this->load->library('form_validation');
                
             
                $make = $this->security->xss_clean($this->input->post('make'));
                $others = $this->security->xss_clean($this->input->post('others'));
                $model = $this->security->xss_clean($this->input->post('model'));
                $mkmdl="";
                if($make!= "Others"){
                    $mkmdl=$make;
                }else{
                    $mkmdl=$others;
                }
            
                $vcompanyInfo = array('make'=>$mkmdl,'model'=>$model,'updated_by'=>$this->session->userdata("name"));
                $id= $this->security->xss_clean($this->input->post('id'));
                
                $result=0;
                $result = $this->user_model->update_vcompany($vcompanyInfo,$id);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'VehicleCompany Updated Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'VehicleCompany Updation Failed');
                }
                //print_r($vcompanyInfo);
                redirect('vcompany');
    }
     
    function update_doctype()
    {
                $this->load->library('form_validation');
                
                $doctype = $this->security->xss_clean($this->input->post('doctype'));
                $category = $this->security->xss_clean($this->input->post('category')); 
                $doctypeInfo = array('doctype'=>$doctype,'category'=>$category,'updated_by'=>$this->session->userdata("name"));
                $id= $this->security->xss_clean($this->input->post('id'));
                
                $result=0;
                $result = $this->user_model->update_doctype($doctypeInfo,$id);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'DocumentType Updated Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'DocumentType Updation Failed');
                }
                redirect('doctype');
    }

    function update_nmtype()
    {
                $this->load->library('form_validation');
                
                $nmtype = $this->security->xss_clean($this->input->post('nmtype'));
                $nmtypeInfo = array('nmtype'=>$nmtype,'updated_by'=>$this->session->userdata("name"));
                $id= $this->security->xss_clean($this->input->post('id'));
                
                $result=0;
                $result = $this->user_model->update_nmtype($nmtypeInfo,$id);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Non-Motor Type Updated Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Non-Motor Type Updation Failed');
                }
                redirect('nmtype');
    }


     function updateclient()
    {
            
                $name = $this->security->xss_clean($this->input->post('name'));
                $careof=$this->security->xss_clean($this->input->post('careof'));
                $address = $this->security->xss_clean($this->input->post('address'));
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $gstin = $this->security->xss_clean($this->input->post('gstin'));
                $tin = $this->security->xss_clean($this->input->post('tin'));
                $email = $this->security->xss_clean($this->input->post('email'));
                $ref = $this->security->xss_clean($this->input->post('ref'));
                $cp = $this->security->xss_clean($this->input->post('cp'));
                $rep = $this->security->xss_clean($this->input->post('rep'));
                
                $cid= $this->security->xss_clean($this->input->post('cid'));
                $data = $this->security->xss_clean($this->input->post('isActive'));
                if ($data=="") {
                    $data = 0;
                } else if ($data == 'on') {
                    $data = 1;
                }
                
                $profile_photo="";
                $config['upload_path'] = 'uploads/client';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['file_name']  = $cid;
                $config['overwrite'] = TRUE;

                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('profile_photo')) {
                   $error = array('error' => $this->upload->display_errors()); 

                }
                else { 

                   $uploaded = $this->upload->data();
                   $profile_photo =$uploaded['file_name'];

                }
                
                if($profile_photo!=""){
                    $clientInfo = array('name'=>$name,'careof'=>$careof, 'address'=>$address,'phone'=>$phone,'mobile'=>$mobile,'gstin'=>$gstin,'tin'=>$tin,'email'=>$email,'ref'=>$ref,'cp'=>$cp,'rep'=>$rep,'profile_photo'=>$profile_photo,'isActive'=>$data);
                }else{
                    $clientInfo = array('name'=>$name,'careof'=>$careof, 'address'=>$address,'phone'=>$phone,'mobile'=>$mobile,'gstin'=>$gstin,'tin'=>$tin,'email'=>$email,'ref'=>$ref,'cp'=>$cp,'rep'=>$rep,'isActive'=>$data);
                }
                
                
                $result=0;
                $result = $this->user_model->updateClient($clientInfo,$cid);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Client Updated Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Client Updation Failed');
                }
              //print_r($clientInfo);   
             redirect('clients');
            
    }
    function updatecareof()
    {
            
        $careid= $this->security->xss_clean($this->input->post('careid'));
        $name = $this->security->xss_clean($this->input->post('name'));
        $address = $this->security->xss_clean($this->input->post('address'));
        $phone = $this->security->xss_clean($this->input->post('phone'));
        $mobile = $this->security->xss_clean($this->input->post('mobile'));
        $fax = $this->security->xss_clean($this->input->post('fax'));
        $credit = $this->security->xss_clean($this->input->post('credit'));
        $gstin = $this->security->xss_clean($this->input->post('gstin'));
        $tin = $this->security->xss_clean($this->input->post('tin'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $ref = $this->security->xss_clean($this->input->post('ref'));
        $cp = $this->security->xss_clean($this->input->post('cp'));
        $rep = $this->security->xss_clean($this->input->post('rep'));
        $openbal = $this->security->xss_clean($this->input->post('openbal'));
        $data=$this->security->xss_clean($this->input->post('isActive'));
        $id= $this->security->xss_clean($this->input->post('id'));
                if ($data=="") {
                    $data = 0;
                } else if ($data == 'on') {
                    $data = 1;
                }
        
        $careofInfo = array('name'=>$name, 'address'=>$address,'phone'=>$phone,'mobile'=>$mobile,'fax'=>$fax,'credit'=>$credit,'gstin'=>$gstin,'tin'=>$tin,'email'=>$email,'ref'=>$ref,'cp'=>$cp,'rep'=>$rep,'openbal'=>$openbal,'isActive'=>$data );
                
            $result=0;
            $result = $this->user_model->updateCareof($careofInfo,$id);
            if($result > 0)
        {
            $this->session->set_flashdata('success', 'Careof Updated Successfully');

        }
        else
        {
            $this->session->set_flashdata('error', 'Careof Updation Failed');
        }
        
       // print_r($careofInfo);
       redirect('careof');
    
    } 
    
    function updatePolicy()
    {
            
               
                $rno = $this->security->xss_clean($this->input->post('rno'));
                $rdate = $this->security->xss_clean($this->input->post('rdate'));
                $inscompany = $this->security->xss_clean($this->input->post('inscompany'));
                $insname = $this->security->xss_clean($this->input->post('insname'));
                $id = $this->security->xss_clean($this->input->post('insname'));
                $client= $this->user_model->getClientById($id);
                $insname=$client->name;
                $cid=$client->cid;
                $address = $this->security->xss_clean($this->input->post('address'));
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $careof = $this->security->xss_clean($this->input->post('careof'));
                $pytype = $this->security->xss_clean($this->input->post('pytype'));
                $stype = $this->security->xss_clean($this->input->post('stype'));
                $pno = $this->security->xss_clean($this->input->post('pno'));
                $nmtype = $this->security->xss_clean($this->input->post('nmtype'));
                $make = $this->security->xss_clean($this->input->post('make'));
                $model = $this->security->xss_clean($this->input->post('model'));
                $vno = $this->security->xss_clean($this->input->post('vno'));
                $pfrom = $this->security->xss_clean($this->input->post('pfrom'));
                $pto = $this->security->xss_clean($this->input->post('pto'));
                $odprem = $this->security->xss_clean($this->input->post('odprem'));
                $tpprem = $this->security->xss_clean($this->input->post('tpprem'));
                $prem_wotax = $this->security->xss_clean($this->input->post('prem_wotax'));
                $tprem = $this->security->xss_clean($this->input->post('tprem'));
                $stax = $this->security->xss_clean($this->input->post('stax'));  
                $scharge = $this->security->xss_clean($this->input->post('scharge'));
                $remarks = $this->security->xss_clean($this->input->post('remarks'));
                $rep = $this->security->xss_clean($this->input->post('rep'));     
                $pid= $this->security->xss_clean($this->input->post('pid'));
                $policyid= $this->security->xss_clean($this->input->post('policyid'));
                
                $PolicyInfo = array('policyid'=>$policyid,'rno'=>$rno,'rdate'=>$rdate,'inscompany'=>$inscompany,'cid'=>$cid,'insname'=>$insname,'address'=>$address,'phone'=>$phone,'mobile'=>$mobile,'careof'=>$careof,'pytype'=>$pytype,'stype'=>$stype,'pno'=>$pno,'nmtype'=>$nmtype,'make'=>$make,'model'=>$model,'vno'=>$vno,'pfrom'=>$pfrom,'pto'=>$pto,'odprem'=>$odprem,'tpprem'=>$tpprem,'prem_wotax'=>$prem_wotax,'tprem'=>$tprem,'stax'=>$stax,'scharge'=>$scharge,'remarks'=>$remarks,'rep'=>$rep );
                
                $result=0;

                $result = $this->user_model->updatepolicy($PolicyInfo,$pid);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', ' Updated Policy Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Policy Updation Failed');
                }
                // print_r($PolicyInfo); 
                redirect('policies');

                
    }
    
   function updateclaims()
   {
    $sno = $this->security->xss_clean($this->input->post('sno'));
    $insname = $this->security->xss_clean($this->input->post('insname'));
    $id = $this->security->xss_clean($this->input->post('insname'));
    $client= $this->user_model->getClientByCId($id);
    $insname=$client->name;
    $cid=$client->cid;
    $indate = $this->security->xss_clean($this->input->post('indate'));
    $careof = $this->security->xss_clean($this->input->post('careof'));
    $ctype = $this->security->xss_clean($this->input->post('ctype'));
    $cstype = $this->security->xss_clean($this->input->post('cstype'));
    $pno = $this->security->xss_clean($this->input->post('pno'));
    $cno = $this->security->xss_clean($this->input->post('cno'));
    $camount = $this->security->xss_clean($this->input->post('camount'));
    $samount = $this->security->xss_clean($this->input->post('samount'));
    $tprem = $this->security->xss_clean($this->input->post('tprem'));
    $edate= $this->security->xss_clean($this->input->post('edate'));
    $rep = $this->security->xss_clean($this->input->post('rep'));
    $status = $this->security->xss_clean($this->input->post('status'));
    $sdate = $this->security->xss_clean($this->input->post('sdate'));
    $remarks = $this->security->xss_clean($this->input->post('remarks')); 
    
    $claimsInfo = array('insname'=>$insname,'indate'=>$indate, 'careof'=>$careof, 'ctype'=>$ctype,'cid'=>$cid, 'cstype'=>$cstype,'pno'=>$pno,'cno'=>$cno,'camount'=>$camount,'samount'=>$samount,'tprem'=>$tprem, 'edate'=>$edate,'rep'=>$rep,'sdate'=>$sdate,'status'=>$status,'remarks'=>$remarks,'created_by'=>$this->session->userdata("name") );
    
 // print_r($claimsInfo);
    
        $result=0;
        $result = $this->user_model->updateClaims($claimsInfo,$sno);
        if($result > 0)
    {
        $this->session->set_flashdata('success', ' Claims  Updated Successfully');

    }
    else
    {
        $this->session->set_flashdata('error', 'Claims Update Failed');
    }
    
    redirect('claims');
   }
   
  

    
    function fetch_stype()
    {
        if($this->input->post('pid'))
      {
         $this->load->model('User_Model');
         echo $this->user_model->fetch_stype($this->input->post('pid'));
      }
    }

     
    function fetch_model()
    {
        if($this->input->post('make'))
      {
         $this->load->model('User_Model');
         echo $this->user_model->fetch_model($this->input->post('make'));
      }
    } 
    function fetch_cstype()
    {
        
        if($this->input->post('claimid'))
      {
         $this->load->model('User_Model');
         echo $this->user_model->fetch_cstype($this->input->post('claimid'));
      }
      
    }


    function fetch_client()
    {
        $response="";
        if($this->input->post('id'))
      {
         $this->load->model('User_Model');
        $response= $this->user_model->getclientById($this->input->post('id'));
      }
      echo json_encode($response); 
      
    }


    function fetch_policy()
    {
        $response="";
        if($this->input->post('id'))
      {
         $this->load->model('User_Model');
        $response= $this->user_model->getpolicyByCId($this->input->post('id'));
      }
      echo json_encode($response); 
      
    }

    function clientList(){
        
            $records=$this->user_model->clientList("", "", "");
            $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));
            $totalRecords = count($records);
            
        $data = array();
         foreach($records as $record ){
            $permissions=json_decode($this->session->userdata('permissions'), true);

            $careof="";
            if($this->user_model->getcareofById($record->careof)){
                    $careof=$this->user_model->getcareofById($record->careof)->name;
            }
            $rep="";
            if($this->user_model-> getRepById($record->rep)){
             $rep=$this->user_model-> getRepById($record->rep)->rname;
        }
           
         $clientview="";
         if(array_key_exists("clientview", $permissions)) { 
         $clientview=("<a class='btn btn-success btn-sm' href='viewclient/".$record->id."'><i class='fas fa-eye'></i></a>");
         }
 
         $clientedit="";
         if(array_key_exists("clientedit", $permissions)) { 
         $clientedit=("<a class='btn btn-primary btn-sm' href='editclient/".$record->id."'><i class='fas fa-edit'></i></a>&nbsp;&nbsp;<a class='btn btn-success btn-sm' href='clientdocs/".$record->id."'><i class='far fa-file-alt'></i></a>");
         }

         $clientdelete="";
         if(array_key_exists("clientdelete", $permissions)) { 
         $clientdelete=("<a class='btn btn-danger btn-sm' href='#' data-href='delclient/".$record->id."' data-toggle='modal' data-target='#confirm-delete'><i class='fas fa-trash-alt'></i></a>");
         }


         if(1){
             $data[] = array( $record->cid,
            $record->name,
            $careof,
            $record->phone,
            $record->mobile,
            $record->email,
            $record->address,
                 $record->gstin,
                 $record->tin,
                 $record->ref,
                 $record->cp,
                 $rep,
                 $clientview."&nbsp"."&nbsp"."&nbsp".$clientedit."&nbsp"."&nbsp"."&nbsp".$clientdelete

           
        );
         }
        
     }
    

     ## Response
     $response = array(
        "draw" => intval($draw),
        "recordsTotal" => $totalRecords,
        "recordsFiltered" => $totalRecords,
        "data" => $data
     );

     echo json_encode($response); 
    }
    
    function careoflist(){
        
        $records=$this->user_model->careofList("", "", "");
        $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
        $totalRecords = count($records);
        
    $data = array();
     foreach($records as $record ){
        $permissions=json_decode($this->session->userdata('permissions'), true);
        $rep="";
        if($this->user_model-> getRepById($record->rep)){
         $rep=$this->user_model-> getRepById($record->rep)->rname;
         }

         $careview="";
         if(array_key_exists("careview", $permissions)) { 
         $careview=("<a class='btn btn-success btn-sm' href='viewcareof/".$record->id."'><i class='fas fa-eye'></i></a>");
         }

         $careedit="";
         if(array_key_exists("careedit", $permissions)) { 
         $careedit=("<a class='btn btn-primary btn-sm' href='editcareof/".$record->id."'><i class='fas fa-edit'></i></a>");
         }

         $caredelete="";
         if(array_key_exists("caredelete", $permissions)) { 
         $caredelete=("<a class='btn btn-danger btn-sm' href='#' data-href='delcareof/".$record->id."' data-toggle='modal' data-target='#confirm-delete'><i class='fas fa-trash-alt'></i></a>");
         }


     if(1){
         $data[] = array( $record->careid,
        $record->name,
       $record->phone,
        $record->mobile,
        $record->email,
        $record->address,
             $record->gstin,
             $record->tin,
             $record->fax,  
             $record->credit, 
             $record->ref,  
             $record->cp,
             $record->openbal,
             $rep,
             $careview."&nbsp"."&nbsp".$careedit."&nbsp"."&nbsp".$caredelete

     );
    
 }
     }

 ## Response
 $response = array(
    "draw" => intval($draw),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords,
    "data" => $data
 );

 echo json_encode($response); 
}
    function policyList(){
         $sno=0;
            $records=$this->user_model->policyList("", "", "");
            $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));
            $totalRecords = count($records);
            
        $data = array();
     foreach($records as $record ){
        $sno=$sno+1;
        $permissions=json_decode($this->session->userdata('permissions'), true);
        $rep="";
        if($this->user_model-> getRepById($record->rep)){
         $rep=$this->user_model->getRepById($record->rep)->rname;
         }
         $nmtype="";
         if( $this->user_model->getnmtypeById($record->nmtype)){
          $nmtype= $this->user_model->getnmtypeById($record->nmtype)->nmtype;
          }
  
          $careof="";
          if($this->user_model->getcareofById($record->careof)){
             $careof=$this->user_model->getcareofById($record->careof)->name;
          }
          $stype="";
           if($this->user_model->getstypeBysId($record->stype)){
           $stype=$this->user_model->getstypeBysId($record->stype)->stype;
          }
          $stype="";
         if($this->user_model->getstypeBysId($record->stype)){
          $stype=$this->user_model->getstypeBysId($record->stype)->stype;
         }
          $pytype="";
         if($this->user_model->getpytypeBypId($record->pytype)){
          $pytype=$this->user_model->getpytypeBypId($record->pytype)->pytype;
         }
          $inscompany="";
         if($this->user_model->getinscompanyById($record->inscompany)){
          $inscompany=$this->user_model->getinscompanyById($record->inscompany)->inscompany;
         }
     $policyview="";
     if(array_key_exists("policyview", $permissions)) { 
     $policyview=("<a class='btn btn-success btn-sm' href='viewpolicy/".$record->pid."'><i class='fas fa-eye'></i></a>");
     }
     $policyedit="";
     if(array_key_exists("policyedit", $permissions)) { 
     $policyedit=("<a class='btn btn-primary btn-sm' href='editpolicy/".$record->pid."'><i class='fas fa-edit'></i></a>&nbsp;&nbsp;<a class='btn btn-success btn-sm' href='policydocs/".$record->pid."'><i class='far fa-file-alt'></i></a>&nbsp;&nbsp;
      <a class='btn btn-warning btn-sm' href='renewal_policy/".$record->pid."'><i class='fas fa-circle-notch'></i></a>");
     }
     $policydelete="";
     if(array_key_exists("policydelete", $permissions)) { 
     $policydelete=("<a class='btn btn-danger btn-sm' href='#' data-href='delpolicy/".$record->pid."' data-toggle='modal' data-target='#confirm-delete'><i class='fas fa-trash-alt'></i></a>");
     }
          $pfrom = $record->pfrom;
          $convertDate = date("d-m-Y", strtotime($pfrom));
          $pto= $record->pto;
          $policyDate = date("d-m-Y", strtotime($pto));
          $rdate= $record->rdate;
          $registerDate = date("d-m-Y", strtotime($rdate));

          if(1){ 
        
            $data[] = array(
            $sno,
            $record->policyid,
            $record->pno,
            $pytype,
            $convertDate,
            $policyDate,
            $inscompany,
            $this->user_model->getpolicyByPId($record->pid)->insname,
            $careof,
            $record->mobile,  
                 $record->vno,
                 $record->make,
                 $record->model,
                 $nmtype,
                 $rep,
                 $record->rno,
                 $registerDate, 
                 $record->phone,
                 $record->address,
                 $record->remarks,
                 $stype, 
                 $record->odprem,
                 $record->tpprem, 
                 $record->prem_wotax,
                 $record->stax,
                 $record->tprem,
                 $record->scharge,
                 $policyview."&nbsp"."&nbsp".$policyedit."&nbsp"."&nbsp".$policydelete
                

    );                                                                               
     }
}
     ## Response
     $response = array(
        "draw" => intval($draw),
        "recordsTotal" => $totalRecords,
        "recordsFiltered" => $totalRecords,
        "data" => $data
     );
     echo json_encode($response); 
    }
    
    function clientdocsList(){
        
        $records=$this->user_model->clientdocsList($this->input->post("cid"));
       
       $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
        $totalRecords = count($records);
    $data = array();
     foreach($records as $record ){
        
     if(1){
         $data[] = array( $record->id,
         $this->user_model->getdoctypeById($record->doctype)->doctype,
       $record->docno,
        $record->docname,
        "<a class='btn btn-success btn-sm' href=".site_url('view_cfile/' . $record->docname)."><i class='fas fa-eye'></i></a>&nbsp;&nbsp;&nbsp;<a class='btn btn-danger btn-sm' href=".base_url('del_cfile/' . $record->id)." ><i class='fas fa-trash-alt'></i></a>"

       
    );
     }//else{
         
    //      $data[] = array( $record->id,
    //      $this->user_model->getdoctypeById($record->docttype)->docttype,
    //    $record->docno,
    //     $record->docname,
    //     "<a class='btn btn-success btn-sm' href=".site_url('view_cfile/' . $record->docname)."><i class='fas fa-eye'></i></a>&nbsp;&nbsp;&nbsp;<a class='btn btn-danger btn-sm' href=".base_url('del_cfile/' . $record->id)." ><i class='fas fa-trash-alt'></i></a>"
        
    // );
    //  }
    
 }


 ## Response
 $response = array(
    "draw" => intval($draw),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords,
    "data" => $data
 );
 echo json_encode($response); 
}


function policydocsList(){
        
    $records=$this->user_model->policydocsList($this->input->post("pid"));
   
   $draw = intval($this->input->get("draw"));
  $start = intval($this->input->get("start"));
  $length = intval($this->input->get("length"));
    $totalRecords = count($records);
$data = array();
 foreach($records as $record ){
    
 if(1){
     $data[] = array( $record->id,
     $this->user_model->getdoctypeById($record->doctype)->doctype,
   $record->docno,
    $record->docname,
    "<a class='btn btn-success btn-sm' href=".site_url('view_pfile/' . $record->docname)."><i class='fas fa-eye'></i></a>&nbsp;&nbsp;&nbsp;<a class='btn btn-danger btn-sm' href=".base_url('del_pfile/' . $record->id)." ><i class='fas fa-trash-alt'></i></a>"

   
);
//  }else{
     
//      $data[] = array( $record->id,
//      $this->user_model->getdoctypeById($record->docttype)->docttype,
//    $record->docno,
//     $record->docname,
//     "<a class='btn btn-success btn-sm' href=".site_url('view_pfile/' . $record->docname)."><i class='fas fa-eye'></i></a>&nbsp;&nbsp;&nbsp;<a class='btn btn-danger btn-sm' href=".base_url('del_pfile/' . $record->id)." ><i class='fas fa-trash-alt'></i></a>"
    
// );
 }

}


## Response
$response = array(
"draw" => intval($draw),
"recordsTotal" => $totalRecords,
"recordsFiltered" => $totalRecords,
"data" => $data
);
echo json_encode($response); 
}




function claimsList(){
        
    $records=$this->user_model->claimsList("", "", "");
    $draw = intval($this->input->get("draw"));
  $start = intval($this->input->get("start"));
  $length = intval($this->input->get("length"));
    $totalRecords = count($records);
    
$data = array();
 foreach($records as $record ){
    $permissions=json_decode($this->session->userdata('permissions'), true);
    $careof="";
    if($this->user_model->getcareofById($record->careof)){
            $careof=$this->user_model->getcareofById($record->careof)->name;
    }
    $rep="";
    if($this->user_model->getrepById($record->rep)){
     $rep=$this->user_model->getrepById($record->rep)->rname;
    }

    $ctype="";
    if($this->user_model->getctypeById($record->ctype))
    {
       $ctype=$this->user_model->getctypeById($record->ctype)->ctype;
       
    }
    
    $cstype="";
    if($this->user_model->getcstypeById($record->cstype)){
            $cstype=$this->user_model->getcstypeById($record->cstype)->cstype;
        
    }

    $claimview="";
    if(array_key_exists("claimview", $permissions)) { 
    $claimview=("<a class='btn btn-success btn-sm' href='viewclaims/".$record->sno."'><i class='fas fa-eye'></i></a>");
    }

    $claimedit="";
    if(array_key_exists("claimedit", $permissions)) { 
    $claimedit=("<a class='btn btn-primary btn-sm' href='editclaims/".$record->sno."'><i class='fas fa-edit'></i></a>");
    }


    $claimdelete="";
    if(array_key_exists("claimdelete", $permissions)) { 
    $claimdelete=("<a class='btn btn-danger btn-sm' href='#' data-href='delclaims/".$record->sno."' data-toggle='modal' data-target='#confirm-delete'><i class='fas fa-trash-alt'></i></a>");
    }


       $indate = $record->indate;
       $inwardDate = date("d-m-Y", strtotime($indate));
       $sdate = $record->sdate;
       $convertDate = date("d-m-Y", strtotime($sdate));
       $edate = $record->edate;
       $ExpectedDate = date("d-m-Y", strtotime($edate));

 if(1){
     $data[] = array( $record->sno,
     $this->user_model->getClaimsById($record->sno)->insname,
     $inwardDate,
    $careof, 
    $ctype,
    $cstype,
    $record->pno,
    $record->cno,
    $record->camount,
    $record->samount,
    $ExpectedDate,
    $record->status,
    $convertDate,
    $record->tprem,
    $record->remarks,
    $rep,
    $claimview."&nbsp"."&nbsp".$claimedit."&nbsp"."&nbsp".$claimdelete

);
 }

}


## Response
$response = array(
"draw" => intval($draw),
"recordsTotal" => $totalRecords,
"recordsFiltered" => $totalRecords,
"data" => $data
);
echo json_encode($response); 
}
   function renewalList(){
        
        $records=$this->user_model->renewalList("", "", "");
        $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
        $totalRecords = count($records);
        
    $data = array();
    $sno=0;
 foreach($records as $record ){
    $sno=$sno+1;
    $rep="";
    if($this->user_model->getrepById($record->rep)){
     $rep=$this->user_model->getrepById($record->rep)->rname;
     }
     $careof="";
     if($this->user_model->getcareofById($record->careof)){
             $careof=$this->user_model->getcareofById($record->careof)->name;
     }
     $inscompany="";
     if($this->user_model->getinscompanyById($record->inscompany)){
      $inscompany= $this->user_model->getinscompanyById($record->inscompany)->inscompany;
      
     }
       $pytype="";
       if( $this->user_model->getpytypeBypId($record->pytype)){
        $pytype= $this->user_model->getpytypeBypId($record->pytype)->pytype;
        }
        $stype="";
           if($this->user_model->getstypeBysId($record->stype)){
           $stype=$this->user_model->getstypeBysId($record->stype)->stype;
         }
         $nmtype="";
       if( $this->user_model->getnmtypeById($record->nmtype)){
        $nmtype= $this->user_model->getnmtypeById($record->nmtype)->nmtype;
        }

         $pfrom = $record->pfrom;
          $convertDate = date("d-m-Y", strtotime($pfrom));
          $pto= $record->pto;
          $policyDate = date("d-m-Y", strtotime($pto));
          $rdate= $record->rdate;
          $receiptdate = date("d-m-Y", strtotime($rdate));

      if(1){
        $data[] = array( 
            $sno,
            $record->pid,
        $record->policyid,
        $record->pno,
        $pytype,
        $convertDate,
        $policyDate,
        $inscompany,
        $this->user_model->getpolicyByPId($record->pid)->insname,
        $careof,
        $record->mobile,
        $record->vno,
        $record->make,
        $record->model,
        $nmtype,
             $rep,
             $record->rno,
             $receiptdate,
             $record->phone,
             $record->address,
             $record->remarks,
             $stype,  
             $record->odprem,
             $record->tpprem,
             $record->prem_wotax,
             $record->stax,
             $record->scharge,
             $record->tprem,
             
             "<button  id='semail' title='Email' class='btn btn-info btn-sm' data-pid='".$record->pid."'><i class='fas fa-envelope'></i></button>&nbsp;&nbsp;<button id='sms'class='btn btn-primary btn-sm' title='SMS' data-pid='".$record->pid."'><i class='fas fa-comment-alt'></i></button>"

    );  
 }
}
 ## Response
 $response = array(
    "draw" => intval($draw),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords,
    "data" => $data
 );
 echo json_encode($response); 
} 



function leadingList(){
   

    $records=$this->user_model->leadingList("", "", "");
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $pfrom=$this->input->post("pfrom"); 
    $pto=$this->input->post("pto"); 
    $totalRecords = count($records);
    
$data = array();
$tpre=0;
foreach($records as $record ){
    if($this->user_model->psum($record->id,$pfrom,$pto)){
        $tpre=$this->user_model->psum($record->id,$pfrom,$pto)->tprem;
    }
    $prem_wotax=0;
    if($this->user_model->prumtax($record->id,$pfrom,$pto)){
        $prem_wotax=$this->user_model->prumtax($record->id,$pfrom,$pto)->prem_wotax;
    }
    
    $npolicy=0;
    if($this->user_model->pcount($record->id,$pfrom,$pto)){
        $npolicy=($this->user_model->pcount($record->id,$pfrom,$pto));
    }
    
    $odpre=0;
    if($this->user_model->odprem($record->id,$pfrom,$pto)){
        $odpre=$this->user_model->odprem($record->id,$pfrom,$pto)->odprem;
    }
    
    
    $pre=0;
    if($this->user_model->tpprem($record->id,$pfrom,$pto)){
        $pre=$this->user_model->tpprem($record->id,$pfrom,$pto)->tpprem;
    }
    
    $scharge=0;
    if($this->user_model->scharge($record->id,$pfrom,$pto)){
        $scharge=$this->user_model->scharge($record->id,$pfrom,$pto)->scharge;
    }
   
  if(1){
    $data[] = array( $record->id,
    $record->inscompany,
    $tpre,
    $npolicy,
    $odpre,
    $pre,
    $prem_wotax,
    $scharge

);  
}
}
## Response
$response = array(
"draw" => intval($draw),
"recordsTotal" => $totalRecords,
"recordsFiltered" => $totalRecords,
"data" => $data
);
echo json_encode($response); 
}
    
   }
?>