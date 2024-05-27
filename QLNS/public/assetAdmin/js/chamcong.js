$(document).ready(function () {
    var radio1 = $('#inlineRadio1');
    var radio2 = $('#inlineRadio2');
    radio1.on('change', function () {
        if (radio1.prop('checked')) {
            radio2.prop('checked', false);
            $('#divgiovao').html(giovao());
            $('#divgiora').html(giora());

        }
    });

    radio2.on('change', function () {
        if (radio2.prop('checked')) {
            radio1.prop('checked', false);
            $('#divgiovao').html('');
            $('#divgiora').html('');
            $('#sosanhgiovao').html('');
            $('#sosanhgiora').html('');

        }
    });


});

function nghilamfc() {
    if (radio2.prop('checked')) {
        radio1.prop('checked', false);
        $('#divgiovao').html('');
        $('#divgiora').html('');
        $('#sosanhgiovao').html('');
        $('#sosanhgiora').html('');
    }
}

$('#giovao').change(function () {
    // alert('1');
    var gio1Input = document.getElementById("giovao").value;
    var gio2Input = document.getElementById("giovao0").value;

    var gio1Parts = gio1Input.split(":");
    var gio2Parts = gio2Input.split(":");

    var gio1Phut = parseInt(gio1Parts[0]) * 60 + parseInt(gio1Parts[1]);
    $('#tgvao').val(gio1Phut);
    var gio2Phut = parseInt(gio2Parts[0]) * 60 + parseInt(gio2Parts[1]);

    var chenhLechPhut = gio2Phut - gio1Phut;
    // alert(chenhLechPhut);

    if (chenhLechPhut > 0) {
        var gio = Math.floor(chenhLechPhut / 60);
        var phut = chenhLechPhut % 60;
        var label = 'Làm thêm:'

        $('#sosanhgiovao').html(lamthem(gio, phut, label));
        $('#tangca').html(tangca(chenhLechPhut));
        $('#tglamthemvao').val(chenhLechPhut);

    } else if (chenhLechPhut < 0) {
        var chenhLechPhut1 = Math.abs(chenhLechPhut);
        var gio = Math.floor(chenhLechPhut1 / 60);
        var phut = chenhLechPhut1 % 60;
        var label = 'Đi muộn:'
        $('#tglamthemvao').val(0);
        $('#sosanhgiovao').html(lamthem(gio, phut, label));

    } else {
        $('#sosanhgiovao').html('');
        $('#tangca').html('');
    }
});
$('#giora').change(function () {
    var gio1Input = document.getElementById("giora").value;
    var gio2Input = document.getElementById("giora0").value;

    var gio1Parts = gio1Input.split(":");
    var gio2Parts = gio2Input.split(":");

    var gio1Phut = parseInt(gio1Parts[0]) * 60 + parseInt(gio1Parts[1]);
    $('#tgra').val(gio1Phut);
    var gio2Phut = parseInt(gio2Parts[0]) * 60 + parseInt(gio2Parts[1]);

    var chenhLechPhut = gio2Phut - gio1Phut;
    // alert(chenhLechPhut);

    if (chenhLechPhut > 0) {
        // var chenhLechPhut1 = Math.abs(chenhLechPhut);
        var gio = Math.floor(chenhLechPhut / 60);
        var phut = chenhLechPhut % 60;
        var label = 'Về sớm:';
        $('#tglamthemra').val(0);
        $('#sosanhgiora').html(lamthem(gio, phut, label));

    } else if (chenhLechPhut < 0) {
        var chenhLechPhut1 = Math.abs(chenhLechPhut);
        var gio = Math.floor(chenhLechPhut1 / 60);
        var phut = chenhLechPhut1 % 60;
        var label = 'Làm thêm:';
        $('#tglamthemra').val(chenhLechPhut1);
        $('#sosanhgiora').html(lamthem(gio, phut, label));
        $('#tangca').html(tangca(chenhLechPhut1));

    } else {
        $('#sosanhgiora').html('');
        $('#tangca').html('');
    }
});
function tangca(chenhLechPhut) {
    var html = '<input type="hidden" name="tangca" value="' + chenhLechPhut + '">';
    return html;
}
function lamthem(gio, phut, label) {
    var html = ' <span class="labelgio">\n' +
        '                                        <label for="undefined">' + label + '</label>\n' +
        '                                    </span>\n' +
        '                                    <div>\n' +
        '                                        <input class="inputgio" type="number" min="0" value="' + gio + '" name="gio">\n' +
        '                                        <span>giờ</span>\n' +
        '                                        <input class="inputgio" type="number" min="0"  value="' + phut + '" name="phut">\n' +
        '                                        <span>phút</span>\n' +
        '\n' +
        '                                    </div>';
    return html;
}
function giovao() {
    var html = ' <input type="time" class="inputgio" id="giovao" name="giovao"\n' +
        '                                        style="width:150px">\n' +
        '                                    <label for="floatingInput">Vào:</label>';
    return html;
}
function giora() {
    var html = '<input type="time" class="inputgio" id="giora" name="giora"\n' +
        '                                        style="width:150px">\n' +
        '                                    <label for="floatingInput">Ra:</label>';
    return html;
}
