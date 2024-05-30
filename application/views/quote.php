<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Quoet</h6>
                            
                        </div>-->
 <form class="well form-horizontal" action="<?=base_url('addquote');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-4">
       <h4 class="m-0 font-weight-bold text-primary">Add Quote</h4>
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
      
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Save"/><a href="<?=base_url('dashboard');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
     </div>
  </div>
</div>

<!--input-->
<div style="padding-top: 0.8rem;"> 
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Reg No</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="regno" id="regno" placeholder="Reg No" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Make</b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="make" id="make"  class="form-control"  type="text">
    </div>
  </div>
</div>
</div>
                    </div>


<!--input-->

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Model</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="model" id="model" placeholder="" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Fuel</b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="fuel" id="fuel"  class="form-control"    type="text">
    </div>
  </div>
</div>
</div>


<!--input-->

<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Insured Declared Value</b>
  </label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="idv" id="idv" placeholder="Insured Declared Value" class="form-control"  type="text">
  </div>
  </div>
</div>
</div>

<!--input-->

<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Renewal Transfer</b>
  </label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="renewal" id="renewal" placeholder="Renewal Transfer" class="form-control"  type="text">
  </div>
  </div>
</div>
</div>

<!--input-->

<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>NoClaim Bonus</b>
  </label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="ncb" id="ncb" placeholder="Noclaim Bonus" class="form-control"  type="text">
  </div>
  </div>
</div>
</div>

<!--input-->


<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Cash Deposit</b>
  </label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="cd" id="cd" placeholder="Cash Deposit" class="form-control"  type="text">
  </div>
  </div>
</div>
</div>

<!--input-->


<div>
<div class="form-row justify-content-md-center">
<label for="col-md-6 control-label"><b>Basic Premium</b></label>
</div>
<!--input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Nil Depreciation</b>
  </label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="dep" id="dep" placeholder="Nil Depreciation" class="form-control"  type="text">
  </div>
  </div>
</div>
</div>

<!--input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Engine Coverage</b>
  </label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="engine" id="engine" placeholder="Engine Coverage" class="form-control"  type="text">
  </div>
  </div>
</div>
</div>

<!--input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Cost Of Consumables</b>
  </label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="consum" id="consum" placeholder="Cost Of Consumables" class="form-control"  type="text">
  </div>
  </div>
</div>
</div>

<!--input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Tyre Coverage</b>
  </label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="tyre" id="tyre" placeholder="Tyre Coverage" class="form-control"  type="text">
  </div>
  </div>
</div>
</div>

<!--input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Key & Lock Replacement</b>
  </label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="lock" id="lock" placeholder="Key & Lock Replacement" class="form-control"  type="text">
  </div>
  </div>
</div>
</div>

<!--input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Road Side Assistance</b>
  </label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="assis" id="assis" placeholder="Road Side Assistance" class="form-control"  type="text">
  </div>
  </div>
</div>
</div>

<!--input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">
    <b>Personal Belongings</b>
  </label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="personal" id="personal" placeholder="Road Side Assistance" class="form-control"  type="text">
  </div>
  </div>
</div>
</div>

<!--input-->


<!--input-->




                    </form>
                    </div>