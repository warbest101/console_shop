<div class="modal fade" id="loginModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Login</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body mx-3">
            <form method="post" action="<?php echo BASE_URL; ?>?action=login" name="frmLogin">
               <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input name="txtLoginUser" type="text" class="form-control" placeholder="Username/Email *">
               </div>
               <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-key"></i></span>
                  </div>
                  <input name="txtLoginPass" type="password" class="form-control" placeholder="Password *">
               </div>
               <div class="form-group text-center">
                  <input name="btnLogin" type="submit" value="Login" class="btn btn-outline-primary rounded-pill">
               </div>
            </form>
         </div>
         <div class="modal-footer d-flex justify-content-center">
            <div>
               Don't have an account? <a href="" data-toggle="modal" data-dismiss="modal" data-target="#registerModal">Sign Up</a>
            </div>
         </div>
      </div>
   </div>
</div>