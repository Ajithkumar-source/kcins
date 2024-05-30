<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
<div class="card-header py-3">
   
  <div class="row">
    <div class="col-md-4">
       <h4 class="m-0 font-weight-bold text-primary">Sub Type</h4>
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
      
        <a href="<?=base_url('addstype');?>" class="btn btn-primary float-right" style="margin-left: 1em">Add</a>
        
     </div>
  </div>
</div>
                        <div class="card-body">
                           
                        
                            <div class="table-responsive my-8">
                                <table class="table table-bordered" id="BdataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">SID</th>
                                            <th width="5%">Policy Type</th>
                                            <th width="5%">SubType</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sid=1;
                                        foreach ($stype as $r){ 
                                            $permissions=json_decode($this->session->userdata('permissions'), true); ?>
                                        <tr>
                                            <td><?=$sid?></td><td><?=$this->user_model->getpytypeBypId($r->pid)->pytype;?></td><td><?=$r->stype?></td>

                                            <td>
                                            <?php if (array_key_exists("subedit", $permissions)){ ?>
                                                <a class='btn btn-primary btn-sm' href='editstype/<?=$r->sid?>'><i class='fas fa-edit'></i></a>&nbsp;&nbsp;&nbsp;
                                                <?php } ?>
                                                <?php if (array_key_exists("subdelete", $permissions)){ ?>
                                                <a class='btn btn-danger btn-sm' href="#" data-href='delstype/<?=$r->sid?>' data-toggle="modal" data-target="#confirm-delete"><i class='fas fa-trash-alt'></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php $sid=$sid+1;}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>