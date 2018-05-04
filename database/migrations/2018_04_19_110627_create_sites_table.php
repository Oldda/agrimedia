<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            //表属性
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //字段属性
            $table->increments('id');
            $table->integer('siter_id')->comment('点位主id');
            $table->string('title')->comment('点位名称');
            $table->string('address')->comment('点位地址');
            $table->string('mac_address')->comment('屏幕mac地址');
            $table->string('site_phone',11)->nullable()->comment('点位电话');
            $table->string('picture')->nullable()->comment('门店图片');
            $table->decimal('site_bill',4,2)->comment('点位租赁价格元/天');
            $table->decimal('site_pay_bill',5,2)->comment('点位投放价格');
            $table->tinyInteger('status')->default(0)->comment('点位状态：0未激活，1已激活');
            $table->string('app_version')->comment('搭载app的版本号');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
