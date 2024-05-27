$(document).ready(function () {
    var luongchinh = parseFloat($('#luongchinh').val());
    var lamthem = parseFloat($('#lamthem').val());
    var phucap = parseFloat($('#phucap').val());
    var thue = parseFloat($('#thue').val());
    var baohiem = parseFloat($('#baohiem').val());
    var khenthuong = parseFloat($('#khenthuong').val());
    var giamtru = parseFloat($('#giamtru').val());
    var datranv = parseFloat($('#datranv').val());

    var tongluong1 = luongchinh + lamthem + phucap - baohiem - thue + khenthuong - giamtru;
    var concantra = tongluong1 - datranv;
    $('#concantra').val(concantra);
    $('#tongluong').val(tongluong1);
});
