<div class="modal fade" id="registerModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Register</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body mx-3">
            <form method="post" action="<?php echo BASE_URL; ?>?action=register" name="fRegister" id="fRegister">
               <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input name="txtName" type="text" class="form-control" placeholder="Name *">
               </div>
               <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input name="txtUser" type="text" class="form-control" placeholder="Username *">
               </div>
               <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                  </div>
                  <input name="txtEmail" type="text" class="form-control" placeholder="Email *">
               </div>
               <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-key"></i></span>
                  </div>
                  <input name="txtPass" type="password" class="form-control" placeholder="Password *">
               </div>
               <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-phone"></i></span>
                  </div>
                  <input name="txtPhone" type="text" class="form-control" placeholder="Phone *">
               </div>
               <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                  </div>
                  <input name="txtAddress" type="text" class="form-control" placeholder="Address *">
               </div>
               <div class="form-group text-center">
                  <input name="btnRegister" type="submit" value="Register" class="btn btn-outline-primary rounded-pill">
               </div>
            </form>
         </div>
         <div class="modal-footer d-flex justify-content-center">
            <div>
               Have an account? <a href="" data-toggle="modal" data-dismiss="modal" data-target="#loginModal">Login</a>
            </div>
         </div>
      </div>
   </div>
</div>