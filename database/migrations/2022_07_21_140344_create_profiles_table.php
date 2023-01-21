<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create("profiles", function (Blueprint $table): void {
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->string("avatar_path")->nullable();
            $table->string("location")->nullable();
            $table->date("birthday")->nullable();
            $table->string("gender")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("profiles");
    }
};
