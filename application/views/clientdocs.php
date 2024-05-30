<div class="card shadow mb-6">

 <form class="well form-horizontal" enctype="multipart/form-data" action="<?=base_url('addclientdocs');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-4">
       <h4 class="m-0 font-weight-bold text-primary">Add Client Documents</h4>
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
      
        <a href="<?=base_url('clients');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
     </div>
  </div>
</div>

  <!-- Text input-->
  <div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
    <label class="col-md-6 control-label"><b>CID :</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input name="id" value="<?=$client->id?>" type="hidden">
  <input id="cid" name="cid" value="<?=$client->cid?>" type="hidden"> 
  <?=$client->cid?>  
    </div>
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
    <label class="col-md-6 control-label"><b>Name : </b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input name="name" value="<?=$client->name?>" type="hidden">
  <?=$client->name?>
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
                                <table class="table table-bordered" id="HdataTable" width="100%" cellspacing="0">
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