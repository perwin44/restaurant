<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.css')

  </head>
  <body>

    @include('admin.navbar')

    @include('admin.header')

    <div class="main-panel">
        <div class="content-wrapper">
            @if (session()->has('message'))
            <div class="alert alert-success">

                <button type="button" class="close" aria-hidden="true" data-dismiss="alert">x</button>

                {{ session()->get('message') }}

            </div>
            @endif
    <div class="container-scroller">


        <div align="center" style="margin-left:250px;">

            <form action="{{url('/upload_food')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="padding: 10px;">
                    <label>Title</label>
                    <input style="color: black;" type="text" name="title" placeholder="Write a title" required>
                </div>

                <div style="padding: 10px;">
                    <label>Price</label>
                    <input style="color: black;" type="number" name="price" placeholder="Write a price" required>
                </div>

                <div style="padding: 10px;">
                    <label>Image</label>
                    <input style="color: black;" type="file" name="image"  required>
                </div>

                <div style="padding: 10px;">
                    <label>Description</label>
                    <input style="color: black;" type="text" name="description" placeholder="Write a description" required>
                </div>

                <div style="padding: 10px;">

                    <input class="btn btn-primary" type="submit" value="Save">
                </div>

            </form>

            <div>

                <table >

                    <tr style="background-color: hotpink">
                        <th style="padding: 30px;">Food Name</th>
                        <th style="padding: 30px;">Price</th>
                        <th style="padding: 30px;">Description</th>
                        <th style="padding: 30px;">Image</th>
                        <th style="padding: 30px;">Action</th>
                        <th style="padding: 30px;">Action2</th>
                    </tr>

                    @foreach ($data as $data)

                    <tr align="center"style="background-color: gray" >
                        <td>{{$data->title}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->description}}</td>
                        <td>
                            <img style="height: 200px;width:200px;" src="/foodimage/{{$data->image}}">
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{url('/delete_menu',$data->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{url('/update_view',$data->id)}}">Update</a>
                        </td>
                    </tr>
                    @endforeach

                </table>

            </div>

        </div>























    </div>
        </div>
    </div>



    <!-- container-scroller -->
  @include('admin.scripts')
  </body>
</html>
