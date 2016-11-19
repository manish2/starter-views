<h2>Menu Maintenance - {action}</h2>
{error_messages}
<form action="/admin/save" method="post" enctype="multipart/form-data">
{fid}
{fname}
{fdescription}
{fprice}
{fpicture}
<div class="form-group">
        <label for="replacement">Replacement picture</label>
        <input type="file" id="replacement" name="replacement"/>
</div>
{fcategory}
{zsubmit} <a class="btn btn-default" role="button" href="/admin/cancel">Cancel</a>
 <a class="btn btn-default" role="button" href="/admin/delete">Delete</a>
 <a class="btn btn-default" role="button" href="/admin/add">Add a new menu item</a>
</form>