/**
 * Created by root on 4/7/17.
 */
showCategory();
function showCategory() {
    $.ajax({
        type:'get',
        url: 'showCategory',
        success:function (msg) {
            $("#showCat").html(msg);
        }
    });
}
$(function () {
    $("#logout").on('click', function () {
        $.ajax({
            type:'get',
            url: '/user/logout',
            success:function (msg) {
                if(msg==='logout'){
                    window.location.reload('/auth/login');
                }
            }
        });
    });

    $("#btnAddCat").on('click', function () {
        var cat_name=$("#category_name").val();
        var _token=$("#_token").val();
        $.ajax({
            type: 'post',
            url: '/coffee/newCategory',
            data: {cat_name:cat_name, _token:_token},
            success:function (msg) {
                $("#msgAddCat").html(msg);
                if(msg==="<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> The category have been adding successfully.</li>"){
                    $("#category_name").val('');
                    showCategory();
                }
            }
        });
    });
    $("body").delegate('#delCat', 'click', function () {
        var id=$(this).attr('idd');
        $.ajax({
            type : 'get',
            url : 'delCat',
            data: {id:id},
            success:function (msg) {
                if(msg==='delCatSuccess'){
                    showCategory();
                }

            }
        });
    })

});