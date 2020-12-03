<div class="modal fade" id="modal-modify" tabindex="-1" role="dialog" aria-labelledby="itemClassModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemClassModalLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="ModifyItemClass" data-parsley-validate>
                    <div class="form-row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="inputItemClassName">Name</label>
                                <input type="text" class="form-control" id="inputItemClassName" name="ItemClassName" placeholder="Item Class Name" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="inputParentItemClass">Parent Item Class</label>
                                <select class="form-control" id="inputParentItemClass" name="ParentItemClassId" placeholder="Parent Item Class">
                                    <option value="0">Select Parent Item Class</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{$parent->ItemClassId}}">{{$parent->ItemClassName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="inputUnit">Unit</label>
                                <select class="form-control" id="inputUnit" name="Unit" placeholder="Unit">
                                    <option value="">None</option>
                                    <option value="%">%</option>
                                    <option value="Kind">Kind</option>
                                    <option value="M">M</option>
                                    <option value="M2">M<sup>2</sup></option>
                                </select>
                            </div>


                        </div>

                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="inputPricePattern">Price Pattern</label>
                                <select class="form-control" id="inputPricePattern" name="PricePattern">
                                    <option>Select Price Pattern</option>
                                    @foreach ($patterns as $pattern)
                                        <option value="{{$pattern->ClassKey}}">{{$pattern->PricePattern}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="inputDispOrder">Disp Order</label>
                                <input type="number" class="form-control" id="inputDispOrder" name="DispOrder" placeholder="Disp Order">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="inputFormatPattern">Format Pattern</label>
                                <input type="text" class="form-control" id="inputFormatPattern" name="FormatPattern" placeholder="Parent Item Class" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Inputs</label>
                        <div class="d-flex">
                            <div class="form-check form-check-flat mr-3 mt-0">
                                <label class="form-check-label">
                                    <input type="checkbox" name="WInputFlg" value="1" class="form-check-input"> Width Input
                                </label>
                            </div>
                            <div class="form-check form-check-flat mr-3 mt-0">
                                <label class="form-check-label">
                                    <input type="checkbox" name="HInputFlg" value="1" class="form-check-input"> Height Input
                                </label>
                            </div>
                            <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                    <input type="checkbox" name="QInputFlg" value="1" class="form-check-input"> Quality Input
                                </label>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-form="ModifyItemClass">Submit</button>
            </div>
        </div>
    </div>
</div>