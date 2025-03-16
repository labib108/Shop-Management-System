<!-- Modal -->
<div class="animated zoomIn" id="details-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h1 class="modal-title fs-3"  id="exampleModalLabel">Invoice</h1>
            </div>
            <div id="invoice" class="modal-body p-3">
                <div class="container-fluid">
                    <br/>
                    <div class="row">
                        <div class="col-8">
                            <span class="text-bold text-dark fs-4">BILLED TO </span>
                            <p class="text-sm mx-0 my-1"><b>Name:</b> {{$invoices->customer->name}} </p>
                            <p class="text-sm mx-0 my-1"><b>Email:</b> {{$invoices->customer->email}}</p>
                            <p class="text-sm mx-0 my-1"><b>Address:</b> {{$invoices->customer->address}}</p>
                        </div>
                        <div class="col-4">
                            <img class="w-40" src="{{asset("images/logo.png")}}">
                            <p class="text-bold mx-0 my-1 text-dark">Invoice </p>
                            <p class="text-sm mx-0 my-1">Date: {{ date('Y-m-d') }} </p>
                        </div>
                    </div>
                    <hr class="mx-0 my-2 p-0 bg-secondary"/>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <table class="table w-100" id="myTable">
                                <thead class="w-100">
                                <tr class="text-xs text-bold">
                                    <td>Name</td>
                                    <td>Quantity</td>
                                    <td>Unit Price:</td>
                                    <td>Total</td>
                                </tr>
                                </thead>
                                <tbody  class="w-100" id="tableList">
                                <tr>
                                    <td>{{$invoiceProducts->product->name}}</td>
                                    <td>{{$invoiceProducts->quantity}}</td>
                                    <td><i class="bi bi-currency-dollar"></i>{{$invoiceProducts->sale_price}}</td>
                                    <td><i class="bi bi-currency-dollar"></i>{{$invoices->total}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr class="mx-0 my-2 p-0 bg-secondary"/>
                    <div class="row">
                        <div class="col-12 d-flex flex-column align-items-end px-8">
                            <p class="text-sm my-2 text-dark"> Total: <i class="bi bi-currency-dollar"></i>{{$invoices->total}}</p>
                            <p class="text-sm my-1 text-dark"> VAT(11%): <i class="bi bi-currency-dollar"></i>{{$invoices->vat}}</p>
                            <p class="text-sm my-1 text-dark"> Discount: <i class="bi bi-currency-dollar"></i>{{$invoices->discount}}</p>
                            <p class="text-sm my-1 text-dark"> Payable: <i class="bi bi-currency-dollar"></i>{{$invoices->payable}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-danger" onclick="invoiceClose()">Close</button>
                <button class="btn bg-gradient-info" onclick = "printInvoice()" >Print</button>
            </div>
        </div>
    </div>
</div>

<script>
    function invoiceClose()
    {
        window.location.href = "/invoicePage";
    }
    function printInvoice()
    {
        let printContents = document.getElementById('invoice').innerHTML;
        let originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        // setTimeout(function (){
        //     location.reload();
        // }, 1000)
    }
</script>
