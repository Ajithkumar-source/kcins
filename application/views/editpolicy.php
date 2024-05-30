<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
 <form class="well form-horizontal" action="<?=base_url('updatepolicy');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">Update Policy</h4>
    </div>
    <div class="col-md-2 float-right">
      
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Update"/><a href="<?=base_url('policies');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
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
    
      <input name="pno" placeholder="Policy No" class="form-control" value=" <?=$policy->pno?>" required="required" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  
</div>
</div>
</div>
<!-- Text input-->



<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Receipt No</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input type="hidden" id="pid"  name="pid" value=<?=$policy->pid?>>
    <input type="hidden"  name="policyid" value=<?=$policy->policyid?>>
  <input  name="rno" id="rno" class="form-control" value=" <?=$policy->rno?>" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Receipt Date</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  type="date" name="rdate" class="form-control" value="<?=$policy->rdate?>">
    </div>
  </div>
</div>
</div>

<!-- Text input-->

<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
<label class="col-md-6 control-label">
  <b>Insurance Company <span style="color:red">*</span></b>
</label>  
  <div class="col-md-6 inputGroupContainer">

  <select class="form-control" required="required" id="inscompany" name="inscompany">  
                                                                <?php
                                                               
                                                                if(!empty($inscompany))
                                                                {
                                                                    foreach ($inscompany as $r)
                                                                    {
                                                                        ?>
                                                                        <option value="<?php echo $r->id ?>" <?php if($r->id == $policy->inscompany) {echo "selected=selected";} ?>><?php echo $r->inscompany ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
</select>

    </div>
  </div>
</div>
                                                             

<!-- Text input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Insured Name <span style="color:red">*</span></b>
</label>  
  <div class="col-md-6 inputGroupContainer">
  <select class="form-control" required="required" id="insname" name="insname" >  
                                                                <?php
                                                               
                                                                if(!empty($name))
                                                                {
                                                                    foreach ($name as $r)
                                                                    {
                                                                      $id=$this->user_model->getClientByCId($policy->cid)->id;
                                                                        ?>
                                                                        <option value="<?php echo $r->id ?>" <?php if($r->id == $id) {echo "selected=selected";}?>><?php echo $r->name ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
</select>

</div>
</div>
</div>
                                                            
<!-- Text input-->

<div class="form-row">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b>Address</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <textarea class="form-control" placeholder="Address" id="address" name="address" rows="4" ><?=$policy->address?></textarea>
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
  <input  name="phone" id="phone" placeholder="Phone" class="form-control" value="<?=$policy->phone?>"  type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Mobile <span style="color:red">*</span></b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="mobile" id="mobile" placeholder="Mobile" class="form-control"  value="<?=$policy->mobile?>" required="required"  type="text">
    </div>
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
<label class="col-md-6 control-label"><b>Careof</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <select class="form-control" id="careof" name="careof">
                                            <option value="">Select Careof</option>
                                                      <?php
                                                               
                                                                if(!empty($cname))
                                                                {
                                                                    foreach ($cname as $r)
                                                                    {
                                                                        ?>
                                                                        <option value="<?php echo $r->id ?>" <?php if($r->id == $policy->careof) {echo "selected=selected";} ?>><?php echo $r->name ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
</select>

    </div>
  </div>
</div>
                                                              </div>
  <!-- Text input--> 
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Policy Type <span style="color:red">*</span></b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <select class="form-control" required="required" id="pytype" name="pytype">  
                                                                <?php
                                                               
                                                                if(!empty($pytype))
                                                                {
                                                                    foreach ($pytype as $r)
                                                                    {
                                                                        ?>
                                                                        <option value="<?php echo $r->pid ?>" <?php if($r->pid == $policy->pytype) {echo "selected=selected";} ?>><?php echo $r->pytype ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
</select>

    </div>
  </div>
</div>



<div class="form-group col-md-3">
<label class="col-md-12 control-label"><b>Sub Type</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <select class="form-control" id="stype" name="stype">  
                                                                <?php
                                                               
                                                                if(!empty($stype))
                                                                {
                                                                    foreach ($stype as $r)
                                                                    {
                                                                        ?>
                                                                        <option value="<?php echo $r->sid ?>" <?php if($r->sid == $policy->stype) {echo "selected=selected";} ?>><?php echo $r->stype ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
</select>
    </div>
  </div>
</div>
</div>
  <!-- Text input-->                                                            

  <div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label" id="nmname" <?php if($policy->stype=="1"){ echo  "style='display:none'";}?>>
    <b>Non-Motor Type </b>
</label>  
  <div class="col-md-12 inputGroupContainer" >
  
  <div id="nmt" <?php if($policy->stype=="1"){ echo  "style='display:none'";}?>>
  <select class="form-control"  id="nmtype" name="nmtype">
                                            <option value="">Select Non-Motor Type</option>
  <?php
                                                    if(!empty($nmtype))
                                                    {
                                                        foreach ($nmtype as $r)
                                                        {
                                                            ?>
                                                             <option value="<?php echo $r->id ?>" <?php if($r->id == $policy->nmtype) {echo "selected=selected";} ?>><?php echo $r->nmtype ?></option>
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
<label class="col-md-12 control-label" id="no" <?php if($policy->stype!="1"){ echo  "style='display:none'";}?>><b>Vehicle Number</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="vno"  id="vno" placeholder="Vehicle No"  value="<?=$policy->vno?>"class="form-control"   type="text" <?php if($policy->stype!="1"){ echo  "style='display:none'";}?>>
    </div>
  </div>
</div>

<div class="form-group col-md-3">

 </div>
</div>
<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
<label class="col-md-12 control-label"  id="mak"<?php if($policy->stype!="1"){ echo  "style='display:none'";}?>><b>Make</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div id="mk" <?php if($policy->stype!="1"){ echo "style='display:none'";}?>>
  <select class="form-control"  id="make" name="make">  
  <option value="">Select Make</option>
                                                                <?php
                                                               
                                                                if(!empty($vcompany))
                                                                {
                                                                    foreach ($vcompany as $r)
                                                                    {
                                                                        ?>
                                                                        <option value="<?php echo $r->make ?>" <?php if($r->make == $policy->make) {echo "selected=selected";} ?>><?php echo $r->make ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
</select>

    </div>
  </div>
</div>



<div class="form-group col-md-3">
<label class="col-md-12 control-label"  id="mod" <?php if($policy->stype!="1"){ echo  "style='display:none'";}?>>
  <b>Model</b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div id="md" <?php if($policy->stype!="1"){ echo  "style='display:none'";}?>>
  <select class="form-control" id="model" name="model">  
  <option value="">Select Model</option>
                                                                <?php
                                                               
                                                                if(!empty($model))
                                                                {
                                                                    foreach ($model as $r)
                                                                    {
                                                                        ?>
                                                                        <option value="<?php echo $r->model ?>" <?php if($r->model == $policy->model) {echo "selected=selected";} ?>><?php echo $r->model ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
</select>
    </div>
  </div>
</div>
</div>

<!-- Text input-->

<div class="form-row justify-content-md-center">
<label for="col-md-6 control-label"><b>PERIOD OF INSURANCE</b></label>
</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Period From <span style="color:red">*</span></b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  type="date"  name="pfrom" id="pfrom" value="<?=$policy->pfrom?>" class="form-control"  required="required" >
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Period To <span style="color:red">*</span></b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  type="date" name="pto" id="pto" value="<?=$policy->pto?>" class="form-control"  required="required"  >
    </div>
  </div>
</div>
</div>


<!-- Text input-->

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
<label class="col-md-12 control-label" id="od" <?php if($policy->stype!="1"){ echo  "style='display:none'";}?>>
  <b>OD Premium</b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="odprem" id="odprem"  value="<?=$policy->odprem?>" class="form-control"   <?php if($policy->stype!="1"){ echo  "style='display:none'";}?>  type="number">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
<label class="col-md-12 control-label" id="tp" <?php if($policy->stype=="1"){ echo  "display:none";}?>>
  <b>TP Premium</b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="tpprem" id="tpprem"  value="<?=$policy->tpprem?>"class="form-control"  <?php if($policy->stype!="1"){ echo  "style='display:none'";}?>   type="number">
    </div>
  </div>
</div>
</div>


<!-- Text input-->

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
<label class="col-md-12 control-label">
  <b>Premium Without Tax</b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="prem_wotax" id="prem_wotax"  value="<?=$policy->prem_wotax?>" class="form-control" <?php if($policy->stype=="1"){ echo  "readonly";}?> type="number">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-9 control-label"><b>Service Tax</b></label>  
  <div class="col-md-9 inputGroupContainer">
  <div class="input-group">
  <input  type="number" name="stax" id="stax" step="0.01" value="<?=$policy->stax?>" class="form-control">%
  </div>
</div>
</div>
                                                              </div>
<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Service Charge</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="scharge" id="scharge" placeholder="Sevice charge"  value="<?=$policy->scharge?>"class="form-control" step="0.01" type="number">
    </div>
  </div>
</div>


<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Total Premium</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="tprem" id="tprem" placeholder="Total Premium" value="<?=$policy->tprem?>" step="0.01"  class="form-control"    type="number">
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
      <textarea class="form-control" placeholder="Remarks" name="remarks" rows="1"><?=$policy->remarks?></textarea>
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
                                                    <option value="<?php echo $r->id ?>" <?php if($r->id == $policy->rep) {echo "selected=selected";} ?>><?php echo $r->rname ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
    </select>
    </div>
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
                    