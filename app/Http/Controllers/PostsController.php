<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function userStore(Request $request)
    {
        $post_information = new Posts();
        $post_information->name = $request->name;
        $post_information->email = $request->email;
        $post_information->mobile = $request->mobile;
        $post_information->address = $request->address;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('teacher', $fileName);
            $post_information->image = $fileName;
        }

        $post_information->save();

        return back();
    }

    public function userEdit($id){
        $editPost = Posts::findOrFail($id);
        return view('layouts.user_update',compact('editPost'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = Posts::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;

        if ($request->image) {
            if ($user->image) {

                unlink(public_path('teacher/' . $user->image));
            }

            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('teacher', $fileName);
            $user->image = $fileName;
        }

        $user->save();

        return redirect()->to('/home');
    }

    public function status(Request $request, $id)
    {   $posts=  Posts::find($id);
        if($posts->status == 'Active'){

            $posts->update(['status'=>'Inactive']);

        }
        else{
            $posts->update(['status'=>'Active']);
        }
        return redirect()->back()->with('message','changed subCategory');
   }

   public function userDelete($id){
     $delete = Posts::find($id)->delete();
     if($delete){
        return redirect()->to('/home');
     }
   }

}
