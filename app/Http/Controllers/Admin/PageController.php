<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
  public function index(Request $request)
  {
    // Fetch pages with optional search keyword and order by created_at in ascending order
    $query = Page::orderBy('created_at', 'ASC');

    if (!empty($request->keyword)) {
      $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    // Paginate the results
    $pages = $query->paginate(10);

    // Return the view with paginated pages
    return view('admin.pages.list', [
      'pages' => $pages,
    ]);
  }
  public function create()
  {
    return view('admin.pages.create');
  }
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
    ]);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        'errors' => $validator->errors()
      ]);
    }

    $page = new Page;
    $page->name = $request->name;
    $page->content = strip_tags($request->content); //  Remove all HTML tags
    $page->save();

    $message = 'Pages store Successfully';
    session()->flash('success', $message);
    return response()->json([
      'status' => true,
      'message' => $message
    ]);
  }
  public function edit($id)
  {
    $page = Page::findOrFail($id);
    if ($page == null) {
      session()->flash('error', 'Page Not found.');
      return redirect()->route('pages.index');
    }
    return view('admin.pages.edit', [
      'page' => $page
    ]);
  }
  public function update(Request $request, $id)
  {
    // Find the page, if not found return 404
    $page = Page::find($id);

    if (!$page) {
      return response()->json([
        'status' => false,
        'message' => 'Page not found'
      ], 404);
    }

    // Validate request data
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'content' => 'required|string',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        'errors' => $validator->errors()
      ], 422); // Unprocessable Entity
    }

    // Update page details
    $page->name = $request->name;
    $page->content = strip_tags($request->content); //  Remove all HTML tags
    $page->save();

    return response()->json([
      'status' => true,
      'message' => 'Page updated successfully'
    ]);
  }

  public function destroy($id)
  {
    $page = Page::findOrFail($id);

    if ($page == null) {

      $message = 'Page Not found';
      session()->flash('error', $message);
      return response()->json([
        'status' => false,
        'message' => $message
      ]);
    }
    $page->delete();
    $message = 'Pages Deleted Successfully';
    session()->flash('success', $message);
    return response()->json([
      'status' => true,
      'message' => $message
    ]);
  }
}
