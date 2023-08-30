<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = Category::get(); // ~ select * from categories
        return view('admin/category-list', compact('data'));

    }
    public function add()
    {
        $categories = Category::get();
        return view('admin.category-add', compact('categories'));
    }
    public function save (Request $request)
    {
        $categories = new Category();
        $categories->categoriesID = $request->id;
        $categories->categoriesName = $request->name;
        $categories->categoriesDescriptions = $request->descriptions;
        $categories->save();
        return redirect()->back()->with('success', 'Category added successfully!');
    }
    public function edit()
        {
            $categories = Category::get();
            return view ('admin\category-edit', compact('categories'));
        }
        public function delete($id)
        {
            Category ::where('categoriesID', '=', $id) ->delete();
            return redirect () ->back() ->with('success', 'Category deleted successfully');
        }

        public function update (Request $request) {
            Category::where('categoriesID', '=', $request->id) -> update([
            'categoriesName' => $request-> name,
            'categoriesDescriptions' => $request-> descriptions,
            ]);
            return redirect()->back() -> with('success', 'Category Updated Successfully');
        }



}
