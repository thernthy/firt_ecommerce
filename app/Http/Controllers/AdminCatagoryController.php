<?php namespace App\Http\Controllers;
	use Session;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB; 
    use Illuminate\Support\Facades\Auth; 
    use Illuminate\Support\Facades\Storage;
class AdminCatagoryController extends Controller{
	public function catagory()
		{
            $userType = Auth::user()->user_type;
            if ($userType == 1) {
                $catagory_list = DB::table('catagory')->select(
                    'id',
                    'catagory_name', 
                    'catagory_picture', 
                    'catagory_description')->orderByRaw('updated_at - created_at DESC')->get();
                return view('admin_dashboard.catagory', compact('catagory_list'));
              }else{
                abort(404);
            }
		}
    public function addCatagory(Request $request)
        {
            $catagory_name = $request->input('catagory_name');
            $check_catagory_name = DB::table('catagory')
            ->select('catagory_name')
            ->where('catagory_name', $catagory_name)
            ->get();
            //dd($check_catagory_name);
            if($check_catagory_name->isEmpty()){
                    $request->validate([
                    'catagory_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
                ]);
                if ($request->hasFile('catagory_img')) {
                    $image = $request->file('catagory_img');
                    $imageName = 'catagory_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move('catagory_img', $imageName);
                }
                DB::table('catagory')->insert([
                    'catagory_name' => $catagory_name,
                    'catagory_picture' => $imageName, 
                    'catagory_description' => $request->input('catagory_description'),
                ]);
                return redirect()->back()->with('message_success', 'category has it been add successful');
            }else{
                return redirect()->back()->with('message_error', 'category already exists please change category name!');
            }
    }
    public function deleteCatagory($id) {
        DB::table('catagory')->select()->where('id', $id)->delete();
        return redirect()->back()->with('message_success', 'Category has been deleted!');
    }
    public function viewEdit($id){
        $userType = Auth::user()->user_type;
        if ($userType == 1) {
            $edit_target_catagory = DB::table('catagory')
            ->select('id', 'catagory_name', 'catagory_picture', 'catagory_description')
            ->where('id', $id)
            ->first();
            return view('admin_dashboard.edite_catagory', compact('edit_target_catagory'));
        }else{
            abort(404);
        }
    }
	public function createCatagory()
		{
            $userType = Auth::user()->user_type;
            if ($userType == 1) {
                return view('admin_dashboard.createCatagory');
            }else{
                abort(404);
            }
		}
        
}   


