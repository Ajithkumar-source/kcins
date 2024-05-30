 <div class="card shadow mb-4">
     
<form class="well form-horizontal" action="<?=base_url('addnewuser');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-4">
       <h4 class="m-0 font-weight-bold text-primary">Add User</h4>
    </div>
  
    <div class="col-md-4">
           <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
          <div class="alert alert-danger alert-dismissable" style="padding-top: 0.2rem;
    padding-right: 0.5rem;
    padding-bottom: 0.2rem;
    padding-left: 0.5rem;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>

                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
          <div class="alert alert-success alert-dismissable" style="padding-top: 0.2rem;
    padding-right: 0.5rem;
    padding-bottom: 0.2rem;
    padding-left: 0.5rem;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                
      </div>


    <div class="col-md-4 float-right">
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Save"/><a href="<?=base_url('users');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
     </div>
  </div>
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center my-8">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Name</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input name="name" placeholder="Name" class="form-control" required="required" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Username</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input name="username" placeholder="Username" class="form-control" required="required" type="text">
    </div>
  </div>
</div>
    
<!-- Text input-->
</div>


<div class="form-row justify-content-md-center my-8">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Email</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input name="email" placeholder="Email" class="form-control" required="required" type="email">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Password</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input name="password" placeholder="Password" id="password" class="form-control" required="required" type="password">
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
  <input type="checkbox" name="careview" id="careview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="careadd" id="careadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="careedit" id="careedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="caredelete" id="caredelete">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="careall" id="careall">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                      <tr>
                                            <td>Clients</td>
                                            <td><label class="switch">
  <input type="checkbox" name="clientview" id="clientview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="clientadd" id="clientadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="clientedit" id="clientedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="clientdelete" id="clientdelete">
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
  <input type="checkbox" name="policyview" id="policyview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policyadd" id="policyadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policyedit" id="policyedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policydelete" id="policydelete">
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
  <input type="checkbox" name="claimview" id="claimview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimadd" id="claimadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimedit" id="claimedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimdelete" id="claimdelete">
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
  <input type="checkbox" name="emailview" id="emailview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="emailadd" id="emailadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="emailedit" id="emailedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="emaildelete" id="emaildelete">
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
  <input type="checkbox" name="smsview" id="smsview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="smsadd" id="smsadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="smsedit" id="smsedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="smsdelete" id="smsdelete">
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
  <input type="checkbox" name="renewview" id="renewview">
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
  <input type="checkbox" name="leadview" id="leadview">
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
  <input type="checkbox" name="userview" id="userview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="useradd" id="useradd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="useredit" id="useredit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="userdelete" id="userdelete">
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
  <input type="checkbox" name="repview" id="repview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="repadd" id="repadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="repedit" id="repedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="repdelete" id="repdelete">
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
  <input type="checkbox" name="insview" id="insview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="insadd" id="insadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="insedit" id="insedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="insdelete" id="insdelete">
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
  <input type="checkbox" name="policytview" id="policytview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policytadd" id="policytadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policytedit" id="policytedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="policytdelete" id="policytdelete">
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
  <input type="checkbox" name="subview" id="subview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="subadd" id="subadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="subedit" id="subedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="subdelete" id="subdelete">
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
  <input type="checkbox" name="vehview" id="vehview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="vehadd" id="vehadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="vehedit" id="vehedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="vehdelete" id="vehdelete">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="vehall" id="vehall">
  <span class="slider round"></span>
</label></td>
                                        </tr>

                                        <tr>
                                            <td>Non-Motor Type </td>
                                            <td><label class="switch">
  <input type="checkbox" name="nmview" id="nmview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="nmadd" id="nmadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="nmedit" id="nmedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="nmdelete" id="nmdelete">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="nmall" id="nmall">
  <span class="slider round"></span>
</label></td>
                                        </tr>
                                        <tr>
                                            <td>Document Type</td>
                                            <td><label class="switch">
  <input type="checkbox" name="docview" id="docview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="docadd" id="docadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="docedit" id="docedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="docdelete" id="docdelete">
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
  <input type="checkbox" name="claimtview" id="claimtview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimtadd" id="claimtadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimtedit" id="claimtedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimtdelete" id="claimtdelete">
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
  <input type="checkbox" name="claimsview" id="claimsview">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimsadd" id="claimsadd">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimsedit" id="claimsedit">
  <span class="slider round"></span>
</label></td>
                                            <td><label class="switch">
  <input type="checkbox" name="claimsdelete" id="claimsdelete">
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
<div class="form-row justify-content-md-center">
 
 </div>