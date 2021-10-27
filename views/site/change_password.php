<div class="modal fade" id="changePasswordModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Change password</h4>
         </div>
         <div class="modal-body mx-3">
            <form method="POST" action="<?php echo BASE_URL; ?>?controller=account&action=change-password" name="frmChangePassword">
               <div class="input-group form-group">
                  <div class="input-group-prepend" title="Old password">
                     <span class="input-group-text"><i class="fa fa-key"></i></span>
                  </div>
                  <input name="old_password" type="password" class="form-control" placeholder="Old password *">
               </div>
               <div class="input-group form-group" >
                  <div class="input-group-prepend" title="New password">
                     <span class="input-group-text"><i class="fa fa-key"></i></span>
                  </div>
                  <input name="new_password" type="password" class="form-control" placeholder="New password *">
               </div>
               <div class="input-group form-group">
                  <div class="input-group-prepend" title="New password confirm">
                     <span class="input-group-text"><i class="fa fa-key"></i></span>
                  </div>
                  <input name="new_password_confirm" type="password" class="form-control" placeholder="New password confirm *">
               </div>
               <div class="form-group text-center">
                  <input name="btnChangePassword" type="submit" value="Change" class="btn btn-outline-primary rounded-pill">
                  <input type="button" value="Close" data-dismiss="modal" class="btn btn-outline-primary rounded-pill">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>