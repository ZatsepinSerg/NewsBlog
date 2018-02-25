<?php

namespace App\Http\Controllers;

use App\Article;
use Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\onAddArticleEvent;



class ArticleController extends Controller
{
   public $article;
   public $user;

    public function __construct()
    {
        $this->article = new Article();
        $this->user = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsAll = $this->article->with('comment')->get();

        if(!count($newsAll)){
            $newsAll= '';
        }

        return view('article.index',compact('newsAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
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
                'title' =>'required|min:5|max:120|unique:articles,title',
                'body' => 'required|min:20',
            ]
        );
        $user = Auth::User();
        $this->article->user_id = $user->id ;
        $this->article->title = $request->title;
        $this->article->body = $request->body;
        $response = $this->article->save();


        if($response){
            $this->user->articleCounter($user->id);

            Event::fire(new onAddArticleEvent($this->article,$user));
            session()->flash('message','Статья успешно добавлена!');
        }else{
            session()->flash('message','произошла ошибка!');
        }

        return redirect()->home();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fullNew = $this->article->find($id);
        $comments = $this->article->find($id)->comment()->get();

        if(!count($comments)){
            $comments ='';
        }
        return view('article.show', compact('fullNew','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
