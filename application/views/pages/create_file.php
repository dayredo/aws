<article>
	<section class="creating-file">
		<div class="task-creater">
			<div class="tasks">
				<div class="father-tasks">
					<h3 class="role-family" id="father">Father tasks</h3>
					<div class="task-list-family" id="father"></div>
				</div>
				<div class="mother-tasks">
					<h3 class="role-family" id="mother">Mother tasks</h3>
					<div class="task-list-family" id="mother"></div>
				</div>
				<div class="child-tasks">
					<h3 class="role-family" id="child"></span>Child tasks</h3>
					<div class="task-list-family" id="child"></div>
				</div>
			</div>

			<table class="file-settings">
				<tr>
					<td colspan="2" align="right">
						<button class="btn btn-danger">Reset</button>
						<button class="create-task-in-db btn btn-success">Create task</button>
					</td>
				</tr>
			</table>
		</div>
		<div class="task-list">
		</div>
		<div class="files">
			<table class="table">
				<tr>
					<th>Name:</th>
					<th></th>
				</tr>
			<?php
				$dir = scandir(site_path . 'files/waiting');
				array_shift($dir);
				array_shift($dir);
				foreach( $dir as $key => $value ):
					echo '<tr><td><kbd id="' . $key . '">' . $value . '</kbd></td><td><button class="load-tasks btn btn-success" id="' . $key . '">Open</button></td></tr>';
				endforeach;
			?>
			</table>
		</div>
	</section>
</article>