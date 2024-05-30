 <div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
 <form class="well form-horizontal" action="<?=base_url('addnewpolicy');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-4">
       <h4 class="m-0 font-weight-bold text-primary">Add Policy</h4>
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
      
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Save"/><a href="<?=base_url('policies');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
     </div>
  </div>
</div>
<div style="padding-top: 0.8rem;">             
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Policy Number <span style="color:red">*</span></b>
    </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input name=" pno" placeholder="Policy No" class="form-control" required="required" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  
</div>
</div>
                    </div>                 

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Receipt No</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="rno" id="rno" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Receipt Date</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  type="date" name="rdate" class="form-control" >
    </div>
  </div>
</div>
</div>

<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
<label class="col-md-6 control-label">
  <b>Insurance Company <span style="color:red">*</span></b>
</label>  
  <div class="col-md-6 inputGroupContainer">
 
  <select class="form-control" required="required" id="inscompany" name="inscompany">  
                            <option value="">Select Company</option> 
                            <?php
                                            if(!empty($inscompany))
                                            {
                                                foreach ($inscompany as $r)
                                                {
                                                    ?>
                                                    <option value="<?php echo $r->id ?>" /><?php echo $r->inscompany ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                           

                            
</select>

    </div>
  </div>
</div>



<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Insured Name <span style="color:red">*</span></b>
  </label>  
  <div class="col-md-6 inputGroupContainer">
  <select class="form-control" required="required" id="insname" name="insname">  
                            <option value="">Select Name</option> 
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
                                           
<div class="form-row">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b>Address</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <textarea class="form-control" placeholder="Address" id="address" name="address" rows="4"></textarea>
    </div>
  </div>
</div>
</div>


<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Phone</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="phone" id="phone" placeholder="Phone" class="form-control"  type="number" minlength="10" maxlength="10" size="10">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Mobile <span style="color:red">*</span></b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="mobile" id="mobile" placeholder="Mobile" class="form-control"  required="required" type="number" minlength="10" maxlength="10" size="10">
    </div>
  </div>
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
                                            if(!empty($cname))
                                            {
                                                foreach ($cname as $r)
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
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Policy Type <span style="color:red">*</span></b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <select class="form-control" required="required" id="pytype" name="pytype">
                                            <option value="">Select PolicyType</option>
  <?php
                                                    if(!empty($pytype))
                                                    {
                                                        foreach ($pytype as $r)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $r->pid ?>" <?php if ($r === reset($pytype)) echo 'selected' ?>><?php echo $r->pytype ?></option>
                                                            <?php
                                                        }
                                                    }
                                                      ?>
                                                      </select>
    </div>
  </div>
</div>




<div class="form-group col-md-3">
<label class="col-md-12 control-label">
  <b>Sub Type</b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <select class="form-control" required="required" id="stype" name="stype">
                                            <option value="">Select  SubType</option>
                                            <?php
                                                    
                                                        foreach ($status as $r)
                                                        {
                                                            ?>
                                                            <option value="<?=$r->sid;?>"><?=$r->stype;?></option>
                                                            <?php
                                                        }
                                                    
                                                      ?>
                                                   
                                                      </select>
    </div>
  </div>
</div>
</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label" id="nmname" style="display: none">
    <b>Non-Motor Type </b>
</label>  
  <div class="col-md-12 inputGroupContainer" >
  <div id="nmt" style="display: none">
  <select class="form-control"  id="nmtype" name="nmtype">
                                            <option value="">Select Non-Motor Type</option>
  <?php
                                                    if(!empty($nmtype))
                                                    {
                                                        foreach ($nmtype as $r)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $r->id ?>" /><?php echo $r->nmtype ?></option>
                                                            <?php
                                                        }
                                                    }
                                                      ?>
                                                      </select>
      </div>
  </div>
</div>


<div class="form-group col-md-3">

 </div>
</div>
<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
<label class="col-md-12 control-label" id="no" style="display: none"><b>Vehicle Number</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="vno" id="vno" placeholder="Vehicle No" class="form-control"   type="text" style="display: none" >
    </div>
  </div>
</div>


<div class="form-group col-md-3">

 </div>

</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
<label class="col-md-12 control-label" id="mak" style="display: none"><b>Make</b></label>  
  <div class="col-md-12 inputGroupContainer">
 
  <div id="mk" style="display: none">
  <select class="form-control" id="make" name="make" >  
                            <option value="">Select Make</option> 
                            <?php
                                            if(!empty($vcompany))
                                            {
                                                foreach ($vcompany as $r)
                                                {
                                                    ?>
                                                    <option value="<?php echo $r->make ?>" /><?php echo $r->make ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                           

                            
</select>
                                          

    </div>
  </div>
</div>




<div class="form-group col-md-3">
<label class="col-md-12 control-label" id="mod" style="display: none">
  <b>Model </b>
</label>  
  <div class="col-md-12 inputGroupContainer">
 
  <div id="md" style="display: none">
  <select class="form-control" id="model"  name="model"    >
                                            <option value="">Select  Model</option>
 
                                                   
   </select>
                                          </div>
    
  </div>
</div>
</div>



<div>
<div class="form-row justify-content-md-center">
<label for="col-md-6 control-label"><b>PERIOD OF INSURANCE</b></label>
</div>

</div>
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Period From <span style="color:red">*</span></b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  type="date" id="pfrom"  name="pfrom" class="form-control"  required="required" >
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Period To <span style="color:red">*</span></b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  type="date" name="pto" id="pto"  class="form-control"  required="required"  >
    </div>
  </div>
</div>
</div>

<!-- Text input-->

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
<label class="col-md-12 control-label" id="od" style="display: none" >
  <b>OD Premium</b>
  </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="odprem" id="odprem" placeholder="OD Premium" class="form-control" style="display: none"    type="number">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
<label class="col-md-12 control-label" id="tp" style="display:none" >
  <b>TP Premium</b>
  </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="tpprem" id="tpprem" placeholder="TP Premium" class="form-control" style="display: none" type="number">
    </div>
  </div>
</div>
</div>

<!-- Text input-->

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
<label class="col-md-12 control-label">
  <b>Premium Without Tax </b>
  </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="prem_wotax" id="prem_wotax"  placeholder="Premium Without Tax" class="form-control"    type="number">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-9 control-label">
    <b>Service Tax</b>
    </label>  
  <div class="col-md-9 inputGroupContainer">
  <div class="input-group">
  <input  type="number" name="stax" id="stax" step="0.01" value="18" class="form-control">%
    </div>
  </div>
</div>
</div>
<!-- Text input-->

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Service Charge</b>
  </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input name="scharge" id="scharge" placeholder="Sevice charge" class="form-control" type="number" step="0.01"/>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Total Premium</b>
   </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="tprem" id="tprem" placeholder="Total Premium" class="form-control"  step="0.01"  type="number">
    </div>
  </div>
</div> 
</div>

<!-- Text input-->


<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Remarks</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <textarea class="form-control" placeholder="Remarks" name="remarks" rows="1"></textarea>
    </div>
  </div>
</div>


<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Representative <span style="color:red">*</span></b>
  </label>  
  <div class="col-md-12 inputGroupContainer">
 
  
      <select class="form-control" required="required" id="rep" name="rep">
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


  






   <!-- Text input-->
                    
      
</form>

 </div>





































