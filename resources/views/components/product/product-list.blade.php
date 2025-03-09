<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Product</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0  bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="myTable">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tableList">
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->category->category_name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->unit}}</td>
                            <td>
                                <img src="{{asset($product->image)}}" alt="{{$product->image}}" style="width: 70px; height: 50px;">
                            </td>
                            <td>
                                <button data-id="{{$product->id}}" class="btn editBtn btn-sm btn-outline-success btn-warning" >Edit</button>
                                <button data-id="{{$product->id}}" class="btn deleteBtn btn-sm btn-outline-danger btn-danger" >Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>

$('.editBtn').on('click',function(){
        let id = $(this).data('id');
        $("#update-modal").modal('show');
        $("#productId").val(id);
    })
$('.deleteBtn').on('click',function(){
        let id = $(this).data('id');
        $("#delete-modal").modal('show');
        $("#productId").val(id);
       
    })

$(document).ready( function () {
        $('#myTable').DataTable();
    } );

</script>

