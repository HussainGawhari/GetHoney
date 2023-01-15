<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->

</head>

<body>

    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
        <div class="container" align='center'>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                </div>
                {{ session()->get('message') }}
            @endif


            <div style="padding-bottom:30px" class="container-fluid page-body-wrapper">
                <div class="container" align='center'>



                    <table>
                        <tr style="background-color: grey">
                            <th style="padding: 20px">Title</th>
                            <th style="padding: 20px">Price</th>
                            <th style="padding: 20px">Description </th>
                            <th style="padding: 20px">Quantity</th>
                            <th style="padding: 20px">Image</th>
                            <th style="padding: 20px">ََََUpadate</td>
                            <th style="padding: 20px">Delete</td>

                        </tr>
                        @foreach ($data as $product)
                            <tr align="center"
                                style="background-color: black; align-item:center;
                padding-bottom:20px">
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <img height="100" width="100" src="/productimage/{{ $product->image }}">
                                </td>

                                <td>
                                    <a class="btn btn-primary" href="{{ url('updateview',$product->id) }}">Upadate</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="{{ url('deleteproduct', $product->id) }}">Delete</a>
                                </td>


                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>

            <!-- partial:partials/_footer.html -->
            @include('admin.footer')
            <!-- container-scroller -->
            <!-- plugins:js -->
            @include('admin.script')
            <!-- End custom js for this page -->
</body>

</html>
