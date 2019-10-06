<?php
return [
	'db_seed' => false,
	'default_role' => [
		'admin' => 'Super Admin',
	],

	'default_permission' => [
		'user' => [
			'user.view' => [],
			'user.create' => [],
			'user.update' => [],
			'user.delete' => [],
		],
		'language' => [
			'language.view' => [],
			'language.create' => [],
			'language.update' => [],
			'language.delete' => [],
		],
		'role' => [
			'role.view' => [],
			'role.create' => [],
			'role.update' => [],
			'role.delete' => [],
		],
		'configuration' => [
			'configuration.view' => [],
			'configuration.create' => [],
			'configuration.update' => [],
			'configuration.delete' => [],
		],
	],
];
?>