<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('title','id')->all();
        return view('pages.category',compact('categories','allCategories'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {
        $this->validate($request, [
        		'title' => 'required',
        	]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        
        Category::create($input);
        return back()->with('success', 'New Category added successfully.');
    }

    public function updateCategory(Request $request, $id)
    {
        $this->validate($request, [
        		'title' => 'required',
        	]);
        $input = $request->all();
        
        $category = Category::find($id);
        $category->title = $input['title'];
        $category->save();
        return back()->with('success', 'Category updated successfully.');
    }

    public function deleteCategory(Request $request, $id)
    {
        $category = Category::find($id);
        // $category->children()->delete();
        $category->delete();
        return back()->with('success', 'Category deleted successfully.');
    }


}