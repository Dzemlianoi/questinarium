<form class="form-add-admin form-add-admin-low go-hide" role="form" method="post">
    <div class="form-group admin-form-group">
        <label for="name">New Form's name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    </div>
    <div class="form-group admin-form-group">
        <label for="order">New form's order</label>
        <input type="number" min="1" name="order" class="form-input-number form-control" id="order">
    </div>
    <button onclick="addFormDB()" type="button" class="btn btn-primary admin-submit admin-add-butt">Create</button>
</form>