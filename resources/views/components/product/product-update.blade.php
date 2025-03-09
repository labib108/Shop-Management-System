<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category</label>
                                <select type="text" class="form-control form-select" id="productCategoryUpdate">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                
                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="productNameUpdate">

                                <label class="form-label mt-2">Description</label>
                                <input type="text" class="form-control" id="productDescriptionUpdate">

                                <label class="form-label mt-2">Price</label>
                                <input type="text" class="form-control" id="productPriceUpdate">

                                <label class="form-label mt-2">Unit</label>
                                <input type="text" class="form-control" id="productUnitUpdate">
                                <br/>
                                <img class="w-15" id="oldImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label mt-2">Image</label>
                                <input type="file" class="form-control" id="productImgUpdate" name="image">

                                <input type="text" class="d-none" id="productId">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>

        </div>
    </div>
</div>


<script>

    async function update() {

        let productCategoryId=document.getElementById('productId').value;
        let productCategoryUpdate=document.getElementById('productCategoryUpdate').value;
        let productNameUpdate = document.getElementById('productNameUpdate').value;
        let productDescriptionUpdate = document.getElementById('productDescriptionUpdate').value;
        let productPriceUpdate = document.getElementById('productPriceUpdate').value;
        let productUnitUpdate = document.getElementById('productUnitUpdate').value;
        let productImgUpdate = document.getElementById('productImgUpdate').files[0];


        if (productCategoryUpdate.length === 0) {
            errorToast("Product Category Required !")
        }
        else if(productNameUpdate.length===0){
            errorToast("Product Name Required !")
        }
        else if(productPriceUpdate.length===0){
            errorToast("Product Price Required !")
        }
        else if(productUnitUpdate.length===0){
            errorToast("Product Unit Required !")
        }

        else {

            document.getElementById('update-modal-close').click();

            let formData=new FormData();
            formData.append('id',productCategoryId)
            formData.append('category_id',productCategoryUpdate)
            formData.append('name',productNameUpdate)
            formData.append('description',productDescriptionUpdate)
            formData.append('price',productPriceUpdate)
            formData.append('unit',productUnitUpdate)
            formData.append('img',productImgUpdate)

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post("/update-product",formData,config)
            hideLoader();

            if(res.status===200){
                successToast('Request completed');
                document.getElementById("update-form").reset();
                window.location.reload();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }
</script>
