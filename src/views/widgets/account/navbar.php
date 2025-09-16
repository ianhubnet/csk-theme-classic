<div class="list-group"><?php
	// Change email address.
	echo anchor('account/account', line('account'), [
		'class' => 'list-group-item'.($uri === 'index' ? ' active' : '')
	]);

	// Update profile.
	echo anchor('account/profile', line('profile'), [
		'class' => 'list-group-item'.($uri === 'profile' ? ' active' : '')
	]);

	if (! $this->config->item('use_gravatar')) {
		echo anchor('account/avatar', line('avatar'), [
			'class' => 'list-group-item'.($uri === 'avatar' ? ' active' : '')
		]);
	}

	// Change password.
	echo anchor('account/password', line('password'), [
		'class' => 'list-group-item'.($uri === 'password' ? ' active' : '')
	]);

	// Change email address.
	echo anchor('account/email', line('email_address'), [
		'class' => 'list-group-item'.($uri === 'email' ? ' active' : '')
	]);
?></div>
