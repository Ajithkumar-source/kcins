<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
<div class="card-header py-3">
   
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">Leading Management</h4>
    </div>
   
  </div>
</div>
                        <div class="card-body">
                            
                            <form class="mb-15">
											<div class="row mb-6">
												<div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>ID</b></label>
                                                                                                        <input type="text" class="form-control datatable-input" id="id" placeholder=" " data-col-index="0">
												</div>
                                                


                                                <div class="col-lg-4 mb-lg-0 mb-6">
													<label><b>Insurance Company</b></label>
                                                    <select class="form-control datatable-input"  id="inscompany" name="inscompany" placeholder="" data-col-index="1" >  
                                              <option value="">Select Company</option> 
       <?php
                                            if(!empty($inscompany))
                                            {
                                                foreach ($inscompany as $r)
                                                {
                                                    ?>
                                                    <option value="<?php echo $r->inscompany ?>" /><?php echo $r->inscompany ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                           

                            
</select>


                                        </div>


                                        <div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>Leading From</b></label>
													<input type="date" class="form-control datatable-input" id="lfrom" placeholder="" data-col-index="2">
												</div>

                                                <div class="col-lg-2 mb-lg-0 mb-6">
													<label><b>Leading To</b></label>
													<input type="date" class="form-control datatable-input" id="lto" placeholder="" data-col-index="3">
                                        </div>

                                            
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
                                <table class="table table-bordered" id="WdataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Insurance Company</th>
                                            <th>Total Premium</th>
                                            <th>Number Of Policies</th>
                                            <th>OD Premium</th>
                                            <th>TP Premium</th>
                                            <th>Premium Without Tax</th>
                                            <th>Sevice Charge</th>

                                           
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
