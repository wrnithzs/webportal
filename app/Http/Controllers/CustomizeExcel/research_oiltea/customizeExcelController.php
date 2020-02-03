<?php

namespace App\Http\Controllers\CustomizeExcel\research_oiltea;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Group;
use DB;
use Hash;
use Carbon\Carbon;
use Session;
use Redirect;
use PHPExcel_Worksheet_Drawing;
use Maatwebsite\Excel\Facades\Excel;
use Log;
use App\FLatdata;
use Zipper;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\Border;
use Box\Spout\Writer\Style\BorderBuilder;
use Box\Spout\Writer\Style\Color;
use Box\Spout\Writer\Style\StyleBuilder;
use Box\Spout\Writer\WriterFactory;

ini_set('max_execution_time', 1200);
ini_set('memory_limit', -1);

class customizeExcelController extends Controller
{
    public function index() {
        $MASTER_FORM_ID = '20180317152059-542992859831745-1941555';
		$userId = \Auth::user()->_id;
        $forms = DB::collection('form')->where('data.objectId',$MASTER_FORM_ID)->pluck('data');
        $formIds = \Auth::user()->form_ids;

		if (\Auth::user()->firstname == 'admin') {
			$rolesCode = 'admin';
		} else {
			$rolesCode = checkRoles($MASTER_FORM_ID);
		}
   
		$baseUrl = config('app.ss_report');
      
        return view('report.research_oiltea.index',compact('forms','baseUrl','rolesCode'));        
    }
}