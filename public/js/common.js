/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/common.js ***!
  \********************************/
// app.js must be imported before this file
// Remove invalid-feedback on input or change
$(document).on("input", ".is-invalid", function () {
  $(this).removeClass("is-invalid");
});
$(document).on("change", ".is-invalid", function () {
  $(this).removeClass("is-invalid");
}); // Prevent up and down arrow keys from changing input number field value

$(document).find('input[type="number"]').on('keydown', function (e) {
  if (e.key == 'ArrowUp' || e.key == 'ArrowDown') {
    e.preventDefault();
  }
});
/******/ })()
;