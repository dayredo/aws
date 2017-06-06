
<div class="modal">
	<div class="modal-dialog reg">
		<div class="modal-content">
			<form action="/aws/" method="post" class="form-horizontal">
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
							<label for="inputName" class="col-lg-2 control-label">Name:</label>
							<div class="col-lg-10">
								<input type="text" name="name" class="form-control" id="inputName" placeholder="Your name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputRole" class="col-lg-2 control-label">Role:</label>
							<div class="col-lg-10">
								<select name="role" class="form-control" id="inputRole">
									<option value="" selected="selected" disabled="disabled">-- Choise you role in family --</option>
									<option value="mother">Mother</option>
									<option value="father">Father</option>
									<option value="child">Chaild</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-lg-2 control-label">Password:</label>
							<div class="col-lg-10">
								<input type="password" name="pass" class="form-control" id="inputPassword" placeholder="**********">
							</div>
						</div>
					</p>
				</div>
				<div class="modal-footer">
					<button type="submit" name="reg" class="btn btn-primary">Registration</button>
					<a href="/aws/" class="btn btn-danger">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>