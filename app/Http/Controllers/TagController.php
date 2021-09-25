<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
      $tag = Tag::findOrFail($id);

      return view('tags.show')
          ->with( compact('tag') )
          ->with('dudes', $tag->dudes); //  $tag->dudes - vztahy v modeli medzi tags  a dudes
    }
}
