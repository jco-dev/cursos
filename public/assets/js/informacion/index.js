const form = document.getElementById("frm-informacion");

var validator = FormValidation.formValidation(form, {
  fields: {
    nombre: {
      validators: {
        notEmpty: {
          message: "Esta pregunta es obligatoria",
        },
        regexp: {
          regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/i,
          message: "El nombre puede contener caracteres alfabéticos y espacios",
        },
      },
    },
    celular: {
      validators: {
        notEmpty: {
          message: "Esta pregunta es obligatoria",
        },
        regexp: {
          regexp: /^(7|6)?[0-9]{7}$/i,
          message: "El número de celular debe empezar por 6 o 7",
        },
        integer: {
          message: "El número de celular no es válido",
        },
        stringLength: {
          max: 8,
          min: 8,
          message: "El número de celular debe tener 8 dígitos",
        },
      },
    },
  },
  plugins: {
    trigger: new FormValidation.plugins.Trigger(),
    bootstrap: new FormValidation.plugins.Bootstrap5({
      rowSelector: ".fv-row",
      eleInvalidClass: "",
      eleValidClass: "",
    }),
  },
});

const submitButton = document.getElementById("frm-informacion-button");
submitButton.addEventListener("click", function (e) {
  e.preventDefault();
  if (validator) {
    validator.validate().then(function (status) {
      if (status == "Valid") {
        submitButton.setAttribute("data-kt-indicator", "on");
        submitButton.disabled = true;
        let data = new FormData($("#frm-informacion")[0]);
        $.ajax({
          type: $("#frm-informacion").attr("method"),
          url: $("#frm-informacion").attr("action"),
          data: data,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "JSON",
        }).done(function (response) {
          submitButton.removeAttribute("data-kt-indicator");
          submitButton.disabled = false;
          if (typeof response.exito != "undefined") {
            Swal.fire({
              title: response.exito,
              text: "¡Gracias por registrarse!",
              icon: "success",
              showCancelButton: false,
              confirmButtonText: "Ok",
            }).then(function (result) {
              if (result.value) {
                $("#frm-informacion").trigger("reset");
                $('#celular').focus();
              }
            });
          }
          if (typeof response.error != "undefined") {
            Swal.fire({
              title: response.error,
              icon: "error",
              showCancelButton: false,
              confirmButtonText: "Ok",
            }).then(function (result) {
              if (result.value) {
                $("#frm-informacion").trigger("reset");
              }
            });
          }
        });
      }
    });
  }
});
