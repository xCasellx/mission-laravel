<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function index()
    {
        $comment = Comment::where("parent_id", null)->select("comments.*","users.first_name", "users.second_name", "users.folder")
            ->join("users", "comments.user_id", "users.id")->get();

        foreach ($comment as $key => $value) {
            $comment[$key]["child"] = $this->mass($value);
            $comment[$key]["image"] = ($comment[$key]["folder"] === null)? 'images/nan.png' : "users/".$comment[$key]["folder"].'/avatar.png?'.time();
        }

        return view("comments")->with("comments" , $comment);
    }

    public function create(Request $request)
    {
        $request->validate([
            "text" => ['required', 'string', 'max:512']
        ]);
        $text = $request["text"];
        $parent_id = (isset($request["parent_id"]))? $request["parent_id"] : null;
        Comment::create([
            "text" => $text,
            "user_id" => Auth::user()["id"],
            "parent_id" => $parent_id
        ]);
        return redirect()->back()->with('message_success', 'Comment created');
    }


    public  function mass($arr)
    {
        $comment = Comment::where("parent_id", $arr["id"])->select("comments.*","users.first_name", "users.second_name","users.folder")
            ->join("users", "comments.user_id", "users.id")->get();
        foreach ($comment as $key => $value) {
            $comment[$key]["child"] = $this->mass($value);
            $comment[$key]["image"] = ($comment[$key]["folder"] === null)? 'images/nan.png' : "users/".$comment[$key]["folder"].'/avatar.png?'.time();
        }
        return $comment;
    }

}
