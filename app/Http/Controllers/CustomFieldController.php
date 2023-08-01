<?php

namespace App\Http\Controllers;

use App\CustomField;
use App\Models\Business;
use Illuminate\Http\Request;
use Auth;

class CustomFieldController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        
            $custom_fields = CustomField::where('created_by', '=', Auth::user()->id)->get();

            return view('templates.index', compact('custom_fields'));
        
    }


    public function create()
    {
            $types   = CustomField::$fieldTypes;
            $modules = Business::all();

            return view('templates.create', compact('types', 'modules'));
       
    }


    public function store(Request $request)
    {
            
            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required',
                                   'type' => 'required',
                                   'module_id' => 'required',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $custom_field             = new CustomField();
            $custom_field->name       = $request->name;
            $custom_field->type       = $request->type;
            $custom_field->module_id     = $request->module_id;
            $custom_field->options     = json_encode($request->options);
            $custom_field->created_by = Auth::user()->id;
            $custom_field->section_id = $request->section_id;
            $custom_field->save();

            return redirect()->back()->with('success', __('Custom Field successfully created!'));
        
    }


    public function show(CustomField $customField)
    {
        return redirect()->route('customFields.index');
    }

    public function edit($id)
    {
                $customField   = CustomField::find($id);
                $modules = Business::all();
                $types   = CustomField::$fieldTypes;

                return view('business.edit_custom', compact('customField','types', 'modules'));
           
       
    }


    public function update(Request $request, CustomField $customField)
    {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required',
                                   ]
                );

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $customField->name = $request->name;
                $customField->save();

                return redirect()->back()->with('success', __('Custom Field successfully updated!'));
            
            
        
        
    }


    public function destroy(CustomField $customField)
    {
               
                $customField->delete();

                return redirect()->back()->with('success', __('Custom Field successfully deleted!'));
           
    }

    public function duplicate($id)
    {
		CustomField::find($id)->replicate()->save();

        return redirect()->back()->with('success', __('Custom Field successfully created!'));

    }

    public function sortable(Request $request)
    {
        $posts = CustomField::where('module',$request->business_id)->get();

        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['order' => $order['position']]);
                }
            }
        }
        
        return response('Update Successfully.', 200);
    }
}
