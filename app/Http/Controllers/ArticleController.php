<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Like;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class ArticleController extends Controller
{
    //show article list
    public function index(Request $request)
    {
//
//        $articles = Article::join('users','users.id','=','articles.user_id')
//                    ->select('articles.*','users.name')->limit(5)->get();
//        $articles = Article::join('users','users.id','=','articles.user_id')
//                    ->select('articles.*','users.name')->get();
        $articles = Article::paginate(5);
        if($request->ajax())
        {
            $view = view('article.data',compact('articles'))->render();
            return response()->json(['html'=> $view]);
        }
//        dd($articles->nextPageUrl());
        return view('article.index' ,compact('articles'));
    }

    public function loadDataAjax(Request $request)
    {


        $output = '';
        $id = $request->id;dd($id);
        $article = Article::where('id',$id)
                ->orderBy('created_at','DESC')->limit(5)->get();
        if(!$article->isEmpty())
        {
            foreach ($article as $article)
            {
                $url = url('crud/'.$article->id);

                $output = '<h1>All Article</h1>
       <table class="table table-striped table-bordered">
        <thead>
        <tr> 
            {{--<td>Name</td>--}}
            <td>Title</td>
            <td>Description</td>
            <td>Actions</td>
        </tr>
        </thead>           <button id="btn-more">see more</button>

           <tbody id="post-data">
                @include(\'data\')
        </tbody>
    </table>
       <div class="ajax-load text-center" style="display:none">
           {{--<p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>--}}
           <button id="btn-more">see more</button>
       </div>';

            }
            $output .= '<div class="remove-row">
                           <button id="btn-more"></button> 
                        </div>';
        }

    }


    //create new article
    public  function create()
    {
        return view('article.add-article');
    }

    //store article data in database
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);
        $article = new  Article();
        $article->user_id =Auth::id();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->save();

        return redirect(route('articles'));
    }

    //update article
    public function edit($id)
    {
        $article = Article::find($id);

        return view('article.edit-article',compact('article'));
    }

    //article data update and store database
    public function update(Request $request , $id)
    {
        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->description = $request->get('description');
        $article->save();

        return redirect(route('articles'));
    }

    //delete article
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return back();
    }

    //show the detail in article
    public function detail($id )
    {

        $article = Article::join('users','users.id','=','articles.user_id')
                 ->select('articles.*','users.name')->find($id);
//        $comments = Comment::with(['article','user'])
//                    ->where('article_id',$id)
//                    ->get();


          $comments = Comment::join('users','users.id','=','comments.user_id')
                ->join('articles','articles.id','=','comments.article_id')
                ->with('reply')
                ->where('comments.article_id' , $id )
                ->select('comments.*','users.name as username')->paginate(2);
//                ->get();

//           $reply = Reply::join('users','users.id','=','reply.user_id')
//            ->join('comments','comments.id','=','reply.comment_id')
//            ->where('reply.comment_id',$id)
//            ->select('reply.*','users.name as username')
//            ->get();dd($reply);

        return view('article.detail',compact('article' , 'comments'))->render();
    }

    //like and dislike user in artilce
    public function unlike($id)
    {
        $article = Article::find($id);
        if(!$article)
        {
            abort(404);
        }

        $alreadyLike =  Like::where(['article_id' => $article->id, 'user_id' => Auth::user()->id])->first();

        if($alreadyLike){
            $alreadyLike->delete();
        }
        else
        {
            $like = new Like();
            $like->user_id = Auth::user()->id;
            $like->article_id = $article->id;
            $like->save();
        }
            return back();
    }

    //show user list to like specific article
    public function likeList($id)
    {
        $likes = Like::with(['article', 'user'])->where('article_id', $id)->get();
        return view('article.user-like-list',compact('likes'));
    }

    //insert Comment on article
    public function comment($id , Request $request)
    {
        $article = Article::find($id);
        if(!$article)
        {
            abort(404);
        }
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->article_id = $article->id;
        $comment->comment = $request->comment;
        $comment->save();

//        return redirect(route('details' , $article));
        return back();
    }


    // comment to replay this commentr
    public function replay(Request $request , $id)
    {

        $comment = Comment::find($id);
        $reply = new Reply();
        $reply->user_id = Auth::user()->id;
        $reply->comment_id = $comment->id;
        $reply->comment = $request->reply;
        $reply->save();

//        return redirect(route('details',$reply));
        return back();
    }

        public function reply($id)
        {

            $reply = Reply::join('users','users.id','=','reply.user_id')
                   ->join('comments','comments.id','=','reply.comment_id')
                   ->where('reply.comment_id',$id)
                   ->select('reply.*','users.name as username')
                   ->get();

    //        return  redirect(route('details',$reply))->back();
            return view('article.reply-list',compact('reply'));

        }
}
