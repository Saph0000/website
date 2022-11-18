<!-- Modal HTML -->
<div id="changePasswordModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">		
				<h4 class="modal-title">Change Password</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="oldPassword" name="oldPassword" placeholder="Current Password" required="required">
                        <span id="oldPasswordSpan"></span>		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password" required="required">	
                        <span id="newPasswordSpan"></span>
                    </div>        
					<div class="form-group">
						<input type="password" class="form-control" id="repeatNewPassword" name="repeatNewPassword" placeholder="Repeat New Password" required="required">	
                        <span id="repeatNewPasswordSpan"></span>
                    </div>        
					<div class="form-group">
						<button type="button" id="changePasswordSubmit"class="btn btn-primary btn-lg btn-block login-btn">Save</button>
					</div>
			</div>	
		</div>
	</div>
</div>   