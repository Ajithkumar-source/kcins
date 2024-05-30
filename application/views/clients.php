 <div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
<div class="card-header py-3">
   
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">Clients</h4>
    </div>
    <div class="col-md-2 float-right">
      
        <a href="<?=base_url('addclient');?>" class="btn btn-primary float-right" style="margin-left: 1em">Add Client</a>
        
     </div>
  </div>
</div>
                        <div class="card-body">
                            
                            <form class="mb-15">
											<div class="row mb-6">
												<div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>Client ID</b></label>
                                                                                                        <input type="text" class="form-control datatable-input" id="cid" placeholder="E.g: KC12345" data-col-index="0">
												</div>
												<div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>Name</b></label>
													<input type="text" class="form-control datatable-input" id="cname" placeholder="" data-col-index="1">
                                                    
												</div>

                                                <div class="col-lg-4 mb-lg-0 mb-6">
                                                <label><b>Careof</b></label>
                                                <select class="form-control datatable-input"  id="careof" name="careof" placeholder="" data-col-index="2" >
                                                <option value="">Select Careof</option>
                                                
                                            <?php
                                            if(!empty($name))
                                            {
                                                foreach ($name as $r)
                                                {
                                                    ?>
                                                    <option value="<?php echo $r->name ?>" /><?php echo $r->name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                           
                                               </select>
												</div>


                                                   
												<div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>Mobile</b></label>
                                                       <input type="number" class="form-control datatable-input" id="mobile" placeholder="" data-col-index="3">
												</div>
                                                    <div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>Email</b></label>
                                                        <input type="text" class="form-control datatable-input" id="email" placeholder="info@gmail.com" data-col-index="4">
                                                                                                        
												</div>
                                                <?php if($this->session->userdata("role_id")==1){ ?>
												<div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>Representative</b></label>
                                                    <select class="form-control datatable-input"  id="rep" name="rep" placeholder="" data-col-index="5">
                                                    <option value="">Select Representative</option>
                                            <?php
                                            if(!empty($rep))
                                            {
                                                foreach ($rep as $r)
                                                {
                                                    ?>
                                                    <option value="<?php echo $r->rname ?>"/><?php echo $r->rname ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <select>
												</div>
                                                <?php }?>
											</div>
											
											<div class="row mt-8">
												<div class="col-lg-12">
												
												<button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
													<span>
														<i class="la la-close"></i>
														<span>Reset</span>
													</span>
												</button></div>
											</div>
										</form>
                        
                            <div class="table-responsive my-8">
                                <table class="table table-bordered" id="CdataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Client ID</th>
                                            <th>Name</th>
                                            <th>Careof</th>
                                            <th>Phone</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>GSTIN</th>
                                            <th>TIN</th>
                                            <th>Reference</th>
                                            <th>Contact person</th>
                                            <?php //if($this->session->userdata("role_id")=='1'){?>
                                                <th>Representative </th>
                                            <?php //}?>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
