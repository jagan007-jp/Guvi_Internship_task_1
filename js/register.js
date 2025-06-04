$("#registerForm").on('submit', function (e) {
    e.preventDefault();
    let email = $("#email").val();
    let password = $("#password").val();

    $.ajax({
        url: "../php/register.php",
        method: 'POST',
        data: {
            email: email,
            password: password
        },
        success: function (response) {
            if (response === "success") {
                window.location.href = "../login.html";
            } else {
                $("#result").text(response);
            }

        },
        error: function () {
            $("#result").text("Registration failed");
        }
    })
})