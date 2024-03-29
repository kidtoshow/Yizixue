<?php

namespace App\Http\Controllers;

use App\Post;
use App\QACategoryRelation;
use App\QnA;
use Illuminate\Http\Request;

class GuestQaController extends Controller
{
    public function index(Request $request)
    {

        $query = QnA::query();

        if($request->filled('category_id')){
            $qas_id = QACategoryRelation::where('category_id', $request->category_id)->pluck('qa_id');
            $query->whereIn('id', $qas_id);
        }

        $qas = $query->with('categoryRelation')->paginate();
        $posts = Post::latest('created_at')->limit(2)->get();
        return view('guest_qa.index', compact(['qas', 'posts']));
    }

    public function show($id)
    {
        $qna = QnA::find($id);
        if(is_null($qna)){
            return redirect()->back();
        }
        $sameqna = QACategoryRelation::whereIn('category_id', $qna->categoryRelation->pluck('category_id'))->inRandomOrder()->paginate();

        return view('guest_qa.show', compact(['qna', 'sameqna']));
    }
}
