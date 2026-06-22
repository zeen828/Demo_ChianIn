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
        Schema::create('main_god', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名稱');
            $table->string('slug')->comment('URL slug');
            $table->longText('description')->nullable()->comment('介紹');
            $table->string('image')->nullable()->comment('圖片');
            $table->integer('sort')->comment('順序');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->comment('主神');
        });

        Schema::create('main_god_sign_system', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_god_id')->comment('主神ID');
            $table->unsignedBigInteger('sign_system_id')->comment('籤系統ID');
            $table->integer('sort')->default(0)->comment('排序');
            $table->boolean('status')->default(true)->comment('狀態');
            $table->timestamps();

            $table->unique(['main_god_id', 'sign_system_id']);
            $table->comment('主神-籤詩流派關聯');
        });

        Schema::create('sign_systems', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名稱');
            $table->string('slug')->comment('URL slug');
            $table->integer('total_fortunes')->default(0)->comment('籤總數');
            $table->longText('description')->nullable()->comment('籤流派介紹');
            $table->integer('sort')->default(0)->comment('排序');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->comment('籤詩流派資料表');
        });

        Schema::create('fortunes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sign_system_id')->comment('流派ID');
            $table->integer('number')->comment('第幾籤');
            $table->string('title')->nullable()->comment('籤詩標題');
            $table->text('content')->nullable()->comment('籤詩內容');
            $table->text('summary')->nullable()->comment('籤詩摘要');
            $table->string('level')->nullable()->comment('吉凶分類');// 大吉 / 吉 / 中吉 / 凶
            $table->string('code')->nullable()->comment('籤詩代碼');
            $table->string('image')->nullable()->comment('籤詩圖片');
            $table->text('memo')->nullable()->comment('備忘錄');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->comment('籤詩主資料表');
        });

        Schema::create('fortune_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fortune_id')->comment('籤詩ID');
            $table->string('locale', 10)->comment('語系');// zh_TW / en / ja
            $table->string('title')->nullable()->comment('籤詩標題');
            $table->longText('poem')->comment('籤詩內容');
            $table->text('summary')->nullable()->comment('解釋摘要');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->comment('籤詩多語系內容表');
        });

        Schema::create('interpretation_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fortune_id')->comment('籤詩ID');
            $table->string('locale', 10)->comment('語系');
            $table->longText('general_interpretation')->nullable()->comment('整體解籤');
            $table->longText('love')->nullable()->comment('愛情');
            $table->longText('career')->nullable()->comment('事業');
            $table->longText('wealth')->nullable()->comment('財運');
            $table->longText('health')->nullable()->comment('健康');
            $table->longText('exam')->nullable()->comment('考試');
            $table->longText('travel')->nullable()->comment('旅行');
            $table->longText('relationship')->nullable()->comment('人際');
            $table->longText('lawsuit')->nullable()->comment('訴訟');
            $table->longText('lost_item')->nullable()->comment('失物');
            $table->boolean('status')->default(false)->comment('狀態');
            $table->timestamps();

            $table->comment('解籤多語系內容表');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interpretation_translations');

        Schema::dropIfExists('fortune_translations');

        Schema::dropIfExists('fortunes');

        Schema::dropIfExists('sign_systems');
    }
};
