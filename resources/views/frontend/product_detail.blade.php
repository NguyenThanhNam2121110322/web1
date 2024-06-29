@extends('layouts.site')
@section('content')

     {{--  --}}
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center">
                    <img src="{{ asset('images/products/' . $detail_product->image) }}" alt="Image" class="img-fluid mr-4" style="max-width: 200px;">
                    <div>
                        <h1>{{ $detail_product->name }}</h1>
                        <p class="h4 font-weight-bold">${{ $detail_product->price }}</p>
                        <div class="d-flex align-items-center mb-3">
                            <label for="quantity" class="mr-3">Số lượng:</label>
                            <input type="number"  id="qty" name="quantity" value="1" min="1" class="form-control w-25" >
                        </div>
                        <button class="btn btn-primary btn-lg" onclick="handleAddCart({{$detail_product->id}})">Thêm vào giỏ hàng</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="lead">{{$detail_product->description }}</p>
                </div>
            </div>
            <hr class="my-5">
            {{-- <h2>Sản phẩm liên quan</h2>
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ $relatedProduct->image_url }}" class="card-img-top" alt="{{ $relatedProduct->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                            <p class="card-text">${{ $relatedProduct->price }}</p>
                            <a href="{{ route('product.show', $relatedProduct->id) }}" class="btn btn-primary">Xem</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> --}}
        </div>
    </div>

    <script>
        function handleAddCart(productid)
        {
            let qty = document.getElementById("qty").value;
          $.ajax({
            url:"{{  route('site.cart.addcart')  }}",
            type:"GET",
            data:{
                productid:productid,
                qty:qty
            },
            success:function(result,status,xhr){
                document.getElementById("showqty").innerHTML=result;
                alert("Thêm vào giỏ hàng thành công");
            },
            error:function(xhr,status,error)
            {
                alert(error);
            }
          })
        }
     </script>

@endsection


@section('title', 'chi tiet san pham')


