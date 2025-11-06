<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('clients')) {
            Schema::create('clients', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255);
                $table->string('email')->unique();
                $table->enum('status', ['active', 'inactive'])->default('active');
                $table->timestamps();
            });

            DB::table('clients')->insert([
                [
                    'name' => 'Johannes Palor',
                    'email' => 'johannes.p@ensembledigitalmedia.com',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Mon',
                    'email' => 'mon.dev005@gmail.com',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Juan Dela Cruz',
                    'email' => 'juan@example.com',
                    'status' => 'inactive',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            Schema::table('clients', function (Blueprint $table) {
                if (!Schema::hasColumn('clients', 'status')) {
                    $table->enum('status', ['active', 'inactive'])->after('email')->default('active');
                }
            });

            if (DB::table('clients')->count() === 0) {
                DB::table('clients')->insert([
                    [
                        'name' => 'Johannes Palor',
                        'email' => 'johannes.p@ensembledigitalmedia.com',
                        'status' => 'active',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Mon',
                        'email' => 'mon.dev005@gmail.com',
                        'status' => 'active',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Juan Dela Cruz',
                        'email' => 'juan@example.com',
                        'status' => 'inactive',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
