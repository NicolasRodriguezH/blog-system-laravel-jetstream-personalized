<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index() {

        /* Se le asigna a la variable los posts publicados mas recientes con latest y los pagina de a 8 */
        $posts = Post::where('status', 2)->latest('id')->paginate(8);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {

        $similares = Post::where('category_id', $post->category_id)
                            ->where('status', 2)
                            ->where('id', '!=', $post->id)
                            ->latest('id')
                            ->take(4)
                            ->get();
        
        return view('posts.show', compact('post', 'similares'));
    }

    public function category(Category $category) {
        $posts = Post::where('category_id', $category->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(6);

        return view('posts.category', compact('posts', 'category'));
    }

    // Metodo para conseguir enlazar los tags con los posts que tengan las mismas y paginado.
    public function tag(Tag $tag) {
        $posts = $tag->posts()->where('status', 2)->latest("id")->paginate(3);

        // A esta vista debemos pasarle dos cosas, el listado de posts, y la informacion de la etiqueta
        return view('posts.tag', compact('posts', 'tag'));
    }
}
