<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\NewsImage;
use DB;
use Carbon\Carbon;
use Illuminate\Routing\Route;

class NewsController extends Controller
{
    /**
     * PAGE: Admin/News/
     * GET: /admin/news/
     * This method handles the index view of News
     * @param
     * @return
     */
    public function admin_index(){
        $meta = array(
            'title' => 'News Index',
            'description' => 'News index',
            'section' => 'News',
            'subSection' => 'News'
        );
        if(isset($_GET['keywords']) && !empty($_GET['keywords'])){
            $news = News::where('title', 'like', '%'.$_GET['keywords'].'%')
                ->orderBy('created_at', 'DESC')
                ->paginate(20);
        }else{
            $news = News::orderBy('created_at', 'DESC')->paginate(20);
        }

        return view('news/admin/index', compact('news', 'meta'));
    }

    /**
     * PAGE: Admin/News/Create
     * GET: /admin/news/create
     * This method handles the creation view of News
     * @param
     * @return
     */
    public function admin_createShow(){
        $meta = array(
            'title' => 'News Index',
            'description' => 'News index',
            'section' => 'News',
            'subSection' => 'News'
        );

        $categories = DB::table('categories')->where('is_active', 1)->pluck('name', 'id');
        $tags = DB::table('tags')->where('is_active', 1)->pluck('name', 'id');
        $images = DB::table('news_images')->where('is_active', 1)->get();

        return view('news/admin/create', compact('meta', 'categories', 'tags', 'images'));
    }

    /**
     * PAGE: Admin/News/Create
     * POST: /admin/news/create
     * This method handles the creation of News
     * @param Request $request
     * @return
     */
    public function admin_create(Request $request){
        $this->validate($request, [
            'title' => array('required','unique:news', 'max:255'),
            'category_id' => 'Integer',
            'text' => 'required',
            'publish_date' => 'required|Date',
            'is_active' => 'Integer'
        ]);

        $news = News::create(array(
                'title' => $request->title,
                'slug' => $this->FormatUrl($request->title),
                'text' => $request->text,
                'publish_date' => $request->publish_date,
                'is_active' => $request->is_active,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description
            )
        );

        if($request->has('categories')) {
            $news->category()->sync($request->categories);
        }

        if($request->has('tags')) {
            $news->tag()->sync($request->tags);
        }

        return redirect('/admin/news/')->with('status', 'News added successfully.');
    }

    /**
     * PAGE: Admin/News/Delete
     * GET: /admin/news/delete
     * This method handles the deletion view of News
     * @param News $news
     * @return
     */
    public function admin_deleteShow(News $news){
        $meta = array(
            'title' => 'News Delete',
            'description' => 'News Delete',
            'section' => 'News',
            'subSection' => 'News'
        );

        return view('news/admin/delete', compact('meta', 'news'));
    }

    /**
     * PAGE: Admin/News/Delete
     * POST: /admin/news/delete
     * This method handles the deletion view of News
     * @param News $news
     * @return
     */
    public function admin_delete(News $news){
        $news->delete();

        return redirect('/admin/news/')->with('status', 'News deleted successfully.');
    }

    /**
     * PAGE: Admin/News/edit
     * GET: /admin/news/edit
     * This method handles the edit view of News
     * @param News $news
     * @return
     */
    public function admin_editShow(News $news){
        $meta = array(
            'title' => 'News Edit',
            'description' => 'News edit',
            'section' => 'News',
            'subSection' => 'News'
        );

        if(isset($news->category[0]) && !empty($news->category[0])) {
            foreach ($news->category as $category) {
                $temp['categories'][] = $category->pivot->category_id;
            }

            $news->append($temp);

        }

        //have to add another append manually because laravel seems to only handle one append!!
        if(isset($news->tag[0]) && !empty($news->tag[0])) {
            foreach ($news->tag as $tag) {
                $temp2[] = $tag->pivot->tag_id;
            }
            $news['tags'] = $temp2;
        }

        $categories = DB::table('categories')->where('is_active', 1)->pluck('name', 'id');
        $tags = DB::table('tags')->where('is_active', 1)->pluck('name', 'id');
        $images = DB::table('news_images')->where('is_active', 1)->where('news_id', '=', $news->id)->get();

        return view('news/admin/create', compact('meta', 'news', 'categories', 'tags', 'images'));
    }

    /**
     * PAGE: Admin/News/edit
     * POST: /admin/news/edit
     * This method handles the editing of News
     * @param Request $request News $news
     * @return
     */
    public function admin_edit(Request $request, News $news){
        $this->validate($request, [
            'title' => array('required','unique:news,title,'.$news->id, 'max:50'),
            'category_id' => 'Integer',
            'text' => 'required',
            'publish_date' => 'required|Date',
            'is_active' => 'Integer'
        ]);

        $news->update(array(
                'title' => $request->title,
                'slug' => $this->FormatUrl($request->title),
                'text' => $request->text,
                'publish_date' => $request->publish_date,
                'is_active' => $request->is_active,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description
            )
        );

        if($request->has('categories')) {
            $news->category()->sync($request->categories);
        }

        if($request->has('tags')) {
            $news->tag()->sync($request->tags);
        }
        return redirect('/admin/news/')->with('status', 'News Edited successfully.');
    }

    /**
     * PAGE: News
     * GET: /news
     * This method handles the index view of News
     * @param
     * @return
     */
    public function index(Request $request){
        $meta = array(
            'title' => 'Articles',
            'description' => '',
            'section' => 'Articles',
            'subSection' => 'Articles'
        );

        $route = $request->path();
        //if we come from one of the three hard coded categories
        if($route == 'games' || $route == 'kickstarters' || $route == 'aob'){
            if(isset($_GET['keywords']) && !empty($_GET['keywords'])) {
                $news = News::whereHas('category', function($q) use ($route){
                    $q->where('name', '=', $route);
                    $q->where('title', 'like', '%' . $_GET['keywords'] . '%');
                    $q->where('publish_date', '<',  Carbon::now());
                    $q->where('is_active', '=', '1');
                })
                    ->orderBy('publish_date', 'DESC')
                    ->paginate(5);
            }elseif(isset($_GET['category']) && !empty($_GET['category'])){
                $news = News::whereHas('category', function($q){
                    $q->where('name', '=', $_GET['category']);
                    $q->where('publish_date', '<',  Carbon::now());
                    $q->where('is_active', '=', '1');
                })
                    ->orderBy('publish_date', 'DESC')
                    ->paginate(5);
            }elseif(isset($_GET['tag']) && !empty($_GET['tag'])){
                $news = News::whereHas('tag', function($q){
                    $q->where('name', '=', $_GET['tag']);
                    $q->where('publish_date', '<',  Carbon::now());
                    $q->where('is_active', '=', '1');
                })
                    ->orderBy('publish_date', 'DESC')
                    ->paginate(5);
            }else{
                $news = News::whereHas('category', function($q) use ($route){
                    $q->where('name', '=', $route);
                    $q->where('publish_date', '<',  Carbon::now());
                    $q->where('is_active', '=', '1');
                })
                    ->orderBy('publish_date', 'DESC')
                    ->paginate(5);
            }
            //or we''re coming here from more general index page.
        }else{
            if(isset($_GET['keywords']) && !empty($_GET['keywords'])) {
                $news = News::where('title', 'like', '%' . $_GET['keywords'] . '%')
                    ->where('publish_date', '<',  Carbon::now())
                    ->where('is_active', '=', '1')
                    ->orderBy('publish_date', 'DESC')
                    ->paginate(5);

            }elseif(isset($_GET['category']) && !empty($_GET['category'])){
                $news = News::whereHas('category', function($q){
                    $q->where('name', '=', $_GET['category']);
                    $q->where('publish_date', '<',  Carbon::now());
                    $q->where('is_active', '=', '1');
                })
                    ->orderBy('publish_date', 'DESC')
                    ->paginate(5);
            }elseif(isset($_GET['tag']) && !empty($_GET['tag'])){
                $news = News::whereHas('tag', function($q){
                    $q->where('name', '=', $_GET['tag']);
                    $q->where('publish_date', '<',  Carbon::now());
                    $q->where('is_active', '=', '1');
                })
                    ->orderBy('publish_date', 'DESC')
                    ->paginate(5);
            }else{
                $news = News::orderBy('publish_date', 'DESC')->where('publish_date', '<',  Carbon::now())->where('is_active', '=', '1')->paginate(5);
            }
        }

        $otherNews = News::orderBy('publish_date', 'ASC')->where('publish_date', '<',  Carbon::now())->limit(4)->get();

        $categories = DB::table('categories')->where('is_active', 1)->pluck('name', 'id');
        $tags = DB::table('tags')->where('is_active', 1)->pluck('name', 'id');


        return view('news/index', compact('news', 'meta', 'categories', 'tags', 'route', 'otherNews'));
    }

    /**
     * PAGE: News/{{slug}}
     * GET: /news/{{slug}}
     * This method handles the view of News
     * @param String $slug
     * @return
     */
    public function view($slug){
        $meta = array(
            'title' => 'Articles',
            'description' => '',
            'section' => 'Articles',
            'subSection' => 'Articles'
        );

        $news = News::where('slug', $slug)->with('Category')->first();

        if(isset($news->newsImages[0])) {
            $facebook = array(
                'og:title' => $news->title,
                'og:url' => env('APP_URL') . '/view/' . $news->slug,
                'og:type' => 'Website',
                'og:description' => $news->meta_description,
                'og:image' => env('APP_URL') . '/' . $news->newsImages[0]['image']
            );
        }

        //changing the meta title and description if we have some from the data.
        if(isset($news) && !empty($news)){
            if(isset($news->meta_title) && !empty($news->meta_description)){
                $meta['title'] = $news->meta_title;
            }
            if(isset($news->meta_description) && !empty($news->meta_description)){
                $meta['description'] = $news->meta_description;
            }
        }


        $categories = DB::table('categories')->where('is_active', 1)->pluck('name', 'id');
        $tags = DB::table('tags')->where('is_active', 1)->pluck('name', 'id');
        $otherNews = News::orderBy('publish_date', 'ASC')->where('publish_date', '<',  Carbon::now())->where('id', '<>', $news->id)->limit(4)->get();


        return view('news/view', compact('news', 'facebook', 'meta', 'categories', 'tags', 'otherNews'));
    }
}
