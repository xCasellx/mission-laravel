<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Mail\CommentShipped;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $comm = Comment::create([
            "text" => $text,
            "user_id" => Auth::user()["id"],
            "parent_id" => $parent_id
        ]);
        Mail::to(Auth::user())->send(new CommentShipped($comm, false));
        if($parent_id !== null) {
            $user = Comment::where("parent_id", $parent_id)->select("users.email")
                ->join("users", "comments.user_id", "users.id")->get();

            $c = Comment::where("comments.id", $comm["id"])->select("comments.*","users.first_name", "users.second_name")
                ->join("users", "comments.user_id", "users.id")->get()[0];
            Mail::to($user)->send(new CommentShipped($c,true));
        }

        return redirect()->back()->with('message_success', 'Comment created');
    }

    public function update(Request $request)
    {
        $request->validate([
            "text" => ['required', 'string', 'max:512']
        ]);
        $text = $request["text"];
        $comment_id = $request["comment_id"];
        Comment::find($comment_id)
                 ->update(["text" => $text]);
        return redirect()->back()->with('message_success', 'Edit success');
    }


    public function delete($id)
    {
        $comment = Comment::find($id);
        if($comment->user_id === Auth::user()->id)
        {
            $comment->delete();
            return redirect()->back()->with('message_success', 'Deleted success');
        }
        return redirect()->back()->with('message_error', 'Deleted error');
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
