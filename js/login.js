$("#loginForm").on("submit", function (event) {
    event.preventDefault();

    $.ajax({
        url: 'php/login.php',
        method: 'POST',
        data: {
            email: $("#email").val(),
            password: $("#password").val()
        },
        success: function (response) {
            if (response.length > 0) {
                localStorage.setItem("email", response);
                window.location.href = "../profile.html";
            } else {
                $("#loginResult").text("Login failed: " + response);
            }
        },

        error: function () {
            $("#loginResult").text("Error in login");
        }
    });
});
