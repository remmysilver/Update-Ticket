<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">"
    @include('admin.css')
    <style type="text/css">
      .div_center{
        text-align: center;
        padding-top: 50px;
      }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color{
            color: black;
            padding-bottom: 12px 20px;
            
        }
        label{
            display: inline-block;
            width: 140px;
        } 
        .div_design{
            padding-bottom: 15px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      
     
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div class="div_center">
                <h1 class="h2_font">Add Tickets</h1>
                
                <form action="{{url('/add_ticket')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_design">
                <label>Ticket Name:</label>
                <input class="input_color" type="text" name="ticket" placeholder="Write Ticket name" Required="" 
                value="{{$data->ticket}}">
                </div>

                <div class="div_design">
                <label>Description:</label>
                <input class="input_color" type="text" name="Description" placeholder="Write Ticket Description" Required="" 
                value="{{$data->ticket}}">
                </div>

                <div class="div_design">
                <label>Price:</label>
                <input class="input_color" type="number" name="price" placeholder="Write Ticket Price" Required="" 
                value="{{$data->price}}">
                </div>

                <div class="div_design">
                <label>Discount Price:</label>
                <input class="input_color" type="number" name="discount_price" placeholder="Write Ticket Discount Price"
                value="{{$data->discount_price}}">
                </div>

                <div class="div_design">
                <label>Attendees:</label>
                <input class="input_color" type="number" min=0 name="attendees" placeholder="No of Attendees" value="{{$data->attendees}}">
                </div>

                <div class="div_design">
                <label>Category:</label>
                <select class="input_color" name="Category" Required>
                    <option value="{{$data->category}}" selected="">{{$data->category}}</option>
                    
                </select>

                <div class="div_design">
                <label>Current Event Image Here:</label>
                <img src="{{/tickets('images/'.$data->image)}}" class="img_size">
                </div>

                <div class="div_design">
                <label>Change Event Image Here:</label>
                <input type="file" name="Image" Required>
                </div>

                <div class="div_design">
                <input type="Submit" value="Add Ticket" class="btn btn-primary">
                </div>

              </form>
          </div>
            
          </div>

        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>

