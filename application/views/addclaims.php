<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Claims</h6>
                            
                        </div>-->
 <form class="well form-horizontal" action="<?=base_url('addnewclaims');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-4">
       <h4 class="m-0 font-weight-bold text-primary">Add Claims</h4>
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
      
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Save"/><a href="<?=base_url('claims');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
     </div>
  </div>
</div>

   
                   

<!-- Text input-->
<div style="padding-top: 1rem;">
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
     <b>Client Name <span style="color:red">*</span></b>
</label>  
<div class="col-md-12 inputGroupContainer">
  <div class="input-group"> 
  <select class="form-control" required="required" id="isname" name="insname">  
                            <option value="">Select Client</option> 
                            <?php
                                            if(!empty($name))
                                            {
                                                foreach ($name as $r)
                                                {
                                                    ?>
                                                    <option value="<?php echo $r->cid ?>" /><?php echo $r->name ?></option>
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
  
  <input  name="indate" id="indate" class="form-control"  value=<?= date('Y-m-d') ?> type="date">
    </div>
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
  </select>
  
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Claim Number</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
      <input  name="cno" id="cno" placeholder="Claim No"  class="form-control"    type="text">
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
                                                            <option value="<?php echo $r->claimid ?>" /><?php echo $r->ctype ?></option>
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
                                            <option value="">Select  SubType</option>
 
                                                   
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
  <input  name="camount" placeholder="Claimed Amount" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Total Premium</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="tprem"  id="tprem"  placeholder="Total Premium" class="form-control"  type="text">
    </div>  
  </div>
</div>

<!-- Text input-->
</div>

<!--Text input-->
                                          
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Expected SettledDate</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <input  name="edate" id="edate" class="form-control"  type="date" value="<?= date('Y-m-d', strtotime (date('Y-m-d'). ' + 1 month'))?>">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Status</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <select class="form-control"  id="status" name="status"> 
  <option value="selected">Select Status</option>
  <option value="Settled">Settled</option>
  <option value="OnProgress">OnProgress</option>
  <option value="Rejected">Rejected</option>
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
  
  <input  name="sdate" id="sdate" class="form-control"  type="date">
    </div>
  </div>
</div>


<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Settled Amount</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <input  name="samount" placeholder="Settled Amount" class="form-control"  type="text">
    </div>
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Representative <span style="color:red">*</span></b></label>  
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





<div class="form-group col-md-3" >
  <label class="col-md-12 control-label"><b>Remarks</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <textarea class="form-control" placeholder="Remarks" name="remarks" rows="1"></textarea>
    </div>
  </div>
</div>

                                          </div>              
      
</form>

 </div>
 
