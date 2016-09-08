<div class="show-form-div">
    <table class="forms-show">
        <thead>
            <tr>
                <th>ID</th>
                <th>E-mail</th>
                <th>Login</th>
                <th>Password</th>
            </tr>
            </thead>
        <tbody>
        <?php
            foreach ($data as $admin){
                echo $this->render('row.php',['admin'=>$admin]);
            }
        ?>
        </tbody>
    </table>
</div>

<div class="form-add">
    <button type="button" id="adminadd" class="button-forms-add-nav btn btn-success">
        <i class="glyphicon glyphicon-plus"></i> Add an admin
    </button>

    <button type="button" id="admindel" class="button-forms-add-nav btn btn-warning">
        <i class="glyphicon glyphicon-minus"></i> Delete an admin
    </button>
</div>

<div class="form-add-workspace">
</div>


