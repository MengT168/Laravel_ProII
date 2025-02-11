<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
    }

    //Move File Upload
    public function uploadFile($File) {
        $fileName  = rand(1,999).'-'.$File->getClientOriginalName();
        $path      = 'uploads';
        $File->move($path, $fileName);
        return $fileName;
    }

    //Log Activities
    public function logActivity($postType, $title, $postId , $action) {
        $user = Auth::user()->id;
        DB::table('log_activity')->insert([
            'title'         => $title,
            'post_type'     => $postType,
            'post_id'       => $postId,
            'action'        => $action,
            'author'        => $user,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ]);
    }

    //Generate slug
    public function slug($string){
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string))).'-'.rand(1,999);
        return $slug;
    }

    public function checkExistPost($table,$fieldName,$fieldValue){
        $exist = DB::table($table)->where($fieldName,$fieldValue)->count('id');
        return $exist;
    }

    public function getLastPostId ($tableName){
        $lastId = DB::table($tableName)->orderByDesc('id')->limit(1)->get();
        return $lastId[0]->id;
    }
    
}
