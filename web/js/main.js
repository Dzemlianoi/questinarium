var App={
    part:0,
    init:function(){
        App.disabling();
        $('.admin-button').click(this.categoryChange);

        $('#forms').click(this.clickForms);
        $('#formadd').click(this.showFormAdd);
        $('#formchange').click(this.showChangeForm);
        $('#formdel').click(this.showDelForm);
        $('.form-changeorder-form').click(this.chOrderForm);
        $('.form-add-forms').click(this.addForm);
        $('.form-delete-form').click(this.delForm);
        //Admins
        $('#admins').click(this.clickAdmins);

        $('#adminadd').click(this.showAdminAdd);
        $('#admindel').click(this.showAdminDel);

        $('.admin-add-butt').click(this.addAdmin);
        $('.admin-remove').click(this.delAdmin);

        //Questions
        $('#questions').click(this.clickQuestions);

    },
    disabling:function(){
        $('#forms').off('click');
        $('#formadd').off('click');
        $('#formchange').off('click');
        $('#formdel').off('click');
        $('.form-submit').off('click');
        $('.form-changeorder-form').off('click');
        $('.form-delete-form').off('click');

        $('#admins').off('click');
        $('.admin-button').off('click');
        $('#adminadd').off('click');
        $('.admin-add-butt').off('click');
        $('#admindel').off('click');
        $('.admin-remove').off('click');

    },

    showForm:function(url,form){
        $.ajax({
            url:url,
            success: function (data) {
                $('.form-add-workspace').empty().append(data);
                $(form).fadeIn('go-hide',function(){
                    App.init();
                })
            }
        })
    },

    //Left-menu

    categoryChange:function () {
        App.normalizeCat();
        var icon = $(this).find('i');
        icon.addClass('big-ico');
        $(this).addClass('admin-become-active');
    },
    normalizeCat:function() {
        $('.admin-button i').removeClass('big-ico');
        $('.admin-button').removeClass('admin-become-active');
    },

    //Forms

    wpBecomeEmpty:function(){
        $('.wrapper-work-admin').empty();
    },

    clickForms:function(){
        $.ajax({
            url: "/web/index.php?r=admin/addform",
            success:function(data){
                App.wpBecomeEmpty();
                $('.wrapper-work-admin').prepend(data);
                App.init();
            }
        })
    },

    //Show forms

    showFormAdd:function(){
        var url="/web/index.php?r=admin/showformadd";
        var form='.form-add-form';
        return App.showForm(url,form);
    },

    showChangeForm:function(){
        var url="/web/index.php?r=admin/showformchange";
        var form='.form-change';
        return App.showForm(url,form);
    },

    showDelForm:function(){
        var url="/web/index.php?r=admin/showformdelete";
        var form='.form-delete';
        return App.showForm(url,form);
    },

    showMessage:function(url,message,state){
        $('.form-add-workspace').load(url, function (response, status) {
            if (status != "error") {
                $('.message-admin').text(message).addClass('message-' + state);
                $('.message-admin').fadeIn('go-hide', function () {
                    App.init();
                })
            }
        });
    },

    addForm:function() {
        var name = $('#name').val();
        var order = $('#order').val();
        var message = '';
        var state = '';
        $.ajax({
            url: "/web/index.php?r=admin/addform",
            data: "name=" + name + "&order=" + order,
            success: function (data) {
                if (data == 0) {
                    message = 'Form name or order isn\'t unique';
                    state = 'error';
                } else {
                    message = 'Your form added';
                    state = 'success';
                    App.wpBecomeEmpty();
                    $('.wrapper-work-admin').prepend(data);
                }

                var url = '/views/admin/layouts/messages/message.php';
                App.showMessage(url,message,state);
            }
        });
    },
    delForm:function(){
        var message;
        var state;
        var id=$('select option:selected').val();
        $.ajax({
            url: "/web/index.php?r=admin/deleteform",
            data:'id='+id,
            success: function (data) {
                if (data==0){
                    message = 'Current form has questions';
                    state = 'error';
                }else{
                    message = 'Form deleted';
                    state = 'success';
                    App.wpBecomeEmpty();
                    $('.wrapper-work-admin').prepend(data);
                }

                var url = '/views/admin/layouts/messages/message.php';
                App.showMessage(url,message,state);
            }
        })
    },
    chOrderForm:function(){
        var message,state;
        var form1=$('select#form1 option:selected').val();
        var form2=$('select#form2 option:selected').val();

        $.ajax({
            url: "/web/index.php?r=admin/changeform",
            data: "id1="+form1+'&id2='+form2,
            success: function(data) {
                message = 'Order changed';
                state = 'success';
                App.wpBecomeEmpty();
                $('.wrapper-work-admin').prepend(data);

                var url = '/views/admin/layouts/messages/message.php';
                App.showMessage(url,message,state);
            }
        })
    },

    //Admins
    clickAdmins:function(){
        $.ajax({
            url: "/web/index.php?r=admin/showadmins",
            success:function(data){
                App.wpBecomeEmpty();
                $('.wrapper-work-admin').prepend(data);
                App.init();
            }
        })
    },

    showAdminAdd:function(){
        var url="/web/index.php?r=admin/showadminadd";
        var form='.form-add-admin';
        return App.showForm(url,form);
    },

    showAdminDel:function () {
        var url="/web/index.php?r=admin/showadmindel";
        var form='.admin-delete';
        return App.showForm(url,form);
    },

    addAdmin:function(){
        var login=$('#login').val();
        var password=$('#pass').val();
        var email=$('#email').val();
        var message,state;

        $.ajax({
            url: "/web/index.php?r=admin/addadmin",
            data:'login='+login+'&password='+password+'&email='+email,
            success:function(data){
                if (data==0){
                    message = 'Login isn\'t unique';
                    state = 'error';
                }else{
                    message = 'Admin added';
                    state = 'success';
                    App.wpBecomeEmpty();
                    $('.wrapper-work-admin').prepend(data);
                }
                var url = '/views/admin/layouts/messages/message.php';
                App.showMessage(url,message,state);
            }
        })
    },

    delAdmin:function(){
        var id=$('select option:selected').val();

        $.ajax({
            url: "/web/index.php?r=admin/del-admin",
            data:{
                'id':id
            },
            success:function(data){
                if (data==0){
                    message = 'Current admin might not be deleted';
                    state = 'error';
                }else{
                    message = 'Admin was deleteed';
                    state = 'success';
                    App.wpBecomeEmpty();
                    $('.wrapper-work-admin').prepend(data);
                }
                var url = '/views/admin/layouts/messages/message.php';
                App.showMessage(url,message,state);
            }
        })
    },

    //Questions

    clickQuestions:function(){
        $.ajax({
            url: "/web/index.php?r=admin/show-questions",
            success:function(data){
                App.wpBecomeEmpty();
                $('.wrapper-work-admin').prepend(data);
                App.init();
            }
        })
    }

};

App.init();


