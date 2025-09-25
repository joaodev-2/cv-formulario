<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('job_applications', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('email');
            $t->string('phone');
            $t->string('desired_role');
            $t->string('education'); // select
            $t->string('linkedin_url')->nullable();
            $t->string('cv_path');
            $t->string('ip', 45);
            $t->timestamp('submitted_at');
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('job_applications'); }
};
