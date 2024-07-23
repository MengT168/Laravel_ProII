<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $order = DB::table('order')->where('status', 'pending')->count();
        return view('backend.master',['orderRow'=>$order]);
    }

    public function AddPost() {
        $order = DB::table('order')->where('status', 'pending')->count();
        return view('backend.add-post',['orderRow'=>$order]);
    }

    public function ListPost() {
        $order = DB::table('order')->where('status', 'pending')->count();
        return view('backend.list-post',['orderRow'=>$order]);
    }

    // Add Logo
    public function addLogo() {
        $order = DB::table('order')->where('status', 'pending')->count();
        return view('backend.add-logo',['orderRow'=>$order]);
    }

    public function addLogoSubmit(Request $request)
    {
        if($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            $thumbnail = $this->uploadFile($file);
            $submit = DB::table('logo')->insert([
                'thumbnail' => $thumbnail,
                'author'    => Auth::user()->id,
                'created_at'    => date('Y-m-d h:i:s',strtotime('+7 hours')),
                'updated_at'    => date('Y-m-d h:i:s',strtotime('+7 hours')),
            ]);
            if($submit){
                $lastId = $this->getLastPostId('logo');
                $this->logActivity('logo',$thumbnail,$lastId,'Update');
                return redirect('/admin/list-logo');
            }else{
                return redirect('/admin/add-logo')->with('message','add thumbnail fail');
            }
        }else{
            return redirect('/admin/add-logo')->with('message','Invalid File');
        }
    }
    public function listLogo(){
        $order = DB::table('order')->where('status', 'pending')->count();
        $Dblogo = DB::table('logo')
        ->leftJoin('users','users.id','logo.author')
        ->select('users.name','logo.*')
        ->orderBy('logo.id')
        ->get();
        return view('backend.list-logo',['logo'=>$Dblogo , 'orderRow'=>$order]);
    }

    public function updateLogo($id){
        $order = DB::table('order')->where('status', 'pending')->count();
        $Dblogo = DB::table('logo')->where('id',$id)->first();
        return view('backend.update-logo',['logo'=>$Dblogo , 'orderRow'=>$order]);
    }

    public function updateLogoSubmit(Request $request){
        $id = $request->id;
        if($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            $thumbnail = $this->uploadFile($file);
            $update = DB::table('logo')->where('id',$id)->update([
                'thumbnail' => $thumbnail,
                'updated_at'    => date('Y-m-d h:i:s',strtotime('+7 hours'))
            ]);
            if($update){
                $lastId = $this->getLastPostId('logo');
                $this->logActivity('logo',$thumbnail,$lastId,'Update');
                return redirect('/admin/list-logo');
            }else{
                return redirect('/admin/update-logo/'.$id)->with('message','Update Fail');
            }
        }else{
            return redirect('/admin/update-logo/'.$id)->with('message','Invalid File');
        }
    }

    public function removeLogoSubmit(Request $request){
        $id = $request->id;
        $Dblogo = DB::table('logo')->where('id',$id)->delete();
        if($Dblogo){
            return redirect('/admin/list-logo')->with('message','Delete Success');
        }else{
            return redirect('/admin/list-logo')->with('message','Delete Fail');
        }
    }

    public function listLogActivity(){
        $order = DB::table('order')->where('status', 'pending')->count();
        $Dblog = DB::table('log_activity')
        ->leftJoin('users','users.id','log_activity.author')
        ->select('users.name','log_activity.*')
        ->get();
        return view('backend.list-log',['log'=>$Dblog , 'orderRow'=>$order ]);
    }

    public function logDetail($post,$id,$ids){
        $order = DB::table('order')->where('status', 'pending')->count();
        // $id = $request->id;
        $Dblog = DB::table('log_activity')
        ->leftJoin('users','users.id','log_activity.author')
        ->select('users.name','log_activity.*')
        ->where('log_activity.id',$ids)
        ->get();
        return view('backend.log-detail',['log'=>$Dblog , 'orderRow'=>$order ]);
    }

}
