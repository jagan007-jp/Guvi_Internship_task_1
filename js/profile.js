$(document).ready(function () {
    const email = localStorage.getItem("email");
    if (!email) {
        alert("Login first");
        window.location.href = "../login.html";
    }

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
        }
    })

    $("#profileForm").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '../php/profile.php',
            method: 'POST',
            data: {
                action: 'post',
                email,
                name: $("#name").val(),
                age: $("#age").val(),
                dob: $("#dob").val(),
                contact: $("#contact").val()
            },
            success: function (response) {
                console.log("Response:", response);
                $("#profileResult").text(response);
            }
        })
    })
});

