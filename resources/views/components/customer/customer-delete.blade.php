<div class="modal animated zoomIn" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Are you want to delete this Customer ? <br> Once delete, you can't get it back.</p>
                <input class="d-none" id="deleteId"/>
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn bg-gradient-success mx-2" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="customerDelete()" type="button" id="confirmDelete" class="btn bg-gradient-danger" >Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function customerDelete() {
        let id = document.getElementById('deleteId').value;
        try {
            showLoader();
            let res = await axios.delete(`/delete-customer/${id}`);
            successToast(res.data.message);
            window.location.reload();
        } catch (error) {
            errorToast("Failed to delete appointment. Please try again.");
        } finally {
            hideLoader();
        }
    }


</script>
