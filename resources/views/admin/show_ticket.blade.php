<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
      .center{
        margin: auto;
        width: 50%;
        border: 3px solid white;
        text-align: center;
        margin-top: 40px;
      }
      .font_size{
        font-size: 40px;
        padding-top: 40px;
        text-align: center;
      }
      .img_size{
        width: 100px;
        height: 100px;
        }
        .td_color{
            background-color: #4CAF50;
            color: white;
        }
        .th_deg{
            padding: 30px;
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
          @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden ="true">x</button>
                {{session()->get('message')}}


            @endif
            <h2 class="font_size"> All Tickets</h2>

            <table class="center">
                <tr class="td_color ">
                    <td class="th_deg">Ticket</td>
                    <td class="th_deg">Description</td>
                    <td class="th_deg">Category</td>
                    <td class="th_deg">Price</td>
                    <td class="th_deg">Discount Price</td>
                    <td class="th_deg">Attendees</td>
                    <td class="th_deg">Image</td>
                    <td class="th_deg">Edit</td>
                    <td class="th_deg">Delete</td>
                </tr>

                @foreach($data as $data)
                <tr>
                    <td>{{$data->ticket}}</td>
                    <td>{{$data->description}}</td>
                    <td>{{$data->category}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->discount_price}}</td>
                    <td>{{$data->attendees}}</td>
                    <td><img class="img_size" src="{{url('/uploads/tickets/'.$data->image)}}" style="width: 100px; height: 100px;"></td>
                    <td><a class="btn btn-success"href="{{url('/edit_ticket/'.$data->id)}}">Edit</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are You Sure you want DELETE this?')" href="{{url('/delete_ticket/'.$data->id)}}">Delete</a></td>
                </tr>
                    @endforeach



             </table>
  
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>