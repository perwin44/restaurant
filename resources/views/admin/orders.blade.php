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

        <div class="container" align="center" style="margin-left:150px;">


            <form action="{{url('/search')}}" method="get">
                @csrf

                <input type="text" name="search" style="color: blue;">
                <input type="submit" value="Search" class="btn btn-success">

            </form>

            <h1 style="margin: 10px;">Customers Orders</h1>

            <table style="margin: 10px;">

                <tr align="center" style="background-color: gray">
                    <th style="padding: 30px;">Name</th>
                    <th style="padding: 30px;">Phone</th>
                    <th style="padding: 30px;">Address</th>
                    <th style="padding: 30px;">FoodName</th>
                    <th style="padding: 30px;">Price</th>
                    <th style="padding: 30px;">Quantity</th>
                    <th style="padding: 30px;">Total Price</th>
                </tr>

                @foreach ($data as $data)

                <tr align="center" style="background-color: yellowgreen">
                    <td style="padding: 10px;">{{$data->name}}</td>
                    <td style="padding: 10px;">{{$data->price}}</td>
                    <td style="padding: 10px;">{{$data->address}}</td>
                    <td style="padding: 10px;">{{$data->foodname}}</td>
                    <td style="padding: 10px;">{{$data->price}}$</td>
                    <td style="padding: 10px;">{{$data->quantity}}</td>
                    <td style="padding: 10px;">{{$data->price * $data->quantity}}$</td>
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
