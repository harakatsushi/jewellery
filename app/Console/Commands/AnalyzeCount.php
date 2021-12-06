<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Log;
use File;
use App\MonthData;
use App\Customer;
class AnalyzeCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AnalyzeCount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '統計';

   
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this_manth_data=MonthData::where("yyyymm",data("Y").data("m"))->first();
        if(!$this_manth_data){
        	$this_manth_data=new MonthData();
        	$this_manth_data->data1=Customer::count();


	  		//  ・月の申込者数に対して、決済フラグがたっているものの数及び割合
	    	$this_manth_data->data2=Customer::where('is_pay',1)->count();
			// ・月の申込者数に対して、ステータスが開通済みかつ、決済のフラグがたっているものの数及び割合
			$this_manth_data->data3=Customer::where('is_pay',1)->where('status',1)->count();
			// ・月の申込者数に対して、決済不備フラグがたっているものの数
			$this_manth_data->data4=Customer::where('is_pay_defect',1)->count();
			// ・月の申込者数に対して、ステータスが開通済みの案件の数
			$this_manth_data->data5=Customer::where('status',1)->count();
			// ・月の申込者数に対して、ステータスが待ちの案件の数
			$this_manth_data->data6=Customer::where('status',2)->count();
			// ・月の申込者数に対して、ステータスが待ち(未定)の案件の数
			$this_manth_data->data7=Customer::where('status',3)->count();
			// ・月の申込者数に対して、ステータスがNTTF待ちの案件の数
			$this_manth_data->data8=Customer::where('status',4)->count();
			// ・月の申込者数に対して、ステータスがCXLの案件の数及び割合
			$this_manth_data->data9=Customer::where('status',5)->count();
			// ・月の申込者数に対して、ステータスが解約の案件の数
			$this_manth_data->data10=Customer::where('status',6)->count();
        }else{
        	$this_manth_data->data1=Customer::count();


	  		//  ・月の申込者数に対して、決済フラグがたっているものの数及び割合
	    	$this_manth_data->data2=Customer::where('is_pay',1)->count();
			// ・月の申込者数に対して、ステータスが開通済みかつ、決済のフラグがたっているものの数及び割合
			$this_manth_data->data3=Customer::where('is_pay',1)->where('status',1)->count();
			// ・月の申込者数に対して、決済不備フラグがたっているものの数
			$this_manth_data->data4=Customer::where('is_pay_defect',1)->count();
			// ・月の申込者数に対して、ステータスが開通済みの案件の数
			$this_manth_data->data5=Customer::where('status',1)->count();
			// ・月の申込者数に対して、ステータスが待ちの案件の数
			$this_manth_data->data6=Customer::where('status',2)->count();
			// ・月の申込者数に対して、ステータスが待ち(未定)の案件の数
			$this_manth_data->data7=Customer::where('status',3)->count();
			// ・月の申込者数に対して、ステータスがNTTF待ちの案件の数
			$this_manth_data->data8=Customer::where('status',4)->count();
			// ・月の申込者数に対して、ステータスがCXLの案件の数及び割合
			$this_manth_data->data9=Customer::where('status',5)->count();
			// ・月の申込者数に対して、ステータスが解約の案件の数
			$this_manth_data->data10=Customer::where('status',6)->count();
        }
        $this_manth_data->save();

        $MonthDatas=MonthData::orderBy('yyyymm')->get();




    }




}
