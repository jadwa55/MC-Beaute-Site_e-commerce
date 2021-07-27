<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('Introduction', 500)->nullable();
            $table->string('Categories', 100)->nullable();
            $table->string('image',255)->nullable();
            $table->string('quantite',255)->nullable();
            $table->decimal('cost', 22)->nullable()->default(0.00);
            // $table->timestamps();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('update_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
