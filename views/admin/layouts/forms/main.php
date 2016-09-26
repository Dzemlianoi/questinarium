<div class="show-form-div">
    <table class="forms-show">
        <thead>
            <tr>
                <th>Name</th>
                <th>Order</th>
                <th>Q of Questions</th>
            </tr>
            </thead>
        <tbody>
        <?php
            foreach ($data as $form){
                echo $this->render('row.php',['form'=>$form]);
            }
        ?>
        </tbody>
    </table>
</div>

<div class="form-add">
    <button type="button" id="formadd" class="button-forms-add-nav btn btn-success">
        <i class="glyphicon glyphicon-plus"></i> Add a form
    </button>
    <button type="button" id="formchange" class="button-forms-add-nav btn btn-primary">
        <i class="glyphicon glyphicon-sort-by-order"></i>  Change an order
    </button>
    <button type="button" id="formdel" class="button-forms-add-nav btn btn-warning">
        <i class="glyphicon glyphicon-minus"></i> Delete form
    </button>
</div>

<div class="form-add-workspace">
</div>


