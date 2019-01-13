<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use DB;

class TagsController extends Controller
{
    /**
     * PAGE: Admin/Tags/
     * GET: /admin/tags/
     * This method handles the index view of Tags
     * @param
     * @return
     */
    public function admin_index(){
        $meta = array(
            'title' => 'Tags Index',
            'description' => 'Tags index',
            'section' => 'News',
            'subSection' => 'Tags'
        );
        if(isset($_GET['keywords']) && !empty($_GET['keywords'])){
            $tags = Tag::where('name', 'like', '%'.$_GET['keywords'].'%')
                ->orderBy('created_at', 'ASC')
                ->paginate(20);
        }else{
            $tags = Tag::paginate(20);
        }
        return view('tags/admin/index', compact('tags', 'meta'));
    }

    /**
     * PAGE: Admin/Tags/Create
     * GET: /admin/tags/create
     * This method handles the creation view of Tags
     * @param
     * @return
     */
    public function admin_createShow(){
        $meta = array(
            'title' => 'Tags Index',
            'description' => 'Tags index',
            'section' => 'News',
            'subSection' => 'Tags'
        );

        return view('tags/admin/create', compact('meta', 'tags'));
    }

    /**
     * PAGE: Admin/Tags/Create
     * POST: /admin/tags/create
     * This method handles the creation of Tags
     * @param Request $request
     * @return
     */
    public function admin_create(Request $request){
        $this->validate($request, [
            'name' => array('required','unique:tags', 'max:255'),
            'is_active' => 'Integer'
        ]);


        Tag::create(array(
                'name' => $request->name,
                'is_active' => $request->is_active
            )
        );

        return redirect('/admin/tags/')->with('status', 'Tags added successfully.');
    }

    /**
     * PAGE: Admin/Tags/Delete
     * GET: /admin/tags/delete
     * This method handles the deletion view of Tags
     * @param Tags $tags
     * @return
     */
    public function admin_deleteShow(Tag $tags){
        $meta = array(
            'title' => 'Tags Delete',
            'description' => 'Tags Delete',
            'section' => 'News',
            'subSection' => 'Tags'
        );

        return view('tags/admin/delete', compact('meta', 'tags'));
    }

    /**
     * PAGE: Admin/Tags/Delete
     * POST: /admin/tags/delete
     * This method handles the deletion view of Tags
     * @param Tag $tags
     * @return
     */
    public function admin_delete(Tag $tags){
        $tags->delete();

        return redirect('/admin/tags/')->with('status', 'Tags deleted successfully.');
    }

    /**
     * PAGE: Admin/Tags/edit
     * GET: /admin/tags/edit
     * This method handles the edit view of Tags
     * @param Tag $tags
     * @return
     */
    public function admin_editShow(Tag $tags){
        $meta = array(
            'title' => 'Tags Edit',
            'description' => 'Tags edit',
            'section' => 'News',
            'subSection' => 'Tags'
        );

        return view('tags/admin/create', compact('meta', 'tags'));
    }

    /**
     * PAGE: Admin/Tags/edit
     * POST: /admin/tags/edit
     * This method handles the editing of Tags
     * @param Request $request Tag $tags
     * @return
     */
    public function admin_edit(Request $request, Tag $tags){
        $this->validate($request, [
            'name' => array('required','unique:tags,name,'.$tags->id, 'max:255'),
            'is_active' => 'Integer'
        ]);

        $input = array(
            'name' => $request->name,
            'is_active' => $request->is_active
        );

        $tags->update($input);
        return redirect('/admin/tags/')->with('status', 'Tags Edited successfully.');
    }
}
