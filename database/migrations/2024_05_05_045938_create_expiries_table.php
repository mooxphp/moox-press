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
        Schema::create('expiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('meta_id')->nullable();
            $table->string('link');
            $table->dateTime('expired_at');
            $table->dateTime('notified_at')->nullable();
            $table->unsignedBigInteger('notified_to')->nullable();
            $table->dateTime('escalated_at')->nullable();
            $table->unsignedBigInteger('escalated_to')->nullable();
            $table->unsignedBigInteger('handled_by')->nullable();
            $table->dateTime('done_at')->nullable();
            $table->string('expiry_job');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expiries');
    }
};
