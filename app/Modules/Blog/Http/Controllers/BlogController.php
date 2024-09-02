<?php

namespace App\Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;
use App\Modules\Blog\Models\Blog;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{


    public function adminBlogList()
    {
        $breadcrumbs = [
            ['nav_name' => 'Blogs'],
            ['nav_item' => 'Features'],
            ['nav_item' => 'Blogs'],
            ['nav_button' => 'Add New', 'url' => '', 'icon' => ''],
        ];
        $data['breadcrumbs'] = $breadcrumbs;
        return view("Blog::pages.admin.list", $data);

        // $faker = Faker::create();
        // for ($i = 0; $i < 1000; $i++) {
        //     DB::table('blogs')->insert([
        //         'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        //         'content' => $faker->text($maxNbChars = 500),
        //         'created_at'=> $faker->dateTimeBetween('2024-01-01','2024-12-01'),
        //         'updated_at'=> $faker->dateTimeBetween('2024-01-01','2024-12-01')
        //     ]);
        // }
    }

    public function adminGetBlogData(Request $request)
    {
        try {
            if ($request->ajax()) {

                $pageStart = $request->start ?? 0;
                $pageLength = $request->length ?? 10;
                $dataColumns = $request->get('columns');
                $searchValue = $request->input('search.value');
                $draw = $request->get('draw');
                $recordsTotal = 0;
                $recordsFiltered = 0;

                // Initialize query
                $dataQuery = Blog::query();
                $recordsTotal = $dataQuery->count();

                // Apply search filter
                if (!empty($searchValue)) {
                    $dataQuery->where(function ($query) use ($searchValue) {
                        $query->where('title', 'like', '%' . $searchValue . '%')
                            ->orWhere('content', 'like', '%' . $searchValue . '%');
                    });
                    $recordsFiltered = $dataQuery->count();
                }
                if($recordsFiltered == 0){
                    $recordsFiltered = $recordsTotal;
                }
                

                $data = $dataQuery->offset($pageStart)->limit($pageLength)->get([
                    'blogs.title',
                    'blogs.content'
                ]);
                foreach ($data as $key => $row) {
                    $row->index = $pageStart + $key + 1;
                    $row->action = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                }

                // Return data as JSON
                return Datatables::of($data)
                    ->with([
                        "draw" => (int) $draw,
                        "recordsTotal" => $recordsTotal,
                        "recordsFiltered" => $recordsFiltered,
                        "data" => $data
                    ])
                    ->make(true);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }// end -:- adminGetBlogData()

}// end -:- BlogController
