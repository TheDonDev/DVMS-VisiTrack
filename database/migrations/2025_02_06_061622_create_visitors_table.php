<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('visit_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('designation');
            $table->string('organization');
            $table->string('email');
            $table->string('phone_number');
            $table->string('id_number');
            $table->enum('visit_type', ['Business', 'Official', 'Educational', 'Social', 'Tour', 'Other']);
            $table->enum('visit_facility', ['Library', 'Administration Block', 'Science Block', 'Auditorium', 'SHS']);
            $table->date('visit_date');
            $table->time('visit_from');
            $table->time('visit_to');
            $table->text('purpose_of_visit');
            $table->unsignedBigInteger('host_id'); // Foreign key reference to hosts table
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('host_id')->references('id')->on('hosts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};