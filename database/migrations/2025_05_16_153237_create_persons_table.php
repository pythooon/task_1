<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'persons',
            function (Blueprint $table) {
                $table->uuid('id')->primary()->unique();
                $table->string('firstName');
                $table->string('lastName');
                $table->boolean('company')->default(false);
                $table->string('companyName')->nullable();
                $table->string('vatNumber')->nullable();

                $table->timestamp('createdAt')->useCurrent();
                $table->timestamp('updatedAt')->useCurrentOnUpdate();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
