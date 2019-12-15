$(document).ready(function () {
    $('#servaddress').attr("value", localStorage.getItem("servAddress"));
    $('#key').attr("value", localStorage.getItem("key"));
    $('#devname').attr("value", localStorage.getItem("devname"));
    $("#submit_servaddress").click(function () {
        var servaddr = $('#servaddress').val();
        localStorage.setItem("servAddress", servaddr);
    });
    $("#submit_key").click(function () {
        var servaddr = $('#key').val();
        localStorage.setItem("key", servaddr);
    });
    $("#submit_devname").click(function () {
        var devname = $("#devname").val();
        localStorage.setItem("devname", devname);
    });
    $("#close").click(function () {
        window.close()
    });
});

//localStorage.getItem("servAddress")