<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('follow.followable_table', 'followables'), function (Blueprint $table) {
            $userForeignKey = config('follow.users_table_foreign_key', 'user_id');
            $table->unsignedInteger($userForeignKey);
            $table->unsignedInteger('followable_id');
            $table->string('followable_type')->index();
            $table->string('relation')->default('follow')->comment('follow/like/subscribe/favorite/upvote/downvote');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign($userForeignKey)
                ->references(config('follow.users_table_primary_key', 'id'))
                ->on(config('follow.users_table_name', 'users'))
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(config('follow.followable_table', 'followables'), function ($table) {
            $table->dropForeign(config('follow.followable_table', 'followables').'_user_id_foreign');
        });

        Schema::drop(config('follow.followable_table', 'followables'));
    }

}
