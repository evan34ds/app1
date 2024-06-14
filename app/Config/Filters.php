<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'login'      => \Myth\Auth\Filters\LoginFilter::class,
		'role'       => \Myth\Auth\Filters\RoleFilter::class,
		'permission' => \Myth\Auth\Filters\PermissionFilter::class,
		'filteradmin' => \App\Filters\FilterAdmin::class,
		'filtermhs' => \App\Filters\FilterMhs::class,
		'filterdsn' => \App\Filters\FilterDsn::class,
	];

	// Always applied before every request //tidak login bisa mengakses
	public $globals = [
		'before' => [
			'filteradmin' => ['except' => [
				'auth', 'auth/*',
				'home', 'home/*',
				'/'
			]],
			'filtermhs' => ['except' => [
				'auth', 'auth/*',
				'home', 'home/*',
				'/'
			]],
			'filterdsn' => ['except' => [
				'auth', 'auth/*',
				'home', 'home/*',
				'/'
			]],
			//'honeypot',
			//	'login',
			// 'csrf',
		],
		'after'  => [ //login bisa mengakses
			'filteradmin' => ['except' => [
				'admin', 'admin/*',
				'tutorial', 'tutorial/*',
				'home', 'home/*',
				'gedung', 'gedung/*',
				'kurikulum', 'kurikulum/*',
				'matkul', 'matkul/*',
				'prodi', 'prodi/*',
				'ruangan', 'ruangan/*',
				'ta', 'ta/*',
				'fakultas', 'fakultas/*',
				'user', 'user/*',
				'dosen', 'dosen/*',
				'mahasiswa', 'mahasiswa/*',
				'kelas', 'kelas/*',
				'jadwalkuliah', 'jadwalkuliah/*',
				'slider', 'slider/*',
				'berita', 'berita/*',
				'pengumuman', 'pengumuman/*',
				'bobotnilai', 'bobotnilai/*',
				'pembayaran', 'pembayaran/*',
				'/'
			]],
			'filtermhs' => ['except' => [
				'mhs', 'mhs/*',
				'home', 'home/*',
				'krs', 'krs/*',
				'khs', 'khs/*',
				'/'
			],
		],
			'filterdsn' => ['except' => [
				'dsn', 'dsn/*',
				'home', 'home/*',
				'/'
			]],
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}
