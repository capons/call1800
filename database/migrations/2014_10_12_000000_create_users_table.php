<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            /*
            $table->engine = 'InnoDB';
            $table->collation = 'utf8_general_ci';
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            */
            $table->engine = 'InnoDB';
            $table->collation = 'utf8_general_ci';
            $table->increments('id',12);
            $table->string('name',128)->nullable();
            $table->string('last_name',128)->nullable();
            $table->string('email',60)->nullable(); //for login
            $table->integer('phone_number')->nullable();
            $table->string('country',60)->nullable();
            $table->string('state',60)->nullable();
            $table->string('city',60)->nullable();
            $table->string('address',255)->nullable();
            //$table->string('login',128)->nullable(); //login for manager login
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->tinyInteger('active')->nullable();
            $table->tinyInteger('access')->nullable();
            $table->string('hash', 100)->nullable();
            //$table->integer('parent_id')->nullable();
            //$table->index('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
