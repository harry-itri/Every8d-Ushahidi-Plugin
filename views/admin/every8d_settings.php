<table style="width: 630px;" class="my_table">	
	<tr>
		<td style="width:200px;">
			<h4 class="fix">Every8d Service Settings</h4>
		</td>
		<td>
			<div class="row">
				<h4 class="fix">User Id :</h4>
				<?php print form::input('userid', $form['userid'], ' class="text title_2"'); ?><BR>
				&nbsp;
			</div>
			<div class="row">
				<h4 class="fix">Password :</h4>
				<?php print form::password('password', $form['password'], ' class="text title_2"'); ?><BR>
				&nbsp;
			</div>
		</td>
	</tr>
</table>