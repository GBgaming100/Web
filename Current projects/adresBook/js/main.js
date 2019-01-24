$.getScript("js/function_mustache.js");

$(document).ready(function () {
    loadData();

    $(".login-text").hide();
    //On click events are used to execute "turnBlockOnAndOff" function
    $(".btn-login").on("click", function () {
        var userName = $(this).parent().find("input", ".username").val();

        var Password = $(this).parent().find("input", ".Password").val();

        login(userName, Password);
    });

    $(".btn_add_contact").on("click", function () {
        var FirtsName = $(".FirtsName").val();
        var LastName = $(".LastName").val();
        var Phone = $(".Number").val();
        var Email = $(".Email").val();
        var Street = $(".Street").val();
        var Number = $(".Number").val();
        var Extra = $(".Extra").val();
        var Zipcode = $(".Zipcode").val();
        var City = $(".City").val();
        var img = $(".custom-file-input").val();
        var userId = 1;
        add_contact(FirtsName, LastName, Phone, Email, Street, Number, Extra, Zipcode, City, userId, img);
        $('#createProjects').modal('hide');
    })
    $(".btn_add_register").on("click", function () {
        var Username = $(".username").val();
        var Password = $(".password").val();
        var emailRegister = $(".emailRegister").val();

        create_account(Username, Password, emailRegister);

        $('#createAccount').modal('hide');
    })
    $("body").on("click", ".more_info_button", function () {
        console.log("TEST");
    })
});

function login(userName, Password) {

    console.log(userName);
    console.log(Password);

    $.ajax({
        url: "inc/login.php",
        type: "POST",
        data: {
            userName: userName,
            password: Password
        },

        success: function (data) {
            // console.log(data)
            data = JSON.parse(data);
            $(".login-form").hide();
            $(".login-text").show();
            $(".login-text").html(data.userName);
            console.log(data);
        }
    });
}

function create_account(userName, passWord, emailRegister) {
    $.ajax({
        url: "inc/createAccount.php",
        type: "POST",
        data: {
            userName: userName,
            password: passWord,
            email: emailRegister
        },
        success: function (data) {
            console.log(data);
            login();
        }
    })
}

function add_contact(FirtsName, LastName, Phone, Email, Street, Number, Extra, Zipcode, City, userId, img) {
    $.ajax({
        url: "inc/addContact.php",
        type: "POST",
        data: {
            FirtsName: FirtsName,
            LastName: LastName,
            PhoneNumber: Phone,
            Email: Email,
            Street: Street,
            Number: Number,
            Extra: Extra,
            Zipcode: Zipcode,
            City: City,
            userId: userId,
            img: img
        },

        success: function (data) {
            console.log(data);
            loadData();
        }
    });
}

function loadData() {
    $.ajax({
        url: "inc/loadData.php",
        type: "GET",
        success: function (data) {
            data = JSON.parse(data);
            console.table(data);
            mustache(data, ".template_contacts", ".template_contacts_outerDiv");
        }
    })
}