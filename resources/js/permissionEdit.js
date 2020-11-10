$(function() {

    //控制權限編輯頁面的「勾選部分」
    $('.account-permission .d-title input[type="checkbox"]').click(function (e) {
        let parent_check_box = $(this);
        $.each( $(this).parents('.d-flex.d-row').children('.form-group'), function (key, value) {
            if(key!=0){
                if(parent_check_box.prop('checked')){
                    $(value).find('input[type="checkbox"]').prop('checked', true);
                }else if(!parent_check_box.prop('checked')){
                    $(value).find('input[type="checkbox"]').prop('checked', false);
                }
            }
        })
    });

});

