<?php
// namespace App\CustomFolder;
use Illuminate\Support\Facades\Auth;
// use DB;
use App\Models\HR\Employee;
use App\Models\HR\HrEmployeeDepartment;
use App\Models\HR\HrEmployeeDesignation; 
use App\Models\CompanyName;
use App\Models\CompanyType;
use App\Models\CompanyBranche;
use App\Models\ExamSection;
use App\Models\SurveyConfigAnswer;
use App\Models\SurveyConfigQuestion;
use App\Models\SurveyConfigTemplate;
use App\Models\SetTrainingCategory;
use App\Models\SetTraining;
use App\Models\SetConfig;
use App\Models\SetHrPayGrade;
use App\Models\HrLeaveType;
use App\Models\HrLeavePeriod;
use App\Models\HrPayrollItem;
use App\Models\HrPayrollPolicy;
use App\Models\SetBankName;
use App\Models\Customer;
use App\Models\AddressCity;
use App\Models\AddressZone;
use App\Models\AddressArea;
use App\Models\Vendor;
use App\Models\AccChartOfAccountTypes;
use App\Models\AccChartOfAccountDetailsTypes;
use App\Models\AccChartOfAccountRootType;
use App\Models\AccChartOfAccountName;
use App\Models\ProductCategorie;
use App\Models\ProductUnit;
use App\Models\Product;
use App\Models\CustomerContact;
use App\Models\HR\HrEmployeeAllocation;
use App\Models\HR\HrEmployeeContact;
use App\Models\HR\HrEmployeeJob;
use App\Models\HR\HrEmployeeTrainingHistory;
use App\Models\HR\HrStaffEducationHistory;
use App\Models\HR\HrStaffEmergencyContact;
use App\Models\HR\HrStaffJobHistory;
use App\Models\AccName;



// For Edums
use App\Models\SetCollegeFee;
use App\Models\Country; 
use Carbon\Carbon;

// Session
function ThisSession(){
  return '2022-2023';
}


if (!function_exists('user_email')) {
	function user_email(){
		$user = Auth::user();
		return $user->email; 
	}
}


function nextPKAutoID($table=null)
  {
    if (empty($table)) return '';
    $statement = DB::select("SHOW TABLE STATUS LIKE '".$table."'");
    return  $nextId = $statement[0]->Auto_increment;
  }

  function generateComnPrefix($add=null,$separator='/')
  {
    $code1 =  @$this->settingsValByKey('code1');
    if (!isset($code1) || empty($code1)) $code1 = 'TL';
    return $code1.$separator.$add.date('y').$separator;
  }

  function generateComnID($id='',$length=8,$prefix='',$date='',$yy='y'){
    if(!empty($id)){
     $preDD = '';
     if(!empty($date)){ $preDD = date($yy,strtotime($date)); }
     return $prefix.$preDD.''.sprintf("%0".$length."d", $id );
    }else return 0;
   }
  

  // College with auto increment
  function maxIdByTbl($table=null,$field=null,$cond='',$cond2='')
  {
    if (empty($table)) return '';
    if (!empty($cond)){
      return $data = DB::table($table)->where($cond,$cond2)->max($field)+1;
      
    }else return $data = DB::table($table)->max($field)+1;
   
    return  0;
  }

// Leave Type

if (!function_exists('LeaveType')) {
  function LeaveType($value = '')
  {
      $datas = DB::table('hr_set_leave_types')
          ->select('id', 'name')
          // ->where('status',1)
          ->orderBy('name')
          ->get();
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = $value == $val->id ? 'selected=selected' : '';

          $optiontext .= '<option ' . $selected . ' value="' . $val->id . '"> ' . $val->name . ' </option>';
      }
      return $optiontext;
  }
}


  
// Settings

// Application Type 
if (!function_exists('Business_Type')) {
  function Business_Type($value=''){
       $datas = DB::table('client_types')
          ->select('id','name')
          ->where('status',1)
          ->orderBy('name')
          ->get();
          $optiontext = '';
          foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}

// Client Account Type 
if (!function_exists('ClientAccountList')) {
  function ClientAccountList($value=''){
       $datas = DB::table('cl_accounts')
          ->select('id','name')
          ->where('status',1)
          ->orderBy('name')
          ->get();
          $optiontext = '';
          foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}

// Brand List
if (!function_exists('BrandList')) {
  function BrandList($value=''){
    $client_id = Auth::user()->client_id;
       $datas = DB::table('product_brands')
          ->select('id','name')
          ->where('status',1)
          ->when($client_id, function($q) use($client_id){
            return $q->where('client_id',$client_id);
          })
          ->orderBy('name')
          ->get();
          $optiontext = '';
          foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}

// Category List 
if (!function_exists('CategoryList')) {
  function CategoryList($value=''){
    $client_id = Auth::user()->client_id;
       $datas = DB::table('categories')
          ->select('id','name')
          ->where('status',1)
          ->when($client_id, function($q) use($client_id){
            return $q->where('client_id',$client_id);
          })
          ->orderBy('name')
          ->get();
          $optiontext = '';
          foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}

// Unit List 
if (!function_exists('UnitList')) {
  function UnitList($value=''){
    $client_id = Auth::user()->client_id;
       $datas = DB::table('product_units')
          ->select('id','name')
          ->where('status',1)
          ->when($client_id, function($q) use($client_id){
            return $q->where('client_id',$client_id);
          })
          ->orderBy('name')
          ->get();
          $optiontext = '';
          foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}

// product List

if (!function_exists('productList')) {
  function productList($value=''){
    // $client_id = Auth::user()->client_id;
       $datas = DB::table('products')
          ->select('id','name')
          ->where('status',1)
          // ->when($client_id, function($q) use($client_id){
          //   return $q->where('client_id',$client_id);
          // })
          ->orderBy('name')
          ->get();
          $optiontext = '';
          foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}


if (!function_exists('statusType')) {
  function statusType($value='',$nameByID=''){ 
       $datas = [
          1 => 'Active', 
          2 => 'Deactive', 
      ];
      if (!empty($nameByID)) {
          return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = ($value == $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
      }
      return $optiontext;
  }
}

// ClAccountList
if (!function_exists('ClAccountList')) {
  function ClAccountList($value=''){
    $client_id = Auth::user()->client_id;
       $datas = DB::table('cl_accounts')
          ->select('id','name')
          ->when($client_id, function($q) use($client_id){
            return $q->where('id',$client_id);
          })
          ->orderBy('name')
          ->get();
          $optiontext = '';
        foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}
// ClBranchList
if (!function_exists('ClBranchList')) {
  function ClBranchList($value=''){
    $client_id = Auth::user()->client_id;
       $datas = DB::table('cl_branches')
          ->select('id','name')
          ->when($client_id, function($q) use($client_id){
            return $q->where('company_id',$client_id);
          })
          ->orderBy('name')
          ->get();
          $optiontext = '';
        foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}

if (!function_exists('AdminRoleList')) {
  function AdminRoleList($value=''){
       $datas = DB::table('roles')
          ->select('id','name')
          // ->where('status', 1)
          ->orderBy('name')
          ->get();
          $optiontext = '';
          foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}
// Role Call

if (!function_exists('RoleList')) {
  function RoleList($value=''){
       $datas = DB::table('roles')
          ->select('id','name')
          ->where('status', 1)
          ->orderBy('name')
          ->get();
          $optiontext = '';
          foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}

// Party City List
if (!function_exists('PartyCityList')) {
  function PartyCityList($value=''){
    $client_id = Auth::user()->client_id;
    $datas = DB::table('party_cities')
      ->select('id','name')
      ->when($client_id, function($q) use($client_id){
        return $q->where('client_id',$client_id);
      })
      ->orderBy('name')
      ->get();
      $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

// Party Group List
if (!function_exists('PartyGroupList')) {
  function PartyGroupList($value=''){
    $client_id = Auth::user()->client_id;
    $datas = DB::table('party_groups')
      ->select('id','name')
      ->when($client_id, function($q) use($client_id){
        return $q->where('client_id',$client_id);
      })
      ->orderBy('name')
      ->get();
      $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

//  Party Zone List
if (!function_exists('PartyZoneList')) {
  function PartyZoneList($value=''){
    $client_id = Auth::user()->client_id;
    $datas = DB::table('party_zones')
      ->select('id','name')
      ->when($client_id, function($q) use($client_id){
        return $q->where('client_id',$client_id);
      })
      ->orderBy('name')
      ->get();
      $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

//  Party Staff List
if (!function_exists('StaffList')) {
  function StaffList($value=''){
    $client_id = Auth::user()->client_id;
    $datas = DB::table('staff')
      ->select('id','name')
      ->when($client_id, function($q) use($client_id){
        return $q->where('client_id',$client_id);
      })
      ->orderBy('name')
      ->get();
      $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

//  requisition list
if (!function_exists('requisition_no')) {
  function requisition_no($value=''){
    $client_id = Auth::user()->client_id;
    $datas = DB::table('requisitions')
      ->select('id','req_no')
      ->when($client_id, function($q) use($client_id){
        return $q->where('client_id',$client_id);
      })
      ->orderBy('req_no')
      ->get();
      $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->req_no.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('ReqPoStatusChecked')) {
function ReqPoStatusChecked($Req_id=0)
  {
    $vals = DB::table('requisition_items')->where('req_id',$Req_id)->where('po_id',0)->get();
    if (count($vals)==0) {
      // 1 use for all PO created
      return 1;
    }else{
      // 0 use for PO create left
      return 0;
    }
  }
}

//  requisition list
if (!function_exists('VendorList')) {
  function VendorList($value=''){
    $client_id = Auth::user()->client_id;
    $datas = DB::table('vendors')
      ->select('id','name')
      ->when($client_id, function($q) use($client_id){
        return $q->where('client_id',$client_id);
      })
      ->orderBy('name')
      ->get();
      $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

// Gender List
if (!function_exists('GenderListOption')) {
  function GenderListOption($value='',$nameByID=''){ 
    $datas = [
      '1' => 'Male', 
      '2' => 'Female', 
      '3' => 'Others', 
    ];
    if (!empty($nameByID)) {
      return @$datas[$value];
    }
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $key)?'selected=selected':'';
      $disabled = ($key<$value)?' disabled ':'';
      $optiontext .= '<option '.$selected.' value="'.$key.'" '.'> '.$val.' </option>';
    }
    return $optiontext;
  }
}

// Sence
if (!function_exists('SenceList')) {
  function SenceList($value='',$nameByID=''){ 
    $datas = [
      '1' => 'Dr', 
      '2' => 'Cr',
    ];
    if (!empty($nameByID)) {
      return @$datas[$value];
    }
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $key)?'selected=selected':'';
      $disabled = ($key<$value)?' disabled ':'';
      $optiontext .= '<option '.$selected.' value="'.$key.'" '.'> '.$val.' </option>';
    }
    return $optiontext;
  }
}

// Country List

if (!function_exists('countrie_lists')) {
  function countrie_lists($value=''){
       $datas = DB::table('countries')
          ->select('id','name')
          // ->where('status', 1)
          ->orderBy('name')
          ->get();
          $optiontext = '';
          foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}

// Select Religion List

if (!function_exists('ReligionList')) {
  function ReligionList($value='',$nameByID=''){ 
    $datas = [
      '1' => 'Islam',
      '2' => 'Hinduism', 
      '3' => 'Buddhism', 
      '4' => 'Christianity', 
      '5' => 'Sikhism', 
      '6' => 'Jainism', 
      '7' => 'Atheism/Agnosticism', 
      '8' => 'Gnosticism', 
      '9' => 'Druze', 
      '10' => 'Confucianism', 
      '11' => 'Others', 
    ];
    if (!empty($nameByID)) {
      return @$datas[$value];
    }
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $key)?'selected=selected':'';
      $disabled = ($key<$value)?' disabled ':'';
      $optiontext .= '<option '.$selected.' value="'.$key.'" '.'> '.$val.' </option>';
    }
    return $optiontext;
  }
}

// Marital Status
if (!function_exists('maritalStatus')) {
  function maritalStatus($value='',$nameByID=0){ 
       $datas = [
          1 => 'Single', 
          2 => 'Married',  
          3 => 'Divorce',
      ];
      if ($nameByID>0) {
          return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = ($value == $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
      }
      return $optiontext;
  }
}

if (!function_exists('bloodGroupList')) {
  function bloodGroupList($value='',$nameByID=0){ 
       $datas = [
          1 => 'A+', 
          2 => 'A-', 
          3 => 'B+', 
          4 => 'B-', 
          5 => 'AB+', 
          6 => 'AB-', 
          7 => 'O+', 
          8 => 'O-', 
      ];
      if ($nameByID>0) {
          return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = ($value == $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
      }
      return $optiontext;
  }
}

if (!function_exists('PriorityList')) {
  function PriorityList($value='',$nameByID=0){ 
       $datas = [
          1 => 'High(<=5days)', 
          2 => 'Medium(5~10days)', 
          3 => 'low(>=10days)', 
          4 => 'Emergency(1~2days)'
      ];
      if ($nameByID>0) {
          return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = ($value == $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
      }
      return $optiontext;
  }
}


if (!function_exists('CreditPeriodList')) {
  function CreditPeriodList($value='',$nameByID=''){ 
       $datas = [
          // 0 => 'Same Day', 
          // 1 => '1 Day', 
          7 => '7 Day', 
          15 => '15 Day', 
          30 => '30 Day', 
          45 => '45 Day', 
          60 => '60 Day', 
          90 => '90 Day',
      ];
      if (!empty($nameByID)) {
          return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = ($value === $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
      }
      return $optiontext;
  }
}

if (!function_exists('PartyType')) {
  function PartyType($value='',$nameByID=0){ 
    $datas = SetConfig::where('status',1)->where('key_name','PartyType')->orderBy('value')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->value.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('IndustryType')) {
  function IndustryType($value='',$nameByID=0){ 
    $datas = SetConfig::where('status',1)->where('key_name','IndustryType')->orderBy('value')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->value.' </option>';
    }
    return $optiontext;
  }
}

// number to word
function num2word($number) {
  
  // return $this->convert_number($number);
  $hyphen      = '-';
  $conjunction = ' and ';
  $separator   = ' ';
  $negative    = 'negative ';
  $decimal     = ' point ';
  $dictionary  = array(
  0                   => 'zero',
  1                   => 'one',
  2                   => 'two',
  3                   => 'three',
  4                   => 'four',
  5                   => 'five',
  6                   => 'six',
  7                   => 'seven',
  8                   => 'eight',
  9                   => 'nine',
  10                  => 'ten',
  11                  => 'eleven',
  12                  => 'twelve',
  13                  => 'thirteen',
  14                  => 'fourteen',
  15                  => 'fifteen',
  16                  => 'sixteen',
  17                  => 'seventeen',
  18                  => 'eighteen',
  19                  => 'nineteen',
  20                  => 'twenty',
  30                  => 'thirty',
  40                  => 'forty',
  50                  => 'fifty',
  60                  => 'sixty',
  70                  => 'seventy',
  80                  => 'eighty',
  90                  => 'ninety',
  100                 => 'hundred',
  1000                => 'thousand',
  100000              => 'Lac',
  1000000             => 'Lac2 ',
  10000000            => 'Coror',
  1000000000          => 'billion',
  1000000000000       => 'trillion',
  1000000000000000    => 'quadrillion',
  1000000000000000000 => 'quintillion'
  );
  
  if (!is_numeric($number)) {
  return false;
  }
  
  if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
  // overflow
  trigger_error(
          'num2word only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
          E_USER_WARNING
  );
  return false;
  }
  
  if ($number < 0) {
  return $negative . num2word(abs($number));
  }
  
  $string = $fraction = null;
  
  if (strpos($number, '.') !== false) {
  list($number, $fraction) = explode('.', $number);
  }
  
  switch (true) {
  case $number < 21:
          $string = $dictionary[$number];
          break;
  case $number < 100:
          $tens   = ((int) ($number / 10)) * 10;
          $units  = $number % 10;
          $string = $dictionary[$tens];
          if ($units) {
                  $string .= $hyphen . $dictionary[$units];
          }
          break;
  case $number < 1000:
          $hundreds  = $number / 100;
          $remainder = $number % 100;
          $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
          if ($remainder) {
                  $string .= $conjunction . num2word($remainder);
          }
          break;
  default:
          $baseUnit = pow(1000, floor(log($number, 1000)));
          $numBaseUnits = (int) ($number / $baseUnit);
          $remainder = $number % $baseUnit;
          $string = num2word($numBaseUnits) . ' ' . $dictionary[$baseUnit];
          if ($remainder) {
                  $string .= $remainder < 100 ? $conjunction : $separator;
                  $string .= num2word($remainder);
          }
          break;
  }
  
  if (null !== $fraction && is_numeric($fraction)) {
  $string .= $decimal;
  $words = array();
  foreach (str_split((string) $fraction) as $number) {
          $words[] = $dictionary[$number];
  }
  $string .= implode(' ', $words);
  }
  return $string;
  }
    
  // end number to word


  
// Accounts 
// acc_types

if (!function_exists('acc_types_list')) {
  function acc_types_list($value=''){
       $datas = DB::table('acc_types')
          ->select('id','name')
          // ->where('status', 1)
          ->orderBy('name')
          ->get();
          $optiontext = '';
          foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}

// acc_names

if (!function_exists('acc_name_list')) {
  function acc_name_list($value=''){
    $client_id = Auth::user()->client_id;
    $datas = DB::table('acc_names')
      ->select('id','name')
      ->when($client_id, function($q) use($client_id){
        return $q->where('client_id',$client_id);
      })
      ->orderBy('name')
      ->get();
      $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

// acc cost centers

if (!function_exists('acc_cost_center_list')) {
  function acc_cost_center_list($value=''){
    $client_id = Auth::user()->client_id;
    $datas = DB::table('acc_cost_centers')
      ->select('id','name')
      ->when($client_id, function($q) use($client_id){
        return $q->where('client_id',$client_id);
      })
      ->orderBy('name')
      ->get();
      $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}


// acc_payment_methods

if (!function_exists('accPaymentMethodList')) {
  function accPaymentMethodList($value=''){
    $datas = DB::table('acc_payment_methods')
      ->select('id','name')
      ->orderBy('name')
      ->get();
      $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('AccDrCrBalance')) {
  function AccDrCrBalance($id=0, $client_id=0, $sense=0, $date1=0, $date2=0){ 
    // dd($client_id);
    if($id < 1 || $client_id < 1) return 0;  
    $balance = $total_dr = $total_cr = 0;   
    $total_dr = DB::table('acc_trans_drs')->where('acc_id',$id)->where('client_id', $client_id)->sum('amount');
    $total_cr = DB::table('acc_trans_crs')->where('acc_id',$id)->where('client_id', $client_id)->sum('amount');
    if ($sense==1) {
        $balance = $total_dr - $total_cr;
    }else if ($sense==2) {
      $balance = $total_cr - $total_dr;
    }
    
    return array($balance, $total_dr,$total_cr);
  }
}

if (!function_exists('AccBalance')) {
  function AccBalance($id=0, $client_id=0, $sense=0, $date1=0, $date2=0){ 
    if($id < 1 || $client_id < 1) return 0;     
    $total_dr = DB::table('acc_trans_drs')->where('acc_id',$id)->where('client_id', $client_id)->sum('amount');
    $total_cr = DB::table('acc_trans_crs')->where('acc_id',$id)->where('client_id', $client_id)->sum('amount');
    if ($sense==1) {
       return number_format($total_dr - $total_cr, 2);
    }else if ($sense==2) {
        return number_format($total_cr - $total_dr, 2);
    }   
  }
}

if (!function_exists('AccDrTotal')) {
  function AccDrTotal($id=0, $client_id=0, $sense=0, $date1=0, $date2=0){ 
    if($id < 1 || $client_id < 1) return 0;
  return  $total_dr = DB::table('acc_trans_drs')->where('acc_id',$id)->where('client_id', $client_id)->sum('amount');
     
  }
}

if (!function_exists('AccCrTotal')) {
  function AccCrTotal($id=0, $client_id=0, $sense=0, $date1=0, $date2=0){ 
    if($id < 1 || $client_id < 1) return 0;     
   return $total_cr = DB::table('acc_trans_crs')->where('acc_id',$id)->where('client_id', $client_id)->sum('amount');
      
  }
}







































// employeeDesignation
// employeeDepartment
 function paginationHeaderInfo($data)
  {
    return 'Showing '. $data->firstItem() .' - '.  $data->lastItem() .' of  '.  $data->total();
  }
  
  function PerPageForSelectOption($value=null)
	{
		if($value<1) $value = 20;
		$statuses = [
			10,15,20,30,50,100,200,300,500
		];

		$optiontext = '';
		foreach ($statuses as  $status) {
			$selected = ($value == $status)?'selected=selected':'';
			$optiontext .= '<option '.$selected.' value="'.$status.'"> '.$status.' </option>';
		}
		return $optiontext;
	}
  if (!function_exists('pageLimit')) {
    function pageLimit($value='',$nameByID=''){ 
      $datas = [
        10 => '10', 
        25 => '20', 
        50 => '50', 
        100 => '100', 
        500 => '500',  
        
      ];
      if (!empty($nameByID)) {
        return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
        $selected = ($value == $key)?'selected=selected':'';
        $disabled = ($key<$value)?' disabled ':'';
        $optiontext .= '<option '.$selected.' value="'.$key.'" '.'> '.$val.' </option>';
      }
      return $optiontext;
    }
  }

if (!function_exists('statusIs')) {
    function statusIs($value='',$nameByID=''){ 
         $datas = [
            1 => 'Active', 
            2 => 'Deactive', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}
if (!function_exists('memberType')) {
    function memberType($value='',$nameByID=''){ 
         $datas = [
            1 => 'Regular', 
            2 => 'E-Regular', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

if (!function_exists('MemberListOption')) {
  function MemberListOption($value=''){
       $datas = DB::table('members')
          ->select('id','member_name')
          ->where('status',1)
          ->orderBy('member_name')
          ->get();
          $optiontext = '';
          foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->member_name.' </option>';
        }
        return $optiontext;
  }
}

if (!function_exists('ExpenceTypeOption')) {
  function ExpenceTypeOption($value=''){
       $datas = DB::table('expence_types')
          ->select('id','name')
          ->where('status',1)
          ->orderBy('name')
          ->get();
          $optiontext = '';
          foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}
if (!function_exists('company_list_search')) {
  function company_list_search($value=''){
       $datas = DB::table('company_names')
          ->select('id','name')
          ->where('status',1)
          ->orderBy('name')
          ->get();
          $optiontext = '';
        foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
        }
        return $optiontext;
  }
}

if (!function_exists('company_list')) {
  function company_list($value='',$nameByID=0){ 
    $datas = CompanyName::where('status',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value === $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('dept_list_search')) {
  function dept_list_search($value=''){
       $datas = DB::table('hr_employee_departments')
          ->select('id','department')
          ->where('status',1)
          ->orderBy('department')
          ->get();
          $optiontext = '';
        foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->department.' </option>';
        }
        return $optiontext;
  }
}

if (!function_exists('deg_list_search')) {
  function deg_list_search($value=''){
       $datas = DB::table('hr_employee_designations')
          ->select('id','designation')
          ->where('status',1)
          ->orderBy('designation')
          ->get();
          $optiontext = '';
        foreach ($datas as $key => $val) {
          $selected = ($value == $val->id)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->designation.' </option>';
        }
        return $optiontext;
  }
}

if (!function_exists('companyType')) {
  function companyType($value='',$nameByID=0){ 
    $datas = CompanyType::where('status',1)->orderBy('type_name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->type_name.' </option>';
    }
    return $optiontext;
  }
}
if (!function_exists('sectionOptions')) {
  function sectionOptions($value='',$nameByID=0){ 
    $datas = ExamSection::where('status',1)->orderBy('sections_name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->sections_name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('surveyAnswerCheckBoxForQestionAdd')) {
  function surveyAnswerCheckBoxForQestionAdd($colls=4){ 
    $datas = SurveyConfigAnswer::where('status',1)->orderBy('name')->get();
    $htmlcontent = ''; 
    foreach ($datas as $key => $val) {
      $htmlcontent .= '
                     <div class="col-md-'.$colls.'">
                        <label> <input type="checkbox" name="ans[]" value="'.$val->id.'" class="form-control0"> '.trim($val->name).'</label>
                      </div>
                      
                      ';
    }
    $htmlcontent .= ''; 
    return $htmlcontent;
  }
}

if (!function_exists('surveyQyestionCheckBoxForTemplateAdd')) {
  function surveyQyestionCheckBoxForTemplateAdd($colls=4){ 
    $datas = SurveyConfigQuestion::where('survey_config_questions.status',1)
    ->leftJoin('exam_sections', 'exam_sections.id', '=', 'survey_config_questions.section_id')
    ->orderBy('section_id')->orderBy('name')
    ->select('survey_config_questions.*','exam_sections.sections_name')
    ->get();
    $preSectionId= '';
    $htmlcontent = '<div class="col-md-'.$colls.'">'; 
    foreach ($datas as $key => $val) {
      // if (strtoupper(trim($val->name))=='TEXT') {
      //   $htmlcontent .= '
      //   <li>
      //     <label> <input type="text" name="ans[]" value="'.$val->id.'" class="form-control0"> '.$val->name. ' &nbsp; &nbsp;  </label>
                              
      //   </li>
      //   ';
      // }else
      // var_dump($val);
      if ($preSectionId!=$val->sections_name) {
        $preSectionId = $val->sections_name;
        $htmlcontent .= '
        <h4 class="text-blue">'.$val->sections_name.'</h4>';
      }
      {
        $htmlcontent .= '
        <li> 
          <label> <input type="checkbox" name="ans[]" value="'.$val->id.'" class="form-control0"> '.$val->name. ' &nbsp; &nbsp;  </label>
          <input type="number" name="weight['.$val->id.']" value="'.$val->weight.'" class="form-control0" style="width:70px" >                      
        </li>
        ';
      }
    }
    $htmlcontent .= '</div>'; 
    return $htmlcontent;
  }
}

if (!function_exists('surveyTemplate')) {
  function surveyTemplate($value=''){ 
    $datas = SurveyConfigTemplate::where('status',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('surveyTemplateType')) {
    function surveyTemplateType($value='',$nameByID=''){ 
         $datas = [
            1 => 'Worker ', 
            2 => 'Factory ', 
            3 => 'Environment', 
            3 => 'Harassment', 
            99 => 'Others', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

if (!function_exists('AnswerTypeOptions')) {
    function AnswerTypeOptions($value='',$nameByID=''){ 
         $datas = [
            1 => 'Multiple Choice ', 
            2 => 'Single Answer ', 
            3 => 'Text Box - Input Answer', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}


if (!function_exists('emp_type_list')) {
    function emp_type_list($value='',$nameByID=''){ 
         $datas = [
            1 => 'Provision', 
            2 => 'Permanent', 
            3 => 'Contractual', 
            4 => 'Intern', 
            5 => 'Outsource',
            6 => 'Part Time', 
            7 => 'Resign' 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

if (!function_exists('contactTypeList')) {
    function contactTypeList($value='',$nameByID=''){ 
         $datas = [
            1 => 'Primary', 
            1 => 'Office', 
            2 => 'Personal', 
            3 => 'Home', 
            4 => 'Emergency', 
            5 => 'Parents', 
            6 => 'Gradient', 
            7 => 'Others', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}
if (!function_exists('CompetencyWeight')) {
  function CompetencyWeight($value='',$nameByID=''){ 
       $datas = [
          4 => '4-Outstanding', 
          3 => '3-Good', 
          2 => '2-Average', 
          1 => '1-Poor', 
      ];
      if (!empty($nameByID)) {
          return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = ($value === $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
      }
      return $optiontext;
  }
}
if (!function_exists('othersContactTypeList')) {
    function othersContactTypeList($value='',$nameByID=''){ 
         $datas = [
            1 => 'Skype', 
            2 => 'WhatsApp', 
            3 => 'WeChat', 
            4 => 'FaceBook', 
            5 => 'Messenger', 
            6 => 'LinkedIn', 
            7 => 'Others', 
        ];
        if (!empty($nameByID)) {
          return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
          $selected = ($value === $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}
if (!function_exists('documentTypeList')) {
    function documentTypeList($value='',$nameByID=''){ 
         $datas = [
            1 => 'Official', 
            2 => 'Audit', 
            3 => 'Application', 
            4 => 'Quotation', 
            5 => 'Invoice', 
            6 => 'Certificate', 
            7 => 'Others', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

if (!function_exists('EmpAllocationType')) {
  function EmpAllocationType($value='',$nameByID=''){ 
       $datas = [
          1 => 'Mobile', 
          2 => 'Laptop', 
          3 => 'Desktop', 
          4 => 'Email', 
          5 => 'Bag', 
          6 => 'Car', 
          7 => 'Bike', 
          8 => 'ID Card', 
          9 => 'Pen Drive', 
          10 => 'SIM Card', 
          11 => 'Uniform / Dress', 
          12 => 'GPS Tracking Device', 
          13 => 'Locker', 
          14 => 'Key', 
          15 => 'Others', 
      ];
      if (!empty($nameByID)) {
          return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = ($value === $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
      }
      return $optiontext;
  }
}

if (!function_exists('emp_dept_list')) {
  function emp_dept_list($value='',$nameByID=0){ 
    $datas = HrEmployeeDepartment::where('status',1)->orderBy('department')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->department.' </option>';
    }
    return $optiontext;
  }
}
if (!function_exists('emp_designation_list')) {
  function emp_designation_list($value=''){ 
    $datas = HrEmployeeDesignation::select('id','designation')->where('status',1)->orderBy('designation')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->designation.' </option>';
    }
    return $optiontext;
  }
}
if (!function_exists('empList')) {
  function empList($value=''){ 
    $datas = employee::select('id','full_name')->where('status',1)->orderBy('full_name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->full_name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('branchList')) {
  function branchList($value=''){ 
    $datas = CompanyBranche::select('id','branch_name')->where('status',1)->orderBy('branch_name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->branch_name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('countrie_list')) {
  function countrie_list($value=''){ 
    $datas = Country::select('id','name','capital','continent','iso-3')->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('have_permission')) {
    function have_permission($value='role-list'){
         $data = DB::table('users')
            ->select('user_permissions.id as pid')
            ->join('user_role_and_permissions', 'users.role_id', '=', 'user_role_and_permissions.role_id')
            ->join('user_permissions', 'user_permissions.id', '=', 'user_role_and_permissions.permission_id')
            ->where('users.id','=',Auth::user()->id)
            ->where('user_permissions.name','=',$value)
            ->limit(1)
            ->get();
            if (isset($data[0])) {
                return $data[0]->pid;
            }
            return 0;
    }
}

if (!function_exists('userCan')) {
  function userCan($value='role-list'){ 
    return 1;
    $data = DB::table('users')
      ->select('user_permissions.id as pid')
      ->join('user_role_and_permissions', 'users.role_id', '=', 'user_role_and_permissions.role_id')
      ->join('user_permissions', 'user_permissions.id', '=', 'user_role_and_permissions.permission_id')
      ->where('users.id','=',Auth::user()->id)
      ->where('user_permissions.name','=',$value)
      ->limit(1)
      ->get();
      if (isset($data[0])) {
          return $data[0]->pid;
      }
      return 0;
  }
}



if (!function_exists('policyType')) {
    function policyType($value='',$nameByID=''){ 
         $datas = [
            1 => 'Full Working Day', 
            2 => 'Half Working Day', 
            3 => 'Weekend', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

if (!function_exists('empStatus')) {
  function empStatus($value='',$nameByID=''){ 
    $datas = [
      1 => 'Active',
      2 => 'Deactive', 
    ];
    if (!empty($nameByID)) {
      return @$datas[$value];
    }
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $key)?'selected=selected':'';
      $disabled = ($key<$value)?' disabled ':'';
      $optiontext .= '<option '.$selected.' value="'.$key.'" '.'> '.$val.' </option>';
    }
    return $optiontext;
  }
}
if (!function_exists('policyAction')) {
    function policyAction($value='',$nameByID=''){ 
         $datas = [
            1 => 'Annual Leave Deduction',
            2 => 'Salary Deduction', 
            3 => 'OSD', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

if (!function_exists('dayName')) {
    function dayName($value='',$nameByID=''){ 
         $datas = [
            
            1 => 'Monday', 
            2 => 'Tuesday', 
            3 => 'Wednesday',
            4 => 'Thursday', 
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday',
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

if (!function_exists('setTrainingType')) {
    function setTrainingType($value='',$nameByID=''){ 
         $datas = [
            
            1 => 'Competency', 
            2 => 'Development', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

if (!function_exists('TrainingScheduleType')) {
    function TrainingScheduleType($value='',$nameByID=''){ 
         $datas = [
            
            1 => 'Internal', 
            2 => 'External', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

if (!function_exists('TrainingDurationType')) {
    function TrainingDurationType($value='',$nameByID=''){ 
         $datas = [
            1 => 'Minute',
            2 => 'Hour', 
            3 => 'Day', 
            4 => 'Month', 
            5 => 'Year', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}



if (!function_exists('TrainingCategoryType')) {
  function TrainingCategoryType($value='',$nameByID=''){ 
    $datas = SetTrainingCategory::where('status',1)->orderBy('id')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}


if (!function_exists('TrainingName')) {
  function TrainingName($value='',$nameByID=''){ 
    $datas = SetTraining::where('status',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('SetHrPayrollItemTypes')) {
  function SetHrPayrollItemTypes($value='',$nameByID=''){ 
    $datas = SetConfig::where('status',1)->where('key_name','HrPayrollItemTypes')->orderBy('value')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->value.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('HRPlolicyTypes')) {
  function HRPlolicyTypes($value='',$nameByID=''){ 
    $datas = SetConfig::where('status',1)->where('key_name','HRPlolicyTypes')->orderBy('value')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->value.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('CurriculumSection')) {
  function CurriculumSection($value='',$nameByID=''){ 
    $datas = SetConfig::where('status',1)->where('key_name','CurriculumSection')->orderBy('value')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->value.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('ContentType')) {
  function ContentType($value='',$nameByID=''){ 
    $datas = SetConfig::where('status',1)->where('key_name','ContentType')->orderBy('value')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->value.' </option>';
    }
    return $optiontext;
  }
}


if (!function_exists('Leave_Type')) {
  function Leave_Type($value='',$nameByID=0){ 
    $datas = HrLeaveType::where('status',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('Leave_Period')) {
  function Leave_Period($value='',$nameByID=0){ 
    $datas = HrLeavePeriod::where('status',1)->orderBy('start_date')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->start_date.' - '.$val->end_date.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('HrLeavePolicys')) {
  function HrLeavePolicys($value='',$nameByID=''){ 
    $datas = SetConfig::where('status',1)->where('key_name','HrLeavePolicys')->orderBy('value')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->value.' </option>';
    }
    return $optiontext;
  }
}


if (!function_exists('SetConfigOption')) {
  function SetConfigOption($keyName = 'CustomerType', $value='',$nameByID=''){ 
    if(!isset($keyName) || empty($keyName)) return 0;
    $datas = SetConfig::where('status',1)->where('key_name',$keyName)->orderBy('value')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->value.' </option>';
    }
    return $optiontext;
  }
}


function SetConfigValue($keyName = 'ChartOfAccIDForCustomer', $value='',$nameByID=''){ 
    if(!isset($keyName) || empty($keyName)) return 0;
    $datas = SetConfig::where('status',1)->where('key_name',$keyName)->limit(1)->pluck('value');
    if(count($datas)==0) return 0;
    return $datas[0];
  }


if (!function_exists('Calculate_day')){
  function Calculate_day($from,$to){

      $first_datetime = new DateTime($from);
      $last_datetime = new DateTime($to);
      $interval = $first_datetime->diff($last_datetime);
      $final_days = ($interval->format('%a'))+1;

      return $final_days;

    }
  }

  if (!function_exists('Calculate_Year')){
  function Calculate_Year($from){

   $datetime1 = new DateTime($from);
   $datetime2 = Carbon::now();
   $difference = $datetime1->diff($datetime2);
   return $difference->y.'Y ' 
                 .$difference->m.'M' 
                 ;
                 
    }
  }
  

  if (!function_exists('emp_designation')) {
  function emp_designation($value){ 

    $data = employeeDesignation::where('id',$value)->get('designation');

    return $data;
  }
}

if (!function_exists('empType')) {
  function empType($value){ 

    switch ($value) {
    case 1:
      return 'Provision';
      break;
    case 2:
      return 'Permanent';
      break;
    case 3:
      return 'Contractual';
      break;
    case 4:
      return 'Intern';
      break;
    case 5:
      return 'Outsource';
      break;
    }
  }
}

if (!function_exists('payroll_item')) {
  function payroll_item($value='',$nameByID=0){ 
    $datas = HrPayrollItem::where('status',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('payGrade_item')) {
  function payGrade_item($value='',$nameByID=0){ 
    $datas = SetHrPayGrade::where('status',1)->orderBy('title')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->title.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('payrollPolicy_item')) {
  function payrollPolicy_item($value='',$nameByID=0){ 
    $datas = HrPayrollPolicy::where('status',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('bankList')) {
    function bankList($value='role-list'){
         $datas = DB::table('bank_name_lists')
            ->select('id','bankName')
            ->where('status',1)
            ->get();
            $optiontext = '';
          foreach ($datas as $key => $val) {
            $selected = ($value == $val->id)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->bankName.' </option>';
          }
          return $optiontext;
    }
}


if (!function_exists('customer_list')) {
  function customer_list($value='',$nameByID=0){ 
    $datas = Customer::where('status',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('customer_list_company')) {
  function customer_list_company($value='',$nameByID=0){ 
    $datas = Customer::where('status',1)->where('customer_type',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('vendor_list_company')) {
  function vendor_list_company($value='',$nameByID=0){ 
    $datas = Vendor::where('status',1)->where('vendor_type',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('vendor_list')) {
  function vendor_list($value='',$nameByID=0){ 
    $datas = Vendor::where('status',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}


if (!function_exists('city_list')) {
  function city_list($value='',$nameByID=0){ 
    $datas = AddressCity::where('status',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}


if (!function_exists('zone_list')) {
  function zone_list($value='',$nameByID=0){ 
    $datas = AddressZone::where('status',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}


if (!function_exists('area_list')) {
  function area_list($value='',$nameByID=0){ 
    $datas = AddressArea::where('status',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('account_type_list')) {
  function account_type_list($value='',$nameByID=0){ 
    $datas = AccChartOfAccountTypes::orderBy('account_type_name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->account_type_ID)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->account_type_ID.'"> '.$val->account_type_number.' - '.$val->account_type_name.' </option>';
    }
    return $optiontext;
  }
}


if (!function_exists('account_details_type')) {
  function account_details_type($value='',$nameByID=0){ 
    $datas = AccChartOfAccountDetailsTypes::orderBy('detail_type_name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->detail_type_id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->detail_type_id.'"> '.$val->dcode.' - '.$val->detail_type_name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('AccountsNameByDetailsType')) {
  function AccountsNameByDetailsType($value='',$nameByID=0, $detail_type_id=null){ 
    $datas = AccChartOfAccountName::orderBy('account_number')
    ->when($detail_type_id, function($q) use($detail_type_id){
        return $q->whereIn('detail_type_id',$detail_type_id);
      })->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->account_Name_id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->account_Name_id.'"> '.$val->account_number.' - '.$val->account_name.' </option>';
    }
    return $optiontext;
  }
}


if (!function_exists('accounts_name')) {
  function accounts_name($value='',$nameByID=0, $accTypeID=null){ 
    $datas = AccChartOfAccountName::orderBy('account_name')
    ->when($accTypeID, function($q) use($accTypeID){
        return $q->where('account_type_id',$accTypeID);
      })->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->account_Name_id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->account_Name_id.'"> '.$val->account_number.' - '.$val->account_name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('accounts_name2')) {
  function accounts_name2($value='',$nameByID=0, $accTypeID=null){ 
    $datas = AccChartOfAccountName::orderBy('account_name')
    ->when($accTypeID, function($q) use($accTypeID){
        return $q->whereIn('account_type_id',$accTypeID);
      })->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->account_Name_id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->account_Name_id.'"> '.$val->account_number.' - '.$val->account_name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('RootAccountType')) {
  function RootAccountType($value='',$nameByID=0){ 
    $datas = AccChartOfAccountRootType::orderBy('rootID')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->rootID)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->rootID.'"> '.$val->rootID.' - '.$val->rootName.' </option>';
    }
    return $optiontext;
  }
}

 function vendorList_options($value=null,$code=1,$advAccID=0,$advDr=0)
  {
    $optiontext = '';

    if($advAccID>0){
    $vals = DB::table('vendors AS v')
    ->select(
      DB::raw("v.id, v.name, v.code, v.mobile
  ,SUM(CASE WHEN td.type=1 AND t.pyee_type='1' AND td.account_id='".$advAccID."' THEN td.amount ELSE 0 END) AS type1
  ,SUM(CASE WHEN td.type=2 AND t.pyee_type='1' AND td.account_id='".$advAccID."' THEN td.amount ELSE 0 END) AS type2 
  , (SUM(CASE WHEN td.type=1 AND t.pyee_type='1' AND td.account_id='".$advAccID."' THEN td.amount ELSE 0 END) - SUM(CASE WHEN td.type=2 AND t.pyee_type='1' AND td.account_id='".$advAccID."' THEN td.amount ELSE 0 END)) AS Balance ")
    )
    ->leftJoin('transactions as t','t.payee_account','v.id')
    ->leftJoin('transection_details as td','td.transection_id','t.transactionID')
    ->where('v.status',1)
    ->groupBy('v.id')
    ->get();
    }
    else {
    $vals = vendor::where('status',1)->get();
    }
    // dd($vals);

    foreach ($vals as  $val) {
      $val->Balance = '-';
      $selected = ($value == $val->id )?'selected=selected':'';
      if ($code==1) {
        $optiontext .= '<option '.$selected.' value="'.$val->id.'_1" data-info4fill="'.$val->mobile.'" data-advance_is="'.$val->Balance.'" >'.$val->code.' - '.ucwords($val->name).' ['.$val->mobile.']</option>';
      }else{
        $optiontext .= '<option '.$selected.' value="'.$val->id.'_1" data-info4fill="'.$val->mobile.'" >'.$val->code.' - '.ucwords($val->name).' ['.$val->mobile.']</option>';
      }
      
    }
    return $optiontext;
  }


    function customerList_options($value=null,$code=1,$advAccID=0)
  {

    $optiontext = '';
    if($advAccID>0){
    $vals = DB::table('customers AS t1')
    ->select(
      DB::raw("t1.id, t1.name, t1.code, t1.mobile
  ,SUM(CASE WHEN td.type=1 AND t.pyee_type='2' AND td.account_id='".$advAccID."' THEN td.amount ELSE 0 END) AS type1
  ,SUM(CASE WHEN td.type=2 AND t.pyee_type='2' AND td.account_id='".$advAccID."' THEN td.amount ELSE 0 END) AS type2 
  , (SUM(CASE WHEN td.type=1 AND t.pyee_type='2' AND td.account_id='".$advAccID."' THEN td.amount ELSE 0 END) - SUM(CASE WHEN td.type=2 AND t.pyee_type='2' AND td.account_id='".$advAccID."' THEN td.amount ELSE 0 END)) AS Balance ")
    )
    ->leftJoin('transactions as t','t.payee_account','t1.id')
    ->leftJoin('transection_details as td','td.transection_id','t.transactionID')
    ->where('t1.status',1)
    ->groupBy('t1.id')
    ->get();
    }else{
      $vals = Customer::where('status',1)->get();
    }
    foreach ($vals as  $val) {
      $selected = ($value == $val->id )?'selected=selected':'';
      if ($code==1) { 
        $addressFill='';
        // if($advAccID==0){
        //   $addressFill .= ucwords($val->customer_billing_addresses['street']).', ';
        //   $addressFill .= ucwords($val->customer_billing_addresses['state']).', ';
        //   $addressFill .= ucwords($val->customer_billing_addresses['city']).' - ';
        //   $addressFill .= $val->customer_billing_addresses['post_code'];
        //   if($addressFill==', ,  - '){$addressFill='';}
        // }
        $val->Balance = '-';
        $optiontext .= '<option '.$selected.' value="'.$val->id.'_2" data-info4fill="'.$val->mobile.'" data-advance_is="'.$val->Balance.'" data-address_fill="'.$addressFill.'" >'.$val->code.' - '.ucwords($val->name).' ['.$val->mobile.'] </option>';
      }else{
        $optiontext .= '<option '.$selected.' value="'.$val->id.'_2" data-info4fill="'.$val->mobile.'" >'.$val->code.' - '.ucwords($val->name).' ['.$val->mobile.'] </option>';
      }
      
    }
    return $optiontext;
  }
  // customer list option which in transection list


 function staffList_options($value=null,$code=1,$stype='',$advAccID=0)
  {
    $codelist = ''; //$this->userCan('audit-visit-codelist')>0?Auth::user()->office_code:'';

    $optiontext = '';
     {
      $vals = DB::table('employees')->select('id','full_name', 'nick_name','employee_id')->orderBy('full_name')->where('status',1)->get();
    }

    
    foreach ($vals as  $val) {
      $val->Balance = '-'; $employee_id=''; if(!empty($val->employee_id)) $employee_id = $val->employee_id.' - ';
      $selected = ($value == $val->id )?'selected=selected':'';
      if ($code==1) {
        $optiontext .= '<option '.$selected.' value="'.$val->id.'_3" data-advance_is="'.$val->Balance.'" >'.$employee_id.' '.ucwords($val->full_name).' '.$val->nick_name.' ['.$val->nick_name.'] </option>';
      }else{
        $optiontext .= '<option '.$selected.' value="'.$val->id.'_3" >'.$employee_id.' '.ucwords($val->full_name).' '.$val->nick_name.' ['.$val->nick_name.'] </option>';
      }
    }
    return $optiontext;
  }


  function acc_payment_method_options($value=null)
  {
    $optiontext = '';
    $vals = DB::table('payment_methods')->select('id','name')->orderBy('id')->where('status',1)->get();
    foreach ($vals as  $val) {
      $selected = ($value == $val->id )?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'">'.$val->name.'</option>';
    }
    return $optiontext;
  }

  function acc_transectionType_options($value=null,$take=3,$skip=0)
  {
    $optiontext = '';
    $vals = DB::table('acc_transection_types')->select('id','type_name')->orderBy('id')->take($take)->skip($skip)->get();
    foreach ($vals as  $val) {
      $selected = ($value == $val->id )?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'">'.$val->type_name.'</option>';
    }
    return $optiontext;
  }

    // ************ For Product **************
  if (!function_exists('product_type')) {
    function product_type($value='',$nameByID=''){ 
         $datas = [
            1 => 'Inventory', 
            2 => 'Non-Inventory', 
            3 => 'Service', 
            4 => 'Bundle' 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

if (!function_exists('warranty_type')) {
  function warranty_type($value='',$nameByID=''){ 
       $datas = [
          1 => 'Day', 
          2 => 'Month', 
          3 => 'Year', 
      ];
      if (!empty($nameByID)) {
          return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = ($value === $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
      }
      return $optiontext;
  }
}

if (!function_exists('product_category')) {
  function product_category($value=''){ 
    $datas = ProductCategorie::select('catID','catName')->where('status',1)->orderBy('catName')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->catID)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->catID.'"> '.$val->catName.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('product_unit')) {
  function product_unit($value=''){ 
    $datas = ProductUnit::select('id','name')->where('status',1)->orderBy('name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('product_list')) {
  function product_list($value='',$only1=0){ 
    $limit = 1000; $product_id='';
    if ($only1==1) {
        $limit = 1; $product_id = intval($value);
    }
    $datas = Product::select('id','product_name','sales_price','stock','product_code','details')->where('status',1)->orderBy('product_name')
        ->when($product_id, function($q) use($product_id){
            return $q->where('id',$product_id);
        })
        ->limit($limit)->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'" data-sales_price="'.$val->sales_price.'" data-stock="'.$val->stock.'" data-product_code="'.$val->product_code.'" data-details="'.$val->details.'"  > '.$val->product_name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('customer_contact')) {
  function customer_contact($value='',$customer_id=0){ 
    if ($customer_id>0) {
     $datas = CustomerContact::select('id','contact_name')->where('status',1)->where('customer_id',$customer_id)->orderBy('contact_name')->get();
    }else $datas = CustomerContact::select('id','contact_name')->where('status',1)->orderBy('contact_name')->get();
    $optiontext = '';
    foreach ($datas as $key => $val) {
      $selected = ($value == $val->id)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'"> '.$val->contact_name.' </option>';
    }
    return $optiontext;
  }
}

if (!function_exists('opportunity_type')) {
  function opportunity_type($value='',$nameByID=''){ 
       $datas = [
          1 => 'Existing Business', 
          2 => 'New Business'
      ];
      if (!empty($nameByID)) {
          return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = ($value === $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
      }
      return $optiontext;
  }
}

if (!function_exists('campaign_source')) {
  function campaign_source($value='',$nameByID=''){ 
       $datas = [
          1 => 'Social media', 
          2 => 'Phone call',
          3 => 'Email'
      ];
      if (!empty($nameByID)) {
          return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = ($value === $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
      }
      return $optiontext;
  }
}

if (!function_exists('lead_source')) {
  function lead_source($value='',$nameByID=''){ 
       $datas = [
          1 => 'Lead Source 1', 
          2 => 'Lead Source 2',
          
      ];
      if (!empty($nameByID)) {
          return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = ($value === $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
      }
      return $optiontext;
  }
}

if (!function_exists('sales_status')) {
  function sales_status($value='',$nameByID=''){ 
       $datas = [
          1 => 'Created', 
          2 => 'Approved'
          
      ];
      if (!empty($nameByID)) {
          return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
          $selected = ($value === $key)?'selected=selected':'';
          $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
      }
      return $optiontext;
  }
}

function opportunity_no($value=null,$forQuot=0)
  {
    $optiontext = '';
    if ($forQuot==1) {
    $vals=DB::table('sales_opportunities')->select('id','opportunity_number')->orderBy('id')->where('status','<',16)->where('quotation_no',0)->get();
    }else
    $vals = DB::table('sales_opportunities')->select('id','opportunity_number')->orderBy('id')->get();
    foreach ($vals as  $val) {
      $selected = ($value == $val->id )?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'">'.$val->opportunity_number.'</option>';
    }
    return $optiontext;
  }
function quotation_list_approved($value=null,$for_sorder=0,$for_invoice=1)
  {
    $optiontext = '';
    $vals = DB::table('sales_quotations')->select('id','quotation_number','ref_number','quotation_date')->orderBy('id')
    ->where('status','>',29)
    // ->where('invoice_id',0)
    ->when($for_sorder, function($q) use($for_sorder){
        return $q->where('sales_order',0);
      })
     ->when($for_invoice, function($q) use($for_invoice){
        return $q->where('invoice_id',0)->where('sales_order',0);
      })
    ->get();
    foreach ($vals as  $val) {
      $selected = ($value == $val->id )?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'">'.$val->quotation_number.'</option>';
    }
    return $optiontext;
  }

function salesOrder_list_approved($value=null,$for_invoice=1)
  {
    $optiontext = '';
    $vals = DB::table('sales_orders')->select('id','sales_order_number','ref_number','so_date')->orderBy('id')
    ->where('status',45)
    ->whereNull('ref_number')
    // ->when($for_sorder, function($q) use($for_sorder){
    //     return $q->where('sales_order',0);
    //   })
    //  ->when($for_invoice, function($q) use($for_invoice){
    //     return $q->where('invoice_id',0);
    //   })
    ->get();
    foreach ($vals as  $val) {
      $selected = ($value == $val->id )?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->id.'">'.$val->sales_order_number.'</option>';
    }
    return $optiontext;
  }





// address

 function divisions($value=null)
  {
    $optiontext = '';
    $vals = DB::table('divisions')->orderBy('name')->get();
    foreach ($vals as  $val) {
      $selected = ($value == $val->id )?'selected=selected':'';      
      $optiontext .= '<option '.$selected.' value="'.$val->id.'" >'.($val->name).'</option>';
    }
    return $optiontext;
  }
 function districts($value=null)
  {
    $optiontext = '';
    $vals = DB::table('districts')->orderBy('name')->get();
    foreach ($vals as  $val) {
      $selected = ($value == $val->id )?'selected=selected':'';      
      $optiontext .= '<option '.$selected.' value="'.$val->id.'" >'.($val->name).' :: '.($val->bName).'</option>';
    }
    return $optiontext;
  }

 function thanas($value=null)
  {
    $optiontext = '';
    $vals = DB::table('thanas')->orderBy('name')->get();
    foreach ($vals as  $val) {
      $selected = ($value == $val->id )?'selected=selected':'';      
      $optiontext .= '<option '.$selected.' value="'.$val->id.'" >'.($val->name).'</option>';
    }
    return $optiontext;
  }

  // accounting 

  function AccNameChild($parent_id=0)
  {
    if ($parent_id>0) {
      $data = AccName::where('parent_id',$parent_id)->where('status',1)->get();
      if($data->count()>0)  return $data;
    }return 0;
  }

  function getChilds($d){
    $tree = array();
    $children = array();
    //dd($d);
    $tree['parent'] = $d->toArray();
    if($d->id>0){
        $data = AccName::where('parent_id',$d->id)->get();
       // dd($data);
        foreach ($data as $d) {
            $first = $this->getChilds($d);
            array_push($children, $first);
        }
    }
    $tree['children'] = $children;
    return $tree;
}

// medical 

if (!function_exists('doctorType')) {
    function doctorType($value='',$nameByID=''){ 
         $datas = [
            1 => 'Indoor', 
            2 => 'Outdoor', 
            3 => 'Freelance', 
            4 => 'Own', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

function doctor_list($value=null)
  {
    $optiontext = '';
    $vals = DB::table('doctors')->select('dID','dName')->orderBy('dID')->where('status',1)->get();
    foreach ($vals as  $val) {
      $selected = ($value == $val->dID)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->dID.'">'.$val->dName.'</option>';
    }
    return $optiontext;
  }

function agent_list($value=null)
  {
    $optiontext = '';
    $vals = DB::table('agents')->select('agentID','name','mobile','organization_name')->orderBy('name')->where('status',1)->get();
    foreach ($vals as  $val) {
      $selected = ($value == $val->agentID)?'selected=selected':'';
      $optiontext .= '<option '.$selected.' value="'.$val->agentID.'">'.$val->name.' | '.$val->organization_name.' - '.$val->mobile.'</option>';
    }
    return $optiontext;
  }
  
 function medical_depertments($value=null)
  {
    $optiontext = '';
    $vals = DB::table('medical_depertments')->orderBy('deptName')->where('status',1)->get();
    foreach ($vals as  $val) {
      $selected = ($value == $val->id )?'selected=selected':'';      
      $optiontext .= '<option '.$selected.' value="'.$val->id.'" >'.($val->deptName).'</option>';
    }
    return $optiontext;
  }



if (!function_exists('OPDStatus')) {
    function OPDStatus($value='',$nameByID=''){ 
         $datas = [
            1 => 'Appointment Request', 
            2 => 'Confirmed', 
            3 => 'In lobby', 
            4 => 'No Show', 
            5 => 'Cancel', 
            6 => 'Completed', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value == $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

    function OPDRegType($value='',$nameByID=''){ 
         $datas = [
            1 => 'New', 
            2 => 'Follow Up', 
            3 => 'Report', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value == $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }


if (!function_exists('EmergencyContactTypeList')) {
    function EmergencyContactTypeList($value='',$nameByID=''){ 
         $datas = [
            1 => 'Spouse', 
            2 => 'Brother', 
            3 => 'Sister', 
            4 => 'Father', 
            5 => 'Mother', 
            6 => 'Relative'
           ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}
// class SimpleClass {

// public function yourFunction(){
//    return true;
// } 

// }

?>
