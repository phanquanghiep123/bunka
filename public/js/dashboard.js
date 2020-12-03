String.prototype.replaceAll = function(find, replace) {
    var str = this;
    return str.replace(new RegExp(find.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&'), 'g'), replace);
};
Number.prototype.formatPrice = function($f = '0,0[.]00') {
    var str = this;
    str = str.UnformatPrice();
    return numeral(str).format($f);
};
String.prototype.formatPrice = function($f = '0,0[.]00') {
    var str = this;
    str = str.UnformatPrice();
    return numeral(str).format($f);
};
String.prototype.UnformatPrice = function() {
    var str = this;
    var myNumeral2 = numeral(str);
    return parseFloat(myNumeral2.value());
};
Number.prototype.UnformatPrice = function() {
    var str = this;
    var myNumeral2 = numeral(str);
    return parseFloat(myNumeral2.value());
};
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
});

function changeLang($id) {
    var txt;
    var r = confirm(_LANGS['[_Change_Lang_Messege_]']);
    if (r == true) {
       $.ajax({
            url: "/auth/changelang/" + $id,
            type: "get"
        });
    } 
    return false;
}
function SeeNotifition($n) {
    //if($n == 0) return false;
    $.ajax({
        url: "/profile/see-notifycation/",
        type: "get",
        success : function($data){
            if($data.status == 1){
                $("#notificationDropdown .count").remove();
                if($data.more == false){
                    $(".more-block-notifycation").css("display","block");
                    $("#more-notifycation").remove();
                }else{
                    $(".more-block-notifycation").css("display","block");
                }
            }
        }
    });
}
$(document).on("click",'.dropdown .more-block-notifycation #more-notifycation',function(){
    var offset = $(this).attr("data-offset");
    var _this = $(this);
    $.ajax({
        url: "/profile/notifycation/" + offset,
        type: "get",
        success : function($data){
            if($data.status == 1){
                if($data.more == false){
                    $("#more-notifycation").remove();
                }
                if($data.data){
                    var html = "";
                    $.each($data.data,function($key,$val){
                        html += `<a href="`+$val.url_detail+`" class="dropdown-item preview-item">
                            <div class="preview-item-content"><i class="mdi `+(($val.view_detail == 1) ? 'mdi-check' : 'mdi-eye')+`"></i> `+$val.title+`</div>
                        </a>
                        <div class="dropdown-divider"></div>`;
                    });
                    $(".dropdown-menu .content-notifycation").append(html);
                }
            }
            _this.attr("data-offset",offset + 1);

        }
    });
})
$(document).on("click",'.navbar-menu-wrapper .dropdown-menu',function(e) {
    e.stopPropagation();
});
$('#modal-add').on('hidden.bs.modal', function(e) {
    $.each($(this).find("[name]:not(.not-change)"), function() {
        $(this).val("");
    });
    $.each($('#modal-add').find("img"), function() {
        $(this).attr("");
    });
})
$(document).ajaxSuccess(function(v1, v2, v3) {
    try {
        if (typeof v2.responseJSON != undefined) {
            if (typeof v2.responseJSON._reload != undefined && v2.responseJSON._reload == 1) {
                location.reload();
            }
            if (typeof v2.responseJSON._redirect != undefined && v2.responseJSON._redirect == 1) {
                location.href = v2.responseJSON._redirect_url;
            }
        }
    } catch (e) {}
});
jQuery(document).ready(function($) {
    var URL = document.location.href;
    $.each($("#sidebar .nav-item a"), function() {
        if ($(this).attr("href") == URL) {
            $(this).addClass('active');
        }
    })
    $.each($('body .format-price'), function() {
        var price = $(this).html();
        if (price) {
            $(this).html(price.formatPrice());
        }
    });
    $("#daterange").daterangepicker({
        singleDatePicker: true,
        "opens": 'left',
        buttonClasses: "btn",
        applyClass: "btn-primary",
        cancelClass: "btn-secondary"
    }, function(a, t, n) {
        $("#daterange .form-control").val(a.format("DD/MM/YYYY"));
    });
    var tableprofilematches = $('#example');
    if (tableprofilematches.length) {
        $(tableprofilematches).DataTable({
            paging: false,
            info: false,
            searching: false,
        });
    }
    var tableprofilematches2 = $('#example2');
    if (tableprofilematches2.length) {
        $(tableprofilematches2).DataTable({
            paging: false,
            info: false,
            searching: false,
            ordering: false
        });
    }
    var tableprofilematches3 = $('#example3');
    if (tableprofilematches3.length) {
        $(tableprofilematches3).DataTable({
            paging: false,
            info: false,
            searching: false,
            ordering: false
        });
    }
    var tableprofilematches4 = $('#example4');
    if (tableprofilematches4.length) {
        $(tableprofilematches4).DataTable({
            paging: false,
            info: false,
            searching: false,
            ordering: false,
        });
    }
});
