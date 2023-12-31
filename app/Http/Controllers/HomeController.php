<?php

namespace App\Http\Controllers;
use App\Herd;
use App\Count;
use Illuminate\Http\Request; 
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller {

  
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        
        $query = "";
        $type = Input::get('type');
        $owner = Input::get('owner');
        $year = Input::get('count_year');
   
        if(Session::has('year')) {
            $year = Session::get('year');
    
        }
        else {
            Session::put('year', $year);
        }
        if ($year!=NULL && $year !=0) {
            $query.=" and c.count_year = '".$year."'";
    
        }
        else
        {
            $query.="and c.count_year = 2020 ";
        }
        if(Session::has('type')) {
            $type = Session::get('type');
    
        }
        else {
            Session::put('type', $type);
        }
        
        if ($type!=NULL && $type !=0) {
            $query.=" and h.type_id = '".$type."'";
    
        }
        else
        {
            $query.=" ";
        }
        if(Session::has('owner')) {
            $owner = Session::get('owner');
    
        }
        else {
            Session::put('owner', $owner);
        }
        if ($owner!=NULL && $owner !=0) {
            $query.=" and h.owner_id = '".$owner."'";
    
        }
        else
        {
            $query.=" ";
        }
        $uid=Auth::id();
        $herd=DB::select("SELECT * FROM CONST_HERD");
        $types=DB::select("SELECT * FROM CONST_TYPE");
        $owners=DB::select("SELECT * FROM CONST_OWNER");
        $years=DB::select("SELECT * FROM CONST_YEAR");
        $herds=DB::select("select h.*, c.*, o.owner_name, p.herd_name as parent_name , m.herd_name as mother_name , t.type_name
        from count_herd c, const_herd h, const_owner o, const_herd p ,const_herd m, const_type t
        where c.herd_id=h.herd_id and h.owner_id=o.owner_id and p.herd_id=h.parent_id 
        and m.herd_id=h.mother_id and t.type_id=h.type_id and h.is_delete=0 " .$query. "");
        $del=DB::select("select h.*, c.*, o.owner_name, p.herd_name as parent_name , m.herd_name as mother_name , t.type_name
        from count_herd c, const_herd h, const_owner o, const_herd p ,const_herd m, const_type t
        where c.herd_id=h.herd_id and h.owner_id=o.owner_id and p.herd_id=h.parent_id 
        and m.herd_id=h.mother_id and t.type_id=h.type_id and h.is_delete=1 " .$query. "");
        return view('herd',compact('herds','herd','type','owner','types','owners','year', 'years', 'del'));
   
    }
    public function add(Request $request)
    {
        $herd = new Herd;
        $herd->herd_name = $request->herd_name;
        $herd->type_id = $request->type_id; 
        $herd->mother_id = $request->mother_id; 
        $herd->owner_id = $request->owner_id;
        $herd->parent_id = $request->parent_id;
        $herd->comment = $request->comment;
        $herd->save();
        $id=DB::getPdo()->lastInsertId();

        if ($request->hasFile('img_url')){
            $file = $request->file('img_url');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/img';
            $uplaod = $file->move($path,$fileName);
            DB::table('const_herd')->where('herd_id',$id)
            ->update(['img_url' => $fileName]);
        }
        if ($request->hasFile('img_url_2')){
            $file = $request->file('img_url_2');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/img';
            $uplaod = $file->move($path,$fileName);
            DB::table('const_herd')->where('herd_id',$id)
            ->update(['img_url_2' => $fileName]);
        }
            $herd = new Count;
            $herd->count_year = $request->herd_year;
            $herd->is_enable = 1;
            $herd->herd_id = $id; 
            $herd->save();
   
        return Redirect('');
    }
    public function update(Request $request)
    {
        Herd::where('herd_id', $request->herd_id)
            ->update(['herd_name' => $request->herd_name,'comment' => $request->comment,'type_id' => $request->type_id,'owner_id' => $request->owner_id,'parent_id' => $request->parent_id]);
            if ($request->hasFile('img_url')){
                $file = $request->file('img_url');
                $extension = $file->getClientOriginalExtension(); // you can also use file name
                $fileName = time().'.'.$extension;
                $path = public_path().'/img';
                $uplaod = $file->move($path,$fileName);
                DB::table('const_herd')->where('herd_id',$request->herd_id)
                ->update(['img_url' => $fileName]);
            }
            if ($request->hasFile('img_url_2')){
                $file = $request->file('img_url_2');
                $extension = $file->getClientOriginalExtension(); // you can also use file name
                $fileName = time().'.'.$extension;
                $path = public_path().'/img';
                $uplaod = $file->move($path,$fileName);
                DB::table('const_herd')->where('herd_id',$request->herd_id)
                ->update(['img_url_2' => $fileName]);
            }
            return Redirect('home');
    }
    public function deleteherd(Request $request) {
  
        DB::table('const_herd')->where('herd_id', $request->herds_id)
        ->update(['is_delete' => 1, 'delete_year' => $request->delete_date, 'delete_reason' => $request->delete_reason]);
        DB::table('count_herd')->where('herd_id', $request->herds_id)->where('count_year', $request->delete_date)
        ->update(['is_enable' => 0, 'comment' => $request->delete_reason]);
        return Redirect('home');  
  }
 
  public function count() {
    $query = "";
    $year = Input::get('count_year');
   
    if(Session::has('year')) {
        $year = Session::get('year');

    }
    else {
        Session::put('year', $year);
    }
    if ($year!=NULL && $year !=0) {
        $query.=" and c.count_year = '".$year."'";

    }
    else
    {
        $query.=" ";
    }
    $uid=Auth::id();
    $years=DB::select("SELECT * FROM CONST_YEAR");
    $herds=DB::select(" select h.*, c.*, o.owner_name, p.herd_name as parent_name , m.herd_name as mother_name , t.type_name
    from count_herd c, const_herd h, const_owner o, const_herd p ,const_herd m, const_type t
    where c.herd_id=h.herd_id and h.owner_id=o.owner_id and
     p.herd_id=h.parent_id and m.herd_id=h.mother_id and t.type_id=h.type_id " .$query. " and h.is_delete=0");

    $rep=DB::select("SELECT owner_name, SUM(CASE WHEN (type_id=1) THEN 1 ELSE 0 END) AS type_id1, 
    SUM(CASE WHEN (type_id=2) THEN 1 ELSE 0 END) AS type_id2, 
    SUM(CASE WHEN (type_id=3) THEN 1 ELSE 0 END) AS type_id3 
    FROM ( SELECT 
            `h`.`herd_id` AS `herd_id`,
            `h`.`type_id` AS `type_id`,
            `h`.`owner_id` AS `owner_id`,
            `h`.`mother_id` AS `mother_id`,
            `h`.`img_url` AS `img_url`,
            `h`.`parent_id` AS `parent_id`,
            `h`.`age` AS `age`,
            `h`.`herd_name` AS `herd_name`,
            `h`.`owner_name` AS `owner_name`,
            `h`.`type_name` AS `type_name`,
            `h`.`parent_name` AS `parent_name`,
            `h`.`mother_name` AS `mother_name`,
            `f`.`count_year` AS `count_year`,
            `f`.`is_enable` AS `is_enable`,
            `f`.`comment` AS `comment`,
            `f`.`count_id` AS `count_id`
        FROM
            (`count_herd` `f`
            JOIN (  SELECT 
        `const_herd`.`herd_id` AS `herd_id`,
        `const_herd`.`type_id` AS `type_id`,
        `const_herd`.`owner_id` AS `owner_id`,
        `const_herd`.`mother_id` AS `mother_id`,
        `const_herd`.`img_url` AS `img_url`,
        `const_herd`.`parent_id` AS `parent_id`,
        `const_herd`.`age` AS `age`,
        `const_herd`.`herd_name` AS `herd_name`,
        `const_owner`.`owner_name` AS `owner_name`,
        `const_type`.`type_name` AS `type_name`,
        `h`.`herd_name` AS `parent_name`,
        `m`.`herd_name` AS `mother_name`
    FROM
        ((((`const_herd`
        JOIN `const_owner`)
        JOIN `const_type`)
        JOIN `const_herd` `h`)
        JOIN `const_herd` `m`)
    WHERE
        ((`const_herd`.`owner_id` = `const_owner`.`owner_id`)
            AND (`const_type`.`type_id` = `const_herd`.`type_id`)
            AND (`const_herd`.`parent_id` = `h`.`herd_id`)
            AND (`const_herd`.`mother_id` = `m`.`herd_id`))) `h`)
        WHERE
            (`h`.`herd_id` = `f`.`herd_id`)) c where is_enable =1 
            " .$query. "
    GROUP BY owner_name order by owner_name");
    return view('count',compact('herds', 'year', 'years', 'rep'));

}
public function createcount(Request $request) {

    $herd_id = DB::select("SELECT herd_id FROM CONST_HERD where is_enable=1");
    $year = DB::table('count_herd')->where('count_year', $request->herd_year)->doesntExist();
    if($year == true){
        foreach($herd_id as $key) {
            $herd = new Count;
            $herd->count_year = $request->herd_year;
            $herd->is_enable = 1;
            $herd->herd_id = $key->herd_id; 
            $herd->save();
        }
    }
    Session::put('year',$request->herd_year);
    return back();

}
public function filter_countyear($year) {
    Session::put('year',$year);
    return back();
}
public function filter_owner($owner) {
    Session::put('owner',$owner);
    return back();
}
public function filter_type($type) {
    Session::put('type',$type);
    return back();
}
public function updatecount(Request $request)
    {
        
       $db = DB::table('COUNT_HERD')->where('count_id', $request->count_id)->select('count_year', 'herd_id')->get(0);       
       $year = DB::table('COUNT_HERD')->max('count_year');
       if($db[0]->count_year == $year ){
        DB::table('CONST_HERD')->where('herd_id', $db[0]->herd_id)
        ->update(['is_enable' => $request->is_enable,'comment' => $request->comment]);
       }
        DB::table('COUNT_HERD')->where('count_id', $request->count_id)
            ->update(['is_enable' => $request->is_enable,'comment' => $request->comment]);
            
        
            return Redirect('count');
    }
}



