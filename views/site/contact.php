						    <div class="modal fade" id="contactModal">
						        <div class="modal-dialog">
						            <div class="modal-content">

						                <div class="modal-header text-center">
						                    <h4 class="modal-title w-100 font-weight-bold">Contact us</h4>
						                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                        <span aria-hidden="true">&times;</span>
						                    </button>
						                </div>
						                <div class="modal-body mx-3">
						                    <form method="post" action="<?php echo BASE_URL; ?>?action=contact" name="frmContact">
						                        <div class="input-group form-group">
						                            <div class="input-group-prepend">
						                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
						                            </div>
						                            <input name="txtEmail" type="text" class="form-control" placeholder="Email...">

						                        </div>
						                        <div class="input-group form-group">
						                            <textarea rows="5" cols="5" style="resize: none;" name="txtContent" type="text" class="form-control" placeholder="Content..."></textarea>
						                        </div>
						                        <div class="form-group text-center">
						                           <input name="btnContact" type="submit" value="Send" class="btn btn-outline-primary rounded-pill">
						                        </div>
						                    </form>
						                </div>
						            </div>
						        </div>
						    </div>