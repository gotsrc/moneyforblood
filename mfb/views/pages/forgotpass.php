<h2>Reset your password</h2>

<fieldset>
	<legend>Have you lost your password?</legend>
	<?php
		echo form_open('user/resetpass');
		
		echo '<p>' . form_label('E-Mail Address: ','email');
		echo form_input('email','','id="email"') . '</p>';
		
		echo '<p>' . form_submit('submit','Reset password!') . '</p>';
	?>
</fieldset>
