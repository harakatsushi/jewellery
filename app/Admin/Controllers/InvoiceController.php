<?php

namespace App\Admin\Controllers;
use DB;
use App\Csv;
use App\Emission;
use App\SummaryParent;
use App\Transportation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Maatwebsite\Excel\Facades\Excel;
use \Zipper;
use Carbon\Carbon;

class InvoiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '集計フォーム';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function index2()
    {   $data["from"]=Carbon::parse('- 1 month')->startOfMonth()->format('Y-m-d');
        $data["to"]=Carbon::parse('- 1 month')->endOfMonth()->format('Y-m-d');
        return view('laravel-admin/invoice',$data);

    }


    public function excel()
    {
        $excel_file = storage_path('excel/template.xlsx');
        $_POST["from"]=str_replace("-", "", $_POST["from"]);
        $_POST["to"]=str_replace("-", "", $_POST["to"]);
       $work_dir=date("U");
       mkdir('/var/www/html/storage/work/'.$work_dir);
       $query = CSV::join('emissions', 'emissions.code', '=', 'csvs.haishutsu_code');

        if($_POST["from"]){
            $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '>=',$_POST["from"]);
        }

        if($_POST["to"]){
            $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '<=',$_POST["to"]);
        }
        if($_POST["target"]==1 ||$_POST["target"]==2 ){
            $codes=$query->distinct()->select('haishutsu_code')->get();


                    $tani_name=["","ｔ","ｍ３","ｋｇ","リットル","個・台"];
            $tanka_name=["","","","300","75",""];

            foreach ($codes as $key0 => $code) {
                $emission=Emission::where("code",$code->haishutsu_code)->first();
                $transportation=Transportation::find($emission->kameiten);
                $rate2=1;
                if($emission->eigyo==="VC本部営業"){
                    $rate2=0.7;
                }
                $rate=0.6;
                if($emission->eigyo==="VC本部営業"){
                    $rate=0.3;
                }
                $query = CSV::whereNotNUll("created_at");

                if($_POST["from"]){
                    $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '>=',$_POST["from"]);
                }

                if($_POST["to"]){
                    $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '<=',$_POST["to"]);
                }
                $csvs=$query->where("csvs.haishutsu_code",$code->haishutsu_code)->get();
               // $tanka_name[$cvs->haiki_number_tani]*$cvs->haiki_cnt;
               
                    Excel::load($excel_file, function($reader)  use ($csvs,$emission,$tani_name, $tanka_name,$rate){
                        // 1番目のシートを選択
                        $reader->sheet(0, function($sheet)  use ($csvs,$emission,$tani_name, $tanka_name,$rate){
                            $sheet->cell('F9', function($cell) use ($emission) {
                                $cell->setValue( $emission->name);
                            });
                             $sheet->cell('G10', function($cell)  use ($emission) {
                                    $cell->setValue(  $emission->address);
                            });
                             $ind=16;
                            foreach ($csvs as $key => $cvs) {

                                $sheet->cell('B'.( $ind+$key), function($cell) use ($cvs) {
                                    $cell->setValue( $cvs->haiki_name);
                                });
                                 $sheet->cell('D'.( $ind+$key), function($cell) use ($cvs) {
                                    $cell->setValue( $cvs->haiki_cnt);
                                });
                                  $sheet->cell('E'.( $ind+$key), function($cell) use ($emission) {
                                    $cell->setValue( $emission->k_type);
                                });
                                  $sheet->cell('F'.( $ind+$key), function($cell) use ($emission,$rate) {
                                    $cell->setValue( $emission->price1*$rate);
                                });
                                    $sheet->cell('G'.( $ind+$key), function($cell) use ($emission,$cvs, $tanka_name,$rate) {
                                    $cell->setValue( $cvs->haiki_cnt*$emission->price1*$rate);
                                });
                                $sheet->cell('H3', function($cell) use ($cvs) {
                                    $cell->setValue($cvs->id);
                                });
                                $sheet->cell('H4', function($cell)  {
                                    $cell->setValue( date("Y年m月d日"));
                                });

                            }

                        });
                    })->setFilename(date("YmdHis")."_".$emission->name)->store('xlsx','/var/www/html/storage/work/'.$work_dir);
                }
        }
        if($_POST["target"]==1 ||$_POST["target"]==3 ){
           $query = CSV::join('emissions', 'emissions.code', '=', 'csvs.haishutsu_code');

            if($_POST["from"]){
                $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '>=',$_POST["from"]);
            }

            if($_POST["to"]){
                $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '<=',$_POST["to"]);
            }
            $codes=$query->distinct()->select('emissions.kameiten')->get();


                    $tani_name=["","ｔ","ｍ３","ｋｇ","リットル","個・台"];
            $tanka_name=["","","","300","75",""];

            foreach ($codes as $key0 => $code) {

                $transportation=Transportation::find($code->kameiten);
  
 
                $query = CSV::join('emissions', 'emissions.code', '=', 'csvs.haishutsu_code');

                if($_POST["from"]){
                    $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '>=',$_POST["from"]);
                }

                if($_POST["to"]){
                    $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '<=',$_POST["to"]);
                }
               $csvs=$query->select(DB::raw('sum(price1) as price1,sum(haiki_cnt) as haiki_cnt,csvs.haishutsu_code'))->where("emissions.kameiten",$code->kameiten)->groupBy('csvs.haishutsu_code')->get();

               // $tanka_name[$cvs->haiki_number_tani]*$cvs->haiki_cnt;

                    Excel::load($excel_file, function($reader)  use ($csvs,$tani_name, $tanka_name,$transportation){
                        // 1番目のシートを選択
                        $reader->sheet(0, function($sheet)  use ($csvs,$tani_name, $tanka_name,$transportation){
                            $sheet->cell('F9', function($cell) use ($transportation) {
                                $cell->setValue( $transportation->name);
                            });
                            //  $sheet->cell('G10', function($cell)  use ($emission) {
                            //         //$cell->setValue(  $emission->address);
                            // });
                             $ind=16;
                            foreach ($csvs as $key => $cvs) {
                                 $emission=Emission::where("code",$cvs->haishutsu_code)->first();

                                 $rate2=1;
                                if($emission->eigyo==="VC本部営業"){
                                    $rate2=0.7;
                                }
                                $rate=0.6;
                                if($emission->eigyo==="VC本部営業"){
                                    $rate=0.3;
                                }

                                $sheet->cell('B'.( $ind+$key), function($cell) use ($emission) {
                                    $cell->setValue( $emission->name);
                                });
                                 $sheet->cell('D'.( $ind+$key), function($cell) use ($cvs) {
                                    $cell->setValue( $cvs->haiki_cnt);
                                });
                                  $sheet->cell('E'.( $ind+$key), function($cell) use ($emission) {
                                    $cell->setValue( $emission->k_type);
                                });
                                  $sheet->cell('F'.( $ind+$key), function($cell) use ($emission,$rate) {
                                    $cell->setValue( $emission->price1*$rate);
                                });
                                    $sheet->cell('G'.( $ind+$key), function($cell) use ($emission,$cvs, $tanka_name,$rate) {
                                    $cell->setValue( $cvs->haiki_cnt*$cvs->price1*$rate);
                                });
                                $sheet->cell('H3', function($cell) use ($cvs) {
                                    $cell->setValue($cvs->id);
                                });
                                $sheet->cell('H4', function($cell)  {
                                    $cell->setValue( date("Y年m月d日"));
                                });

                            }

                        });
                    })->setFilename(date("YmdHis")."_".$transportation->name)->store('xlsx','/var/www/html/storage/work/'.$work_dir);
                }
        }

         $files = glob('/var/www/html/storage/work/'.$work_dir.'/');
        Zipper::make('/var/www/html/storage/work/'.date("YmdHis").'.zip')->add($files)->close();

        return response()->download('/var/www/html/storage/work/'.date("YmdHis").'.zip');

    }
    public function excel2()
    {
        $excel_file = storage_path('excel/template.xlsx');

        $_GET["date"]=str_replace("年", "", $_GET["date"]);
        $_GET["date"]=str_replace("月", "", $_GET["date"]);
        $csvs=CSV::where("haishutsu_code",$_GET["code"])->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m')"), '=',$_GET["date"])->get();
        $emission=Emission::where("code",$_GET["code"])->first();
        $tani_name=["","ｔ","ｍ３","ｋｇ","リットル","個・台"];
        $tanka_name=["","","","300","75",""];
        $rate=0.6;
        if($emission->eigyo==="VC本部営業"){
            $rate=0.3;
        }
        $tanka_name[$cvs->haiki_number_tani]*$cvs->haiki_cnt;
        Excel::load($excel_file, function($reader)  use ($csvs,$emission,$tani_name, $tanka_name,$rate){
            // 1番目のシートを選択
            $reader->sheet(0, function($sheet)  use ($csvs,$emission,$tani_name, $tanka_name,$rate){
                $sheet->cell('F9', function($cell) use ($emission) {
                    $cell->setValue( $emission->name);
                });
                 $sheet->cell('G10', function($cell)  use ($emission) {
                        $cell->setValue(  $emission->address);
                });
                 $ind=16;
                foreach ($csvs as $key => $cvs) {

                    $sheet->cell('B'.( $ind+$key), function($cell) use ($cvs) {
                        $cell->setValue( $cvs->haiki_name);
                    });
                     $sheet->cell('D'.( $ind+$key), function($cell) use ($cvs) {
                        $cell->setValue( $cvs->haiki_cnt);
                    });
                      $sheet->cell('E'.( $ind+$key), function($cell) use ($cvs, $tani_name) {
                        $cell->setValue( $tani_name[$cvs->haiki_number_tani]);
                    });
                      $sheet->cell('F'.( $ind+$key), function($cell) use ($cvs, $tanka_name) {
                        $cell->setValue( $tanka_name[$cvs->haiki_number_tani]);
                    });
                        $sheet->cell('G'.( $ind+$key), function($cell) use ($cvs, $tanka_name,$rate) {
                        $cell->setValue( $cvs->haiki_cnt*$tanka_name[$cvs->haiki_number_tani]*$rate);
                    });
                    $sheet->cell('H3', function($cell) use ($cvs) {
                        $cell->setValue($cvs->id);
                    });
                    $sheet->cell('H4', function($cell)  {
                        $cell->setValue( date("Y年m月d日"));
                    });

                }

            });
        })->setFilename(date("YmdHis"))->export('xlsx');
    }
    
}
