<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Sprint;

class CommentController extends Controller
{




    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Sprint $sprint)
    {

        $validated = $request->validated();
        $validated['commentable_id'] = $sprint->id;
        $validated['commentable_type'] = Sprint::class;
        $validated['user_id'] = auth()->id();


        Comment::create($validated);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {

        $comment->delete();

        return redirect()->back()->with('success', 'Commentaire supprimé avec succès');
    }
}
