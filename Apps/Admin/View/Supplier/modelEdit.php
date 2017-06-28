<form class="form-horizontal" role="form" action="{:U('supplier/modelDoEdit')}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="mid"  value="{$list['mid']}">
    <div id="myTabContent" class="tab-content">
        <div class="modal-body tab-pane fade active in" role="tabpanel" id="tabs1" aria-labelledby="1tab">

            <div class="form-group">
                <label class="col-sm-2 control-label">名称</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="model_name" placeholder="" value="{$list['model_name']}">
                </div>
            </div>
        </div>
    </div>
    <!-- 结束            -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default"
                data-dismiss="modal">关闭
        </button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>