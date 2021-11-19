$("#delBtn").click(function() {
    $("#image").val('');
    $("#imagePreview").css("display","none");
    $('.input-field').prop('readonly', false);
    $('.input-field').css("background", "white");
});