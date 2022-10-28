$(document).ready(() => {
    $('#submitbtn').click((e) => {
        e.preventDefault();
        if ($('#password').val() !== $('#confirm_password').val()) {
            alert('Passwords Do Not Match');
            return;
        }
        if ($('#form').smkValidate()) {
            let images = $('#image').prop('files');
            let data = new FormData();
            data.append("form_data", $("#form").serialize());
            for (let v = 0; v < images.length; v++) {
                data.append("image[]", images[v]);
            }
            $.ajax({
                method: "post",
                processData: false,
                contentType: false,
                cache: false,
                url: "/PHP-CRUD/actions/add_new_record.php",
                data,
                enctype: "multipart/form-data",
                success: function (response) {
                    alert(response);
                },
            });
        }
    });
    // Load Uploaded Images
    $('#image').change((e) => {
        const input = e.target;
        for (let i = 0; i < input.files.length; i++) {
            let reader = new FileReader();
            reader.onload = function () {
                const dataURL = reader.result;
                document.getElementById('images_container').innerHTML += `<div class="col-md-4">
                                    <img src="${dataURL}" style="max-width: 100px; max-height: 100px">
                                </div>`;
            };
            reader.readAsDataURL(input.files[i]);
        }
        // console.log(arrayOfFiles);
    });
});