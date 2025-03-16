<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Category</h4>
                    </div>
                    <div class="align-items-center col">
                        <button class="float-end btn m-0 bg-gradient-primary" onclick="CreateCategory()">Create</button>
                    </div>
                </div>
                <hr class="bg-secondary"/>
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tableList">
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>
                                    <button class="btn editBtn btn-sm btn-outline-success btn-warning" onclick="EditCategory({{$category->id}},'{{$category->category_name}}')" >Edit</button>
                                    <button class="btn deleteBtn btn-sm btn-outline-danger btn-danger" onclick="DeletCategory({{$category->id}},'{{$category->category_name}}')">Delete</button>
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
    function CreateCategory() {
        var updateModal = new bootstrap.Modal(document.getElementById('create-modal'));
        updateModal.show();

    }

    function EditCategory(categoryId,categoryName) {
        document.getElementById('categoryId').value = categoryId;
        document.getElementById('categoryName').value = categoryName;
        var updateModal = new bootstrap.Modal(document.getElementById('update-modal'));
        updateModal.show();
    }
    function DeletCategory(categoryId,categoryName) {
        document.getElementById('categoryId').value = categoryId;
        document.getElementById('categoryName').value = categoryName;
        var updateModal = new bootstrap.Modal(document.getElementById('delete-modal'));
        updateModal.show();
    }

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

