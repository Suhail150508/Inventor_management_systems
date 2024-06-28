<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Investor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function investorEdit($id){
        $editinvestor = Investor::findOrFail($id);
        return view('investor.investor_update',compact('editinvestor'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = Investor::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;

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

        return redirect('investor')->with('message','Investor updated successfully..');

    }

    public function status(Request $request, $id)
    {
        $posts =  Investor::find($id);

        if($posts->status == 'Active'){
            $posts->update(['status'=>'Inactive']);

        }
        else{
            $posts->update(['status'=>'Active']);
        }
        return redirect('investor')->with('message','changed subCategory');
     }

    public function investorDelete($id){
        DB::beginTransaction();
        try {
            $delete = Investor::find($id)->delete();
            DB::commit($delete);
            return redirect('investor')->with('message','Investor deleted successfully..');

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

    }

}
