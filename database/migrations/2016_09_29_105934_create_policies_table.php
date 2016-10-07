<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('import_id');
            $table->string('scheme_1', 255)->nullable();
            $table->string('scheme_2', 255)->nullable();
            $table->string('job_id', 255)->nullable();
            $table->string('account_item_id', 255)->nullable();
            $table->string('policy_no', 255)->nullable();
            $table->string('prefix', 255)->nullable();
            $table->string('site_address_1', 255)->nullable();
            $table->string('site_address_2', 255)->nullable();
            $table->string('site_address_3', 255)->nullable();
            $table->string('site_address_4', 255)->nullable();
            $table->string('contractor', 255)->nullable();
            $table->string('work_type_1', 255)->nullable();
            $table->string('work_type_2', 255)->nullable();
            $table->string('work_type_3', 255)->nullable();
            $table->decimal('contract_price', 14, 4)->nullable();
            $table->boolean('excess')->nullable();
            $table->string('excess_value', 255)->nullable();
            $table->string('code_1', 255)->nullable();
            $table->string('code_2', 255)->nullable();
            $table->date('completion_date')->nullable();
            $table->date('orig_pol_start_date')->nullable();
            $table->date('deposit_paid_date')->nullable();
            $table->integer('guarantee_term_1')->nullable();
            $table->string('commision', 255)->nullable();
            $table->decimal('payment_made', 14, 4)->nullable();
            $table->decimal('ipt_tax', 14, 4)->nullable();
            $table->decimal('ipt_plus_payment', 14, 4)->nullable();
            $table->decimal('net_premium', 14, 4)->nullable();
            $table->date('month_of_completion')->nullable();
            $table->string('location', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->integer('no_of_policies')->nullable();
            $table->date('bord_month')->nullable();
            $table->string('reserve_pot', 255)->nullable();
            $table->string('actual_split', 255)->nullable();
            $table->date('month_of_account')->nullable();
            $table->string('bord_name', 255)->nullable();
            $table->string('customer_surname', 255)->nullable();
            $table->string('unique_identifier', 255)->nullable();
            $table->string('actuarial_adjustment', 255)->nullable();
            $table->boolean('claims_paid')->nullable();
            $table->decimal('claim_amount', 14, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('policies');
    }
}
