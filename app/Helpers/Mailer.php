<?php

namespace App\Helpers;

use Sendinblue\Mailin;
use Exception;
use Log;
use App;

class Mailer
{

    public static function sendMail($data)
    {
        try {

            if (App::environment('local', 'staging')) {
                $debug = true;
            } else {
                $debug = false;
            }

            $mailin = new Mailin('https://api.sendinblue.com/v2.0','JbLEw0cgYkO8hHRQ');  
            /** Prepare variables for easy use **/ 

            $mail = Mailer::formatMail($data);

            $res = $mailin->send_email($mail);
            if(isset($res['code']) && $res['code'] == 'failure') {
                Log::error('E-mail failed to send: ' . json_encode($res));
                throw new Exception('E-mail failed to send');
            }

        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public static function formatMail($mail)
    {
        $data = [
            "to"      => null,
            "cc"      => null,
            "bcc"     => null,
            "from"    => ["noreply@kinnell-aws.co.uk", "Members Area"],
            "replyto" => null,//["replyto@email.com", "reply to!"],
            "subject" => "My subject",
//            "text"    => "This is the text",
            "html"    => "Body",
            "attachment" => [],
            "headers" => [
                "Content-Type" => "text/html; charset=iso-8859-1",
//                    "X-param1"=> "value1",
//                    "X-param2"=> "value2",
//                    "X-Mailin-custom"=>"my custom value",
//                    "X-Mailin-IP"=> "102.102.1.2",
//                    "X-Mailin-Tag" => "My tag"
            ],
//                "inline_image" => ['myinlineimage1.png' => "your_png_files_base64_encoded_chunk_data",'myinlineimage2.jpg' => "your_jpg_files_base64_encoded_chunk_data"]
        ];
        foreach ($data as $key => &$value) {
            if(isset($mail[$key])) {
                $value = $mail[$key];
            }
        }
        return $data;
    }

}
