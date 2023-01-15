<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
   
    <style>
        .title{
            color: white;
            padding-top: 25px;
            font-size: 25px;
            align:center;
        }
        label{
            padding: 12px;
            display: inline-block;
            width: 150px;
            margin: 10px;
        }
        input{
            color: black;
            
        }
    </style>
   
  </head>
  <body>
        
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
              <!-- partial -->
      <div class="container-fluid page-body-wrapper"> 
        <div class="container" align = 'center'>
            <h1 class="title">Add Product</h1>

            @if (session()->has('message'))
            <div class="alert alert-success">  
                <button type="button" class="close" data-dismiss ="alert">X</button>
               {{  session()->get('message') }}

            </div>
            @endif


        <form action="{{ url('uploadproduct') }}" method="POST" enctype="multipart/form-data">

            @csrf
            
            <div>
                <label>Product Title</label>
                <input style="color: black" type="text" name="title" placeholder="Give title to product">
            </div>
            <div>
                <label>Price:</label>
                <input style="color: black"type="text" name="price" placeholder="Give price to product">
            </div>
            <div>
                <label>Descrition:</label>
                <input style="color: black" type="text" name="des" placeholder="Give descritpion to product">
            </div>
            <div>
                <label>Quantity:</label>
                <input style="color: black"type="text" name="qty" placeholder="Give quantity to product">
            </div>
          
            <div>
                <label></label>
                <input type="file" name="file" >
            </div>

            <div>
               <label for=""></label>
                <input class="btn btn-success" type="submit">
            </div>

        </form>

        </div>
    </div>




                  <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.footer')
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>