<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Task extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->int('assigned_by');
            $table->int('assigned_to');
            $table->softDeletes();
            $table->timestamps();
            $table->enum('status',['future', 'todo', 'in_progress', 'testing','done']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
