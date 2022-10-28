$("#verificationForm").submit((e) => {
    e.preventDefault();
    let email = $("#email").val();
    let token = $("#token").val();
    if (!email) {
        return alert('please Enter An Email');
    }
    if (!token) {
        return alert('please Enter a Token');
    }
    if (token.length !== 6) {
        return alert('Token Length Must Be Equal To 6 characters');
    }
    let formData = new FormData();
    formData.append('email', $("#email").val());
    formData.append('token', $("#token").val());

    $.ajax({
        method: "post",
        processData: false,
        contentType: false,
        cache: false,
        url: "/PHP-CRUD/actions/verify.php",
        data: formData,
        success: function (response) {
            alert(response);
        },
    });
});