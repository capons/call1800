<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf8_general_ci';
            $table->increments('id');

            $table->string('name',128);
            
            $table->string('description',256)->nullable(); //+

            $table->integer('number')->length(20)->unsigned();

            $table->string('address',128)->nullable();
            $table->string('city',128)->nullable();
            $table->string('state',128)->nullable();
            $table->string('country',128)->nullable();
            $table->integer('zipcode')->length(20)->unsigned()->nullable();


            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            //$table->tinyInteger('access')->nullable();

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
        Schema::drop('company');
    }
}
