<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\User\Models\Users;
use Yajra\DataTables\Facades\Datatables;

class UserController extends Controller
{

    public function adminUserList()
    {
        $breadcrumbs = [
            ['nav_name' => 'Uses'],
            ['nav_item' => 'Security And Access'],
            ['nav_item' => 'Users'],
            ['nav_button' => 'Add New', 'url' =>  '', 'icon' => ''],
        ];
        $data['breadcrumbs'] = $breadcrumbs;
        return view("User::pages.admin.list", $data);
    }// end -:- adminUserList()

    public function adminGetList(Request $request)
    {
        if ($request->ajax()) {
            $data = Users::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }// end -:- adminGetList()
}// end -:- UserController
