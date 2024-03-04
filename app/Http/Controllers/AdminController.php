<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tickets;
// use App\Models\Ticket;


class AdminController extends Controller
{
    public function view_category()
    {
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request)
    {
        $data=new Category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully');

    }

    public function delete_category($id)
    {
        $data=Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');
    }
    public function view_ticket()
    {
        $category=category::all();
        return view('admin.ticket' ,compact('category'));
    } 
    public function add_ticket(Request $request)
    {
        $ticket=new Tickets;
        // $ticket=new ticket;
         
        $ticket->ticket=$request->ticket;
        $ticket->Description=$request->Description;
        $ticket->price=$request->price;
        $ticket->category=$request->Category;
        $ticket->attendees=$request->attendees;     
        $ticket->discount_price=$request->discount_price;
       
        if($request->hasfile('Image'))
        {
            $file=$request->file('Image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/tickets/',$filename);
            $ticket->Image=$filename;
        }
        else
        {
            return $request;
            $ticket->Image='';
        }
        $ticket->save();

        return redirect()->back()->with('message','Ticket Added Successfully');

    }

    public function vie_ticket()
    {
        $data=Tickets::all();
        return view('admin.show_ticket',compact('data'));
    }
    public function delete_ticket($id)
    {
        $data=Tickets::find($id);
        $data->delete();
        return redirect()->back()->with('message','Ticket Deleted Successfully');
    }
    public function edit_ticket($id)
    {
        $data=Tickets::find($id);
        $category=category::all();
        
        return view('admin.edit_ticket',compact('data','category'));
    }
    public function update_ticket(Request $request)
    {
        $ticket=Tickets::find($request->id);
        $ticket->ticket=$request->ticket;
        $ticket->Description=$request->Description;
        $ticket->price=$request->price;
        $ticket->category=$request->Category;
        $ticket->attendees=$request->attendees;     
        $ticket->discount_price=$request->discount_price;
       
        if($request->hasfile('Image'))
        {
            $file=$request->file('Image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/tickets/',$filename);
            $ticket->Image=$filename;
        }
        else
        {
            return $request;
            $ticket->Image='';
        }
        $ticket->save();

        return redirect()->back()->with('message','Ticket Updated Successfully');
    }



}
