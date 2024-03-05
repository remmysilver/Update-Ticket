<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tickets;
use Illuminate\Support\Facades\Validator;

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
    public function edit_ticket_confirm($id, Request $request)
{
    // Define your validation rules
    $rules = [
        'ticket' => 'required|string|max:255',
        'Description' => 'required|string',
        'price' => 'required|numeric',
        'discount_price' => 'numeric',
        'attendees' => 'required|numeric',
        'Category' => 'required|string',
        // Add more rules as needed
    ];

    // Create a validator instance
    $validator = Validator::make($request->all(), $rules);

    // Check if validation fails
    if ($validator->fails()) {
        // Return back with errors and old input
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    $ticket = Tickets::find($id);
    $ticket->ticket = $request->ticket;
    $ticket->Description = $request->Description;
    $ticket->price = $request->price;
    $ticket->category = $request->Category; // Updated variable name
    $ticket->attendees = $request->attendees;
    $ticket->discount_price = $request->discount_price;

    if ($request->hasfile('Image')) {
        $file = $request->file('Image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/tickets/', $filename);
        $ticket->Image = $filename;
    } else {
        // You might want to handle the case when no new image is uploaded
        $ticket->Image = $ticket->Image;
    }

    $ticket->save();

    return redirect()->back()->with('message', 'Ticket Updated Successfully');
}

    



}
