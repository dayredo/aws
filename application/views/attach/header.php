<header>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="wrapper">
			<div class="container-fluid">
				<div class="navbar-header">
					
				</div>
				<nav>
					<ul class="feed">
						<a class="navbar-brand icon-home" href="/aws">Home task</a>
					</ul>
					<ul class="nav">
						<li>
							<a href="/aws/tasks" class="icon-tasks-view"></a>
							</li>
						
						<?php 
							if( isset( $_COOKIE['role'] ) and $_COOKIE['role'] == 'father' ) echo '<li><a href="/aws/tasks/create_file" class="icon-tasks-file"></a></li>'; 
							if( isset( $_COOKIE['role'] ) and $_COOKIE['role'] == 'mother' ) echo '<li><a href="/aws/tasks/create_tasks" class="icon-tasks-create"></a></li><li><a href="/aws/upload_file" class="icon-files"></a></li>'; 
						?>
					</ul>
					<ul class="auth">
						<?php if( isset( $_COOKIE['user_id'] ) ):
							echo '<li><a href="/aws/?unlogin" class="icon-sign-out"></a></li>';
						else:
							echo '<li><a href="?a=choise" class="icon-sign-in"></a></li>';
						endif; ?>
					</ul>
				</nav>
			</div>
		</div>
	</nav>
</header>