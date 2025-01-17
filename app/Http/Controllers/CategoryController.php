<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewCategories()
    {
        $categories = Category::all(); // Adjust number per page as needed
        return view('admin.categories', compact('categories'));
    }


    public function storeCategories(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = ucwords(strtolower($request->category));

        $existingCategory = Category::where('category', $category)->first();

        if ($existingCategory) {
            return redirect()->back()->with('error', 'This Category already exists.');
        }

        $categorySave = new Category();

        $categorySave->category = $category;
        if ($request->file('image')) {
            $imageName = time() . '_1.' . $request->image->extension();
            $request->image->move(public_path('category_image'), $imageName);
            $categorySave->image = $imageName;
        }

        $categorySave->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function updateCategories(Request $request, $id)
{
    $request->validate([
        'category' => 'required|string|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $category = ucwords(strtolower($request->category));

    $categoryUpdate = Category::findOrFail($id);

    $existingCategory = Category::where('category', $category)->where('id', '!=', $id)->first();
    if ($existingCategory) {
        return redirect()->back()->with('error', 'This Category already exists.');
    }

    $categoryUpdate->category = $category;

    if ($request->file('image')) {
        if ($categoryUpdate->image) {
            $oldImagePath = public_path('category_image/' . $categoryUpdate->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image
            }
        }

        $imageName = time() . '_1.' . $request->image->extension();
        $request->image->move(public_path('category_image'), $imageName);
        $categoryUpdate->image = $imageName;
    }

    $categoryUpdate->save();

    return redirect()->back()->with('success', 'Category updated successfully!');
}

public function delete($id)
{
    $Category = Category::find($id);

    $Category->delete();

    return back()->with('success', 'Category deleted successfully!');
}

}
