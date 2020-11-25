<div class="modal fade" id="modal-modify" tabindex="-1" role="dialog" aria-labelledby="modifyModal" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modifyModal">@lang('Add New')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="modifyForm" data-parsley-validate data-parsley-excluded="input[type=button], input[type=submit], input[type=reset], input[type=hidden], [disabled], :hidden">
              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="inputFactoryCode">@lang('Factory Number')</label>
                    <input type="text" class="form-control" placeholder="@lang('Factory Number')" id="inputFactoryCode" name="FactoryCode" required pattern="\d{2,10}" data-parsley-remote data-parsley-remote-validator='checkCodeExist' data-parsley-remote-message="@lang('factoryitem.codeexist')">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="inputFactoryName">@lang('Factory Name')</label>
                    <input type="text" class="form-control" placeholder="@lang('Factory Name')" id="inputFactoryName" name="FactoryName" required>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="inputFactoryType">@lang('Factory Type')</label>
                    <input type="text" class="form-control" placeholder="@lang('Factory Type')" id="inputFactoryType" name="FactoryType" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach ($languages as $lang)
                      <li class="nav-item">
                      <a class="nav-link {{ $lang->is_default ? 'active' : '' }}" id="inputItemName-tab" data-toggle="tab" href="#inputItemName-{{$lang->locale}}" role="tab" aria-controls="inputItemName" aria-selected="true">{{$lang->name}}</a>
                      </li>
                    @endforeach
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    @foreach ($languages as $lang)
                    <div class="form-group tab-pane fade show {{ $lang->is_default ? 'active' : '' }}" id="inputItemName-{{$lang->locale}}">
                      <input type="text" class="form-control" name="Note[{{$lang->id}}]" placeholder="@lang('Note in :name', $lang->toArray())" required style="margin-top: -1px;">
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Cancel')</button>
            <button type="submit" class="btn btn-success" data-form="modifyForm">@lang('Save')</button>
          </div>
      </div>
  </div>
</div>