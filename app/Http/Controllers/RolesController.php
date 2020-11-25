<?php
namespace App\Http\Controllers;

use App\Http\Cores\BackendController;
use Illuminate\Http\Request;

class RolesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->_ROLNAMES["update"][] = "updatesort";
        $this->_ROLNAMES["update"][] = "updaterule";
        $this->_ROLNAMES["update"][] = "rule";
        parent::__construct();
        $this->_TABLE              = "roles";
        $this->_VIEW               = "roles";
        $this->_NAME               = "roles";
        $this->_ROUTE_FIX          = "roles";
        $this->_DATA["_PAGETITLE"] = "[_role_management_]";
        $this->_ADDURL             = route($this->_ROUTE_FIX . ".store");
    }
    public function index(Request $request)
    {
        $this->_MODEL = \App\Http\Models\Roles::orderby("id", "ASC");
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
            $this->_MODEL->where(function ($query) use ($keyword) {
                $query->where("name", "like", "%" . $keyword . "%");
                $query->orWhere("controller", "like", "%" . $keyword . "%");
            });
        }
        if ($request->input('created_at')) {
            $created_at = $request->input('created_at');
            $this->_MODEL->where(function ($query) use ($created_at) {
                $query->where("created_at", ">=", "%" . $created_at . "%");
            });
        }
        $this->_MODEL->where("is_sys", "!=", 1);
        $this->_DATA["models"] = $this->_MODEL->paginate($this->_PAGINGNUMBER);
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }
    public function store(Request $request)
    {
        $data         = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $listColums   = $this->_GetTableColumns($this->_TABLE);
        $post         = $request->post();
        $id           = $request->id;
        $this->_MODEL = null;
        if ($id) {
            $this->_MODEL = \App\Http\Models\Roles::find($id);
        } else {
            $this->_MODEL = new \App\Http\Models\Roles();
        }
        foreach ($post as $key => $value) {
            if (in_array($key, $listColums)) {
                if ($key != "id") {
                    $this->_MODEL->{$key} = $value;
                }
            }
        }
        $this->_MODEL->save();
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function edit($id)
    {
        $data           = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL   = \App\Http\Models\Roles::find($id);
        $data["status"] = 1;
        $data["data"]   = $this->_MODEL->toArray();
        return \Response::json($data);
    }

    public function delete($id)
    {
        $data            = ["status" => 0, "_reload" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL    = \App\Http\Models\Roles::destroy($id);
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }

    public function rule($id)
    {
        $data   = ["status" => 0, "_reload" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $Models = \App\Http\Models\Role_Module::GetModulesAllow($id);
        if (count($Models->toArray()) != 0) {
            $data["data"] = $this->get_html_modules($Models->toArray(), 0, "", true);
        } else {
            $data["data"] = "";
        }
        $data["status"] = 1;
        return view ('layouts.translate',['data' => $data]);
    }
    private $index        = 1;
    private $html_modules = "";
    private function get_html_modules($data = null, $root = 0, $level = '', $table = true, $activer = -1)
    {
        if ($data != null) {
            foreach ($data as $key => $item_2) {
                $module       = \App\Http\Models\Modules::find($item_2["id"]);
                $status_items = null;
                if ($module) {
                    $status_items = $module->status_items;
                }
                $active = '';
                $this->html_modules .= '<tr>';
                $this->html_modules .= '<td>' . $level . '  ' . $item_2['name'] . ' ' . (@$status_items->count() ? '<a href="javascipt:;" class="more-status" data-id="' . $item_2["id"] . '"><span class="mdi mdi-chevron-double-down"></span>[_more_status_]</a>' : '') . '</td>';
                $this->html_modules .= '<td>' . $item_2['controller'] . '</td>';
                if ($item_2['view'] == '1') {
                    $active = 'checked';
                } else {
                    $active = '';
                }
                $this->html_modules .= '<td>
                    <div class="checkbox">
                        <input id="item-' . $item_2["id"] . '-view" type="checkbox" class="styled onchangevalue" ' . $active . '><label for="item-' . $item_2["id"] . '-view"></label>
                        <input value="' . $item_2['view'] . '" type="hidden" class="apply" name="view[]"/>
                    </div>
                </td>';
                if ($item_2['add'] == '1') {
                    $active = 'checked';
                } else {
                    $active = '';
                }
                $this->html_modules .= '<td>
                    <div class="checkbox">
                        <input id="item-' . $item_2["id"] . '-add" type="checkbox" class="styled onchangevalue" ' . $active . '><label for="item-' . $item_2["id"] . '-add"></label>
                        <input value="' . $item_2['add'] . '" type="hidden" class="apply" name="add[]"/>
                    </div>
                </td>';

                if ($item_2['update'] == '1') {
                    $active = 'checked';
                } else {
                    $active = '';
                }
                $this->html_modules .= '<td>
                    <div class="checkbox">
                        <input id="item-' . $item_2["id"] . '-edit" type="checkbox" class="styled onchangevalue" ' . $active . '><label for="item-' . $item_2["id"] . '-edit"></label>
                        <input value="' . $item_2['update'] . '" type="hidden" class="apply" name="update[]"/>
                    </div>
                </td>';
                if ($item_2['delete'] == '1') {
                    $active = 'checked';
                } else {
                    $active = '';
                }
                $this->html_modules .= '<td>
                    <div class="checkbox">
                        <input id="item-' . $item_2["id"] . '-delete" type="checkbox" class="styled onchangevalue" ' . $active . '><label for="item-' . $item_2["id"] . '-delete"></label>
                        <input value="' . $item_2['delete'] . '" type="hidden" class="apply" value="' . $item_2['delete'] . '" name="delete[]"/>
                    </div>
                    <input type="hidden" name="modules[]" value="' . $item_2["id"] . '">
                </td>';
                $this->html_modules .= '<tr>';

                if (@$status_items->count()) {
                    $this->html_modules .= '<tr>
                        <td colspan="6" class="container-table-status-' . $item_2["id"] . '" style="padding: 0;height: 0;display: none;">
                            <table class="table table-bordered dt-responsive">';
                    $this->html_modules .= '<tr>
                        <td colspan="2">
                            <h5>[_allow_status_]</h5>
                        </td>
                    </tr>';
                    $this->html_modules .= '<tr>
                        <th>[_status_name_]</th>
                        <th>[_allow_]</th>
                    </tr>';
                    foreach ($status_items as $key_2 => $value_2) {
                        $select = $value_2->role($item_2["role_id"]) ? 'checked="true"' : '';
                        $this->html_modules .= '<tr>
                            <td>' . @$value_2->get_name() . '</td>
                            <td>
                                <div class="checkbox">
                                    <input id="item-' . $value_2->id . '-status" name="status[' . $value_2->id . ']" type="checkbox" class="styled" ' . $select . '><label for="item-' . $value_2->id . '-status"></label>
                                </div>
                            </td>
                        </tr>';
                    }
                    $this->html_modules .= '</td></tr></table>';
                }

            }
        }
        return $this->html_modules;
    }
    public function updaterule(Request $request)
    {
        $data    = ["status" => 0, "_reload" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $modules = $request->modules;
        $count   = count($modules);
        $allow   = $request->allow;
        $add     = $request->add;
        $update  = $request->update;
        $view    = $request->view;
        $delete  = $request->delete;
        $id      = $request->id;
        \App\Http\Models\Role_Module::where("role_id", "=", $id)->update(["view" => 0]);
        if ($count > 0) {
            for ($i = 0; $i <= $count; $i++) {
                if (@$modules[$i] != null) {
                    $check = \App\Http\Models\Role_Module::where(
                        [
                            ["module_id", "=", $modules[$i]],
                            ["role_id", "=", $id],
                        ]
                    )->first();
                    if ($check == null) {
                        $Role_Module            = new \App\Http\Models\Role_Module();
                        $Role_Module->module_id = $modules[$i];
                        $Role_Module->add       = (@$add[$i] == null) ? "0" : @$add[$i];
                        $Role_Module->update    = (@$update[$i] == null) ? "0" : @$update[$i];
                        $Role_Module->view      = (@$view[$i] == null) ? "0" : @$view[$i];
                        $Role_Module->delete    = (@$delete[$i] == null) ? "0" : @$delete[$i];
                        $Role_Module->role_id   = $id;
                        $Role_Module->save();
                    } else {
                        \App\Http\Models\Role_Module::where(
                            [
                                ["module_id", "=", $modules[$i]],
                                ["role_id", "=", $id],
                            ]
                        )->update(
                            [
                                "add"    => (@$add[$i] == null) ? "0" : @$add[$i],
                                "update" => (@$update[$i] == null) ? "0" : @$update[$i],
                                "view"   => (@$view[$i] == null) ? "0" : @$view[$i],
                                "delete" => (@$delete[$i] == null) ? "0" : @$delete[$i],
                            ]
                        );
                    }

                }
            }

        }
        $status = $request->status;

        if ($status) {
            $ids = [];
            foreach ($status as $key => $value) {
                $check = \App\Http\Models\Status_Roles::where([
                    ["role_id", "=", $id],
                    ["status_id", "=", $key],
                ])->first();
                if ($check == null) {
                    $n            = new \App\Http\Models\Status_Roles();
                    $n->role_id   = $id;
                    $n->status_id = $key;
                    $n->save();
                    $ids[] = $n->id;
                } else {
                    $ids[] = $check->id;
                }
            }
            if ($ids) {
                \App\Http\Models\Status_Roles::where("role_id", "=", $id)->whereNotIn("id", $ids)->delete();
            }

        }
        $data["status"] = 1;
        return \Response::json($data);
    }
}
