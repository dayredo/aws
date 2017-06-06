<article>
	<section>
		<table class="table">
			<tr>
				<th style="width: 1%">Name:</th>
				<th>Description task:</th>
				<th style="width: 1%">Action:</th>
			</tr>
			<?php 
				foreach ($data as $key => $value):
					echo '<tr><td>Task ' . $value['id_task'] . '</td><td>' . $value['desk_task'] . '</td><td><span class="switch-task switch-task-off" id="' . $value['id_task'] . '"></span></td></tr>';
				endforeach;
			?>
		</table>
	</section>
</article>