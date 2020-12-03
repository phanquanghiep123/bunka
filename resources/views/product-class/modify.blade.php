<div class="modal fade" id="modal-modify" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="ModifyClass" data-parsley-validate>
                    <div class="form-row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="inputClassKey">Class Key</label>
                                <input type="number" class="form-control" id="inputClassKey" name="ClassKey" placeholder="Class Key" required data-parsley-remote="{{route('admin.product-class.show', ['id' => ''])}}/{value}" data-parsley-remote-reverse>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="inputName">Class Name</label>
                                <input type="text" class="form-control" id="inputName" name="ClassName" placeholder="Class Name" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="inputFullName">Class Full Name</label>
                                <input type="text" class="form-control" id="inputFullName" name="ClassFullName" placeholder="Class Full Name" required>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="inputFactoryCost">Factory Price</label>
                                <input type="text" class="form-control" id="inputFactoryPrice" name="FactoryPrice" placeholder="Factory Price" data-parsley-pattern="^[0-9]*(\.?[0-9]{0,2}$)?">
                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="inputKeisuu">Keisuu</label>
                                <input type="text" class="form-control" id="inputKeisuu" name="Keisuu" placeholder="Keisuu" required data-parsley-pattern="^[0-9]*(\.?[0-9]{0,2}$)?">
                            </div>

                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="inputMinSquare">MinSquare</label>
                                <input type="text" class="form-control" id="inputMinSquare" name="MinSquare" placeholder="MinSquare" required data-parsley-pattern="^[0-9]*(\.?[0-9]{0,2}$)?">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="inputInstallFeeFixed">Install Fee Fixed</label>
                                <input type="text" class="form-control" id="inputInstallFeeFixed" name="InstallFeeFixed" placeholder="Install Fee Fixed" required data-parsley-pattern="^[0-9]*(\.?[0-9]{0,2}$)?">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="inputBasePrice">Base Price</label>
                                <input type="text" class="form-control" id="inputBasePrice" name="BasePrice" placeholder="Base Price" required data-parsley-pattern="^[0-9]*(\.?[0-9]{0,2}$)?">
                            </div>
                        </div>
                    </div>
                        <?php if(isset($languages) && $languages != null): ?>
                            
                            <?php foreach($languages as $key => $language): ?>
                                <hr/>
                               
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="card-title">_NAME_ [_for_] {{ $language->name }}</label>
                                            <input type="text" name="languages[{{$language->id}}][name]" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="card-title">[_description_install_] [_for_] {{ $language->name }}</label>
                                            <textarea id="language-{{$language->id}}" class="form-control content lang-{{$language->id}}" rows="10" name="languages[{{$language->id}}][content]"></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-form="ModifyClass">Submit</button>
            </div>
        </div>
    </div>
</div>