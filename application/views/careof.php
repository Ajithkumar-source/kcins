<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
<div class="card-header py-3">
   
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">Careof</h4>
    </div>
    <div class="col-md-2 float-right">
      
        <a href="<?=base_url('addcareof');?>" class="btn btn-primary float-right" style="margin-left: 1em">Add Careof</a>
        
     </div>
  </div>
</div>
                        <div class="card-body">
                            
                            <form class="mb-15">
											<div class="row mb-6">
												<div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>CAREID</b></label>
                                                                                                        <input type="text" class="form-control datatable-input" id="careid" placeholder="E.g: KCC1234" data-col-index="0">
												</div>
												<div class="col-lg-3 mb-lg-0 mb-6">
													<label><b>Name</b></label>
													<input type="text" class="form-control datatable-input" id="name" placeholder="" data-col-index="1">
												</div>
                                                                                 
												<div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>Mobile</b></label>
                                                                                                        <input type="number" class="form-control datatable-input" id="mobile" placeholder="" data-col-index="2">
												</div>
                                                                                                <div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>Email</b></label>
                                                                                                        <input type="text" class="form-control datatable-input" id="email" placeholder="info@gmail.com" data-col-index="3">
                                                                                                        
												</div>

                                                <?php //if($this->session->userdata("role_id")==1){ ?>
												<div class="col-lg-2 mb-lg-0 mb-6">

													<label><b>Representative</b></label>
                                                    <select class="form-control datatable-input"  id="rep" name="rep" placeholder="" data-col-index="4" >
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
                                                <?php //}?>
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
                                <table class="table table-bordered" id="DdataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>CAREID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>GSTIN</th>
                                            <th>TIN</th>
                                            <th>Fax</th>
                                            <th>Credit</th>
                                            <th>Reference</th>
                                            <th>Contact Person</th>
                                            <th>Open Balance</th>

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
