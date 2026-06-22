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
        Schema::create('temples', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->comment('城市ID');
            $table->string('name')->comment('名稱');
            $table->string('slug')->unique()->comment('URL slug');
            $table->string('address')->nullable()->comment('地址');
            $table->string('postal_code', 20)->nullable()->comment('郵遞區號');
            $table->decimal('latitude', 10, 7)->nullable()->comment('緯度');
            $table->decimal('longitude', 10, 7)->nullable()->comment('經度');
            $table->string('phone', 50)->nullable()->comment('電話');
            $table->string('website')->nullable()->comment('官方網站');
            $table->text('map_url')->nullable()->comment('Google Map URL');
            $table->longText('description')->nullable()->comment('廟宇介紹');
            $table->string('main_deity')->nullable()->comment('主祀神明');
            $table->year('founded_year')->nullable()->comment('建立年份');
            $table->string('seo_title')->nullable()->comment('SEO title');
            $table->text('seo_description')->nullable()->comment('SEO description');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->comment('廟宇資料表');
        });

        Schema::create('temple_sign_system', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('temple_id')->comment('廟宇ID');
            $table->unsignedBigInteger('sign_system_id')->comment('籤系統ID');
            $table->integer('sort')->default(0)->comment('排序');
            $table->boolean('status')->default(true)->comment('狀態');
            $table->timestamps();

            $table->unique(['temple_id', 'sign_system_id']);
            $table->comment('廟宇-籤詩流派關聯');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temple_sign_system');

        Schema::dropIfExists('temples');
    }
};
