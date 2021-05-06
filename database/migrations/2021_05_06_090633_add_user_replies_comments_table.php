<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserRepliesCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // adds user_id and parent_id collumn under comments table
        Schema::table('comments', function(Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drops user_id and parent_id collumn under comments table
        Schema::table('comments', function(Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('parent_id');
        });
    }
}
