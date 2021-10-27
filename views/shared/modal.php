<?php 
    if(Session::get("message")) {
        $message = Session::get("message");
        echo '<div class="modal fade" id="message">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h6 class="modal-title w-100 font-weight-bold">'.$message[0].'</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body mx-3">
                            '.$message[1].'
                        </div>
                    </div>
                </div>
            </div>';
        echo "<script>
                    $(window).ready(() => {
                        $('#message').modal('show');
                    });
                  </script>";

        Session::unset("message");
    }
?>
<!--Notification-->
<div class="modal fade" id="NotificationModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h6 class="modal-title w-100 font-weight-bold">Notification</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">You must Login.</div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCartSuccess">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Add Cart Success</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body mx-3">
            <div class="form-group text-center">
                <input type="button" value="Contiune Shopping" data-dismiss="modal" class="btn btn-outline-primary rounded-pill">
                <a href="<?php echo BASE_URL; ?>?controller=cart" class="btn btn-outline-primary rounded-pill">Go to Cart</a>
            </div>
         </div>
      </div>
   </div>
</div>