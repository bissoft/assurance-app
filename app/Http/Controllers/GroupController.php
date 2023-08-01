<?php
    
namespace App\Http\Controllers;
use App\Models\User;    
use App\Models\Group;
use App\Models\GroupUsers;
use Illuminate\Http\Request;
    
class GroupController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:product-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Group::latest()->paginate(5);
        return view('groups.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
           
        ]);
    
        Group::create($request->all());
    
        return redirect()->route('groups.index')
                        ->with('success','Group created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groups=GroupUsers::where('group_id',$id)->with(['user'])->get();
        $users=User::whereHas('roles', function($role) {
                    $role->where('id', '=', '2');
                })->get();
              
        return view('groups.show',compact('groups','id','users'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('groups.edit',compact('group'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
         request()->validate([
            'name' => 'required',
            
        ]);
    
        $group->update($request->all());
    
        return redirect()->route('groups.index')
                        ->with('success','Group updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
    
        return redirect()->route('groups.index')
                        ->with('success','Group deleted successfully');
    }

    public function Teamstore(Request $request)
    {
        request()->validate([
            'user_id' => 'required',
            'group_id' => 'required',
        ]);
        $requestData = $request->except('_token');
        GroupUsers::updateOrCreate($requestData);
    
        return redirect()->back()
                        ->with('success','Group created successfully.');
    }

    public function Teamdestroy($id)
    {
        GroupUsers::find($id)->delete();
    
        return redirect()->back()
                        ->with('success','Team deleted successfully');
    }
}