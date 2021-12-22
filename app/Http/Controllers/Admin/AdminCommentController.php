<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with(['article:id,title'])
            ->withPendingReview()
            ->get()
            ->filter(function($comment) {
                return auth()->user()->can('view', $comment);
            })->paginate(7);

        return view('admin.comments.index', [
            'comments' => $comments,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function articleIndex(Article $article)
    {
        $this->authorize('view', $article);

        $comments = $article
            ->comments()
            ->with(['article:id,title'])
            ->withPendingReview()
            ->get()
            ->filter(function($comment) {
                return auth()->user()->can('view', $comment);
            })->paginate(7);

        return view('admin.comments.index', [
            'comments' => $comments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, Comment $comment)
    {
        $this->authorize('approve', $comment);

        $comment->approve();

        session()->flash('alert.success', 'The comment was approved successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        session()->flash('alert.success', 'The comment was deleted successfully');
        return redirect()->back();
    }
}
