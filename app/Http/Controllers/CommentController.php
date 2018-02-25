<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public $comment;

    public function __construct()
    {
        $this->comment = new Comment();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,[
                'articleId' =>'integer',
                'body' => 'required|min:2',
            ]
        );

        $user = Auth::User();
        $this->comment->article_id = $request->articleId ;
        $this->comment->parent_id = 0;
        $this->comment->user_id = $user->id;
        $this->comment->body = $request->body;
        $response = $this->comment->save();


        if($response){
            $comment['id'] = $this->comment->id;
            $comment['body'] = $this->comment->body;

            return view('ajax.comment',compact('comment'))->render();
        }else{
            $article =  'произошла ошибка!';

            return response()->json($article, 503);
        }
    }


    public function parentCommentStore(Request $request)
    {
        $this->validate(
            $request,[
                'articleId' =>'integer',
                'parentId' =>'integer',
                'body' => 'required|min:2',
            ]
        );

        $user = Auth::User();
        $this->comment->article_id = $request->articleId ;
        $this->comment->parent_id = $request->parentId;
        $this->comment->user_id = $user->id;
        $this->comment->body = $request->body;
        $response = $this->comment->save();

        if($response){
            $comment['id'] = $this->comment->id;
            $comment['parentId'] = $request->parentId;
            $comment['body'] = $this->comment->body;

            return view('ajax.parentComment',compact('comment'))->render();
        }else{
            $article =  'произошла ошибка!';

            return response()->json($article, 503);
        }
    }
}
