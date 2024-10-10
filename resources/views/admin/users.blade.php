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







            <div  style="margin-left:550px;">

                <table bgcolor="gray" border="3px">

                    <tr align="center">
                        <th style="padding: 10px;">Name</th>
                        <th style="padding: 10px;">Email</th>
                        <th style="padding: 10px;">Action</th>
                    </tr>

                    @foreach ($data as $data)

                    <tr align="center">
                        <td style="padding: 10px;">{{$data->name}}</td>
                        <td style="padding: 10px;">{{$data->email}}</td>
                        @if($data->usertype=="0")
                        <td style="padding: 10px;">
                            <a class="btn btn-danger" href="{{url('/delete_user',$data->id)}}">Delete</a>
                        </td>
                        @else
                        <td style="padding: 10px;">
                            <a class="btn btn-danger" href="">Not Allowed</a>
                        </td>
                        @endif
                    </tr>
                    @endforeach

                </table>

            </div>










        </div>
    </div>
    </div>

    <!-- container-scroller -->
  @include('admin.scripts')
  </body>
</html>

