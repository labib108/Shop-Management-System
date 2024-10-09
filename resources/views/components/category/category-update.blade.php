<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update Category</h6>
            </div>
            <div class="modal-body">
                <form id="save-form" action="">
                    <input type="hidden" id="categoryId">
                    <input type="hidden" class="form-control" id="categoryName"><!-- Hidden input for category ID -->
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category Name *</label>
                                <input type="text" class="form-control" id="UpdateCategoryName">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function Save() {
        let categoryName = document.getElementById('UpdateCategoryName').value;
        let categoryId = document.getElementById('categoryId').value;
        if (categoryName.length === 0) {
            errorToast("Category Name Required !")
        }
        else {
            document.getElementById('modal-close').click();
            showLoader();
            /*console.log(categoryId);
            console.log(categoryName);*/
            let res = await axios.post("/update-category",{
                id:categoryId,
                name:categoryName});
            /*console.log(categoryId);
            console.log(categoryName);*/
            hideLoader();
            //console.log(res);
            if(res.status===200){
                document.getElementById("save-form").reset();
                window.location.reload();
            }
            else{
                hideLoader();
                errorToast("Request fail !")
            }
        }
    }
</script>
