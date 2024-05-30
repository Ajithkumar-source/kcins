<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
 <form class="well form-horizontal" action="<?=base_url('addnewcareof');?>"   method="post"  >
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-4">
       <h4 class="m-0 font-weight-bold text-primary">Add Careof</h4>
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
      
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Save"/><a href="<?=base_url('careof');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
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
      <input name="name" placeholder="Name" id="name" class="form-control" onblur="fname()" required="required" type="text">
      <span id="fname" style="color:red"></span><br>
    
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
  <input  name="phone" id="phone" placeholder="Phone" class="form-control"     type="number" minlength="10" maxlength="10">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Mobile </b>
   </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
      <input  name="mobile" id="mobile" placeholder="Mobile"  class="form-control"    type="number" minlength="10" maxlength="10" size="10">
     
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
  <input  name="fax" placeholder="FAX" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-6 control-label"><b>Credit</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  
  <input  name="credit"  class="form-control"  type="text"> 	&nbsp;Days</>
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
    <b>Email </b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="email" id="email" placeholder="info@gmail.com"    class="form-control"  type="email">
  <span id="mail" style="color:red"></span>
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
    <b>Contact</b>
  </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input name="cp" placeholder="Contact Person" class="form-control" type="text">
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
                                                    <option value="<?php echo $r->id ?>" /><?php echo $r->rname ?></option>
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
  <input  name="openbal" placeholder="Open Balance" class="form-control"   type="text">
    </div>  
  </div>
</div>
 </div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3"> 
<input type="checkbox" name="isActive" checked >
   <label for="col-md-12 control-label">Active</label> 
  
</div>







<!-- Text input-->
</div>
                        
      
</form>

 </div>
 
