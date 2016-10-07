<?php

namespace App\Helpers;

use App;
use Log;
use Aws\Laravel\AwsFacade as AWS;
use Guzzle\Http\EntityBody;

class FileUpload
{

    public static function upload($file_name, $local_file_path)
    {
        try {
            $s3 = AWS::createClient('s3');
            $s3->putObject(array(
                'Bucket'     => config('app.aws_bucket'),
                'Key'        => config('app.aws_bucket_folder') . '/' . $file_name,
                'SourceFile' => $local_file_path,
            ));
            return true;
        } catch (Aws\Exception\S3Exception $e) {
            Log::warning("There was an error uploading the file.");
        }
        return false;
    }

    public static function render($file_name)
    {
        try {
            $s3 = AWS::createClient('s3');
            $file = $s3->getObject(array(
                'Bucket'     => config('app.aws_bucket'),
                'Key'        => config('app.aws_bucket_folder') . '/' . $file_name,
            ));
            return $file;
        } catch (Aws\Exception\S3Exception $e) {
            Log::warning("There was an error retrieving the file: " . $file_name);
        }
        return false;
    }

}
