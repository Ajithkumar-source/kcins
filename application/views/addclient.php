 <div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
 <form class="well form-horizontal" enctype="multipart/form-data" action="<?=base_url('addnewclient');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-4">
       <h4 class="m-0 font-weight-bold text-primary">Add Client</h4>
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
      
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Save"/><a href="<?=base_url('clients');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
     </div>
  </div>
</div>

   


<div style="padding-top: 0.8rem;"> 
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Name <span style="color:red">*</span></b>
  </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input name="name" id="name" placeholder="Name" class="form-control" required="required" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-1">
  <label class="col-md-12 control-label">&nbsp;</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <label class="form-check-label">
    <input type="checkbox" name="isActive" checked>Active
  </label>
                    
     
   
    </div>
  </div>
</div>
    <div class="form-group col-md-2">
   <div id="profile-container">
   <image id="profileImage" src="<?=base_url('assets/');?>img/user.png" />
</div>
<input id="imageUpload" type="file" accept="image/png, image/gif, image/jpeg" name="profile_photo"  placeholder="Photo" capture>
</div>
<!-- Text input-->
</div>
                    </div>
                  

<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b>Careof</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"> 
  <select class="form-control"  id="careof" name="careof">
                                            <option value="">Select Careof</option>
                                            <?php
                                            if(!empty($name))
                                            {
                                                foreach ($name as $r)
                                                {
                                                    ?>
                                                    <option value="<?php echo $r->id ?>" /><?php echo $r->name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                           
    </select>
  </div>
</div>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b>Address</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <textarea class="form-control" placeholder="Address" name="address" rows="4"></textarea>
    </div>
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Phone</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="phone"  id="phone" placeholder="Phone" class="form-control" type="number" minlength="10" maxlength="10" size="10">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Mobile <span style="color:red">*</span></b></b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
      <input  name="mobile" id="mobile" placeholder="Mobile"  class="form-control"  required="required" type="number" minlength="10" maxlength="10" size="10">
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>GSTIN</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="gstin" placeholder="GSTIN" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>TIN</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <input  name="tin" placeholder="TIN" class="form-control"  type="text">
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Email <span style="color:red">*</span></b>
  </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="email" id="email" placeholder="info@gmail.com" class="form-control"  required="required" type="email">
    </div>  
  </div>
</div>


<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Reference</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <input  name="ref" placeholder="Reference" class="form-control"  type="text">
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Contact Person </b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input name="cp" placeholder="Contact Person" class="form-control" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Representative <span style="color:red">*</span></b>
</label>  
  <div class="col-md-12 inputGroupContainer">
 
  
      <select class="form-control" id="rep" name="rep" required="required">
                                            <option value="">Select Representative</option>
                                            <?php
                                            if(!empty($rep))
                                            {
                                                foreach ($rep as $r)
                                                {
                                                    ?>
                                                    <option value="<?php echo $r->id ?>" /><?php echo $r->rname ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
    </select>
    </div>
  </div>
</div>

<!--Text input-->
                                                           
      
</form>

 </div>
 
