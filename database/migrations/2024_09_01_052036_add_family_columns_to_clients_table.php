<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFamilyColumnsToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('fam_lastname')->nullable();
            $table->string('fam_firstname')->nullable();
            $table->string('fam_middlename')->nullable();
            $table->string('fam_relationship')->nullable();
            $table->string('fam_birthday')->nullable();
            $table->string('fam_age')->nullable();
            $table->string('fam_gender')->nullable();
            $table->string('fam_status')->nullable();
            $table->string('fam_education')->nullable();
            $table->string('fam_occupation')->nullable();
            $table->string('fam_income')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn([
                'fam_lastname',
                'fam_firstname',
                'fam_middlename',
                'fam_relationship',
                'fam_birthday',
                'fam_age',
                'fam_gender',
                'fam_status',
                'fam_education',
                'fam_occupation',
                'fam_income',
            ]);
        });
    }
}
