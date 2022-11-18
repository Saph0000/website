$(document).ready(function () {
  $("#submitButton").click(function () {
    if ($("#userNameTextBox").val() == "")
      $("#userNamSpan").text("Enter Username");
    else $("#userNamSpan").text("");
    if ($("#passwordTextBox").val() == "")
      $("#passwordSpan").text("Enter Password");
    else $("#passwordSpan").text("");
    if ($("#userNameTextBox").val() != "" && $("#passwordTextBox").val() != "")
      $.ajax({
        type: "POST",
        url: "login.php",
        data: {
          userName: $("#userNameTextBox").val(),
          password: $("#passwordTextBox").val(),
        },
        success: function (response) {
          $("#passwordSpan").text(response);
          if (response == "logged in") {
            setTimeout(function () {
              $("#passwordSpan").text(response);
              window.location.href = "index.php";
            }, 1000);
          } else {
            $("#passwordSpan").text("wrong Password or Username!");
          }
        },
      });
  });
  $("#logoutButton").click(function () {
    $.ajax({
      type: "POST",
      url: "ajax/logout.php",
      success: function () {
        window.location.href = "index.php";
      },
    });
  });
  $("#deleteUserButton").click(function () {
    $.ajax({
      type: "POST",
      url: "ajax/deleteUser.php",
      success: function () {
        window.location.href = "index.php";
      },
    });
  });

  $("#changePasswordSubmit").click(function () {
    if ($("#oldPassword").val() == "")
      $("#oldPasswordSpan").text("Enter Current Password");
    else $("#oldPasswordSpan").text("");
    if ($("#newPassword").val() == "")
      $("#newPasswordSpan").text("Enter New Password");
    else $("#newPasswordSpan").text("");
    if ($("#repeatNewPassword").val() == "")
      $("#repeatNewPasswordSpan").text("Enter New Password");
    else $("#repeatNewPasswordSpan").text("");
    if ($("#repeatNewPassword").val() !== $("#newPassword").val())
      $("#repeatNewPasswordSpan").text("Enter the same password");
    else $("#repeatNewPasswordSpan").text("");
    if (
      $("#repeatNewPassword").val() == $("#newPassword").val() &&
      $("#repeatNewPassword").val() !== "" &&
      $("#oldPassword").val() !== "" &&
      $("#newPassword").val() !== ""
    ) {
      $.ajax({
        type: "POST",
        url: "ajax/changePassword.php",
        data: {
          oldPassword: $("#oldPassword").val(),
          newPassword: $("#newPassword").val(),
        },
        success: function (response) {
          if (response == "Password updated successfully") {
            $("#repeatNewPasswordSpan").text(response);
            setTimeout(function () {
              window.location.href = "index.php";
            }, 500);
          } else $("#repeatNewPasswordSpan").text(response);
        },
      });
    }
  });

  $("#registerButton").click(function () {
    if ($("#registerUserNameTextBox").val() == "")
      $("#registerUserNameSpan").text("Enter Username");
    else $("#registerUserNameSpan").text("");

    if ($("#firstNameTextBox").val() == "")
      $("#firstNameSpan").text("Enter First Name");
    else $("#firstNameSpan").text("");

    if ($("#lastNameTextBox").val() == "")
      $("#lastNameSpan").text("Enter Last name");
    else $("#lastNameSpan").text("");

    if ($("#emailTextBox").val() == "") $("#emailSpan").text("Enter Email");
    else if (!validateEmail($("#emailTextBox").val()))
      $("#emailSpan").text("Enter a valid Email");
    else $("#emailSpan").text("");

    if ($("#registerPasswordTextBox").val() == "")
      $("#registerPasswordSpan").text("Enter Password");
    else if ($("#registerPasswordTextBox").val().length < 8)
      $("#registerPasswordSpan").text("Password is to short");
    else $("#registerPasswordSpan").text("");

    if ($("#repeatPasswordTextBox").val() == "")
      $("#repeatPasswordSpan").text("Repeat Password");
    else if (
      !(
        $("#repeatPasswordTextBox").val() == $("#registerPasswordTextBox").val()
      )
    )
      $("#repeatPasswordSpan").text("Password does not match");
    else $("#repeatPasswordSpan").text("");

    if (
      $("#registerUserNameTextBox").val() != "" &&
      $("#repeatPasswordTextBox").val() != "" &&
      $("#firstNameTextBox").val() != "" &&
      $("#lastNameTextBox").val() != "" &&
      $("#emailTextBox").val() != "" &&
      $("#repeatPasswordTextBox").val() != "" &&
      $("#repeatPasswordTextBox").val() ==
        $("#registerPasswordTextBox").val() &&
      $("#registerPasswordTextBox").val().length >= 8
    )
      $.ajax({
        type: "POST",
        url: "register.php",
        data: {
          userName: $("#registerUserNameTextBox").val(),
          firstName: $("#firstNameTextBox").val(),
          lastName: $("#lastNameTextBox").val(),
          email: $("#emailTextBox").val(),
          password: $("#repeatPasswordTextBox").val(),
        },
        success: function (response) {
          $("#passwordSpan").text(response);
          if (response == "Username already exist's") {
            $("#registerUserNameSpan").text(response);
          } else {
            setTimeout(function () {
              window.location.href = "index.php";
            }, 500);
          }
        },
      });
  });

  function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
  }

  //Tableedit
  if ($("#data-table").length) {
    $("#data-table").Tabledit({
      deleteButton: true,
      editButton: true,
      columns: {
        identifier: [0, "id"],
        editable: [
          [1, "name"],
          [2, "creationDate"],
          [3, "endDate"],
          [4, "description"],
        ],
      },
      hideIdentifier: true,
      url: "live_edit.php",
    });
  }
  if ($("#user-table").length) {
    $("#user-table").Tabledit({
      deleteButton: false,
      editButton: true,
      columns: {
        identifier: [0, "id"],
        editable: [
          [1, "userName"],
          [2, "email"],
          [3, "firstName"],
          [4, "lastName"],
        ],
      },
      hideIdentifier: true,
      url: "userEdit.php",
    });
  }

  $("#saveRowButton").click(function () {
    $.ajax({
      type: "POST",
      url: "addRow.php",
      data: {
        rowName: $("#rowNameTextBox").val(),
        creationDate: $("#creationDateTextBox").val(),
        endDate: $("#endDateTextBox").val(),
        description: $("#descriptionTextBox").val(),
      },
      success: function () {
        setTimeout(function () {
          window.location.href = "index.php";
        }, 500);
      },
    });
  });

  $("#addGoalButton").on("click", function () {});
  var even = false;

  $("#addGoalButton").click(function () {
    if (even) {
      doEven();
    } else {
      doOdd();
    }

    even = !even;
  });

  function doOdd() {
    $("#goalsInput").css("visibility", "visible");
  }

  function doEven() {
    $("#goalsInput").css("visibility", "hidden");
    $.ajax({
      type: "POST",
      url: "addGoal.php",
      data: {
        goal: $("#goalsInput").val(),
      },
      success: function () {
        history.go(0);
      },
    });
  }

  var coordinatesTop = function (element) {
    element = $(element);
    var top = element.position().top;
    return top;
  };
  var coordinatesLeft = function (element) {
    element = $(element);
    var left = element.position().left;
    return left;
  };

  $(function () {
    $(".goal").draggable({
      containment: ".goals-container",
      stack: ".draggable",
    });
  });

  $(function () {
    $(".draggable").draggable({
      containment: ".goals-container",
      stack: ".draggable",
      start: function () {},
      stop: function () {
        var idCode = $(this).attr("goal-id");
        var id = "#goal" + idCode;
        $.ajax({
          type: "POST",
          url: "saveGoal.php",
          data: {
            coordinatesTop: coordinatesTop(id),
            coordinatesLeft: coordinatesLeft(id),
            picId: idCode,
          },
        });
      },
    });
  });
  $(function () {
    $(".gallery-div").draggable({
      containment: ".gallery",
      stack: ".gallery-div",
      start: function () {},
      stop: function () {
        var idCode = $(this).attr("picture-id");
        var id = "#picture" + idCode;
        var zindex = $(id).css("z-index");
        $.ajax({
          type: "POST",
          url: "savePicture.php",
          data: {
            coordinatesTop: coordinatesTop(id),
            coordinatesLeft: coordinatesLeft(id),
            zindex: zindex,
            picId: idCode,
          },
        });
      },
    });
  });
  $(".draggable").mousedown(function (e) {
    if (e.which === 3) {
      var idCode = $(this).attr("goal-id");
      var id = "#goal" + idCode;
      var $menu = $("#rcMenu" + idCode);
      $("body").on("contextmenu", id, function (event) {
        $menu.css({
          display: "block",
          left: event.pageX,
          top: event.pageY - 2868,
        });
        return false;
      });

      $("html").click(function () {
        $menu.hide();
      });
    }
  });

  $(".delButton").click(function (event) {
    $.ajax({
      type: "POST",
      url: "delButton.php",
      data: {
        id: $(this).attr("sql-id"),
      },
      success: function () {
        history.go(0);
      },
    });
  });
});
