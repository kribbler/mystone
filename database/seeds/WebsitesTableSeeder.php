<?php

use Illuminate\Database\Seeder;

class WebsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert([
            'name' => 'Keystone System',
            'env_code' => 'keystone',
            'type' => 'keystone',
            'local_url' => 'http://local-keystone.qanw.co.uk',
            'staging_url' => 'https://staging-keystone.qanw.co.uk',
            'production_url' => 'https://keystone.qanw.co.uk',
            'logo' => '/img/warranty-services-logo.gif',
            'footer_text' => 'This web-site is owned and operated by QANW. QANW is a trading name of Warranty Services Limited, a company registered in Scotland, with the registered address of 4 Forbes Drive, Heathfield Industrial Estate, Ayr, Scotland, KA8 9FG, and with the company number SC205797. Warranty Services Limited is authorised and regulated by the Financial Conduct Authority (Firm Reference Number 309580) | VAT Registration Number: 974964555 | e-mail: 
                <a href="mailto:info@qanw.co.uk">info@qanw.co.uk</a> © Copyright QANW',
            'contact_address_1' => '4 Forbes Drive',
            'contact_address_2' => 'Ayr',
            'contact_address_3' => 'Scotland',
            'contact_address_postcode' => 'KA8 9FG',
            'contact_telephone' => '01292 268020',
            'contact_email' => 'info@qanw.co.uk',
        ]);

    }
}
