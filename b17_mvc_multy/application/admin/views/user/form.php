<div class="container pt-5">
    <form action="" method="post">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="m-0">ADD RSS</h4>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label class="font-weight-bold">Link</label>
                    <input class="form-control" type="text" name="link" value="">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Status</label>
                    <select class="custom-select" name="status">
                        <option value="default">Select status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Ordering</label>
                    <input class="form-control" type="text" name="ordering" value="">
                </div>
            </div>
            <div class="card-footer">
                <input class="form-control" type="hidden" name="token" value="1611025715"> <button type="submit" class="btn btn-success">Save</button>
                <a href="list.php" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>