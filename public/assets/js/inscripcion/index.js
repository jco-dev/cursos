"use strict";

var KTPreinscripcion = (function () {
  var stepper;
  var form;
  var formSubmitButton;
  var formContinueButton;

  // Variables
  var stepperObj;
  var validations = [];

  // Private Functions
  var initStepper = function () {
    // Initialize Stepper
    stepperObj = new KTStepper(stepper);

    // Stepper change event
    stepperObj.on("kt.stepper.changed", function (stepper) {
      if (stepperObj.getCurrentStepIndex() === 4) {
        formSubmitButton.classList.remove("d-none");
        formSubmitButton.classList.add("d-inline-block");
        formContinueButton.classList.add("d-none");
      } else if (stepperObj.getCurrentStepIndex() === 5) {
        formSubmitButton.classList.add("d-none");
        formContinueButton.classList.add("d-none");
      } else {
        formSubmitButton.classList.remove("d-inline-block");
        formSubmitButton.classList.remove("d-none");
        formContinueButton.classList.remove("d-none");
      }
    });

    // Validation before going to next page
    stepperObj.on("kt.stepper.next", function (stepper) {
      // Validate form before change stepper step
      var validator = validations[stepper.getCurrentStepIndex() - 1];

      if (validator) {
        validator.validate().then(function (status) {
          if (status == "Valid") {
            stepper.goNext();
            KTUtil.scrollTop();
          } else {
            Swal.fire({
              text: "Por favor, llene los campos obligatorios.",
              icon: "warning",
              buttonsStyling: false,
              confirmButtonText: "Ok",
              customClass: {
                confirmButton: "btn btn-light",
              },
            }).then(function () {
              KTUtil.scrollTop();
            });
          }
        });
      } else {
        stepper.goNext();

        KTUtil.scrollTop();
      }
    });

    // Prev event
    stepperObj.on("kt.stepper.previous", function (stepper) {
      stepper.goPrevious();
      KTUtil.scrollTop();
    });
  };

  var handleForm = function () {
    formSubmitButton.addEventListener("click", function (e) {
      // Validate form before change stepper step
      var validator = validations[3]; // get validator for last form

      validator.validate().then(function (status) {
        if (status == "Valid") {
          e.preventDefault();
          formSubmitButton.disabled = true;
          formSubmitButton.setAttribute("data-kt-indicator", "on");
          let data = new FormData($("#frm-preinscripcion")[0]);
          $.ajax({
            type: $("#frm-preinscripcion").attr("method"),
            url: $("#frm-preinscripcion").attr("action"),
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
          }).done(function (response) {
            formSubmitButton.disabled = false;
            formSubmitButton.setAttribute("data-kt-indicator", "off");
            if (typeof response.exito != "undefined") {
              Swal.fire({
                title: response.exito,
                text: "¡Gracias por inscribirse!",
                icon: "success",
                showCancelButton: false,
                confirmButtonText: "Ok",
              }).then(function (result) {
                if (result.value) {
                  $("#frm-preinscripcion").trigger("reset");
                  location.reload();
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
                  location.reload();
                  limpiar_formulario();
                  $("#frm_curso_inscripcion").trigger("reset");
                }
              });
            }
            if (typeof response.warning != "undefined") {
              Swal.fire({
                title: response.warning,
                icon: "warning",
                showCancelButton: false,
                confirmButtonText: "Ok",
              });
            }

            if (typeof response.info != "undefined") {
              Swal.fire({
                title: response.info,
                icon: "info",
                showCancelButton: false,
                confirmButtonText: "Ok",
              }).then(function (result) {
                if (result.value) {
                  location.reload();
                  $("#frm-preinscripcion").trigger("reset");
                }
              });
            }
          });
        } else {
          Swal.fire({
            text: "Lo sentimos, parece que se han detectado algunos errores, inténtelo de nuevo.",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok",
            customClass: {
              confirmButton: "btn btn-light",
            },
          }).then(function () {
            KTUtil.scrollTop();
          });
        }
      });
    });
  };

  var initValidation = function () {
    // Step 1
    validations.push(
      FormValidation.formValidation(form, {
        fields: {
          ci: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
              stringLength: {
                max: 11,
                message: "El número de carnet puede tener hasta 11 dígitos",
              },
            },
          },
          expedido: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
            },
          },

          correo: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
              emailAddress: {
                message: "El correo debe ser un correo válido",
              },
            },
          },
          nombre: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
              regexp: {
                regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/i,
                message:
                  "El nombre puede contener caracteres alfabéticos y espacios",
              },
            },
          },

          paterno: {
            validators: {
              regexp: {
                regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/i,
                message:
                  "El apellido paterno puede contener caracteres alfabéticos y espacios",
              },
            },
          },

          materno: {
            validators: {
              regexp: {
                regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/i,
                message:
                  "El apellido materno puede contener caracteres alfabéticos y espacios",
              },
            },
          },
          genero: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
            },
          },

          dia: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
            },
          },
          mes: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
            },
          },
          gestion: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
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
          ciudad_residencia: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
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
      })
    );
    // Step 2
    validations.push(
      FormValidation.formValidation(form, {
        fields: {
          modalidad_inscripcion: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
            },
          },
          id_banco: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
            },
          },
          nro_transaccion: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
            },
          },
          respaldo_transaccion: {
            validators: {
              notEmpty: {
                message: "La imagen de respaldo de pago es obligatoria",
              },
              file: {
                extension: "png,jpg,jpeg",
                type: "image/jpeg,image/png, image/jpg",
                message: "La selección del archivo no es válido",
              },
            },
          },
          fecha_pago: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
            },
          },
          monto_pago: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
              between: {
                min: 50,
                max: 1000,
                message: "El monto de pago debe estar entre 50 y 1000 Bs.",
              },
            },
          },
          avatar: {
            validators: {
              notEmpty: {
                message: "Seleccione una imagen",
              },
              file: {
                extension: "jpg,jpeg",
                type: "image/jpeg,image/png",
                message: "La seleccion del archivo no es valido",
              },
            },
          },
        },

        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          // Bootstrap Framework Integration
          bootstrap: new FormValidation.plugins.Bootstrap5({
            rowSelector: ".fv-row",
            eleInvalidClass: "",
            eleValidClass: "",
          }),
        },
      })
    );
    // Step 3
    validations.push(
      FormValidation.formValidation(form, {
        fields: {
          tipo_certificado_solicitado: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
              },
            },
          },
          certificacion: {
            validators: {
              notEmpty: {
                message: "Esta pregunta es obligatoria",
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
      })
    );

    // Step 4
    validations.push(
      FormValidation.formValidation(form, {
        fields: {},
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap: new FormValidation.plugins.Bootstrap5({
            rowSelector: ".fv-row",
            eleInvalidClass: "",
            eleValidClass: "",
          }),
        },
      })
    );
  };

  return {
    // Public Functions
    init: function () {
      // Elements
      stepper = document.querySelector("#preinscripcion_stepper");
      form = stepper.querySelector("#frm-preinscripcion");
      formSubmitButton = stepper.querySelector(
        '[data-kt-stepper-action="submit"]'
      );
      formContinueButton = stepper.querySelector(
        '[data-kt-stepper-action="next"]'
      );

      initStepper();
      initValidation();
      handleForm();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  $("#gestion").change(function () {
    if ($(this).val().length > 0) $("#mes").removeAttr("disabled");
    else $("#mes").attr("disabled", "disabled");
  });

  $("#mes").change(function () {
    if ($(this).val().length > 0) $("#dia").removeAttr("disabled");
    else $("#dia").attr("disabled", "disabled");
  });

  $("#fecha").on("change", "#gestion, #mes", function (e) {
    let anio = parseInt($("#gestion").val());
    let mes = parseInt($("#mes").val()) - 1;
    let res = Date.getDaysInMonth(anio, mes);
    fillDay(res);
  });
  // Fin Validación de fecha de nacimiento //

  let numeroCelular = document.getElementById("celular");
  numeroCelular.addEventListener("input", function () {
    if (this.value.length > 8) this.value = this.value.slice(0, 8);
  });

  let numeroCi = document.getElementById("ci");
  numeroCi.addEventListener("input", function () {
    if (this.value.length > 11) this.value = this.value.slice(0, 11);
  });

  let nroTransaccion = document.getElementById("nro_transaccion");
  nroTransaccion.addEventListener("input", function () {
    if (this.value.length > 20) this.value = this.value.slice(0, 20);
  });

  $("#banco").hide();
  $("input[type=radio][name=modalidad_inscripcion]").change(function () {
    if (this.value == "TIGO MONEY" || this.value == "PAGO EFECTIVO") {
      $("#id_banco").append('<option value="BANCO" selected>BANCO</option>');
      $("#banco").hide();
    } else {
      $("#id_banco option[value='BANCO']").remove();
      $("#banco").show();
    }
  });

  $("#respaldo_transaccion").on("change", function () {
    var imagen = this.files[0];
    // se valida el formato de la imagen png y jpeg
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
      $("#respaldo_transaccion").val("");
      Swal.fire(
        "Error!",
        "¡La imagen debe estar en formato JPG o PNG!",
        "error"
      );
    } else if (imagen["size"] > 7000000) {
      $("#respaldo_transaccion").val("");
      Swal.fire("error", "La imagen no debe pesar más de 7MB!", "error");
    } else {
      var datosImagen = new FileReader();
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function (event) {
        var rutaImagen = event.target.result;
        $("#img-preview").attr("src", rutaImagen);
        $("#img-preview").attr("data-original", rutaImagen);
        // $("a.image-popup-no-margins").attr("href", rutaImagen);
      });
    }
    //ocultar la imagen y visualiar
    if ($(this).val() != "") {
      $(".container").removeClass("d-none");
    } else {
      $(".container").addClass("d-none");
    }
  });

  $("#kt_wrapper").on(
    "change",
    "input[name=cupon_participante][type='radio']",
    function (e) {
      let valor = $(this).val();
      if (valor != "ninguno") {
        $("#costo_curso").css("text-decoration", "line-through");
        let costo_curso = parseInt(getNumbersInString($("#costo_curso").val()));
        let ci = $("#ci").val();
        $.ajax({
          url: window.location.origin + "/porcentaje-cupon",
          method: "POST",
          data: {
            numero_cupon: valor,
            ci: ci,
          },
        }).done(function (response) {
          let precio_con_descuento =
            costo_curso - costo_curso * (response / 100);
          $(".form-text-costo").text(
            "Total a pagar con el descuento por tu cupón: " +
              Math.round(precio_con_descuento) +
              " Bs."
          );
          $(".form-text-costo").fadeTo(500);
          $("#monto_pago").focus();
        });
      } else {
        $("#costo_curso").removeAttr("style");
        $(".form-text-costo").text("");
        $("#monto_pago").val();
        $("#monto_pago").focus();
      }
    }
  );

  $("#respaldo_transaccion").on("change", function () {
    var imagen = this.files[0];
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
      $("#respaldo_transaccion").val("");
      Swal.fire(
        "Error!",
        "¡La imagen debe estar en formato JPG o PNG!",
        "error"
      );
    } else if (imagen["size"] > 7000000) {
      $("#respaldo_transaccion").val("");
      Swal.fire("error", "La imagen no debe pesar más de 7MB!", "error");
    } else {
      var datosImagen = new FileReader();
      datosImagen.readAsDataURL(imagen);
      $(datosImagen).on("load", function (event) {
        var rutaImagen = event.target.result;
        $("#img-preview").attr("src", rutaImagen);
        $("#img-preview").attr("data-original", rutaImagen);
      });
    }

    if ($(this).val() != "") {
      $(".container").removeClass("d-none");
    } else {
      $(".container").addClass("d-none");
    }
  });

  $("#frm-preinscripcion").change(function (e) {
    listar_datos_usuario();
  });

  // Verficar registro //
  $("#ci").on("change", function (e) {
    let ci = $(this).val();
    if (ci.length >= 4) {
      $.post(
        window.location.origin + "/buscar-ci",
        { ci: ci },
        function (response) {
          if (response != "") {
            if (response.length > 0) {
              $("#ci").val(response[0].ci);
              $("#expedido").val(response[0].expedido).trigger("change");

              $("#correo").val(response[0].correo);

              $("#nombre").val(response[0].nombre);

              $("#paterno").val(response[0].paterno);

              $("#materno").val(response[0].materno);

              $("input[name=genero][value='" + response[0].genero + "']").prop(
                "checked",
                true
              );

              $("#celular").val(response[0].celular);

              if (
                response[0].fecha_nacimiento != "" &&
                response[0].fecha_nacimiento != null
              ) {
                let fecha = response[0].fecha_nacimiento.split("-");
                $("#gestion").val(fecha[0]).trigger("change");
                $("#mes").val(fecha[1]).trigger("change");
                $("#dia").val(parseInt(fecha[2])).trigger("change");
              } else {
                $("#gestion").val("").trigger("change");
                $("#mes").val("").trigger("change");
                $("#dia").val("").trigger("change");
              }

              $("#ciudad_residencia")
                .val(response[0].id_municipio)
                .trigger("change");

              $("input[name=genero][value=" + response[0].genero + "]").attr(
                "checked",
                "checked"
              );
            }
          } else {
            limpiarDatosPersonales();
            $("#dia").val("").trigger("change");
            $("#mes").val("").trigger("change");
            $("#gestion").val("").trigger("change");
            $("#ciudad_residencia").val("").trigger("change");
            $("#ci").focus();
          }
        }
      );
    }
    verificarCupones(ci);
    verificarRegistro($("#ci").val(), $("#id").val());
  });

  // Funciones //
  const fillDay = (num) => {
    $("#dia").children().remove();
    let opcion = '<option value="" selected></option>';
    for (let i = 1; i <= num; i++) {
      opcion += "<option value='" + i + "'>" + i + "</option>";
    }
    $("#dia").append(opcion);
  };

  const verificarRegistro = (ci, id) => {
    $.post(
      window.location.origin + "/verificar-registro",
      { ci, id },
      function (response) {
        if (response.data) {
          Swal.fire({
            title: "Advertencia !!!",
            text: "Ya se encuentra registrado en el Curso.",
            icon: "warning",
            showCancelButton: false,
            confirmButtonText: "OK",
            reverseButtons: true,
          }).then(function (result) {
            if (result.value) {
              limpiarDatosPersonales();
              $("#ci").val("");
              $("#ci").focus();
            }
          });
        }
      }
    );
  };

  const limpiarDatosPersonales = () => {
    $("#expedido").val("").trigger("change");
    $("#correo").val("");
    $("#nombre").val("");
    $("#paterno").val("");
    $("#materno").val("");
    $("input[name=genero][value='M']").prop("checked", true);
    $("#celular").val("");
    $("#gestion").val("").trigger("change");
    $("#mes").val("").trigger("change");
    $("#dia").val("").trigger("change");
    $("#ciudad_residencia").val("").trigger("change");
  };

  const verificarCupones = (ci) => {
    if (ci.length >= 4) {
      $.post(
        window.location.origin + "/verificar-cupon",
        { ci },
        function (response) {
          if (response.cupones.length > 0) {
            $("#card-cupon").removeClass("d-none");
            $("#card-cupon-body").empty();
            $("#card-cupon-body").append(
              '<label class="fs-6 fw-bold form-label mb-2">Aplicar cupón</label>'
            );
            $("#card-cupon-body").append(
              '<div class="radio-list form-group m-0">'
            );
            response.cupones.forEach((element) => {
              $("#card-cupon-body").append(
                ' <label class="form-check form-check-custom form-check-solid mb-3"><input type="radio" class="form-check-input" name="cupon_participante" id="cupon_participante" value="' +
                  element +
                  '" /><span class="form-check-label" style="margin-right: 6px;"></span><div class="fw-bolder text-gray-500" style="cursor:pointer">' +
                  element +
                  "</div></label>"
              );
            });
            $("#card-cupon-body").append(
              '<label class="form-check form-check-custom form-check-solid mb-1">' +
                '<input type="radio" class="form-check-input" name="cupon_participante" id="cupon_participante" checked value="ninguno" />' +
                '<span class="form-check-label" style="margin-right: 6px;"></span><div class="fw-bolder pointer text-gray-500" style="cursor:pointer">Ninguno</div>' +
                "</label>"
            );
            $("#card-cupon-body").append("</div>");
          } else {
            $("#card-cupon").addClass("d-none");
          }
        }
      );
    }
  };

  const getNumbersInString = (string) => {
    var tmp = string.split("");
    var map = tmp.map(function (current) {
      if (!isNaN(parseInt(current))) {
        return current;
      }
    });
    var numbers = map.filter(function (value) {
      return value != undefined;
    });

    return numbers.join("");
  };

  const listar_datos_usuario = () => {
    let campos = [];
    $("#frm-preinscripcion")
      .find("input, select")
      .each(function () {
        let text = null;
        let fila = [];
        if (this.name == "expedido") {
          text = $('select[name="expedido"] option:selected').text();
          fila.push(this.name);
          fila.push(this.value);
          fila.push(text);

          campos.push(fila);
        } else if (this.name == "ciudad_residencia") {
          text = $('select[name="ciudad_residencia"] option:selected').text();
          fila.push(this.name);
          fila.push(this.value);
          fila.push(text);

          campos.push(fila);
        } else if (this.name == "genero") {
          if ($(this).is(":checked")) {
            // You have a checked radio button here...
            text = $("input[name=genero][type=radio]:checked").val();

            fila.push(this.name);
            fila.push(this.value);
            fila.push(text);

            campos.push(fila);
          }
        } else if (this.name == "cupon_participante") {
          if ($(this).is(":checked")) {
            // You have a checked radio button here...
            text = $(
              "input[name=cupon_participante][type=radio]:checked"
            ).val();

            fila.push(this.name);
            fila.push(this.value);
            fila.push(text);

            campos.push(fila);
          }
        } else if (this.name == "modalidad_inscripcion") {
          if ($(this).is(":checked")) {
            // You have a checked radio button here...
            text = $(
              "input[name=modalidad_inscripcion][type=radio]:checked"
            ).val();

            fila.push(this.name);
            fila.push(this.value);
            fila.push(text);

            campos.push(fila);
          }
        } else if (this.name == "tipo_certificado_solicitado") {
          if ($(this).is(":checked")) {
            // You have a checked radio button here...
            text = $(
              "input[name=tipo_certificado_solicitado][type=radio]:checked"
            ).val();

            fila.push(this.name);
            fila.push(this.value);
            fila.push(text);

            campos.push(fila);
          }
        } else if (this.name == "certificacion") {
          if ($(this).is(":checked")) {
            // You have a checked radio button here...
            text = $("input[name=certificacion][type=radio]:checked").val();

            fila.push(this.name);
            fila.push(this.value);
            fila.push(text);

            campos.push(fila);
          }
        } else {
          fila.push(this.name);
          fila.push(this.value);
          fila.push(text);
          campos.push(fila);
        }
      });

    campos.map((data) => {
      $("#m_" + data[0]).html(data[1]);

      if (data[0] == "ciudad_residencia") {
        $("#m_" + data[0]).text(data[2]);
      }

      if (data[0] == "monto_pago") {
        $("#m_" + data[0]).html(data[1] + " Bs.");
      }

      if (data[0] == "tipo_certificado_solicitado") {
        if (data[1] == "AMBOS") {
          $("#m_" + data[0]).html("DIGITAL Y FÍSICO");
        } else {
          $("#m_" + data[0]).html(data[1]);
        }
      }

      if (data[0] == "certificacion") {
        if (data[1] == "MÓDULOS") {
          $("#m_" + data[0]).html(data[1] + " " + $("#span-modulos").text());
        } else {
          $("#m_" + data[0]).html(data[1]);
        }
      }
    });
  };
  // Fin Funciones //
  KTPreinscripcion.init();

  $("#frm-preinscripcion").on("submit", function (e) {
    e.preventDefault();
    e.stopPropagation();
    console.log("preinscripcion");
  });
});
