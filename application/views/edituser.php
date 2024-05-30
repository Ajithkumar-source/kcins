 <div class="card shadow mb-4">
     
<form class="well form-horizontal" action="<?=base_url('updateuser');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-6">
       <h4 class="m-0 font-weight-bold text-primary">Edit User</h4>
    </div>
      <div class="col-md-4">
           <?php
                    $this->load->helper('form');
                    $permissions= json_decode($usr->permissions, true);
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
      </div>
    <div class="col-md-2 float-right">
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Update"/><a href="<?=base_url('users');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
     </div>
  </div>
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center my-8">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">Name</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input name="id" placeholder="id" type="hidden" value="<?=$usr->id?>">
      <input name="name" placeholder="Name" class="form-control" value="<?=$usr->name?>" required="required" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">Username</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input name="username" placeholder="Username" class="form-control" value="<?=$usr->username?>" <?php if ($this->session->userdata('role_id') == 2){echo "disabled";}?> required="required" type="text">
    </div>
  </div>
</div>
    
<!-- Text input-->
</div>


<div class="form-row justify-content-md-center my-8">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">Email</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input name="email" placeholder="Email" class="form-control" required="required" value="<?=$usr->email?>" type="email">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">Password</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input name="password" placeholder="Password" id="password" class="form-control" type="password">
      <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button" id="show">
        <i class="fa fa-eye" aria-hidden="true"></i>
      </button>
    </div>
    </div>
  </div>
</div>
    
<!-- Text input-->
</div>


<div class="form-row my-8">
<div class="form-group col-md-8 offset-md-2">
    <div class="card">
       <div class="card-header">
           Permissions
       </div>
        <div class="card-text">
            <table class="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="80%">Modules</th>
                                            <th width="5%">View</th>
                                            <th width="5%">Add</th>
                                            <th width="5%">Edit</th>
                                            <th width="5%">Delete</th>
                                            <th width="5%">All</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="background-color: whitesmoke;"><b>Manage</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>CareOf</td>
                                            <td><label class="switch">
 <input type="checkbox" name="careview" id="careview" <?php if(array_key_exists('careview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="careadd" id="careadd" <?php if(array_key_exists('careadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="careedit" id="careedit" <?php if(array_key_exists('careedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="caredelete" id="caredelete" <?php if(array_key_exists('caredelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="careall" id="careall" >
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        <tr>
                                            <td>Clients</td>
                                            <td><label class="switch">
  <input type="checkbox" name="clientview" id="clientview" <?php if(array_key_exists('clientview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="clientadd" id="clientadd" <?php if(array_key_exists('clientadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="clientedit" id="clientedit" <?php if(array_key_exists('clientedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="clientdelete" id="clientdelete" <?php if(array_key_exists('clientdelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="clientall" id="clientall">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        <tr>
                                            <td>Policy</td>
                                            <td><label class="switch">
  <input type="checkbox" name="policyview" id="policyview" <?php if(array_key_exists('policyview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policyadd" id="policyadd" <?php if(array_key_exists('policyadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policyedit" id="policyedit" <?php if(array_key_exists('policyedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policydelete" id="policydelete" <?php if(array_key_exists('policydelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policyall" id="policyall">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        <tr>
                                            <td>Claims</td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimview" id="claimview" <?php if(array_key_exists('claimview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimadd" id="claimadd" <?php if(array_key_exists('claimadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimedit" id="claimedit" <?php if(array_key_exists('claimedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimdelete" id="claimdelete" <?php if(array_key_exists('claimdelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimall" id="claimall">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td style="background-color: whitesmoke;"><b>Marketing Tools</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><label class="switch">
  <input type="checkbox" name="emailview" id="emailview" <?php if(array_key_exists('emailview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="emailadd" id="emailadd" <?php if(array_key_exists('emailadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="emailedit" id="emailedit" <?php if(array_key_exists('emailedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="emaildelete" id="emaildelete" <?php if(array_key_exists('emaildelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="emailall" id="emailall">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        <tr>
                                            <td>SMS</td>
                                            <td><label class="switch">
  <input type="checkbox" name="smsview" id="smsview" <?php if(array_key_exists('smsview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="smsadd" id="smsadd" <?php if(array_key_exists('smsadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="smsedit" id="smsedit" <?php if(array_key_exists('smsedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="smsdelete" id="smsdelete" <?php if(array_key_exists('smsdelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="smsall" id="smsall">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td style="background-color: whitesmoke;"><b>Reports</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Renewal</td>
                                            <td><label class="switch">
  <input type="checkbox" name="renewview" id="renewview" <?php if(array_key_exists('renewview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Leading</td>
                                            <td><label class="switch">
  <input type="checkbox" name="leadview" id="leadview" <?php if(array_key_exists('leadview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td style="background-color: whitesmoke;"><b>Master</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Users</td>
                                            <td><label class="switch">
  <input type="checkbox" name="userview" id="userview" <?php if(array_key_exists('userview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="useradd" id="useradd" <?php if(array_key_exists('useradd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="useredit" id="useredit" <?php if(array_key_exists('useredit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="userdelete" id="userdelete" <?php if(array_key_exists('userdelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="userall" id="userall">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        <tr>
                                            <td>Representative</td>
                                            <td><label class="switch">
  <input type="checkbox" name="repview" id="repview" <?php if(array_key_exists('repview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="repadd" id="repadd" <?php if(array_key_exists('repadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="repedit" id="repedit" <?php if(array_key_exists('repedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="repdelete" id="repdelete" <?php if(array_key_exists('repdelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="repall" id="repall">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        <tr>
                                            <td>Insurance Company</td>
                                            <td><label class="switch">
  <input type="checkbox" name="insview" id="insview" <?php if(array_key_exists('insview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="insadd" id="insadd" <?php if(array_key_exists('insadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="insedit" id="insedit" <?php if(array_key_exists('insedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="insdelete" id="insdelete" <?php if(array_key_exists('insdelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="insall" id="insall">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        <tr>
                                            <td>Policy Type</td>
                                            <td><label class="switch">
  <input type="checkbox" name="policytview" id="policytview" <?php if(array_key_exists('policytview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policytadd" id="policytadd" <?php if(array_key_exists('policytadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policytedit" id="policytedit" <?php if(array_key_exists('policytedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policytdelete" id="policytdelete" <?php if(array_key_exists('policytdelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policytall" id="policytall">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        <tr>
                                            <td>Policy SubType</td>
                                            <td><label class="switch">
  <input type="checkbox" name="subview" id="subview" <?php if(array_key_exists('subview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="subadd" id="subadd" <?php if(array_key_exists('subadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="subedit" id="subedit" <?php if(array_key_exists('subedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="subdelete" id="subdelete" <?php if(array_key_exists('subdelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="suball" id="suball">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        <tr>
                                            <td>Vehicle</td>
                                            <td><label class="switch">
  <input type="checkbox" name="vehview" id="vehview" <?php if(array_key_exists('vehview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="vehadd" id="vehadd" <?php if(array_key_exists('vehadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="vehedit" id="vehedit" <?php if(array_key_exists('vehedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="vehdelete" id="vehdelete" <?php if(array_key_exists('vehdelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="vehall" id="vehall">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        <tr>
                                            <td>Document Type</td>
                                            <td><label class="switch">
  <input type="checkbox" name="docview" id="docview" <?php if(array_key_exists('docview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="docadd" id="docadd" <?php if(array_key_exists('docadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="docedit" id="docedit" <?php if(array_key_exists('docedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="docdelete" id="docdelete" <?php if(array_key_exists('docdelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="docall" id="docall">
  <span class="slider round"></span>
</label></td>
                                        </tr>

                                        <tr>
                                            <td>Claim Type</td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimtview" id="claimtview" <?php if(array_key_exists('claimtview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimtadd" id="claimtadd" <?php if(array_key_exists('claimtadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimtedit" id="claimtedit" <?php if(array_key_exists('claimtedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimtdelete" id="claimtdelete" <?php if(array_key_exists('claimtdelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimtall" id="claimtall">
  <span class="slider round"></span>
</label></td>
                                        </tr>


                                        <tr>
                                            <td>Claim SubType</td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimsview" id="claimsview" <?php if(array_key_exists('claimsview',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimsadd" id="claimsadd" <?php if(array_key_exists('claimsadd',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimsedit" id="claimsedit" <?php if(array_key_exists('claimsedit',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimsdelete" id="claimsdelete" <?php if(array_key_exists('claimsdelete',$permissions)){echo "Checked";}?>>
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimsall" id="claimsall">
  <span class="slider round"></span>
</label></td>
                                        </tr>


                                    </tbody>
            </table>
        </div>
   </div>
</div>
</div>

                        
      
</form>

 </div>























                        
      


 