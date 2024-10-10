<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
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



        <div align="center" style="margin-left:450px;">

            <form action="{{url('/update',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="padding: 10px;">
                    <label>Title</label>
                    <input style="color: black;" type="text" name="title" value="{{$data->title}}" required>
                </div>

                <div style="padding: 10px;">
                    <label>Price</label>
                    <input style="color: black;" type="number" name="price" value="{{$data->price}}" required>
                </div>

                <div style="padding: 10px;">
                    <label>Description</label>
                    <input style="color: black;" type="text" name="description" value="{{$data->description}}" required>
                </div>

                <div style="padding: 10px;">
                    <label>Old Image</label>
                    <img style="height: 200px;width:200px;" src="/foodimage/{{$data->image}}">
                </div>

                <div style="padding: 10px;">
                    <label>New Image</label>
                    <input type="file" name="image"  required>
                </div>

                <div style="padding: 10px;">

                    <input class="btn btn-primary" type="submit" value="Save">
                </div>

            </form>

        </div>












    </div>
        </div>
    </div>



    <!-- container-scroller -->
  @include('admin.scripts')
  </body>
</html>
