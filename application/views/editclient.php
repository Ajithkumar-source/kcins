 <div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
 <form class="well form-horizontal" enctype="multipart/form-data" action="<?=base_url('updateclient');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">Update Client</h4>
    </div>
    <div class="col-md-2 float-right">
      
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Update"/><a href="<?=base_url('clients');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
     </div>
  </div>
</div>


     
     
     
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
    <label class="col-md-6 control-label"><b>Client ID</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <?=$client->cid?>
      <input name="cid" type="hidden" value="<?=$client->cid?>">
    </div>
  </div>
</div>
</div>


<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
    <label class="col-md-12 control-label">
      <b>Name <span style="color:red">*</span></b>
  </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input name="name" placeholder="Name" class="form-control" required="required" value="<?=$client->name?>" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-1">
    <label class="col-md-12 control-label">&nbsp;</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <label class="form-check-label">
      <input type="checkbox" id="isActive" name="isActive" <?php if($client->isActive){echo "checked";}?>>Active
  </label>
    </div>
  </div>
</div>
    <div class="form-group col-md-2">
   <div id="profile-container">
       <?php if($client->profile_photo!=""){ ?>
       
   <image id="profileImage" src="<?=base_url('uploads/client/')."".$client->profile_photo;?>" />
       <?php }else{?>
   <image id="profileImage" src="<?=base_url('assets/img/user.png')?>" />
       <?php }?>
</div>
<input id="imageUpload" type="file" accept="image/png, image/gif, image/jpeg" name="profile_photo" placeholder="Photo" capture>
</div>
<!-- Text input-->
</div>
      
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
<label class="col-md-6 control-label"><b>Careof</b></label>  
  <div class="col-md-6 inputGroupContainer">
 
  <select class="form-control"  id="careof" name="careof"> 
  <option value="">Select Careof</option> 
                                                                <?php
                                                               
                                                                if(!empty($name))
                                                                {
                                                                    foreach ($name as $r)
                                                                    {
                                                                        ?>
                                                                        <option value="<?php echo $r->id ?>" <?php if($r->id == $client->careof) {echo "selected=selected";} ?>><?php echo $r->name ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
</select>

    </div>
  </div>
</div>

<div class="form-row">
<div class="form-group col-md-12 offset-md-3">
    <label class="col-md-6 control-label"><b>Address </b>
  </label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <textarea class="form-control" placeholder="Address" name="address" rows="4"><?=$client->address?></textarea>
    </div>
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>Phone </b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="phone" placeholder="Phone" class="form-control" value="<?=$client->phone?>" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
    <label class="col-md-12 control-label">
      <b>Mobile <span style="color:red">*</span></b>
  </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
      <input  name="mobile" placeholder="Mobile" required="required" class="form-control" value="<?=$client->mobile?>" type="text">
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>GSTIN </b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="gstin" placeholder="GSTIN" class="form-control" value="<?=$client->gstin?>" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>TIN </b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <input  name="tin" placeholder="TIN" class="form-control" value="<?=$client->tin?>" type="text">
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
  <input  name="email" placeholder="Email" class="form-control" value="<?=$client->email?>"  required="required"type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>Reference </b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <input  name="ref" placeholder="Reference" class="form-control" value="<?=$client->ref?>" type="text">
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
    <label class="col-md-12 control-label">
      <b>Contact Person</b>
     </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input name="cp" placeholder="Contact Person" class="form-control" value="<?=$client->cp?>" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
    <label class="col-md-12 control-label">
      <b>Representative <span style="color:red">*</span></b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
      <select class="form-control" required="required" id="rep" name="rep">
                                            <option value="">Select Representative</option>
                                            <?php
                                            if(!empty($rep))
                                            {
                                                foreach ($rep as $r)
                                                {
                                                    ?>
                                                    <option value="<?php echo $r->id ?>" <?php if($r->id == $client->rep) {echo "selected=selected";} ?>><?php echo $r->rname ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
    </select>
    </div>
  </div>
  </div>
 </div>



</form>
<div class="form-row justify-content-md-center">
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
</div>
 </div>
