<div class="modal fade" id="editAccountModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">UPDATE ACCOUNT</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body mx-3">
            <form method="post" action="<?php echo BASE_URL; ?>?controller=account&action=update" name="fUpdateAccount" id="fUpdateAccount">
               <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input name="txtName" type="text" class="form-control" placeholder="Name..." value="<?php echo $customer['Name']?>">
               </div>
               <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                  </div>
                  <input name="txtEmail" type="text" class="form-control" placeholder="Email..." value="<?php echo $customer['Email']?>">
               </div>
               <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-phone"></i></span>
                  </div>
                  <input name="txtPhone" type="text" class="form-control" placeholder="Phone..." value="<?php echo $customer['Phone']?>">
               </div>
               <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                  </div>
                  <input name="txtAddress" type="text" class="form-control" placeholder="Address..." value="<?php echo $customer['Address']?>">
               </div>
               <div class="form-group text-center">
                  <input name="btnUpdateAccount" type="submit" value="Update" class="btn btn-outline-primary rounded-pill">
                  <input type="button" value="Close" data-dismiss="modal" class="btn btn-outline-primary rounded-pill">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>