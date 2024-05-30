<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
<div class="card-header py-3">
   
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">Claims</h4>
    </div>
    <div class="col-md-2 float-right">
      
        <a href="<?=base_url('addclaims');?>" class="btn btn-primary float-right" style="margin-left: 1em">Add Claims</a>
        
     </div>
  </div>
</div>
                        <div class="card-body">
                            
                            <form class="mb-15">
											<div class="row mb-6">
												
												<div class="col-lg-3 mb-lg-0 mb-6">
													<label><b>Client Name</b></label>
                                                    <select class="form-control datatable-input"  id="insname" name="insname" placeholder="" data-col-index="0">  
                            <option value="">Select Client</option> 
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

                                                <div class="col-lg-3 mb-lg-0 mb-6">
                                                <label><b>Careof</b></label>
                                                <select class="form-control datatable-input"  id="careof" name="careof" placeholder="" data-col-index="1" >
                                                <option value="">Select Careof</option>
                                                
                                            <?php
                                            if(!empty($cname))
                                            {
                                                foreach ($cname as $r)
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
													<label><b>Policy No</b></label>
                                                                                                        <input type="text" class="form-control datatable-input" id="pno" placeholder="" data-col-index="3">
												</div>


                                                <div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>Claim No</b></label>
                                                    <input type="text" class="form-control datatable-input" id="cno" placeholder="" data-col-index="4">
                                                
                                          
												</div>

                                                <div class="col-lg-2 mb-lg-0 mb-6">
													<label><b> Status</b></label>
													<select class="form-control datatable-input"  id="status" name="status" placeholder="" data-col-index="5"> 
                                                                             <option value="">Select Status</option>
                                                                              <option value="Settled">Settled</option>
                                                                              <option value="OnProgress">OnProgress</option>
                                                                               <option value="Rejected">Rejected</option>
                                        </select>
                                                    
												</div>

												
                                                <?php if($this->session->userdata("role_id")==1){ ?>                                              
												<div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>Representative</b></label>
                                                    <select class="form-control datatable-input"  id="rep" name="rep" placeholder="" data-col-index="6" >
                                                <option value="">Select Representative</option>
                                                
                                            <?php
                                            if(!empty($rep))
                                            {
                                                foreach ($rep as $r)
                                                {
                                                    ?>
                                                    <option value="<?php echo $r->rname ?>" /><?php echo $r->rname ?></option>
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
                                <table class="table table-bordered" id="IdataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SNO</th>
                                            <th>Client Name</th>
                                            <th>Inward Date</th>
                                            <th>Careof</th>
                                            <th>Claim Type</th>
                                            <th>Claim SubType</th>
                                            <th>Policy No</th>
                                            <th>Claim No</th>
                                            <th>Claimed Amount</th>
                                            <th>Settled Amount</th>
                                            <th>Expected Settled Amount</th>
                                            <th>Status</th>
                                            <th>Settled Date</th>
                                            <th>Total Premium </th>
                                            <th>Remarks</th>
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
