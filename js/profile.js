$(document).ready(function () {
    const email = localStorage.getItem("email");
    if (!email) {
        alert("Login first");
        window.location.href = "../login.html";
    }
    let img_data = "";
    $("#imagesrc").on("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                img_data = e.target.result;
                $("#profile_pic").attr("src", img_data);
            }
            reader.readAsDataURL(file);
        }
    })


    $.ajax({
        url: '../php/profile.php',
        method: 'POST',
        data: {
            action: 'get',
            email
        },
        success: function (data) {
            $("#name").val(data.name);
            $("#age").val(data.age);
            $("#dob").val(data.dob);
            $("#contact").val(data.contact);
            if (data.img_data) {
                $("#profile_pic").attr('src', data.img_data);
            }
        }
    })

    $("#profileForm").on('submit', function (e) {
        e.preventDefault();
        let final_image = img_data || $("#profile_pic").attr("src");
        $.ajax({
            url: '../php/profile.php',
            method: 'POST',
            data: {
                action: 'post',
                email,
                name: $("#name").val(),
                age: $("#age").val(),
                dob: $("#dob").val(),
                contact: $("#contact").val(),
                img_data: final_image
            },
            success: function (response) {
                $("#profileResult").text(response);
                setTimeout(function () {
                    $("#profileResult").text("");
                }, 3000);
            }
        })
    })
});

