$(document).on("input",".is-invalid",(function(){$(this).removeClass("is-invalid")})),$(document).on("change",".is-invalid",(function(){$(this).removeClass("is-invalid")})),$(document).find('input[type="number"]').on("keydown",(function(n){"ArrowUp"!=n.key&&"ArrowDown"!=n.key||n.preventDefault()}));