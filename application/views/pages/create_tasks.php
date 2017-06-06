<article>
	<section class="crating-tasks">
		<div class="task-creater">
			<table class="table">
				<tr>
					<th>
						<label for="textArea" class="col-lg-2 control-label">Description:</label><br>
					</th>
					<td>
						<input type="text" class="form-control text-task" id="textArea"><button class="add-task-item btn btn-info">Add</button>
					</td>
				</tr>
				<tr>
					<td colspan="2"><button class="create-file btn btn-success">Create file</button></td>
				</tr>
			</table>
		</div>
		<div class="task-content">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#task_list" data-toggle="tab" aria-expanded="true">File code</a></li>
				<li class=""><a href="#code" data-toggle="tab" aria-expanded="false">Task list</a></li>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade active in" id="task_list">
					<div class="generate-area">
						<pre></pre>
					</div>
				</div>
				<div class="tab-pane fade in" id="code">
					<div class="task-list">
				
					</div>
				</div>
			</div>
		</div>
	</section>
</article>