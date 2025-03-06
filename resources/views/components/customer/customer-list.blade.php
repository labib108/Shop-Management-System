<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Customer</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                    </div>
                </div>
                <hr class="bg-secondary"/>
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Associated Admin</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tableList">
                            @foreach ($customers as $customer)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->mobile}}</td>
                                <td>{{$customer->address}}</td>
                                <td>{{$customer->user->firstName . " " . $customer->user->lastName}}</td>
                                <td>
                                    <button data-id="{{$customer->id}}" class="btn editBtn btn-sm btn-outline-success btn-warning" >Edit</button>
                                    <button data-id="{{$customer->id}}" class="btn deleteBtn btn-sm btn-outline-danger btn-danger" >Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    $('.editBtn').on('click',function(){
        let id = $(this).data('id');
        $("#update-modal").modal('show');
        $("#customerId").val(id);
    })
    $('.deleteBtn').on('click',function(){
        let id = $(this).data('id');
        $("#delete-modal").modal('show');
        $("#deleteId").val(id);
       
    })

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

</script>

