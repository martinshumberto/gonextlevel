<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAvatarIntoProfileTable extends Migration
{
    public function up()
    {
        Schema::table('profiles', function(Blueprint $table) {
            $table->string('avatar')->nullable();
        });
    }

    public function down()
    {
        Schema::table('profiles', function(Blueprint $table) {
            $table->dropColumn('avatar');
        });
    }
}
