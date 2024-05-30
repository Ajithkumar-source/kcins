<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
 <form class="well form-horizontal" action="<?=base_url('updatecareof');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">Update Careof</h4>
    </div>
    <div class="col-md-2 float-right">
      
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Update"/><a href="<?=base_url('careof');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
     </div>
  </div>
</div>
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
    <label class="col-md-6 control-label"><b>CAREID </b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <?=$careof->careid?>
      <input name="id" type="hidden" value="<?=$careof->id?>">
    </div>
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Name <span style="color:red">*</span></b>
  </label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <input name="name" placeholder="Name" class="form-control" required="required" value="<?=$careof->name?>" type="text">
    </div>
  </div>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b>Address</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <textarea class="form-control" placeholder="Address" name="address" rows="4"><?=$careof->address?></textarea>
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
  <input  name="phone" placeholder="Phone" class="form-control"  value="<?=$careof->phone?>"  type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Mobile </b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
      <input  name="mobile" placeholder="Mobile"  class="form-control"     value="<?=$careof->mobile?>" type="text">
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>FAX</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="fax" placeholder="fax" class="form-control" value="<?=$careof->fax?>" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-6 control-label"><b>Credit</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  
  <input  name="credit"  class="form-control" value="<?=$careof->credit?>" type="text"> 	&nbsp;Days</>
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
  <input  name="gstin" placeholder="GSTIN" class="form-control" value="<?=$careof->gstin?>" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>TIN</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <input  name="tin" placeholder="TIN" class="form-control" value="<?=$careof->tin?>" type="text">
    </div>
  </div>
</div>
<!-- Text input-->
</div>


<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Email</b>
   </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="email" placeholder="Email" class="form-control"  value="<?=$careof->email?>" type="text">
    </div>  
  </div>
</div>


<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Reference</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <input  name="ref" placeholder="Reference" class="form-control" value="<?=$careof->ref?>" type="text">
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Contact</b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input name="cp" placeholder="Contact Person" class="form-control"  value="<?=$careof->cp?>" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Representative </b>
</label>  
  <div class="col-md-12 inputGroupContainer">
 
  
      <select class="form-control"  id="rep" name="rep">
                                            <option value="">Select Representative</option>
                                            <?php
                                            if(!empty($rep))
                                            {
                                                foreach ($rep as $r)
                                                {
                                                    ?>
                                                    <option value="<?php echo $r->id ?>" <?php if($r->id == $careof->rep) {echo "selected=selected";} ?>><?php echo $r->rname ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
    </select>
    </div>
  </div>
</div>
<div class="form-row justify-content-md-center">
<div class="form-group col-md-6">
  <label class="col-md-6 control-label"><b>Open Balance</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="openbal" placeholder="Open Balance" class="form-control"  value="<?=$careof->openbal?>" type="text">
    </div>  
  </div>
</div>
 </div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3"> 
  
<input type="checkbox" id="isActive"  name="isActive" <?php if($careof->isActive){echo "checked";}?> >
   <label for="col-md-12 control-label">Active</label> 
  
</div>
                                        







<!-- Text input-->
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
          