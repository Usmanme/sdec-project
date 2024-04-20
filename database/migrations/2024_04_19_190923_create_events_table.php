<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('location')->nullable();
            $table->string('organizer')->nullable();
            $table->longText('contact_info')->nullable();
            $table->enum('event_type', ['Conference','Workshop','Webinar'])->default('conference');
            $table->string('attendee_limit')->default(1);
            $table->date('registration_deadline')->nullable();
            $table->string('registration_fee')->nullable();
            $table->string('event_logo')->nullable();
            $table->enum('status', ['Active','Cancelled','Postponed'])->default('active');
            $table->string('tags')->nullable();
            $table->timestamp('start_date_time')->default(Carbon::now());
            $table->timestamp('end_date_time')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
