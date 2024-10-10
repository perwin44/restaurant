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

            <table>

                <tr align="center" style="background-color: gray">
                    <th style="padding: 30px;">Name</th>
                    <th style="padding: 30px;">Email</th>
                    <th style="padding: 30px;">Phone</th>
                    <th style="padding: 30px;">Date</th>
                    <th style="padding: 30px;">Time</th>
                    <th style="padding: 30px;">Message</th>

                </tr>

                @foreach ($data as $data)

                <tr align="center" style="background-color: blue">
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->date}}</td>
                    <td>{{$data->time}}</td>
                    <td>{{$data->message}}</td>
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
