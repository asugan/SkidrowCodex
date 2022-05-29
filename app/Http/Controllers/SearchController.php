<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Search(Request $request)
    {
      $q = $request->input('search');
      $results = Post::where('post_name', 'LIKE', '%' . $q . '%')
      ->paginate(9);
      $results->appends(['search' => $q]);

      return view('result', compact('results'));
  
    }
}