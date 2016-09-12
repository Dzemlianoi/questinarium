<form class="admin-delete go-hide" role="form">
    <select class="form-control">
    <?
        foreach ($data as $admin) {
            echo $this->render('option.php',['admin'=>$admin]);
        }
    ?>

    </select>
    <button type="button" class="btn btn-primary admin-submit admin-remove">Delete</button>
</form>