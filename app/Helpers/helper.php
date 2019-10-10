<?php 
use App\Admin;
if (!function_exists('remove_last')) {
	function remove_last($word)
	{	
	$text = $word;
	$last_space_position = strrpos($text, ' ');
	$text = substr($text, 0, $last_space_position);
	return  $text;
	}
}


if (!function_exists('_lang')) {
	function _lang($string = '') {

		//Get Target language
		$target_lang = get_option('language');

		if ($target_lang == "") {
			$target_lang = "language";
		}

		if (file_exists(resource_path() . "/language/$target_lang.php")) {
			include resource_path() . "/language/$target_lang.php";
		} else {
			include resource_path() . "/language/language.php";
		}

		if (array_key_exists($string, $language)) {
			return $language[$string];
		} else {
			return $string;
		}
	}
}

if (!function_exists('load_language')) {
	function load_language($active = '') {
		$path = resource_path() . "/language";
		$files = scandir($path);
		$options = "";

		foreach ($files as $file) {
			$name = pathinfo($file, PATHINFO_FILENAME);
			if ($name == "." || $name == "" || $name == "language") {
				continue;
			}

			$selected = "";
			if ($active == $name) {
				$selected = "selected";
			} else {
				$selected = "";
			}

			$options .= "<option value='$name' $selected>" . ucwords($name) . "</option>";

		}
		echo $options;
	}
}

if (!function_exists('get_language_list')) {
	function get_language_list() {
		$path = resource_path() . "/language";
		$files = scandir($path);
		$array = array();

		foreach ($files as $file) {
			$name = pathinfo($file, PATHINFO_FILENAME);
			if ($name == "." || $name == "" || $name == "language") {
				continue;
			}

			$array[] = $name;

		}
		return $array;
	}
  }
	function gv($params, $keys, $default = Null) {
		return (isset($params[$keys]) AND $params[$keys]) ? $params[$keys] : $default;
	}

	function gbv($params, $keys) {
		return (isset($params[$keys]) AND $params[$keys]) ? 1 : 0;
	}



	function toWord($word) {
	$word = str_replace('_', ' ', $word);
	$word = str_replace('-', ' ', $word);
	$word = ucwords($word);
	return $word;
}

function tospane($data) {
	$per = explode('.', $data);
	return toWord($per[1]);
}
//permission
function split_name($name) {
	$data = [];
	foreach ($name as $value) {
		$per = explode('.', $value->name);
		$data[toWord($per[0])][] = $value->name;
	}
	return $data;

}


function getUserRoleName($user_id) {
	$user = Admin::findOrFail($user_id);

	$roles = $user->getRoleNames();

	$role_name = '';

	if (!empty($roles[0])) {
		$array = explode('#', $roles[0], 2);
		$role_name = !empty($array[0]) ? $array[0] : '';
	}
	return $role_name;
}

if (!function_exists('get_option')) {
	function get_option($name) {
		$setting = DB::table('settings')->where('name', $name)->get();
		if (!$setting->isEmpty()) {
			return $setting[0]->value;
		}
		return "";

	}
}


function tz_list() {
	$zones_array = array();
	$timestamp = time();
	foreach (timezone_identifiers_list() as $key => $zone) {
		date_default_timezone_set($zone);
		$zones_array[$key]['zone'] = $zone;
		$zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
	}
	return $zones_array;
}


/*
 *  Used to get logo
 *  @return string
 */

if (!function_exists('getVisIpAddr')) {
  function getVisIpAddr() { 
      
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
        return$vis_ip = $_SERVER['HTTP_CLIENT_IP']; 
    } 
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
        return $vis_ip= $_SERVER['HTTP_X_FORWARDED_FOR']; 
    } 
    else { 
        return $vis_ip= $_SERVER['REMOTE_ADDR']; 
    } 
}
}
if (!function_exists('getVisIpDetails')) {
  function getVisIpDetails($ip) { 
    
    $ipdat = @json_decode(file_get_contents( 
    "http://www.geoplugin.net/json.gp?ip=" . $ip));

       
// echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n"; 
// echo 'City Name: ' . $ipdat->geoplugin_city . "\n"; 
// echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n"; 
// echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n"; 
// echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n"; 
// echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n"; 
// echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n"; 
// echo 'Timezone: ' . $ipdat->geoplugin_timezone; 


    return $ipdat;
  	}

  }

  function getLogo() {
	$logo = get_option("logo");
	if ($logo == "") {
		return '<img src="' . asset('/asset/logo.png') . '" alt="Satt Advocate" width="100%" height="100%">';
	}
	return '<img src="' . asset('/storage/logo/' . $logo) . '" alt="' . get_option('company_name') . '"  width="100%" height="100%">';

 }
 ?>