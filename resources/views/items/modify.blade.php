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
                        <div class="col-12 col-md-6">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="inputItemName-tab" data-toggle="tab" href="#inputItemName" role="tab" aria-controls="inputItemName" aria-selected="true">Name</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="inputItemNameVN-tab" data-toggle="tab" href="#inputItemNameVN" role="tab" aria-controls="inputItemNameVN" aria-selected="false">Name VI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="inputItemNameJP-tab" data-toggle="tab" href="#inputItemNameJP" role="tab" aria-controls="inputItemNameJP" aria-selected="false">Name JP</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="form-group tab-pane fade show active" id="inputItemName">
                                    <input type="text" class="form-control" name="ItemName" placeholder="Name" required>
                                </div>
                                <div class="form-group tab-pane fade" id="inputItemNameVN">
                                    <input type="text" class="form-control" name="ItemNameVN" placeholder="Name in Vietnamese" required>
                                </div>
                                <div class="form-group tab-pane fade" id="inputItemNameJP">
                                    <input type="text" class="form-control" name="ItemNameJP" placeholder="Name in Japanese" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="inputItemClassId">Item Class</label>
                                <select class="form-control" id="inputItemClassId" name="ItemClassId" placeholder="Item Class" required>
                                   <option value="">Parent Item Class</option>
                                    @foreach ($itemclasses as $itemclass)
                                        <option value="{{$itemclass->ItemClassId}}">{{$itemclass->ItemClassName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6"></div>
                        <div class="col-12 col-md-6"></div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="inputPricePatternKey">Price Key</label>
                                <select class="form-control" id="inputPricePatternKey" name="PricePatternKey" required>
                                    <option value="">Select Price Key</option>
                                    @foreach ($pricekeys as $pricekey)
                                        <option value="{{$pricekey->ClassKey}}">{{$pricekey->ClassName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="inputFactoryCode">Factory Item</label>
                                <select class="form-control" id="inputFactoryCode" name="FactoryCode">
                                    <option value="">Select Price Pattern</option>
                                    @foreach ($factoryitems as $item)
                                        <option value="{{$item->FactoryCode}}">{{$item->FactoryName}}</option>
                                    @endforeach
                                </select>
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