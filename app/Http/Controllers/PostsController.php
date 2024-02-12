<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\User;


class PostsController extends Controller
{
    public function index()
    {

        $postsFromDB =Post::all();

        // $posts = [
        //     ['id' => 1,'title' => 'PHP','posted_by' => 'ali','created_at' => '2020-10-10 09:00:00'],
        //     ['id' => 2,'title' => 'JavaScript','posted_by' => 'ahmed','created_at' => '2021-05-15 14:30:00'],
        //     ['id' => 3,'title' => 'Python','posted_by' => 'mohammed','created_at' => '2022-03-20 10:45:00'],
        //     ['id' => 4,'title' => 'Java','posted_by' => 'fatima','created_at' => '2023-01-01 08:15:00'],
        //     ['id' => 5,'title' => 'C++','posted_by' => 'sara','created_at' => '2023-11-11 16:20:00'],
        //     ['id' => 6,'title' => 'Ruby','posted_by' => 'omar','created_at' => '2022-08-05 12:00:00'],
        //     ['id' => 7,'title' => 'Swift','posted_by' => 'layla','created_at' => '2023-09-30 17:10:00'],
        //     ['id' => 8,'title' => 'HTML','posted_by' => 'nour','created_at' => '2021-12-25 09:45:00'],
        //     ['id' => 9,'title' => 'CSS','posted_by' => 'khaled','created_at' => '2020-11-30 11:20:00'],
        //     ['id' => 10,'title' => 'SQL','posted_by' => 'aya','created_at' => '2022-07-07 13:55:00'],
        //     ['id' => 11,'title' => 'React','posted_by' => 'fadi','created_at' => '2023-04-02 20:00:00']
        // ];
        $name = 'Ali';
        return view('posts.index',['name'=>$name, 'posts' => $postsFromDB]);
    }


    public function show(Post $post)
    {
        // $post = Post::findOrFail($postId);
        // $post=[ 'id'            => 1,
        //         'title'         => 'PHP',
        //         'posted_by'     => 'ali',
        //         'created_at'    => '2020-10-10 09:00:00',
        //         'description'   => 'PHP, which stands for "Hypertext Preprocessor," is a widely-used open-source scripting language primarily designed for web development. Originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994, PHP has since evolved into one of the most popular server-side programming languages, powering millions of websites and web applications worldwide.'
        //     ];
        return view('posts.show',['post'=>$post]);
    }


    public function creat()
    {
        $users = User::all();
        return view('posts.creat',['users' =>$users]);
    }


    public function store(Request $request)
    {
        $data = request()->all();

        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:50',
            'post_creator' => 'required|exists:users,id',
        ]);

        $title= request()->title;
        $description =request()->description;
        $post_creator =request()->post_creator;

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $post_creator,
        ]);


        return to_route('posts.index');
    }


    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit',['users'=>$users,'post' =>$post]);
    }

    public function update(Request $request, $postId)
    {

        //dd($postId);
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:50',
            'post_creator' => 'required|exists:users,id',
        ]);

        $title = $request->title;
        $description = $request->description;
        $post_creator = $request->post_creator;

        $post = Post::findOrFail($postId);
        $post->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $post_creator,
        ]);

        return redirect()->route('posts.show', $postId);
    }


    public function destroy($postId)
    {
        $post = Post::findOrFail($postId); // تأكد من وجود المنشور قبل حذفه
        $post->delete(); // حذف المنشور

        return redirect()->route('posts.index'); // توجيه المستخدم إلى الصفحة التي تعرض جميع المنشورات
    }

}
