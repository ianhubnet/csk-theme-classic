<div class="list-group"><?php
	// Update profile.
	echo anchor('settings/profile', line('profile'), [
		'class' => 'list-group-item'.($uri === 'profile' ? ' active' : '')
	]);

if (! $this->config->item('use_gravatar')) {
	echo anchor('settings/avatar', line('avatar'), [
		'class' => 'list-group-item'.($uri === 'avatar' ? ' active' : '')
	]);
}

// Change password.
echo anchor('settings/password', line('password'), [
	'class' => 'list-group-item'.($uri === 'password' ? ' active' : '')
]);

// Change email address.
echo anchor('settings/email', line('email_address'), [
	'class' => 'list-group-item'.($uri === 'email' ? ' active' : '')
]);

// Change email address.
echo anchor('settings/account', line('account'), [
	'class' => 'list-group-item'.($uri === 'account' ? ' active' : '')
]);
?></div>
