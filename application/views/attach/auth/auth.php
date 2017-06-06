
<div class="modal">
	<div class="modal-dialog auth">
		<div class="modal-content">
			<form class="form-horizontal" action="/aws/" method="post">
				<div class="modal-header">
					<a href="/aws/" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
					<h4 class="modal-title">Sign-in</h4>
				</div>
				<div class="modal-body">
					<p>
						<div class="alert alert-dismissible alert-info">
							<strong>Please type your Login and Password:</strong> 
						</div>
					</p>
					<p>					
						<div class="form-group">
							<label for="inputEmail" class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input type="text" name="name" class="form-control" id="inputEmail" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-lg-2 control-label">Password</label>
							<div class="col-lg-10">
								<input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password">
							</div>
						</div>
				</p>
			</div>
			<div class="modal-footer">
				<button type="submit" name="auth" class="btn btn-primary">Auth</button>
				<a href="/aws/" class="btn btn-danger">Cancel</a>
			</div>
			</form>
		</div>
	</div>
</div>