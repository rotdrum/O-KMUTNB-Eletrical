$(document).ready(function() {
    $('#file-upload-1').change(function() {
        var filepath = this.value;
        var m = filepath.match(/([^\/\\]+)$/);
        var filename = m[1];
        $('#filename-1').html(filename);
    });

    $(document).on('keypress',function(e) {
        if(e.which == 13) {
            var msg = $("#area").val();
            $("#area").val(msg + "<br>");
        }
    });
});