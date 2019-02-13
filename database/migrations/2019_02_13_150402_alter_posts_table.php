<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('posts', function (Blueprint $blueprint) {
            $blueprint->tinyInteger('status')->default(0)->comment('0未审核，1审核通过，-1审核删除'); // 0未审核，1审核通过，-1审核删除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('posts', function (Blueprint $blueprint) {
            $blueprint->dropColumn('status');
        });
    }
}
