<?php

namespace App\Http\Controllers;
use DB;
use App\Csv;
use App\Emission;
use App\SummaryParent;
use App\Transportation;
use Auth;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Maatwebsite\Excel\Facades\Excel;
use \Zipper;
use Carbon\Carbon;

class InvoiceController extends Controller
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
    public function index3()
    {   
        $data["from"]=Carbon::parse('- 1 month')->startOfMonth()->format('Y-m-d');
        $data["to"]=Carbon::parse('- 1 month')->endOfMonth()->format('Y-m-d');
        return view('invoice.index',$data);

    }


    public function excel()
    {
         $user=Auth::guard('web')->user();
        $excel_file = storage_path('excel/template.xlsx');
        $_POST["from"]=str_replace("-", "", $_POST["from"]);
        $_POST["to"]=str_replace("-", "", $_POST["to"]);
       $work_dir=date("U");
       mkdir('/var/www/html/storage/work/'.$work_dir);
       $query = CSV::whereIn("haishutsu_code", 
                                           function ($query) use ($user)
                                           {
                                               $query->select('code')
                                                     ->from('emissions')
                                                     ->where('kameiten', $user->id);
                                           })->join('emissions', 'emissions.code', '=', 'csvs.haishutsu_code')->where("emissions.eigyo",'<>','VC本部営業');

        if($_POST["from"]){
            $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '>=',$_POST["from"]);
        }

        if($_POST["to"]){
            $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '<=',$_POST["to"]);
        }

        $codes=$query->distinct()->select(DB::raw('haishutsu_code,recv_date'))->groupBy('haishutsu_code','recv_date')->get();


                $tani_name=["","ｔ","ｍ３","ｋｇ","リットル","個・台"];
        $tanka_name=["","","","300","75",""];

        foreach ($codes as $key0 => $code) {
            $emission=Emission::where("code",$code->haishutsu_code)->first();
            $transportation=Transportation::find($emission->kameiten);
            $rate2=1;

            $rate=0.6;

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
                                $cell->setValue( $cvs->recv_date." ".$cvs->haiki_name);
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

         $files = glob('/var/www/html/storage/work/'.$work_dir.'/');
        Zipper::make('/var/www/html/storage/work/'.date("YmdHis").'.zip')->add($files)->close();

        return response()->download('/var/www/html/storage/work/'.date("YmdHis").'.zip');

    }
   
}
