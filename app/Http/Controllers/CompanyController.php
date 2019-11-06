<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index($id, Company $company){
        return view('company.index',compact('company'));
    }

    public function create(){
        return view('company.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'address'=> 'required',
            'phone'=> 'required',
            'website'=> 'required',
            'slogan'=> 'required',
            'description'=> 'required',

        ]);
        $user_id = auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'address' => request('address'),
            'phone' => request('phone'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'description' => request('description'),

        ]);
        return redirect()->back()
            ->with('message','Your Company Profile Updated Successfully');
    }
    public function coverphoto(Request $request){
        $this->validate($request,[
            'cover_photo'=> 'required|mimes: jpg,png,jpeg|max:20000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');
            $text = $file->getClientOriginalExtension();
            $fileName =time().'.'.$text;
            $file->move('uploads/cover',$fileName);
            Company::where('user_id',$user_id)->update([
                'cover_photo' => $fileName
            ]);
            return redirect()->back()
                ->with('message','Cover Photo Updated Successfully');
        }
    }

    public function logo(Request $request){
        $this->validate($request,[
            'logo'=> 'required|mimes: jpg,png,jpeg|max:1024'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $text = $file->getClientOriginalExtension();
            $fileName =time().'.'.$text;
            $file->move('uploads/avatar',$fileName);
            Company::where('user_id',$user_id)->update([
                'logo' => $fileName
            ]);
            return redirect()->back()
                ->with('message','Logo Updated Successfully');
        }
    }





















}
