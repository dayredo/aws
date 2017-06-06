Page files

<form action="/aws/upload_file" method="post" enctype="multipart/form-data">
<ul class="nav nav-tabs">
			<li class="active"><a href="#move" data-toggle="tab" aria-expanded="true">View loaded file</a></li>
			<li class=""><a href="#upload" data-toggle="tab" aria-expanded="false">Upload new file</a></li>
		</ul>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade active in" id="move">
		<p>
			<table class="table table-hover">
				<tr>
					<th>Name file:</th>
					<th>Action:</th>
				</tr>

				<?php
					if( !empty( $data ) ):
						foreach( $data as $key => $value ):
							echo '<tr><td><kbd id="' . $key . '">' . $value . '</kbd></td><td><button class="btn btn-success" id="' . $key . '">Open</button></td></tr>';
						endforeach;
					else:
						echo '<tr><td colspan="2"><div class="alert alert-info" role="alert">Directory waiting is empty</div></td></tr>';
					endif;
				?>
			</table>
		</p>
	</div>
	<div class="tab-pane fade" id="upload">
		<p>
			<table class="table">
				<tr>
					<td>Upload file:</td>
					<td><input type="file" name="file">
					<td colspan="2" align="right"><button class="btn btn-success">Upload</button></td>
				</tr>
			</table>
		</p>
	</div>
</div>
</form>