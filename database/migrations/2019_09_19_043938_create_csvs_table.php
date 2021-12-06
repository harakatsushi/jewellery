<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number1')->length(40);//1
            $table->integer('number2')->length(40);
            $table->integer('number3')->length(40);
            $table->string('recv_date')->length(10);
            $table->string('haishutsu_code')->length(10);//5
            $table->string('recv_tanto')->length(48);
            $table->string('reg_tanto')->length(48);
            $table->string('haiki_code')->length(7);
            $table->string('haiki_name')->length(120);
            $table->string('haiki_cnt')->length(9);
            $table->string('haiki_number_tani')->length(1);
            $table->string('nisugata_code')->length(2);
            $table->string('nisugata_cnt')->length(5);
            $table->string('nisugata_cnt_kakutei')->length(2);
            $table->string('hazardous1')->length(2);
            $table->string('hazardous2')->length(2);
            $table->string('hazardous3')->length(2);
            $table->string('hazardous4')->length(2);
            $table->string('hazardous5')->length(2);
            $table->string('hazardous6')->length(2);

            $table->string('shushu_number1')->length(7);
            $table->string('saiitaku_nuber1')->length(7);
            $table->string('unpan_code1')->length(1);
            $table->string('car_number1')->length(60);
            $table->string('unpan_tanto1')->length(48);
            $table->string('kanyu_nymber1')->length(7);
            $table->string('unpan_number1')->length(3);
      
            $table->string('shushu_number2')->length(7);
            $table->string('saiitaku_nuber2')->length(7);
            $table->string('unpan_code2')->length(1);
            $table->string('car_number2')->length(60);
            $table->string('unpan_tanto2')->length(48);
            $table->string('kanyu_nymber2')->length(7);
            $table->string('unpan_number2')->length(3);

            $table->string('shushu_number3')->length(7);
            $table->string('saiitaku_nuber3')->length(7);
            $table->string('unpan_code3')->length(1);
            $table->string('car_number3')->length(60);
            $table->string('unpan_tanto3')->length(48);
            $table->string('kanyu_nymber3')->length(7);
            $table->string('unpan_number3')->length(3);
      
            $table->string('shushu_number4')->length(7);
            $table->string('saiitaku_nuber4')->length(7);
            $table->string('unpan_code4')->length(1);
            $table->string('car_number4')->length(60);
            $table->string('unpan_tanto4')->length(48);
            $table->string('kanyu_nymber4')->length(7);
            $table->string('unpan_number4')->length(3);
            $table->string('shushu_number5')->length(7);
            $table->string('saiitaku_nuber5')->length(7);
            $table->string('unpan_code5')->length(1);
            $table->string('car_number5')->length(60);
            $table->string('unpan_tanto5')->length(48);
            $table->string('kanyu_nymber5')->length(7);
            $table->string('unpan_number5')->length(3);

            $table->string('shobun_number')->length(7);
            $table->string('saiitaku_number')->length(7);
            $table->string('shobun_jigyou_code')->length(3);
            $table->string('shobun_hoho')->length(3);
            $table->string('last_shobun_kbn')->length(1);
            $table->string('last_shobun_code1')->length(10);
            $table->string('last_shobun_code2')->length(10);
            $table->string('last_shobun_code3')->length(10);
            $table->string('last_shobun_code4')->length(10);
            $table->string('last_shobun_code5')->length(10);
            $table->string('last_shobun_code6')->length(10);
            $table->string('last_shobun_code7')->length(10);
            $table->string('last_shobun_code8')->length(10);
            $table->string('last_shobun_code9')->length(10);
            $table->string('last_shobun_code10')->length(10);
            $table->string('note1')->length(100);
            $table->string('note2')->length(100);
            $table->string('note3')->length(100);
            $table->string('note4')->length(100);
            $table->string('note5')->length(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('csvs');
    }
}
