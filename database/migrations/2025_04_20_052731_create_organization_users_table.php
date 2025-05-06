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
        Schema::create('organization_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->enum('role', [
                'TENANT_SUPER_ADMIN',
                'TENANT_SALES_MANAGER',
                'TENANT_DEVELOPER_ADMIN',
                'TENANT_DEVELOPER',
                'TENANT_BROKER_ADMIN',
                'TENANT_BROKER',
            ]);
            $table->unique(['user_id', 'organization_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_users');
    }
};
