<?php

namespace App\Utilities;

class Overrider
{

    public static function load($type)
    {
        $method = 'load' . ucfirst($type);

        static::$method();
    }

    protected static function loadSettings()
    {
        // Timezone
        config(['app.timezone' => get_option('timezone')]);

        // Email
        $email_protocol = get_option('mail_type');
        config(['mail.driver' => $email_protocol]);
        config(['mail.from.name' => get_option('from_name')]);
        config(['mail.from.address' => get_option('from_email')]);

        if ($email_protocol == 'smtp') {
            config(['mail.host' => get_option('smtp_host')]);
            config(['mail.port' => get_option('smtp_port')]);
            config(['mail.username' => get_option('smtp_username')]);
            config(['mail.password' => get_option('smtp_password')]);
            config(['mail.encryption' => get_option('smtp_encryption')]);
        }
		
    }

}