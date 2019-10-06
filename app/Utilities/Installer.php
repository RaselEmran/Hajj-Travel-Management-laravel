<?php

namespace App\Utilities;

use Artisan;
use Config;
use \App\Admin;
use \App\Setting;
use DB;
use Carbon\Carbon;
use File;

/**
 * Class Installer
 *
 * Contains all of the Business logic to install the app. Either through the CLI or the `/install` web UI.
 *
 * @package App\Utilities
 */
class Installer
{ 
    private static $minPhpVersion = '7.1.3';

    public static function checkServerRequirements()
    {
        $requirements = array();

		if (phpversion() < self::$minPhpVersion) {
            $requirements[] = 'Minimum PHP Version 7.1.3 required';
        }
		
        if (ini_get('safe_mode')) {
            $requirements[] = 'Safe Mode feature needs to be disabled!';
        }

        if (ini_get('register_globals')) {
            $requirements[] = 'Register Globals feature needs to be disabled!';
        }

        if (ini_get('magic_quotes_gpc')) {
            $requirements[] = 'Magic Quotes feature needs to be disabled!';
        }

        if (!ini_get('file_uploads')) {
            $requirements[] = 'File Uploads feature needs to be enabled!';
        }

        if (!class_exists('PDO')) {
            $requirements[] = 'MySQL PDO feature needs to be enabled!';
        }

        if (!extension_loaded('openssl')) {
            $requirements[] = 'OpenSSL extension extension needs to be loaded!';
        }

        if (!extension_loaded('tokenizer')) {
            $requirements[] = 'Tokenizer extension extension needs to be loaded!';
        }

        if (!extension_loaded('mbstring')) {
            $requirements[] = 'mbstring extension extension needs to be loaded!';
        }

        if (!extension_loaded('curl')) {
            $requirements[] = 'cURL extension extension needs to be loaded!';
        }

        if (!extension_loaded('xml')) {
            $requirements[] = 'XML extension extension needs to be loaded!';
        }

        if (!extension_loaded('zip')) {
            $requirements[] = 'ZIP extension extension needs to be loaded!';
        }

        if (!is_writable(base_path('storage/app'))) {
            $requirements[] = 'storage/app directory directory needs to be writable!';
        }

        if (!is_writable(base_path('storage/framework'))) {
            $requirements[] = 'storage/framework directory directory needs to be writable!';
        }

  //       if (!is_writable(base_path('storage/logs'))) {
  //           $requirements[] = 'storage/logs directory directory needs to be writable!';
  //       }
		
		// if (!is_writable(base_path('resources/language'))) {
  //           $requirements[] = 'storage/logs directory directory needs to be writable!';
  //       }

        return $requirements;
    }

    public static function createDbTables($host, $database, $username, $password)
    {
        if (!static::isDbValid($host, $database, $username, $password)) {
            return false;
        }

        // Set database details
        static::saveDbVariables($host, 3306, $database, $username, $password);

        // Try to increase the maximum execution time
        set_time_limit(300); // 5 minutes

        // Create tables
        Artisan::call('migrate:fresh', ['--force' => true]);

        // Create Roles
        // Artisan::call('db:seed', ['--force' => true]);
        \Artisan::call('storage:link');

        return true;
    }

    /**
     * Check if the database exists and is accessible.
     *
     * @param $host
     * @param $port
     * @param $database
     * @param $host
     * @param $database
     * @param $username
     * @param $password
     *
     * @return bool
     */
    public static function isDbValid($host, $database, $username, $password)
    {
        Config::set('database.connections.install_test', [
            'host'      => $host,
            'port'      => env('DB_PORT', '3306'),
            'database'  => $database,
            'username'  => $username,
            'password'  => $password,
            'driver'    => env('DB_CONNECTION', 'mysql'),
            'charset'   => env('DB_CHARSET', 'utf8mb4'),
        ]);

        try {
            DB::connection('install_test')->getPdo();
        } catch (\Exception $e) {
            return false;
        }

        // Purge test connection
        DB::purge('install_test');

        return true;
    }

    public static function saveDbVariables($host, $port, $database, $username, $password)
    {
        $prefix = strtolower(str_random(3) . '_');

        // Update .env file
        static::updateEnv([
            'DB_HOST'       =>  $host,
            'DB_PORT'       =>  $port,
            'DB_DATABASE'   =>  $database,
            'DB_USERNAME'   =>  $username,
            'DB_PASSWORD'   =>  $password,
            //'DB_PREFIX'     =>  $prefix,
        ]);

        $con = env('DB_CONNECTION', 'mysql');

        // Change current connection
        $db = Config::get('database.connections.' . $con);

        $db['host'] = $host;
        $db['database'] = $database;
        $db['username'] = $username;
        $db['password'] = $password;
        //$db['prefix'] = $prefix;

        Config::set('database.connections.' . $con, $db);

        DB::purge($con);
        DB::reconnect($con);
    }

    public static function updateSettings($post)
    {
	    foreach($post as $key => $value){
			 if($key == "_token"){
				 continue;
			 }
			 
			 $data = array();
			 $data['value'] = $value; 
			 $data['updated_at'] = Carbon::now();
			 if(Setting::where('name', $key)->exists()){				
				Setting::where('name','=',$key)->update($data);			
			 }else{
				$data['name'] = $key; 
				$data['created_at'] = Carbon::now();
				Setting::insert($data); 
			 }
		}
    }

    public static function createUser($name, $email, $password,$phone)
    {
        // Create the user
        $user = Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'user_type' => 'Admin',
			'image' => 'profile.png',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
        ]);

        self::seed(1);

    }

    public static function finalTouches()
    {
        // Update .env file
        static::updateEnv([
            'APP_LOCALE'    =>  session('locale'),
            'APP_INSTALLED' =>  'true',
            'APP_DEBUG'     =>  'false',
            'APP_URL'     =>  url(''),
        ]);

        // Rename the robots.txt file
        try {
            File::move(base_path('robots.txt.dist'), base_path('robots.txt'));
        } catch (\Exception $e) {
            // nothing to do
        }
    }

    public static function updateEnv($data)
    {
        if (empty($data) || !is_array($data) || !is_file(base_path('.env'))) {
            return false;
        }

        $env = file_get_contents(base_path('.env'));

        $env = explode("\n", $env);

        foreach ($data as $data_key => $data_value) {
            foreach ($env as $env_key => $env_value) {
                $entry = explode('=', $env_value, 2);

                // Check if new or old key
                if ($entry[0] == $data_key) {
                    $env[$env_key] = $data_key . '=' . $data_value;
                } else {
                    $env[$env_key] = $env_value;
                }
            }
        }

        $env = implode("\n", $env);

        file_put_contents(base_path('.env'), $env);

        return true;
    }

    public static function seed($seed = 0) {
        if (!$seed) {
            return;
        }

        $db = \Artisan::call('db:seed');
    }
}
