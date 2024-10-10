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

        <div align="center" style="margin-left:350px;">

            <form action="{{url('/update_foodchef',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="padding: 10px;">
                    <label>Chef Name</label>
                    <input style="color: blue" type="text" name="name" value="{{$data->name}}">
                </div>

                <div style="padding: 10px;">
                    <label>Speciality</label>
                    <input style="color: blue" type="text" name="speciality" value="{{$data->speciality}}">
                </div>

                <div style="padding: 10px;">
                    <label>Old Image</label>
                    <img style="height: 200px;width:200px;" src="/chefimage/{{$data->image}}" >
                </div>

                <div style="padding: 10px;">
                    <label>New Image</label>
                    <input type="file" name="image" >
                </div>

                <div style="padding: 10px;">

                    <input class="btn btn-primary" type="submit" value="Update">
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
