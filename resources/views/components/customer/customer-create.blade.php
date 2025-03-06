<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Customer</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">Customer Name *</label>
                                    <input type="text" class="form-control" id="customerName">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">Customer Email *</label>
                                    <input type="text" class="form-control" id="customerEmail">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">Customer Phone *</label>
                                    <input type="text" class="form-control" id="customerPhone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">Address *</label>
                                    <input type="text" class="form-control" id="customerAddress">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button id="save-btn" class="btn bg-gradient-success" onclick="SaveCategory()" >Save</button>
                </div>
        </div>
    </div>
</div>


<script>
    async function SaveCategory() {
        let name = document.getElementById('customerName').value;
        let email = document.getElementById('customerEmail').value;
        let mobile = document.getElementById('customerPhone').value;
        let address = document.getElementById('customerAddress').value;
        if (name.length === 0) {
            errorToast("Customer Name Required !")
        }
        else if(email.length === 0){
            errorToast("Customer Email Required !")
        }
        else if(mobile.length === 0){
            errorToast("Customer Mobile Number Required !")
        }
        else if(address.length === 0){
            errorToast("Customer Address Required !")
        }
        else {
            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post("/create-customer",{
                name:name,
                email:email,
                mobile:mobile,
                address:address,
                })
            hideLoader();
            if(res.status===201){
                successToast('Customer Add completed');
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
