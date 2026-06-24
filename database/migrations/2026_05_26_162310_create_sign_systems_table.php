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
        Schema::create('deities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('名稱');
            $table->string('slug', 50)->unique()->comment('別名');
            $table->text('description')->nullable()->comment('介紹');
            $table->string('image')->nullable()->comment('圖片');
            $table->integer('sort')->comment('順序');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->index('slug');
            $table->comment('神明(deity)');
        });

        Schema::create('deities_fortune_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deity_id')->comment('神明ID');
            $table->unsignedBigInteger('fortune_category_id')->comment('籤詩分類ID');
            $table->integer('sort')->default(0)->comment('排序');
            $table->boolean('status')->default(true)->comment('狀態');
            $table->timestamps();

            $table->unique(['deity_id', 'fortune_category_id']);
            $table->comment('神明-籤詩分類-關聯表');
        });

        Schema::create('fortune_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('名稱');
            $table->string('slug', 50)->unique()->comment('別名');
            $table->text('description')->nullable()->comment('籤流派介紹');
            $table->integer('total_lots')->default(0)->comment('籤總計');
            $table->integer('sort')->default(0)->comment('排序');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->index('slug');
            $table->comment('籤詩分類(fortune_category)');
        });

        Schema::create('fortunes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fortune_category_id')->comment('籤詩分類ID');
            $table->integer('fortune_no')->comment('第幾籤');
            $table->string('title', 100)->nullable()->comment('籤詩標題');
            $table->text('content')->nullable()->comment('籤詩內容');
            $table->text('summary')->nullable()->comment('籤詩摘要');
            $table->string('level', 50)->nullable()->comment('吉凶分類');// 大吉 / 吉 / 中吉 / 凶
            $table->string('code', 50)->nullable()->comment('籤詩代碼');
            $table->string('image')->nullable()->comment('籤詩圖片');
            $table->longText('memo')->nullable()->comment('備忘錄');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->unique(['fortune_category_id', 'fortune_no']);

            $table->index('fortune_no');
            $table->index('level');
            $table->comment('籤詩(fortune)');
        });

        Schema::create('fortune_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fortune_id')->comment('詩籤ID');
            $table->string('title')->nullable()->comment('解籤標題');
            $table->longText('content')->comment('解籤內容');
            $table->text('summary')->nullable()->comment('解籤摘要');
            $table->integer('sort')->default(0)->comment('排序');
            $table->timestamps();

            $table->index(['fortune_id', 'sort']);
            $table->comment('籤詩-解籤');
        });

        Schema::create('fortune_topics', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('名稱');
            $table->string('slug', 50)->unique()->comment('別名');
            $table->integer('sort')->default(0)->comment('排序');
            $table->timestamps();

            $table->comment('籤詩-運勢分類');
        });

        Schema::create('fortune_topic_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fortune_id')->comment('詩籤ID');
            $table->foreignId('fortune_topic_id')->comment('運勢分類ID');
            $table->text('result')->nullable()->comment('結語');
            $table->timestamps();

            $table->unique(['fortune_id', 'fortune_topic_id']);

            $table->comment('籤詩-運勢');
        });

        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('標題');
            $table->longText('content')->comment('解籤內容');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->comment('典故(story)');
        });

        Schema::create('fortune_story', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fortune_id')->comment('詩籤ID');
            $table->foreignId('story_id')->comment('典故ID');
            $table->timestamps();

            $table->comment('籤詩-典故-關聯表');
        });

        Schema::create('fortune_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fortune_id')->comment('籤詩ID');
            $table->string('language', 10)->comment('語系');// zh_TW / en / ja
            $table->string('title')->nullable()->comment('籤詩標題');
            $table->text('content')->nullable()->comment('籤詩內容');
            $table->text('summary')->nullable()->comment('籤詩摘要');
            $table->string('level')->nullable()->comment('吉凶分類');// 大吉 / 吉 / 中吉 / 凶
            $table->string('code')->nullable()->comment('籤詩代碼');
            $table->longText('memo')->nullable()->comment('備忘錄');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->unique(['fortune_id', 'language']);

            $table->comment('籤詩多語系');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fortune_translations');

        Schema::dropIfExists('fortune_story');

        Schema::dropIfExists('stories');

        Schema::dropIfExists('fortune_topic_values');

        Schema::dropIfExists('fortune_topics');

        Schema::dropIfExists('fortune_sections');

        Schema::dropIfExists('fortunes');

        Schema::dropIfExists('fortune_categories');

        Schema::dropIfExists('deities_fortune_categories');

        Schema::dropIfExists('deities');
    }
};
