<div class="modal fade" id="modal-modify" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="modifyForm" data-parsley-validate>
                    <div class="form-row">
                        <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="inputClassKey">ID</label>
                                <input type="text" class="form-control" id="inputClassKey" name="ClassKey" placeholder="ID" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" name="ClassName" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="inputExchangeRate">Exchange Rate</label>
                                <input type="number" class="form-control" id="inputExchangeRate" name="ExchangeRate" placeholder="Exchange Rate" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input type="checkbox" value="1" name="IsDefault" class="form-check-input"> Default Currency
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-form="#modifyForm">Submit</button>
            </div>
        </div>
    </div>
</div>