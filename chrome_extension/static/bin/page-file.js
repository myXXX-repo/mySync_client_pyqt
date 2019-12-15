$(document).ready(function () {
    $('#filebtn').click(function () {
        var filetitle = $('#filetitle').val();
        var filetip = $('#filetip').val();
        var filepath = $('#fileitem').val();

        console.log(filetitle);
        console.log(filetip);
        console.log(filepath);
    });
});