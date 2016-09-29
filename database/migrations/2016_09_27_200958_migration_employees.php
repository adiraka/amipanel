<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('p_o_b')->nullable();
            $table->date('d_o_b')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->enum('religion', ['Islam', 'Katolik', 'Protestan', 'Hindu', 'Budha', 'Konghucu'])->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->enum('position', ['Director', 'Graphic Designer', 'Software Engineer'])->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
