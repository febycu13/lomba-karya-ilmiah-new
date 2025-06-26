<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('makalah', function (Blueprint $table) {
            $table->id();
            $table->integer('id_makalah');
            $table->string('title');
            $table->string('sub_theme');
            $table->string('school');
            $table->string('code_school');
            $table->string('address_school');
            $table->string('province');
            $table->string('men');
            $table->string('womwen');
            $table->string('name_participant');
            $table->string('name_teacher');
            $table->string('telephone');
            $table->string('email');
            $table->string('file_makalah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makalah');
    }
};
