<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private $data;
    public function __construct(CategoryRepositoryInterface $category){
        $this->data = $category;
    }

    public function index(Request $request)
    {        
        // $perPage = $request->has('plimit')?$request->input('plimit'):10;
        // $name = $request->name;
        
        // $data = Category::orderby('id')
        // ->when($name, function($q) use($name){
        //     return $q->where('name','like',"%{$name}%");
        // })
        // ->when($request->status, function($q) use($request){
        // return $q->where('status',$request->status);
        // })
        // ->paginate($perPage);
        $data = $this->data->all();

        return view('category.category',compact('data'));
    }
 
    // 
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);
        
        $request->created_by = $request->user()->id;
        $request->updated_by = $request->user()->id;
        
        if($request->attachments != null){
            foreach($request->attachments as $key=>$old_fname){
                
                $newName = $request->client_id.'_'.$key.'_'.time();
                $destinationPath = '/uploads/products/brand/' . date('Y') . '/' . date('m') . '';
                
                $uploadres =  $this->saveFileUpload2($old_fname, $newName, $destinationPath, 1024);
                // return $request->attachments;
               $request->attachments = $destinationPath . '/' . $uploadres['imagename'];
            }
        }
        // dd($request);
        // return $request->logo_icon;

        
        $this->data->store($request->all());

        $request->session()->flash('success');
        return redirect()->back();
    }

    public function saveFileUpload2($image, $fname = '', $path = '', $fsize = 1024)
    {
        if(empty($image)) return 0;
        if (empty($fname)) $fname = time();
       // $image = $request->filename;
        $input['imagename'] = $fname . '.' . $image->getClientOriginalExtension();
        if (empty($path)) {
            $destinationPath = public_path('./uploads/' . date('Y') . '/' . date('m') . '');
        } else $destinationPath = public_path($path);

        $input['destinationPath'] = $destinationPath;
        $image->move($destinationPath, $input['imagename']);

        return $input;
        return back()->with('success', 'File Upload successful');
    }

    public function edit(Category $category){
        $data = $this->data->get($id);
        return view('edit', compact('data'));
    }
 
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $request->updated_by = $request->user()->id;
        $this->data->update($id, $request->all());
        $request->session()->flash('success');
        return redirect()->back();
    }

    public function destroy(Category $category, $id)
    {
        $this->data->delete();

        $request->session()->flash('success');
        return redirect()->back();
    }
}
