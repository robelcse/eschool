<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfilesToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('remember_token');
            $table->string('last_name')->after('first_name');
            $table->string('address')->after('last_name');
            $table->string('city')->after('address');
            $table->string('zip_code')->after('city');
            $table->string('role')->after('zip_code');
            $table->string('bio')->after('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('zip_code');
            $table->dropColumn('role');
            $table->dropColumn('bio');

        });
    }
}
