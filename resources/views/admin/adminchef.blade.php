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

        <div align="center" style="margin-left:350px;">

        <form action="{{url('/upload_chef')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="padding: 10px;">
                <label>Name</label>
                <input style="color: blue" type="text" name="name" placeholder="Enter a Name" required>
            </div>

            <div style="padding: 10px;">
                <label>Speciality</label>
                <input style="color: blue" type="text" name="speciality" placeholder="Enter the Speciality" required>
            </div>

            <div style="padding: 10px;">

                <input type="file" name="image" >
            </div>

            <div style="padding: 10px;">

                <input class="btn btn-primary" type="submit" value="Save">
            </div>

        </form>

        <div align="center">

            <table>

                <tr style="background-color: gray">
                    <th style="padding: 30px;">Chef Name</th>
                    <th style="padding: 30px;">Speciality</th>
                    <th style="padding: 30px;">Image</th>
                    <th style="padding: 30px;">Action</th>
                    <th style="padding: 30px;">Action2</th>
                </tr>

                @foreach ($data as $data)

                <tr align="center" style="background-color: rgb(3, 3, 24)">
                    <td>{{$data->name}}</td>
                    <td>{{$data->speciality}}</td>
                    <td>
                        <img style="height: 200px;width:200px;" src="/chefimage/{{$data->image}}">
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{url('/update_chef',$data->id)}}">Update</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{url('/delete_chef',$data->id)}}">Delete</a>
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
