<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Jobs\PostFormFields;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     */
    public function index()
    {
        return view('admin.post.index')->withPosts(Post::all());

    }

    /**
     * Show the new post form
     */
    public function create()
    {
        $data = $this->dispatchNow(new PostFormFields());

        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created Post
     * @param PostCreateRequest $request
     * @return mixed
     */
    public function store(PostCreateRequest $request)
    {
        $post = Post::create($request->postFillData());
        $post->syncTags($request->get('tags', []));

        return redirect("/admin/post")
//            ->route('admin.post.index')
            ->withSuccess('New Post Successfully Created.');
    }

    /**
     * Show the post edit form
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function edit($id)
    {

        $data = $this->dispatchNow(new PostFormFields($id));
//        dd($data);

        return view('admin.post.edit', $data);
    }

    /**
     * Update the Post
     * @param PostUpdateRequest $request
     * @param $id
     * @return mixed
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->postFillData());
        $post->save();
        $post->syncTags($request->get('tags', []));

        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Post saved.');
        }

        return redirect("/admin/post")
//        return redirect()
//            ->route('admin.post.index')
            ->withSuccess('Post saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();

        return redirect("/admin/post")
//            ->route('admin.post.index')
            ->withSuccess('Post deleted.');
    }
}
