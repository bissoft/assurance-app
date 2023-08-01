<?php
    
namespace App\Http\Controllers;
use App\Models\User;    
use App\Models\Group;
use App\Models\Business;
use App\Models\GroupUsers;
use App\Models\Section;
use App\CustomField;
use Illuminate\Http\Request;
    
class BusinessController extends Controller
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
        $products = Business::latest()->paginate(5);
        return view('business.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.create');
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
    
        Business::create($request->all());
    
        return redirect()->route('business.index')
                        ->with('success','Group created successfully.');
    }

    public function storeCustomer(Request $request)
    {
        
        CustomField::saveData($customer, $request->customField);
        return redirect()->back()
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
        $groups=Business::find($id);
        
        $customFields=Section::where('template_id',$id)->with(['customField'])->orderBy('id','ASC')->get();
        //dd($customFields);
        // $customFields=CustomField::where('module_id','=',$groups->id)->orderBy('order','ASC')->get();
        $types   = CustomField::$fieldTypes;
        $modules = Business::all();
              
        return view('business.show',compact('groups','id','customFields','types','modules'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        return view('business.edit',compact('business'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
         request()->validate([
            'name' => 'required',
            
        ]);
    
        $business->update($request->all());
    
        return redirect()->route('business.index')
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
    
        return redirect()->route('business.index')
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

    public function storeSection(Request $request)
    {
        request()->validate([
            'name' => 'required',
            
        ]);
        
        Section::create($request->all());
    
        return redirect()->back()
                        ->with('success','Section created successfully.');
    }
}