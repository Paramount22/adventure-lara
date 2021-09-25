<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Auth;
use Illuminate\Http\Request;

use App\Models\Dude;
use App\Models\Tag;

class DudeController extends Controller
{
    /**
     * Get all dudes
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('dudes.index', [
            'dudes' => Dude::with('comments')->get(),
            'comments' => Comment::count()
        ]);
    }


    /**
     * @param Dude $dude
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Dude $dude)
    {
        $dude->load('comments', 'user', 'tags', 'comments.user');
        //dd($dude);
        return view('dudes.show', compact('dude'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::all();
        return view('dudes.create')->with( compact('tags') );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        $dude = Auth::user()->dudes()->create( $request->all() );

        $dude->tags()->sync( $request->get('tags') ?: [] ); // attach tags

        return redirect( url('dudes/' .$dude->slug ) )->with('success', 'Dude added');

    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($slug)
    {
        $dude =Dude::whereSlug($slug)->firstOrFail();

        $tags = Tag::all();

        $this->authorize('edit-dude', $dude);

        return view('dudes.edit')->with(compact('dude', 'tags'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        $dude = Dude::whereSlug($id)->firstOrFail();

        $this->authorize('edit-dude', $dude);

        $dude->update( $request->all() );

        $dude->tags()->sync( $request->get('tags') ?: [] );

        return redirect('dudes/' . $dude->slug)->with('success', 'Dude updated');

    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function delete($slug)
    {
        $dude =Dude::whereSlug($slug)->firstOrFail();

        $this->authorize('edit-dude', $dude);

        return view('dudes.delete')->with(compact('dude'));

    }

    /**
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($slug)
    {
        $dude = Dude::whereSlug($slug)->firstOrFail();

        $this->authorize('edit-dude', $dude);

        $dude->delete();

        return redirect('/')->with('success', 'Dude deleted');

    }



}

