<div class="card shadow mb-6">

 <form class="well form-horizontal" enctype="multipart/form-data" action="<?=base_url('addpolicydocs');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-4">
       <h4 class="m-0 font-weight-bold text-primary">Add Policy Documents</h4>
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
      
        <a href="<?=base_url('policies');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
     </div>
  </div>
</div>

  <!-- Text input-->
  <div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
    <label class="col-md-6 control-label"><b>Policy Number :</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input name="pid" id="pid" value="<?=$policy->pid?>" type="hidden">
  <input id="pno" name="pno" value="<?=$policy->pno?>" type="hidden"> 
  <?=$policy->pno?>  
    </div>
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
    <label class="col-md-6 control-label"><b>Insured Name :</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input name="insname" id="insname" value="<?=$policy->insname?>" type="hidden">
  <?=$policy->insname?>
    </div>
  </div>
</div>
</div>


<div class="form-row justify-content-md-center">
<div class="form-group col-md-3 offset-md-2">
  <label class="col-md-12 control-label"><b>Document Type</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <select class="form-control" required="required" id="doctype" name="doctype">
  <option value="">Select DocumentType</option>
  <?php
                                                    if(!empty($doctype))
                                                    {
                                                        foreach ($doctype as $r)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $r->id ?>" /><?php echo $r->doctype?></option>
                                                            <?php
                                                        }
                                                    }
                                                      ?>
                                                      </select>
    </div>
  </div>
</div>




<div class="form-group col-md-3">
<label class="col-md-12 control-label"><b>Document No</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="docno" placeholder="Document No" class="form-control"  required="required"  type="text">
  
                                           
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group col-md-1">
    <label class="col-md-12 control-label">&nbsp;</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  id="docname" name="docname" type="file"  required="">
  
                                           
    </div>
  </div>
</div>

<div class="form-group col-md-3">
    <label class="col-md-12 control-label">&nbsp;</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input type="submit" class="btn btn-primary float-right" value="Add"/>
  
                                           
    </div>
  </div>
</div>

<!-- Text input-->


                                                  </div>


<!-- Text input-->


</form>

<div class="table-responsive my-8">
                                <table class="table table-bordered" id="JdataTable" width="100%" cellspacing="0">
                                    <thead><br>
                                        <tr>
                                        <th width="5%">ID</th>
                                        <th width="25%">DOCUMENT TYPE</th>
                                        <th width="15%">DOCUMENT NO</th>
                                        <th width="25%">DOCUMENT NAME</th>
                                            <th width="15%">ACTION</th>
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>

 </div>