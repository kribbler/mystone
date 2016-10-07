<?php

namespace App\Helpers;

use App;
use App\Models\Website;

class Multisite
{
    
    public static function site($env_codes)
    {
        $current_env = env('MULTISITE');
        if(is_array($env_codes)) {
            return in_array($current_env, $env_codes);
        } else if($env_codes == $current_env) {
            return true;
        }
        return false; 
    }

    public static function getContactDetails()
    {
        $current_env = env('MULTISITE');
        $fields = ['contact_address_1','contact_address_2','contact_address_3','contact_address_postcode','contact_telephone','contact_email'];
        $website = Website::where('env_code', $current_env)->select($fields)->firstOrFail();
        return $website;
    }

    public static function getUrl()
    {
        $current_env = env('MULTISITE');
        $website = Website::where('env_code', $current_env)->firstOrFail();
        $url = '';
        if (App::environment('local')) {
            $url = $website->local_url;
        } else if(App::environment('staging')) {
            $url = $website->staging_url;
        } else {
            $url = $website->production_url;
        }
        return $url;
    }

    public static function type($type)
    {
        $current_env = env('MULTISITE');
        if(is_array($type)) {
            $websites = Website::whereIn('type', $type)
                ->where('env_code', $current_env)
                ->count();
        } else {
            $websites = Website::where('type', $type)
                ->where('env_code', $current_env)
                ->count();
        }
        return (Bool) $websites;
    }

    public static function getLogo()
    {
        $current_env = env('MULTISITE');
        $website = Website::where('env_code', $current_env)->firstOrFail();
        return $website->logo;
    }

    public static function getFooterText()
    {
        $current_env = env('MULTISITE');
        $website = Website::where('env_code', $current_env)->firstOrFail();
        return $website->footer_text;
    }

    public static function getWebsiteTitle()
    {
        $current_env = env('MULTISITE');
        $website = Website::where('env_code', $current_env)->firstOrFail();
        return $website->name;
    }

    public static function getGoogleAnalytics()
    {
        $current_env = env('MULTISITE');
        $website = Website::where('env_code', $current_env)->firstOrFail();
        return $website->google_analytics;
    }

    public static function getEnv()
    {
        return env('MULTISITE');
    }

}
