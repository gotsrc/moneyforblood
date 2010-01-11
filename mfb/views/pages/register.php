<h2>Register an account</h2>

	<?php echo validation_errors('<p class="error">','</p>'); ?>
<fieldset>
	<legend>Required Information</legend>
	<?php
		echo form_open('user/create');
		
		echo '<p>' .form_label('Username: ','username');
		echo form_input('username','','id="username"') . '</p>';
		
		echo '<p>' . form_label('E-Mail Address: ','email');
		echo form_input('email','','id="email"') . '</p>';
		
		echo '<p>' . form_label('Password: ','password');
		echo form_password('password','','id="password"') . '</p>';
		
		echo '<p>' . form_label('Confirm: ','confirmpwd');
		echo form_password('confirmpwd','','id="confirmpwd"') . '</p>';
		
		echo '<p>' . form_label('Location: ','location');
		
		$loc = array(
				'sunderland'	=>	'Sunderland, UK',
				'newcastle'		=>	'Newcastle, UK',
				'london'		=>	'London, UK',
				'sydney'		=>	'Sydney, AUS',
				'nsw'			=>	'New South Wales, AUS',
				'melbourne'		=>	'Melbourne, AUS',
				'nyc'			=>	'New York, USA',
				'texas'			=>	'Texas, USA',
				'california'	=>	'California, USA',
				'toronto'		=>	'Toronto, Canada',
				'ontario'		=>	'Ontario, Canada',
				'alberta'		=>	'Alberta, Canada',
				'osaka'			=>	'Osaka, Japan',
				'tokyo'			=>	'Tokyo, Japan',
				'hiroshima'		=>	'Hiroshima, Japan'
				);
		echo form_dropdown('location', $loc, 'tokyo', 'id="location"') . '</p>';
	
	?>
</fieldset>

<fieldset>
	<legend>Optional Information</legend>
	<?php
		echo '<p>' . form_label('First Name: ','first_name');
		echo form_input('first_name','','id="first_name"') . '</p>';
		
		echo '<p>' . form_label('Last Name: ','last_name');
		echo form_input('last_name','','id="last_name"') . '</p>';
		
		echo '<p>' . form_submit('submit','Register your account!') . '</p>';
		
		echo form_hidden('ip',$_SERVER['REMOTE_ADDR'],'id="ip_address"');
		
		echo form_close();
	?>
</fieldset>
