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
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名稱');
            $table->string('slug')->unique()->comment('代碼');
            $table->integer('sort')->default(0)->comment('排序');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->comment('世界區域表');
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->comment('區域ID');
            $table->string('name')->comment('名稱');
            $table->string('code', 10)->nullable()->comment('代碼');
            $table->string('slug')->unique()->comment('URL slug');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->comment('國家資料表');
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->comment('國家ID');
            $table->string('name')->comment('名稱');
            $table->string('slug')->comment('URL slug');
            $table->decimal('latitude', 10, 7)->nullable()->comment('緯度');
            $table->decimal('longitude', 10, 7)->nullable()->comment('經度');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->comment('城市資料表');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');

        Schema::dropIfExists('countries');

        Schema::dropIfExists('regions');
    }
};
