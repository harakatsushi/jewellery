<?php

namespace App\Http\Controllers\Branch;
use DB;
use App\Csv;
use App\Emission;
use App\SummaryParent;
use App\Transportation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Maatwebsite\Excel\Facades\Excel;
use \Zipper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // /$this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(!$request->session()->get('branch')){
            return redirect('baranchLogin');
        }
        $data=[];
        $data["from"]=Carbon::parse('- 1 month')->startOfMonth()->format('Y-m-d');
        $data["to"]=Carbon::parse('- 1 month')->endOfMonth()->format('Y-m-d');
        $data["error"]="";
        return view('branch.home',$data);
    }


        public function excel(Request $request)
    {
        if(!$request->session()->get('branch')){
            return redirect('baranchLogin');
        }
         $user=$request->session()->get('branch');
        $excel_file = storage_path('excel/template.xlsx');
        $from=str_replace("-", "", $_POST["from"]);
        $to=str_replace("-", "", $_POST["to"]);
       $work_dir=date("U");
       mkdir('/var/www/html/storage/work/'.$work_dir);


       $transportations=Transportation::where('branch', $user->id)->get();
       $ids=[];
       foreach ($transportations as $key => $value) {
            $ids[]= $value->id;
       }
 
       $query = CSV::whereIn("haishutsu_code", 
                                           function ($query) use ($ids)
                                           {
                                               $query->select('code')
                                                     ->from('emissions')
                                                     ->whereIn('kameiten', $ids);
                                           })->join('emissions', 'emissions.code', '=', 'csvs.haishutsu_code')->where("emissions.eigyo",'<>','VC本部営業');

        if($from){
            $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '>=',$from);
        }

        if($to){
            $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '<=',$to);
        }

        $codes=$query->distinct()->select('haishutsu_code')->groupBy('haishutsu_code')->get();


                $tani_name=["","ｔ","ｍ３","ｋｇ","リットル","個・台"];
        $tanka_name=["","","","300","75",""];

        foreach ($codes as $key0 => $code) {
            $emission=Emission::where("code",$code->haishutsu_code)->first();
            $transportation=Transportation::find($emission->kameiten);
            $rate2=1;

            $rate=0.6;

            $query = CSV::whereNotNUll("created_at");

            if($from){
                $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '>=',$from);
            }

            if($to){
                $query=$query->where(DB::raw("DATE_FORMAT(recv_date, '%Y%m%d')"), '<=',$to);
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

         $files = glob('/var/www/html/storage/work/'.$work_dir.'/');
        Zipper::make('/var/www/html/storage/work/'.date("YmdHis").'.zip')->add($files)->close();
        if(file_exists('/var/www/html/storage/work/'.date("YmdHis").'.zip')){
            return response()->download('/var/www/html/storage/work/'.date("YmdHis").'.zip');
        }
        $data=[];

        $_POST["error"]="出力データがありません";
       return view('branch.home',$_POST);

    }
       public function logout(Request $request)
    {
        $request->session()->put('branch',[]);
        return redirect('baranchLogin');

    }
}
