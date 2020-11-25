<div class="modal fade" id="modal-modify" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('Add New')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="modifyForm" data-parsley-validate>
                    <div class="form-row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="inputProductClass">Product Class</label>
                                <select class="form-control" id="inputProductClass" name="ClassKey" placeholder="Product Class" required ctrl-select2 data-parsley-errors-container="#ClassKeyError">
                                    <option value="">Select Product Class</option>
                                    @foreach ($groupclass as $productClass)
                                        <option value="{{$productClass->ClassKey}}">{{$productClass->ClassName}}</option>
                                    @endforeach
                                </select>
                                <div id="ClassKeyError"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Item</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select class="form-control" id="inputItemClass" name="ItemClassId" placeholder="Item Class" required ctrl-select2 data-parsley-errors-container="#ItemClassIdError">
                                            <option value="">Select Item Class</option>
                                            @foreach ($itemclass as $itemClass)
                                                <option value="{{$itemClass->ItemClassId}}">{{$itemClass->ItemClassName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <select class="form-control" id="inputItem" placeholder="Item" name="ItemId" data-parsley-errors-container="#ItemClassIdError"></select>
                                </div>
                                <div id="ItemClassIdError"></div>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="inputUnitPrice">Unit Price</label>
                                <input type="number" class="form-control" id="inputUnitPrice" name="UnitPrice" placeholder="Unit Price" step=".01">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="inputUnitPriceOther">Unit Price Other</label>
                                <input type="number" class="form-control" id="inputUnitPriceOther" name="UnitPriceOther" placeholder="Unit Price Other" step=".01">
                            </div>
                        </div>
                    </div>

                    <div class="form-row d-none">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="inputValidFrom">Valid From</label>
                                <input type="date" class="form-control" id="inputValidFrom" name="ValidFrom" placeholder="Price valid from" value="{{date('Y') . '-' . date('m') . '-' . date('d')}}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="inputValidTo">Valid To</label>
                                <input type="date" class="form-control" id="inputValidTo" name="ValidTo" placeholder="Price valid to">
                            </div>
                        </div>
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