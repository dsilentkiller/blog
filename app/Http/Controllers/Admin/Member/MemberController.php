<?php

namespace App\Http\Controllers\Admin\Member;

use Illuminate\Http\Request;
use App\Models\Admin\Member\Member;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
   public function index(){
    return view('admin.member.show');
   }

   public function getMembers(){
    $members = Member::all();
    return view('show')->with('members',$members);
   }
   public function save(Request $request){
    $member = new Member;
    $member->firstname= $request->input('firstname');
    $member->lastname= $request->input('lastname');
    $member->save();
    return redirect('/');

   }

   public function update(Request $request, $id){
    $member = Member::find($id);
    $input= $request->all();
    $member->fill($input)->save();
    return redirect('/');
   }

   public function delete ($id){
    $members = Member::find($id);
    $members->delete();
    return redirect('/');

   }
}
