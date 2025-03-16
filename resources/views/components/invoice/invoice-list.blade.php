<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h5>Invoices</h5>
                    </div>
                    <div class="align-items-center col">
                        <a href="{{url("/salePage")}}" class="float-end btn m-0 bg-gradient-primary">Create Sale</a>
                    </div>
                </div>
                <hr class="bg-dark "/>
                <table class="table" id="myTable">
                    <thead>
                    <tr class="bg-light">
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Total</th>
                        <th>Discount</th>
                        <th>Vat</th>
                        <th>Payable</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="tableList">
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$invoice->customer->name}}</td>
                            <td>{{$invoice->customer->mobile}}</td>
                            <td>{{$invoice->total}}</td>
                            <td>{{$invoice->discount}}</td>
                            <td>{{$invoice->vat}}</td>
                            <td>{{$invoice->payable}}</td>
                            <td>
                                <button class="btn viewBtn btn-outline-info text-sm px-3 py-1 btn-sm m-0" onclick="viewInvoice({{$invoice->id}},{{$invoice->customer->id}})"><i class="fa text-sm fa-eye"></i></button>
                                <button class="btn deleteBtn btn-outline-danger text-sm px-3 py-1 btn-sm m-0" onclick="DeleteInvoice({{$invoice->id}})"><i class="fa text-sm  fa-trash-alt"></i></button>
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
    async  function viewInvoice(inv_id,cus_id) {
        let invoice_id = inv_id;
        let customer_id = cus_id;
        if(invoice_id && customer_id)
        {
            // alert(inv_id);
            // alert(cus_id);
            // console.log(inv_id);
            // console.log(cus_id);
            try{
                let res = await axios.post("/invoice-generate",{
                    invoice_id:invoice_id,
                    customer_id:customer_id,
                });
                console.log("Response:", res.data);
                window.location.href = `/invoiceGenerate/${invoice_id}/${customer_id}`;
            }catch (error)
            {
                console.log(error);
            }
        }
    }
    function DeleteInvoice(inv_id) {
        document.getElementById('deleteId').value = inv_id;
        $("#delete-modal").modal('show');
    }

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
