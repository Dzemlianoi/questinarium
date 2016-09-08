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

    },
    disabling:function(){
        $('.admin-button').off('click');

        $('#forms').off('click');
        $('#formadd').off('click');
        $('#formchange').off('click');
        $('#formdel').off('click');

        $('.form-submit').off('click');
        $('.form-changeorder-form').off('click');
        $('.form-delete-form').off('click');
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
            url: "/web/index.php?r=admin/addadminform",
            success:function(data){
                App.wpBecomeEmpty();
                $('.wrapper-work-admin').prepend(data);
                App.init();
            }
        })
    }
};

App.init();

//
// function adminRegistry(){
//     var login=$('#login').val();
//     var password=$('#pass').val();
//     var form_block=$('.form-add-admin');
//
//     $.ajax({
//         type: "POST",
//         url: "/admin/adminadd",
//         data: "login="+login+"&password="+password,
//         success: function(data){
//             var data_array=JSON.parse(data);
//             var message=data_array['message'];
//             var status=data_array['status'];
//
//             adminInsertMessage(status,message);
//
//             form_block.addClass('form-add-admin-middle');
//         }
//     });
// }


