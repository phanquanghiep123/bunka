<div class="form-row">
    <div class="col-6 col-md-4">
        <div class="form-group">
            <label for="inputMatrixType">Matrix Type</label>
            <select class="form-control" id="inputMatrixType" name="MatrixType" required>
                <option value="">Select Matrix Type</option>
                @foreach ($matrixtypes as $matrixtype)
                    <option value="{{$matrixtype->ClassKey}}">{{$matrixtype->ClassName}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-6 col-md-4">
        <div class="form-group">
            <label>&nbsp;</label>
            <div class="form-check form-check-flat mt-1">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="1" name="DoorFrame"> Door/Frame
                </label>
            </div>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-6 col-md-4">
        <div class="form-group">
            <label for="inputWidth">Width</label>
            <input type="text" class="form-control" id="inputWidth" name="Width" placeholder="Width" data-parsley-pattern="^[0-9]*(\.?[0-9]{0,2}$)?">
        </div>
    </div>
    <div class="col-6 col-md-4">
        <div class="form-group">
            <label for="inputHeight">Height</label>
            <input type="text" class="form-control" id="inputHeight" name="Height" placeholder="Height" data-parsley-pattern="^[0-9]*(\.?[0-9]{0,2}$)?">
        </div>
    </div>

    <div class="col-6 col-md-4">
        <div class="form-group">
            <label for="inputPrice">Price</label>
            <input type="text" class="form-control" id="inputPrice" name="Price" placeholder="Price" required data-parsley-pattern="^[0-9]*(\.?[0-9]{0,2}$)?">
        </div>

    </div>
</div>