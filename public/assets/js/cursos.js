$(document).ready(function () {
  window.parametrosModal = function (
    idModal,
    titulo,
    tamano,
    onEscape,
    backdrop
  ) {
    $(idModal + "-title").html(titulo);
    $(idModal + "-dialog").removeClass("modal-lg");
    $(idModal + "-dialog").removeClass("modal-xl");
    $(idModal + "-dialog").addClass(tamano);
    $(idModal).modal({
      backdrop: backdrop,
      keyboard: onEscape,
      focus: true,
      show: true,
    });
  };
});
