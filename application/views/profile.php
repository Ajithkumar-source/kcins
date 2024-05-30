<div class="card shadow mb-4">
     
     <form class="well form-horizontal" action="<?=base_url('updateprofile');?>" method="post"  id="profile_form">
     <div class="card-header py-3">
       <div class="row">
         <div class="col-md-6">
            <h4 class="m-0 font-weight-bold text-primary">Edit Admin</h4>
         </div>
           <div class="col-md-4">
                <?php
                         $this->load->helper('form');
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
             <input type="submit" id="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Update"/>
       </div>
     </div>
     
     <!-- Text input-->
     <div class="form-row justify-content-md-center my-8">
     <div class="form-group col-md-3">
       <label class="col-md-12 control-label"><b>Name</b></label>  
       <div class="col-md-12 inputGroupContainer">
       <div class="input-group">
           <input name="id" placeholder="id" type="hidden" value="<?=$usr->id?>" >
           <input name="name" placeholder="Name" class="form-control" value="<?=$usr->name?>"   required="required" type="text">
         </div>
       </div>
     </div>
     
     <div class="form-group col-md-3">
       <label class="col-md-12 control-label"><b>Username</b></label>  
       <div class="col-md-12 inputGroupContainer">
       <div class="input-group">
           <input name="username" placeholder="Username" class="form-control" value="<?=$usr->username?>" <?php if ($this->session->userdata('role_id') == 1){echo "readonly";}?> required="required" type="text">
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
       <input name="email" placeholder="Email" class="form-control" required="required" value="<?=$usr->email?>"  type="email">
         </div>
       </div>
     </div>
     
     <div class="form-group col-md-3">
       <label class="col-md-12 control-label"><b>Current Password</b></label>  
       <div class="col-md-12 inputGroupContainer">
       <div class="input-group">
           <input name="cpassword" id="cpassword" placeholder="Password" minlength="5" required="required" class="form-control" type="password">
           <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button" id="show-password">
        <i class="fa fa-eye" aria-hidden="true"></i>
      </button>
    </div>
 
          </div>
       </div>
     </div>
         
     <!-- Text input-->
     </div>
     
     
     
     
     <div class="form-row justify-content-md-center my-8">
     <div class="form-group col-md-3">
       <label class="col-md-12 control-label"><b>New Password</b></label>
      
       <div class="col-md-12 inputGroupContainer">
       <div class="input-group">
       <input name="npassword" id="npassword" placeholder="New Password" minlength="5" class="form-control"   required="required"  type="password">  
       <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button" id="show-hide-password">
        <i class="fa fa-eye" aria-hidden="true"></i>
      </button>
    </div>
    <div class="invalid-feedback">
               Already Use this Password
            </div>

      </div>
       </div>
     </div>
     
     <div class="form-group col-md-3">
       <label class="col-md-12 control-label"><b>Retype Password</b></label>  
       <div class="col-md-12 inputGroupContainer">
       <div class="input-group ">
           <input name="rpassword" id="rpassword" placeholder="Retype Password" minlength="5" class="form-control" required="required"  type="password">
           <!-- <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" id="show-password">
          <i class="fa fa-eye" aria-hidden="true"></i>
        </button>
          </div> -->
           <div class="invalid-feedback">
                Retype Password does not match
            </div>
         </div>
       </div>
     </div>
         
     <!-- Text input-->
     </div>
     </div>
                             
           
     </form>
     
      </div>