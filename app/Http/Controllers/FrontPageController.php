<?php

namespace App\Http\Controllers;

use App\Post;
use App\QACategory;
use App\QACategoryRelation;
use Illuminate\Http\Request;
use App\User;
use App\Skill;
use App\UserSkillRelation;
use App\Invite;
use App\CollectUser;
use App\PostCategory;
use App\University;
use Auth;
use Illuminate\Support\Str;

class FrontPageController extends Controller
{
    public function index()
    {
        $users = User::where('expired', '>=', now())->get();

        $Data = [
            'Skills' => new Skill,
            'UserSkillRelation' => new UserSkillRelation,
            'Users' => $users,
            'University' => University::withCount('vip')->orderBy('vip_count', 'desc')->limit(15)->get(),
            'PostCategory' => new PostCategory,
            'QaCategory' => QACategory::with('QACategoryRelation')->get(),
            'Post' => Post::whereIn('uid', $users->pluck('id'))->inRandomOrder()->first()
        ];

        return view('welcome')->with('Data', $Data);
    }

    public function random()
    {
        $users = User::where('expired', ">=", now())->pluck('id');
        $posts = Post::whereIn('uid', $users)->with('category.postCategory')->inRandomOrder()->limit(3)->get();
        $posts->transform(function($item){
            return [
                'id' => $item->id,
                'body' => Str::limit(strip_tags($item->body)),
                'title' => $item->title,
                'image_path' => $item->image_path,
                "category" => $item->category
            ];
        });
        return response()->json($posts);
    }
}
