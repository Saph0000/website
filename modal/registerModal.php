<!-- Modal HTML -->
<div id="registerModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="pictures/loginAvatar.png" alt="Avatar">
				</div>				
				<h4 class="modal-title">Register</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="registerUserNameTextBox" name="username" placeholder="Username" required="required">
            <span id="registerUserNameSpan"></span>		
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="firstNameTextBox" name="firstName" placeholder="First Name" required="required">
            <span id="firstNameSpan"></span>		
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="lastNameTextBox" name="lastName" placeholder="Last Name" required="required">
            <span id="lastNameSpan"></span>		
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="emailTextBox" name="email" placeholder="Email" required="required">
            <span id="emailSpan"></span>		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="registerPasswordTextBox" name="password" placeholder="Password" required="required">	
            <span id="registerPasswordSpan"></span>
          </div>        
					<div class="form-group">
						<input type="password" class="form-control" id="repeatPasswordTextBox" name="repeatPassword" placeholder="Pepeat Password" required="required">	
            <span id="repeatPasswordSpan"></span>
          </div>        
					<div class="form-group">
						<button type="submit" id="registerButton"class="btn btn-primary btn-lg btn-block register-btn">Register</button>
					</div>
			</div>
			
		</div>
	</div>
</div>     