<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('create_team_tbs', function (Blueprint $table) {
            $table->string("team_id", 20)->primary()->nullable(false);
            $table->string("team_name", 50);
            $table->string("department_id", 20);
            $table->timestamps();

            $table->foreign('department_id')
                ->references('department_id')
                ->on('create_department_tbs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_team_tbs');
    }
};
