<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('websites', function ($table) {
            $table->string('contact_address_1', 50)->nullable();
            $table->string('contact_address_2', 50)->nullable();
            $table->string('contact_address_3', 50)->nullable();
            $table->string('contact_address_postcode', 10)->nullable();
            $table->string('contact_telephone', 50)->nullable();
            $table->string('contact_email', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('contact_address_1');
            $table->dropColumn('contact_address_2');
            $table->dropColumn('contact_address_3');
            $table->dropColumn('contact_address_postcode');
            $table->dropColumn('contact_telephone');
            $table->dropColumn('contact_email');
        });
    }
}
