<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    
    
    function getRep()
    {
        $this->db->select('*');
        $this->db->from('rep');
        $query = $this->db->get();
        return $query->result();
    }
    function getCareof()
    {
        $this->db->select('*');
        $this->db->from('careof');
        $query = $this->db->get();
        return $query->result();
    }
    
    function getClient()
    {
        $this->db->select('*');
        $this->db->from('clients');
        $query = $this->db->get();
        return $query->result();
    }
    function getClientdocs()
    {
        $this->db->select('*');
        $this->db->from('client_files');
        $query = $this->db->get();
        return $query->result();
    }
    function getClientdocbyID($id)
    {
        
        $query = $this->db->get_where("client_files",array('id' => $id));
        return $query->row();
    }
    function getPolicydocbyID($id)
    {
        
        $query = $this->db->get_where("policy_files",array('id' => $id));
        return $query->row();
    }
    function getPolicy()
    {
        $this->db->select('*');
        $this->db->from('policy');
        $query = $this->db->get();
        return $query->result();
    }
    function getclaims()
    {
        $this->db->select('*');
        $this->db->from('claims');
        $query = $this->db->get();
        return $query->result();
    }

    function getrenewal()
    {
        $this->db->select('*');
        $this->db->from('policy');
        $query = $this->db->get();
        return $query->result();
    }

    function getUsers()
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("role_id!=", "1"); 
        
        $query = $this->db->get();

        return $query->result();
    }
    
    function getprofile()
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("role_id!=", "1"); 
        
        $query = $this->db->get();

        return $query->result();
    }
    
    public function getcareid(){
             $this->db->order_by('substring(careid,4,5) DESC');
            $this->db->limit(1);
            return $this->db->get('careof')->row();
         }
    
     
  public function getcid(){
            $this->db->order_by('substring(cid,3,5) DESC');
           $this->db->limit(1);
           return $this->db->get('clients')->row();
        }

        public function getpolicyid(){
            $this->db->order_by('substring(policyid,4,5) DESC');
           $this->db->limit(1);
           return $this->db->get('policy')->row();
        }

    function addNewClient($clientInfo)
    {
        
        $this->db->trans_start();
        $this->db->insert('clients', $clientInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function addNewCareof($careofInfo)
    {
        
        $this->db->trans_start();
        $this->db->insert('careof', $careofInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function addclientdocs($clientdocsInfo)
    {
        
        $this->db->trans_start();
        $this->db->insert('client_files', $clientdocsInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

   
    function addpolicydocs($policydocsInfo)
    {
        
        $this->db->trans_start();
        $this->db->insert('policy_files', $policydocsInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function addNewPolicy($policyInfo)
    {
        
        $this->db->trans_start();
        $this->db->insert('policy', $policyInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    

    function addNewClaims($claimsInfo)
    {
        
        $this->db->trans_start();
        $this->db->insert('claims', $claimsInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function getinscompany()
    {
        $this->db->select('*');
        $this->db->order_by("inscompany", "ASC");
        $this->db->from('inscompany');
        $query = $this->db->get();
        return $query->result();
    }
    function getpolicytype()
    {
        $this->db->select('*');
        $this->db->from('policy_type');
        $query = $this->db->get();
        return $query->result();
    }
    function getclaimtype()
    {
        $this->db->select('*');
        $this->db->from('claim_type');
        $query = $this->db->get();
        return $query->result();
    }
    function getpytype($searchTerm=""){

        // Fetch pytype
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('policy_type');
        $pytypes = $fetched_records->result_array();
  
        // Initialize Array with fetched data
        $data = array();
        foreach($pytypes as $pytype){
            $data[] = array("id"=>$pytype['pytype'], "text"=>$pytype['pytype']);
        }
        echo json_encode($data);
    }

    function getpno($searchTerm=""){

        // Fetch pytype
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('claims');
        $policy = $fetched_records->result_array();
  
        // Initialize Array with fetched data
        $data = array();
        foreach($policy as $p){
            $data[] = array("id"=>$p['pno'], "text"=>$p['pno']);
        }
        echo json_encode($data);
    }

    function getmail($searchTerm=""){

        // Fetch pytype
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('clients');
        $mail = $fetched_records->result_array();
  
        // Initialize Array with fetched data
        $data = array();
        foreach($mail as $email){
            $data[] = array("id"=>$email['to_email'], "text"=>$email['to_email']);
        }
        echo json_encode($data);
    }
    function gettype($searchTerm=""){

        // Fetch pytype
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('subtype');
        $stypes = $fetched_records->result_array();
  
        // Initialize Array with fetched data
        $data = array();
        foreach($stypes as $stype){
            $data[] = array("id"=>$stype['stype'], "text"=>$stype['stype']);
        }
        echo json_encode($data);
    }
    
    function getctype($searchTerm=""){

        // Fetch pytype
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('claim_type');
        $ctypes = $fetched_records->result_array();
  
        // Initialize Array with fetched data
        $data = array();
        foreach($ctypes as $ctype){
            $data[] = array("id"=>$ctype['ctype'], "text"=>$ctype['ctype']);
        }
        echo json_encode($data);
    }


    function getclaimsubtype($searchTerm=""){

        // Fetch pytype
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('cstype');
        $cstypes = $fetched_records->result_array();
  
        // Initialize Array with fetched data
        $data = array();
        foreach($cstypes as $cstype){
            $data[] = array("id"=>$cstype['cstype'], "text"=>$cstype['cstype']);
        }
        echo json_encode($data);
    }

    function getcompany($searchTerm=""){

        // Fetch pytype
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('vcompany');
        $make = $fetched_records->result_array();
  
        // Initialize Array with fetched data
        $data = array();
        foreach($make as $makes){
            $data[] = array("id"=>$makes['make'], "text"=>$makes['make']);
        }
        echo json_encode($data);
    }
    

    
    function getmodels($searchTerm=""){

        // Fetch pytype
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('vcompany');
        $model = $fetched_records->result_array();
  
        // Initialize Array with fetched data
        $data = array();
        foreach($model as $models){
            $data[] = array("id"=>$models['model'], "text"=>$models['model']);
        }
        echo json_encode($data);
    }
    
    function getres($searchTerm=""){

        // Fetch pytype
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('rep');
        $rep = $fetched_records->result_array();
  
        // Initialize Array with fetched data
        $data = array();
        foreach($rep as $rep){
            $data[] = array("id"=>$rep['rname'], "text"=>$rep['rname']);
        }
        echo json_encode($data);
    }

 
    function getcare($searchTerm=""){

        // Fetch pytype
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('careof');
        $care = $fetched_records->result_array();
  
        // Initialize Array with fetched data
        $data = array();
        foreach($care as $careof){
            $data[] = array("id"=>$careof['name'], "text"=>$careof['name']);
        }
        echo json_encode($data);
    }
    function geticompany($searchTerm=""){

        // Fetch pytype
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('inscompany');
        $icompany = $fetched_records->result_array();
  
        // Initialize Array with fetched data
        $data = array();
        foreach($icompany as $inscompany){
            $data[] = array("id"=>$inscompany['inscompany'], "text"=>$inscompany['inscompany']);
        }
        echo json_encode($data);
    }
    function getiname($searchTerm=""){

        // Fetch pytype
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('clients');
        $insname = $fetched_records->result_array();
  
        // Initialize Array with fetched data
        $data = array();
        foreach($insname as $iname){
            $data[] = array("id"=>$iname['name'], "text"=>$iname['name']);
        }
        echo json_encode($data);
    }
    function getstype()
    {
        $this->db->select('*');
        $this->db->from('subtype');
        $query = $this->db->get();
        return $query->result();
    }

    function getcstype()
    {
        $this->db->select('*');
        $this->db->from('cstype');
        $query = $this->db->get();
        return $query->result();
    }
    function fetch_make()
    {
        $this->db->order_by("make", "ASC");
        $query = $this->db->get("vcompany");
        return $query->result();
    }

    function fetch_model($make)
    {
    $this->db->where('make',$make);
    $this->db->order_by("model", "ASC");
    $query = $this->db->get("vcompany")->result();
    return  json_encode($query);
 
   }
    function fetch_model1()
     {
         $this->db->order_by("model", "ASC");
         $query = $this->db->get("vcompany");
         return $query->result();
    }

     function fetch_pytype()
    {
        $this->db->order_by("pytype", "ASC");
        $query = $this->db->get("policy_type");
        return $query->result();
    }
    function fetch_stype($pid)
   {
   $this->db->where('pid',$pid);
   $this->db->order_by("stype", "ASC");
   $query = $this->db->get("subtype")->result();
   return  json_encode($query);

  }

  

   function fetch_stype1()
    {
        $this->db->order_by("stype", "ASC");
        $query = $this->db->get("subtype");
        return $query->result();
   }

   function fetch_ctype()
   {
       $this->db->order_by("ctype", "ASC");
       $query = $this->db->get("claim_type");
       return $query->result();
   } 

   function fetch_cstype($claimid)
   {
   $this->db->where('claimid',$claimid);
   $this->db->order_by("cstype", "ASC");
   $query = $this->db->get("cstype")->result();
   return  json_encode($query);

  }
  function fetch_cstype1()
   {
   
   $this->db->order_by("cstype", "ASC");
   $query = $this->db->get("cstype")->result();
   return $query->result();
  }
    function getmake()
    {
        $this->db->distinct();
        $this->db->select('make');
        $this->db->order_by("make", "ASC");
        $this->db->from('vcompany');
        $query = $this->db->get();
        return $query->result();
    }

      function getmodel()
    {
        
        $this->db->select('*');
        $this->db->from('vcompany');
        $query = $this->db->get();
        return $query->result();
    }
     
    function getdoctype()
    {
        $this->db->select('*');
        $this->db->from('doctype');
        $query = $this->db->get();
        return $query->result();
    }
    function getnmtype()
    {
        $this->db->select('*');
        $this->db->from('nmtype');
        $query = $this->db->get();
        return $query->result();
    }
   function getdoctypeBycat($cat)
    {
        $this->db->select('*');
       // $this->db->where('category',$category);
        //print_r($category);
       // $this->db->filter('client');
        $this->db->from('doctype');
        $this->db->where('category',$cat);
        $query = $this->db->get();
        return $query->result();
    }
    function getinsname()
    {
        $this->db->select('*');
        $this->db->from('clients');
        $query = $this->db->get();
        return $query->result();
    }
   
   
    function addquote($quoteInfo)
    {
        $this->db->trans_start();
        $this->db->insert('quote',$quoteInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function addinscompany($inscompanyInfo)
    {
        $this->db->trans_start();
        $this->db->insert('inscompany', $inscompanyInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function addnew_pytype($pytypeInfo)
    {
        $this->db->trans_start();
        $this->db->insert('policy_type', $pytypeInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function addnew_stype($stypeInfo)
    {
        $this->db->trans_start();
        $this->db->insert('subtype', $stypeInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function addnew_cstype($cstypeInfo)
    {
        $this->db->trans_start();
        $this->db->insert('cstype', $cstypeInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function addnew_ctype($ctypeInfo)
    {
        $this->db->trans_start();
        $this->db->insert('claim_type', $ctypeInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

function addnew_doctype($doctypeInfo)
{
    $this->db->trans_start();
    $this->db->insert('doctype', $doctypeInfo);
    
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    
    return $insert_id;
}

function addnew_nmtype($nmtypeInfo)
{
    $this->db->trans_start();
    $this->db->insert('nmtype', $nmtypeInfo);
    
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    
    return $insert_id;
}
function addnew_vcompany($vcompanyInfo)
{
    $this->db->trans_start();
    $this->db->insert('vcompany', $vcompanyInfo);
    
    $insert_id = $this->db->insert_id();
     
    $this->db->trans_complete();
    
    return $insert_id;
}
    function addNewRep($repInfo)
    {
        $this->db->trans_start();
        $this->db->insert('rep', $repInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function clientList($searchText, $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('clients');
       
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function CareofList($searchText, $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('careof');
       
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function policyList($searchText, $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('policy');
       
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function clientdocsList($cid)
    {
        $this->db->select('*');
        $this->db->from('client_files');
        $this->db->where('cid',$cid); 
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function policydocsList($pid)
    {
        $this->db->select('*');
        $this->db->from('policy_files');
        $this->db->where('pid',$pid); 
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function claimsList($searchText, $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('claims');
       
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function renewalList($searchText, $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('policy');
       
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function psum($id,$pfrom,$pto)
    {
        $this->db->select_sum('tprem');

        $this->db->from('policy');

        if($pfrom!="" && $pto!="")
        {
        $this->db->where('pfrom BETWEEN "'. $pfrom. '" AND "'. $pto. '" ');

        }

        $this->db->where('inscompany',$id);

        $query = $this->db->get();

        $result = $query->row();

        return $result;
    }

    function odprem($id,$pfrom,$pto)
    {
        $this->db->select_sum('odprem');

        $this->db->from('policy');

        if($pfrom!="" && $pto!="")
        {
        $this->db->where('pfrom BETWEEN "'. $pfrom. '" AND "'. $pto. '" ');

        }

        $this->db->where('inscompany',$id);

        $query = $this->db->get();

        $result = $query->row();

        return $result;
    }

    
    function tpprem($id,$pfrom,$pto)
    {
        $this->db->select_sum('tpprem');

        $this->db->from('policy');

        if($pfrom!="" && $pto!="")
        {
        $this->db->where('pfrom BETWEEN "'. $pfrom. '" AND "'. $pto. '" ');

        }

        $this->db->where('inscompany',$id);

        $query = $this->db->get();

        $result = $query->row();

        return $result;
    }

    function scharge($id,$pfrom,$pto)
    {
        $this->db->select_sum('scharge');

        $this->db->from('policy');

        if($pfrom!="" && $pto!="")
        {
        $this->db->where('pfrom BETWEEN "'. $pfrom. '" AND "'. $pto. '" ');

        }

        $this->db->where('inscompany',$id);

        $query = $this->db->get();

        $result = $query->row();

        return $result;
    }
    
    function prumtax($id,$pfrom,$pto)
    {
        $this->db->select_sum('prem_wotax');

        $this->db->from('policy');

        if($pfrom!="" && $pto!="")
        {
        $this->db->where('pfrom BETWEEN "'. $pfrom. '" AND "'. $pto. '" ');

        }

        $this->db->where('inscompany',$id);

        $query = $this->db->get();

        $result = $query->row();

        return $result;
    }
    function pcount($id,$pfrom,$pto)
    {
        $this->db->select('count(*)');  
        $query = $this->db->get('policy');
        if($pfrom!="" && $pto!="")
        {
        $this->db->where('pfrom BETWEEN "'. $pfrom. '" AND "'. $pto. '" ');

        }
        
       $this->db->where('inscompany',$id);

        $cnt = $query->row_array();

        return $cnt['count(*)'];
    }

    
    function leadingList($searchText, $page, $segment)
    {
        $this->db->select('*');

        $this->db->from('inscompany');
       
        $query = $this->db->get();
        
        $result = $query->result(); 

        return $result;
    }
   
 
    function getRepById($id)
    {
        $this->db->select('*');
        $this->db->from('rep');
        $this->db->where("id",$id);
        $query = $this->db->get();
        
        return $query->row();
    }
    function getinscompanyById($id)
    {
        $this->db->select('*');
        $this->db->from('inscompany');
        $this->db->where("id",$id);
        $query = $this->db->get();
        
        return $query->row();
    }
    function getpytypeBypId($pid)
    {
        $this->db->select('*');
        $this->db->from('policy_type');
        $this->db->where("pid",$pid);
        $query = $this->db->get();
        
        return $query->row();
    }
    function getstypeBysId($sid)
    {
        $this->db->select('*');
        $this->db->from('subtype');
        $this->db->where("sid",$sid);
        $query = $this->db->get();
        
        return $query->row();
    }

    function getcstypeById($id)
    {
        $this->db->select('*');
        $this->db->from('cstype');
        $this->db->where("id",$id);
        $query = $this->db->get();
        
        return $query->row();
    }

    function getctypeById($claimid)
    {
        $this->db->select('*');
        $this->db->from('claim_type');
        $this->db->where("claimid",$claimid);
        $query = $this->db->get();
        
        return $query->row();
    }

    function getvcompanyById($id)
    {
        $this->db->select('*');
        $this->db->from('vcompany');
        $this->db->where("id",$id);
        $query = $this->db->get();
        
        return $query->row();
    }
    function getdoctypeById($id)
    {
        $this->db->select('*');
        $this->db->from('doctype');
        $this->db->where("id",$id);
        $query = $this->db->get();
        return $query->row();
    }

    function getnmtypeById($id)
    {
        $this->db->select('*');
        $this->db->from('nmtype');
        $this->db->where("id",$id);
        $query = $this->db->get();
        return $query->row();
    }

    function getClientById($id)
    {
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->where("id",$id);
        $query = $this->db->get();
        return $query->row();
       
    }
    
    function getpolicyByCId($cid)
    {
        $this->db->select('*');
        $this->db->from('policy');
        $this->db->where("cid",$cid);
        $query = $this->db->get();
        return $query->result();
       
    }


    function getpolicyByPId($pid)
    {
        $this->db->select('*');
        $this->db->from('policy');
        $this->db->where("pid",$pid);
        $query = $this->db->get();
        return $query->row();
       
    }
    
        
    function getpolicyById($policyid)
    {
        $this->db->select('*');
        $this->db->from('policy');
        $this->db->where("policyid",$policyid);
        $query = $this->db->get();
        return $query->row();
       
    }
    function getcareofById($id)
    {
        $this->db->select('*');
        $this->db->from('careof');
        $this->db->where("id",$id);
        $query = $this->db->get();
        return $query->row();
    }
    
    function getClientByCId($id)
    {
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->where("cid",$id);
        $query = $this->db->get();
        return $query->row();
    }
    function getCareofByCareId($id)
    {
        $this->db->select('*');
        $this->db->from('careof');
        $this->db->where("careid",$id);
        $query = $this->db->get();
        return $query->row();
    }
    function getClaimsById($sno)
    {
        $this->db->select('*');
        $this->db->from('claims');
        $this->db->where('sno',$sno);
        $query = $this->db->get();
        return $query->row();
    }
    function getUserByName($name)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("username",$name);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function getUserById($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("id",$id);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function updateClient($clientInfo, $cid)
    {
        $this->db->where('cid', $cid);
        $this->db->update('clients', $clientInfo);
        
        return TRUE;
    }
     
    function updateCareof($careofInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('careof', $careofInfo);
        
        return TRUE;
    }
    function updatepolicy($policyInfo, $pid)
    {
        $this->db->where('pid', $pid);
        $this->db->update('policy', $policyInfo);
        
        return TRUE;
    }
    function updateClaims($claimsInfo,$sno)
    {
        $this->db->where('sno', $sno);
        $this->db->update('claims', $claimsInfo);
        
        return TRUE;
    }

    function updateRep($repinfo, $cid)
    {
        $this->db->where('id', $cid);
        $this->db->update('rep', $repinfo);
        
        return TRUE;
    }
    function update_inscompany($inscompanyinfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('inscompany', $inscompanyinfo);
        
        return TRUE;
    }
    function update_pytype($pytypeInfo, $pid)
    {
        $this->db->where('pid', $pid);
        $this->db->update('policy_type', $pytypeInfo);
        
        return TRUE;
    }
    function update_stype($stypeInfo, $sid)
    {
        $this->db->where('sid', $sid);
        $this->db->update('subtype', $stypeInfo);
        
        return TRUE;
    }
    function update_cstype($cstypeInfo,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('cstype', $cstypeInfo);
        
        return TRUE;
    }
    function update_ctype($ctypeInfo, $claimid)
    {
        $this->db->where('claimid', $claimid);
        $this->db->update('claim_type', $ctypeInfo);
        
        return TRUE;
    }
    function update_vcompany($vcompanyInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('vcompany', $vcompanyInfo);
        
        return TRUE;
    }
    function update_doctype($doctypeInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('doctype', $doctypeInfo);
        
        return TRUE;
    }

    function update_nmtype($nmtypeInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('nmtype', $nmtypeInfo);
        
        return TRUE;
    }

    function updateUser($userInfo, $cid)
    {
        $this->db->where('id', $cid);
        $this->db->update('users', $userInfo);
        
        return TRUE;
    } 
    function updateprofile($profileInfo, $cid)
    {
        $this->db->where('id', $cid);
        $this->db->update('users', $profileInfo);
        
        return TRUE;
    }    
       
    
    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('users', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function deleteUser($userId)
    {
        $this->db->where('id', $userId);
        $this->db->delete('users');
        
        return $this->db->affected_rows();
    }
    
    function deleteRep($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('rep');
        
        return $this->db->affected_rows();
    }
 
    function deleteinscompany($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('inscompany');
        
        return $this->db->affected_rows();
    }


    function deletepytype($pid)
    {
        $this->db->where('pid', $pid);
        $this->db->delete('policy_type');
        
        return $this->db->affected_rows();
    }

    function deletestype($sid)
    {
        $this->db->where('sid', $sid);
        $this->db->delete('subtype');
        
        return $this->db->affected_rows();
    }

    
    function delete_ctype($claimid)
    {
        $this->db->where('claimid', $claimid);
        $this->db->delete('claim_type');
        
        return $this->db->affected_rows();
    }

    function delete_cstype($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('cstype');
        
        return $this->db->affected_rows();
    }
    function deletevcompany($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('vcompany');
        
        return $this->db->affected_rows();
    }
    function deletedoctype($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('doctype');
        
        return $this->db->affected_rows();
    }
    function delete_nmtype($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('nmtype');
        
        return $this->db->affected_rows();
    }
    function deleteClient($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('clients');
        
        return $this->db->affected_rows();
    }
    
    function deleteCareof($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('careof');
        
        return $this->db->affected_rows();
    }
    
    function deletePolicy($pid)
    {
        $this->db->where('pid', $pid);
        $this->db->delete('policy');
        
        return $this->db->affected_rows();
    }

    function  deleteclaims($sno)
    {
        $this->db->where('sno', $sno);
        $this->db->delete('claims');
        
        return $this->db->affected_rows();
    }
    
    function  deletecfile($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('client_files');
        
        return $this->db->affected_rows();
    }
    
    function  deletepfile($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('policy_files');
        
        return $this->db->affected_rows();
    }
    /*          Extra*/
    function getProcess()
    {
        $this->db->select('Process_Desc,Process_Code');
        $this->db->from('tbl_process');
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function getProduct()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_grp');
        $query = $this->db->get();
        
        return $query->result();
    }
    function getSize()
    {
        $this->db->select('id,Product_GRP_code,Size_code,Combo,Desc');
        $this->db->from('tbl_size_grp');
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function getSizeByGcode($gcode)
    {
        $this->db->select('id,Product_GRP_code,Size_code,Combo,Desc');
        $this->db->from('tbl_size_grp');
        $this->db->where("Product_GRP_code",$gcode);
        $query = $this->db->get();
        
        return $query->result();
    }
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);   
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }
    
    function checkDCodeExists($pcode)
    {
        $this->db->select("Design_Code");
        $this->db->from("tbl_design");
        $this->db->where("Design_Code", $pcode); 
        
        $query = $this->db->get();

        return $query->result();
    }
    
    function checkBCodeExists($bcode)
    {
        $this->db->select("buyer_code");
        $this->db->from("tbl_buyers");
        $this->db->where("buyer_code", $bcode); 
        
        $query = $this->db->get();

        return $query->result();
    }
    
    function checkPCodeExists($pcode)
    {
        $this->db->select("Process_Code");
        $this->db->from("tbl_process");
        $this->db->where("Process_Code", $pcode); 
        
        $query = $this->db->get();

        return $query->result();
    }
    
    function checkSCodeExists($scode,$pcode)
    {
        $this->db->select("Size_Code");
        $this->db->from("tbl_size_grp");
        $this->db->where("Product_GRP_code", $pcode); 
        $this->db->where("Size_Code", $scode); 
        
        $query = $this->db->get();

        return $query->result();
    }
    
    
    
     function addNewProcess($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_process', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewBuyer($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_buyers', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addNewProduct($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_product_grp', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
     function addNewSize($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_size_grp', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addDesignProcess($designInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_design', $designInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
        
    }
    
    function addDesignProcess2($product)
    {
        $this->db->select('ID,Design_ID, Product_GRP');
        $this->db->where('Design_ID', $product['Design_ID']);        
        $this->db->where('Product_GRP',$product['Product_GRP']);
        $query = $this->db->get('tbl_product_sub');
        
        $prod = $query->row();
        if($prod==""){
             $this->db->trans_start();
        $this->db->insert('tbl_product_sub', $product);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        }else{
            $insert_id=$prod->ID;
        }
       return $insert_id;
        
    }
    
    function addDesignProcess3($process)
    {
        $this->db->select('ID,Product_GRP_ID, Process');
        $this->db->where('Product_GRP_ID', $process['Product_GRP_ID']);        
        $this->db->where('Process',$process['Process']);
        $query = $this->db->get('tbl_process_sub');
        
        $prod = $query->row();
        if($prod==""){
             $this->db->trans_start();
             $this->db->select('ID,Product_GRP_ID, Process,sno');
             $this->db->where('Product_GRP_ID', $process['Product_GRP_ID']);
             $this->db->order_by('sno','DESC');
             $this->db->limit(1);
             $query2 = $this->db->get('tbl_process_sub')->row();
             
             if($query2==""){
                 $tp=array("sno"=>"1");
                 $asum=array_merge($process,$tp);
             }else{
                 $tpa=$query2->sno+1;
                 $tp=array("sno"=>$tpa);
                 $asum=array_merge($process,$tp);
             }
             
             
                $this->db->insert('tbl_process_sub', $asum);

                $insert_id = $this->db->insert_id();

                $this->db->trans_complete();
                
                }else{
                    $insert_id="0";
                }
                return $insert_id;
        
    }
    
    function addDesignProcess4($color)
    {
        $this->db->select('ID,Product_GRP_ID,Color,Color_Code');
        $this->db->where('Product_GRP_ID', $color['Product_GRP_ID']);        
        $this->db->where('Color',$color['Color']);
        $this->db->where('Color_Code',$color['Color_Code']);
        $query = $this->db->get('tbl_color_sub');
        
        $prod = $query->row();
        if($prod==""){
             $this->db->trans_start();
        $this->db->insert('tbl_color_sub', $color);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        }else{
            $insert_id="0";
        }
       return $insert_id;
        
    }
    
    function addDesignProcess5($size)
    {
        $this->db->select('Product_GRP_ID,Size');
        $this->db->where('Product_GRP_ID', $size['Product_GRP_ID']);        
        $this->db->where('Size',$size['Size']);
        $query = $this->db->get('tbl_size_sub');
        
        $prod = $query->row();
        if($prod==""){
             $this->db->trans_start();
        $this->db->insert('tbl_size_sub', $size);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        }else{
            $insert_id="0";
        }
       return $insert_id;
        
    }
    
    function updateDesign($designInfo, $id)
    {
        $this->db->where('ID', $id);
        $this->db->update('tbl_design', $designInfo);
        
        return TRUE;
    }
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId,bAccess,uAccess,Permiss');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
		$this->db->where('roleId !=', 1);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return TRUE;
    }
    
    function updateProduct($prdinfo, $pid)
    {
        $this->db->where('id', $pid);
        $this->db->update('tbl_product_grp', $prdinfo);
        
        return TRUE;
    }
    
    function updateProcess($prdinfo, $pid)
    {
        $this->db->where('id', $pid);
        $this->db->update('tbl_process', $prdinfo);
        
        return TRUE;
    }
    
    
    function updateSize($size, $sid)
    {
        $this->db->where('id', $sid);
        $this->db->update('tbl_size_grp', $size);
        
        return TRUE;
    }
    
    function updateBuyer($size, $sid)
    {
        $this->db->where('id', $sid);
        $this->db->update('tbl_buyers', $size);
        
        return TRUE;
    }
    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
   

    
    function deleteDesign($designId)
    {
         $this->db->where('Design_ID', $designId);
         $prd=$this->db->get('tbl_product_sub')->result();
         foreach ($prd as $value) {
             $this->db->where('Product_GRP_ID', $value->ID);
             $this->db->delete('tbl_size_sub');
             $this->db->where('Product_GRP_ID', $value->ID);
             $this->db->delete('tbl_process_sub');
             $this->db->where('Product_GRP_ID', $value->ID);
             $this->db->delete('tbl_color_sub');
         }
         $this->db->where('ID', $designId);
         $this->db->delete('tbl_design');
        return $this->db->affected_rows();
    }

    
    function deleteBuyer($buyerId)
    {
         $this->db->where('id', $buyerId);
         $this->db->delete('tbl_buyers');
        return $this->db->affected_rows();
    }
    
    function deleteProcess($processId)
    {
         $this->db->where('id', $processId);
         $this->db->delete('tbl_process');
        return $this->db->affected_rows();
    }
    
    function deleteProduct($productId)
    {
         $this->db->where('id', $productId);
         $this->db->delete('tbl_product_grp');
        return $this->db->affected_rows();
    }
    
    function deleteSize($sizeId)
    {
         $this->db->where('id', $sizeId);
         $this->db->delete('tbl_size_grp');
        return $this->db->affected_rows();
    }
    
    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);        
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    
    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }


    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     */
    function loginHistoryCount($userId, $searchText, $fromDate, $toDate)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($userId >= 1){
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->from('tbl_last_login as BaseTbl');
        $query = $this->db->get();
        
        return $query->num_rows();
    }

    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function loginHistory($userId, $searchText, $fromDate, $toDate, $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        $this->db->from('tbl_last_login as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($userId >= 1){
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfoById($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function getDesignById($Did)
    {
        $this->db->select('*');
        $this->db->from('tbl_design');
        $this->db->where('ID', $Did);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function getSizeById($Did)
    {
        $this->db->select('*');
        $this->db->from('tbl_size_grp');
        $this->db->where('id', $Did);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function getProductBydId($Did)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_sub');
        $this->db->where('Design_ID', $Did);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getProductById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_grp');
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function getProcessById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_process');
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function getBuyerById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_buyers');
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function getProcessBydgId($gid)
    {
        $this->db->select('ps.Process,ps.Product_GRP_ID,p.Process_Desc');
        $this->db->from('tbl_process_sub as ps');
        $this->db->join('tbl_process as p','ps.Process = p.Process_Code');
        $this->db->where('ps.Product_GRP_ID', $gid);
        $this->db->order_by('ps.sno');
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function getColorBydgId($Did)
    {
        $this->db->select('*');
        $this->db->from('tbl_color_sub');
        $this->db->where('Product_GRP_ID', $Did);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function getSizeBydgId($Did)
    {
        $this->db->select('ss.Product_GRP_ID,ss.Size,sg.Desc');
        $this->db->from('tbl_size_sub as ss');
        $this->db->join('tbl_size_grp as sg','ss.Size = sg.Combo');
        $this->db->where('Product_GRP_ID', $Did);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function getColor($postData){

     $response = array();

     if(isset($postData['search']) ){
       // Select record
         $this->db->distinct();
       $this->db->select('Color');
       
       $this->db->where("Color like '%".$postData['search']."%' ");

       $records = $this->db->get('tbl_color_sub')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->Color,"label"=>$row->Color);
       }

     }

     return $response;
  }
  
  function getPgrp($postData){

     $response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->distinct();
       $this->db->select('Product_GRP');
       
       $this->db->where("Product_GRP like '%".$postData['search']."%' ");

       $records = $this->db->get('tbl_product_sub')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->Product_GRP,"label"=>$row->Product_GRP);
       }

     }

     return $response;
  }
    /**
     * This function used to get user information by id with role
     * @param number $userId : This is user id
     * @return aray $result : This is user information
     */
    function getUserInfoWithRole($userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->row();
    }

}

  