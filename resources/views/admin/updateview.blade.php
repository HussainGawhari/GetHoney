<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <style>
        .title{
            color: white;
            padding-top: 25px;
            margin-bottom: 20px;
            font-size: 25px;
            align:center;
        }
        label{
            padding: 10px;
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
                    <h1 class="title">Update Product</h1>
        
                    @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss ="alert">X</button>
                        {{  session()->get('message') }}
                    </div>
                       
                    @endif
        
        
                <form action="{{ url('updateproduct',$data->id) }}" method="POST" enctype="multipart/form-data">
        
                    @csrf
                    
                    <div>
                        <label>Product Title</label>
                        <input style="color: black" type="text" name="title" value="{{ $data->title }}">
                    </div>
                    <div>
                        <label>Price:</label>
                        <input style="color: black"type="text" name="price" value="{{ $data->price }}">
                    </div>
                    <div>
                        <label>Descrition:</label>
                        <input style="color: black" type="text" name="des" value="{{ $data->description }}">
                    </div>
                    <div>
                        <label>Quantity:</label>
                        <input style="color: black"type="text" name="qty" value="{{ $data->quantity }}">
                    </div>
                  
                    <div>
                        <label>Old image</label>
                        <img height="100" width="100" src="productimage/{{ $data->image }}">
                    </div>
        
                    <div>
                        <label for="">Change image</label>
                        <input type="file" name="file" value="{{ $data->image }}">

                    </div>
                    <div>
                       <label for=""></label>
                        <input class="btn btn-success" type="submit">
                    </div>
        
                </form>
        
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