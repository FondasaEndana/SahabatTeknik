$(function () {
    var statusInputUsername = 0;
    var statusInputEmail = 0;
    var statusInputPassword = 0;
    var periksaKesamaanPassword = 0;
    let statusDanger = ` <i class="fa-solid fa-circle-xmark fill-current text-danger text-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="Data sudah digunakan!"></i>`;
    let statusInfo = ` <i class="fa-solid fa-circle-check  fill-current text-info text-lg"></i>`;
    let btnSubmit = `<button class="btn btn-primary" id="save-btn">Simpan</button>`;
    let btnSubmitDisabled = `<span class="btn btn-dark" id="save-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled">Simpan</span>`;

    $('#inputPassword').keyup(function (e) {
        periksaKesamaanPassword = periksaPassword();
        if (periksaKesamaanPassword < 1 || $(this).val().length < 3) {
            $('#labelPassword').html('Password ' + statusDanger);
            $('#labelPassword2').html('Konfirmasi Password ' + statusDanger);
            statusInputPassword = 0;
        } else {
            $('#labelPassword').html('Password ' + statusInfo);
            $('#labelPassword2').html('Konfirmasi Password ' + statusInfo);
            statusInputPassword = 1;
        }
        periksaData();
    });

    $('#inputPassword2').keyup(function (e) {
        periksaKesamaanPassword = periksaPassword();
        if (periksaKesamaanPassword < 1 || $(this).val().length < 3) {
            $('#labelPassword').html('Password ' + statusDanger);
            $('#labelPassword2').html('Konfirmasi Password ' + statusDanger);
            statusInputPassword = 0;
        } else {
            $('#labelPassword').html('Password ' + statusInfo);
            $('#labelPassword2').html('Konfirmasi Password ' + statusInfo);
            statusInputPassword = 1;
        }
        periksaData();
    });

    $('#inputUsername').keyup(function (e) {
        // doPeriksaUsername($(this).val());
        // console.log($(this).val());
        periksaData();

    });


    $('#inputEmail').keyup(function (e) {
        // console.log($(this).val());
        // doPeriksaEmaill($(this).val());
        periksaData();
    });

    //method / function
    function doPeriksaUsername(inputan){
        //fetch data example
        $.ajax({
            url: InputanUrl,
            type: "GET",
            data: {
                username: inputan
            },
            success: function (response) {
                // console.log(response.data);
                if (response.data > 0) {
                    $('#labelUsername').html('Username ' + statusDanger);
                    statusInputUsername = 0;
                } else {
                    $('#labelUsername').html('Username ' + statusInfo);
                    statusInputUsername = 1;
                }
                // periksaData();
            }
        });
    }

    function doPeriksaEmaill(inputan){
        let validateEmailStatus = periksaEmail(inputan);
        if (validateEmailStatus > 0) {
            //fetch data example
            $.ajax({
                url: InputanUrl,
                type: "GET",
                data: {
                    email: inputan
                },
                success: function (response) {
                    // console.log(response.data);
                    if (response.data > 0) {
                        $('#labelEmail').html('Email ' + statusDanger);
                        statusInputEmail = 0;
                    } else {
                        $('#labelEmail').html('Email ' + statusInfo);
                        statusInputEmail = 1;
                    }
                    // periksaData();
                }
            });
        } else {
            $('#labelEmail').html('Email ' + statusDanger);
            $('#divBtnSubmit').html(btnSubmitDisabled);

        }
        // periksaData();
    
    }
    function periksaData() {
        doPeriksaUsername($('#inputUsername').val());
        doPeriksaEmaill($('#inputEmail').val());
        statusInputPassword = periksaPassword();
        if (statusInputUsername > 0 && statusInputEmail > 0 && statusInputPassword > 0) {
            $('#divBtnSubmit').html(btnSubmit);
        } else {
            $('#divBtnSubmit').html(btnSubmitDisabled);
        }
    }

    function periksaEmail(inputText) {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (inputText.match(mailformat)) {
            // console.log("Valid email address!");
            // document.form1.text1.focus();
            return 1;
        } else {
            // console.log("You have entered an invalid email address!");
            // alert("You have entered an invalid email address!");
            // document.form1.text1.focus();
            return 0;
        }
    }

    function periksaPassword() {
        if ($('#inputPassword').val() == $('#inputPassword2').val()) {
            return 1;
        } else {
            return 0;
        }
    }
});