<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update Customer</h6>
            </div>
            <div class="modal-body">
                <form id="save-form" action="">
                    <input type="hidden" id="customerId">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="updateCustomerName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Email *</label>
                                <input type="text" class="form-control" id="updateCustomerEmail">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Phone *</label>
                                <input type="text" class="form-control" id="updateCustomerPhone">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Address *</label>
                                <input type="text" class="form-control" id="updateCustomerAddress">
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
        let id = document.getElementById('customerId').value;
        let name = document.getElementById('updateCustomerName').value;
        let email = document.getElementById('updateCustomerEmail').value;
        let mobile = document.getElementById('updateCustomerPhone').value;
        let address = document.getElementById('updateCustomerAddress').value;
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
            let res = await axios.post("/update-customer",{
                id:id,
                name:name,
                email:email,
                mobile:mobile,
                address:address,
                });
            /*console.log(id);*/
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
