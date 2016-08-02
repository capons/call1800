<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf8_general_ci';
            $table->increments('id');

            $table->string('name',128);
            $table->string('category',128)->nullable();
            $table->string('description',256)->nullable(); //+

            $table->string('web-number')->length(40);

            $table->string('number')->length(40);
            


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
        Schema::drop('companys');
    }
}
