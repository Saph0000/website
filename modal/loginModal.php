
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="pictures/loginAvatar.png" alt="Avatar">
				</div>				
				<h4 class="modal-title">Log in</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="userNameTextBox" name="username" placeholder="Username" required="required">
            <span id="userNamSpan"></span>		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="passwordTextBox" name="password" placeholder="Password" required="required">	
            <span id="passwordSpan"></span>
          </div>        
					<div class="form-group">
						<button type="submit" id="submitButton"class="btn btn-primary btn-lg btn-block login-btn">Log in</button>
					</div>
			</div>
			<div id="signUpDiv">
				<span id="signUp">Not a user yet? <a id="register" type="link" data-dismiss="modal" data-toggle="modal" href="#registerModal">sign up</a></span>
			</div>

			
		</div>
	</div>
</div>     