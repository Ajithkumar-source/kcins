<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Claims</h6>
                            
                        </div>-->
 <form class="well form-horizontal" action="<?=base_url('updateclaims');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">Update Claims</h4>
    </div>
    <div class="col-md-2 float-right">
      
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Save"/><a href="<?=base_url('claims');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
     </div>
  </div>
</div>

   


<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Client Name <span style="color:red">*</span></b>
  </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input name="sno" type="hidden" value="<?=$claims->sno?>"> 
  <select class="form-control" required="required" id="isname" name="insname">  
                            <option value="">Select Client</option> 
                            <?php
                                            if(!empty($name))
                                            {
                                                foreach ($name as $r)
                                                {
                                                     $id=$this->user_model->getClientByCId($claims->cid)->id;
                                                                        ?>
                                                                        <option value="<?php echo $r->cid ?>" <?php if($r->id ==$id) {echo "selected=selected";} ?>><?php echo $r->name ?></option>
                                                                        <?php
                                                }
                                            }
                                            ?>
                                           

                                           
</select>  
                                          </div>
                                          </div>
                                          </div>


   <div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Inward Date</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <input  name="indate" id="indate" class="form-control" value="<?=$claims->indate?>"  type="date">
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
                                                     <option value="<?php echo $r->id ?>" <?php if($r->id == $claims->careof) {echo "selected=selected";} ?>><?php echo $r->name ?></option>
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
    <b>Policy Number <span style="color:red">*</span></b>
  </label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <select class="form-control" required="required" id="pno" name="pno">  
  <option value="">Select Policy No</option>
  <?php
                                            if(!empty($policy))
                                            {
                                                foreach ($policy as $r)
                                                {
                                                    ?>
                                                
                                                                        <option value="<?php echo $r->pno ?>" <?php if($r->pno == $claims->pno) {echo "selected=selected";} ?>><?php echo $r->pno ?></option>
                                                     <?php
                                                }
                                            }
                                            ?>
  </select>
  
</div>
</div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Claim Number</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
      <input  name="cno" placeholder="Claim No"  class="form-control" value="<?=$claims->cno?>"  type="text">
    </div>
  </div>
</div>
<!-- Text input-->
</div>


<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Claim Type</b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <select class="form-control"  id="ctype" name="ctype">
                                            <option value="">Select ClaimType</option>
  <?php
                                                    if(!empty($ctype))
                                                    {
                                                        foreach ($ctype as $r)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $r->claimid ?>" <?php if($r->claimid == $claims->ctype) {echo "selected=selected";} ?>><?php echo $r->ctype ?></option>
                                                            <?php
                                                        }
                                                    }
                                                      ?>
                                                      </select>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Claim SubType</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <select class="form-control"  id="cstype" name="cstype">
    
  <?php
                                                               
                                                               if(!empty($cstype))
                                                               {
                                                                   foreach ($cstype as $r)
                                                                   {
                                                                       ?>
                                                                       <option value="<?php echo $r->id ?>" <?php if($r->id == $claims->cstype) {echo "selected=selected";} ?>><?php echo $r->cstype ?></option>
                                                                       <?php
                                                                   }
                                                               }
                                                               ?>
</select>
    </div>
  </div>
</div>
<!-- Text input-->
</div>


<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Claimed Amount</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="camount" placeholder="Claimed Amount"  value="<?=$claims->camount?>" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Total Premium</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="tprem"  id="tprem"  placeholder="Total Premium"  value="<?=$claims->tprem?>" class="form-control"  type="text">
    </div>  
  </div>
</div>

<!-- Text input-->
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Expected SettledDate</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <input  name="edate" id="edate" class="form-control" value="<?=$claims->edate?>"  type="date">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Status</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">

  <select class="form-control"   id="status" name="status"> 
  
  <option value="" >Select Status</option>
  <option value="Settled" <?php if($claims->status=="Settled"){echo "selected";}?>>Settled</option>
  <option value="OnProgress" <?php if($claims->status=="OnProgress"){echo "selected";}?>>OnProgress</option>
  <option value="Rejected" <?php if($claims->status=="Rejected"){echo "selected";}?>>Rejected</option>
                                        </select>
    </div>
  </div>
</div>
</div>
<!-- Text input-->

<div class="form-row justify-content-md-center">                                                           
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Settled Date</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <input  name="sdate" id="sdate" class="form-control" value="<?=$claims->sdate?>"  type="date">
    </div>
  </div>
</div>



<!-- Text input-->

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Settled Amount</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">

  <input  name="samount" placeholder="Settled Amount" class="form-control" value="<?=$claims->samount?>"  type="text">
    </div>
  </div>
</div>
                                                              </div> 

<!-- Text input-->
<div class="form-row justify-content-md-center">
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
                                                        <option value="<?php echo $r->id ?>" <?php if($r->id == $claims->rep) {echo "selected=selected";} ?>><?php echo $r->rname ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
    </select>
    </div>
  </div>
   

<!--Text input-->
                                          

<div class="form-group col-md-3 ">
  <label class="col-md-12 control-label"><b>Remarks</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <textarea class="form-control" placeholder="Remarks" id="remarks"  name="remarks"  rows="1"><?=$claims->remarks?></textarea>
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
 
