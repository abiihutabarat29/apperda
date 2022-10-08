//Sweetalert
// const swalFlash = $(".swal").data("swal");
// if (swalFlash) {
//   swal({
//     title: "Data Berhasil",
//     text: swalFlash,
//     icon: "success",
//     buttons: {
//       confirm: {
//         className: "btn btn-success",
//       },
//     },
//   });
// }
//Sweetalert
// const swalLogin = $(".swal-login").data("swal");
// if (swalLogin) {
//   swal({
//     text: swalLogin,
//     icon: "error",
//     Button: false,
//     timer: 3000,
//   });
// }
const swalLogout = $(".swal-logout").data("swal");
if (swalLogout) {
  swal({
    text: swalLogout,
    icon: "success",
    Button: false,
    timer: 3000,
  });
}
// const swalValid = $(".swal-valid").data("swal");
// if (swalValid) {
//   swal({
//     text: swalValid,
//     icon: "error",
//     Button: false,
//     timer: 5000,
//   });
// }
// const swalCek = $(".swal-cek").data("swal");
// if (swalCek) {
//   swal({
//     text: swalCek,
//     icon: "error",
//     Button: false,
//     timer: 5000,
//   });
// }

//Alert Notifikasi Atlantis

const swalFlash = $(".swal").data("swal");
if (swalFlash) {
  var placementFrom = "top";
  var placementAlign = "right";
  var state = "success";
  var style = "withicon";
  var content = {};

  content.message = "sukses";
  content.title = swalFlash;
  content.icon = "fa fa-bell";

  $.notify(
    content,
    {
      type: state,
      placement: {
        from: placementFrom,
        align: placementAlign,
      },
    },
    3000
  );
}
const swalFlashError = $(".swal-error").data("swal");
if (swalFlashError) {
  var placementFrom = "top";
  var placementAlign = "right";
  var state = "danger";
  var style = "withicon";
  var content = {};

  content.message = "error";
  content.title = swalFlashError;
  content.icon = "fa fa-bell";

  $.notify(
    content,
    {
      type: state,
      placement: {
        from: placementFrom,
        align: placementAlign,
      },
    },
    3000
  );
}

const swalLogin = $(".swal-login").data("swal");
if (swalLogin) {
  var placementFrom = "top";
  var placementAlign = "right";
  var state = "danger";
  var content = {};

  content.message = swalLogin;

  $.notify(
    content,
    {
      type: state,
      placement: {
        from: placementFrom,
        align: placementAlign,
      },
    },
    3000
  );
}
const swalValid = $(".swal-valid").data("swal");
if (swalValid) {
  var placementFrom = "top";
  var placementAlign = "right";
  var state = "danger";
  var style = "withicon";
  var content = {};

  content.message = swalValid;
  content.icon = "fa fa-bell";

  $.notify(
    content,
    {
      type: state,
      placement: {
        from: placementFrom,
        align: placementAlign,
      },
    },
    3000
  );
}
const swalCek = $(".swal-cek").data("swal");
if (swalCek) {
  var placementFrom = "top";
  var placementAlign = "right";
  var state = "danger";
  var style = "withicon";
  var content = {};

  content.message = swalCek;
  content.icon = "fa fa-bell";

  $.notify(
    content,
    {
      type: state,
      placement: {
        from: placementFrom,
        align: placementAlign,
      },
    },
    3000
  );
}
