<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'dude_id' => 'required|integer|exists:dudes,id'
        ]);

        $comment =  auth()->user()->comments()->create( $request->all() );

        return redirect('dudes/' . $comment->dude->slug . '#comments' )->with('success', 'Comment added');

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
            'text' => 'required|min:3',
        ]);

        $comment = Comment::findOrFail($id);

        $this->authorize('edit-comment', $comment);

        $comment->update( $request->all() );

        return redirect('dudes/' . $comment->dude->slug . '#comments' )->with('success', 'Comment updated');

    }

    public function destroy($id)
    {
        $comment = Comment::findOrfail($id);

        try {
            $this->authorize('edit-comment', $comment);
        } catch (AuthorizationException $e) {
        }

        $comment->delete();

        return redirect()->route('dude.show', $comment->dude->slug)->with('success', 'Comment deleted');



    }
}
