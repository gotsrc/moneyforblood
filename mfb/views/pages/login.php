<h2>Login to Money for Blood</h2>

<fieldset>
	<legend>Login</legend>
	<?php
		echo form_open('user/check');
	
		echo form_label('Username: ','username');
		echo form_input('username', '', 'id="username"');
	
		echo '<p>' . form_label('Password: ','password');
		echo form_password('password','','id="password"') . '</p>';
	
		echo form_submit('submit','Login!');
		echo anchor('user/register','Register your account');
		
		echo form_close();
	?>
</fieldset>
