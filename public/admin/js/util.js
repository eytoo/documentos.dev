/**
 * Captura a todos los links a modales y jala el contenido del modal-dailog
 */
$("*[data-modal]").click(function(event) {
    progressJs().start();
    $.ajax({
        "url": $(this).attr("href") != "#" ? $(this).attr("href") : $(this).attr("data-href"),
        "beforeSend": function() {
            progressJs().set(45);
        },
        "success": function(request) {
            var modal = $("#mainModal");
            modal.html(request);
            progressJs().set(70);
            setTimeout(function () {
                $('#mainModal').modal('show');
                progressJs().end();
            },1500);
            $('#mainModal').on('shown.bs.modal', function () {
                $('.hasFocus').focus();
            });

        }
    });
    return false;
});

function dataModal() {
    $(".datatable").on("click", "*[data-modal]", function(e) {
        progressJs().start();
        $.ajax({
            "url": $(this).attr("href") != "#" ? $(this).attr("href") : $(this).attr("data-href"),
            "beforeSend": function() {
                progressJs().set(50);
            },
            "success": function(request) {
                var modal = $("#mainModal");
                modal.html(request);
                $('#mainModal').modal('show');
                $('.hasFocus').focus();
                progressJs().end();
            }
        });
        return false;
    });
}
$(document).ready(function() {
    dataModal();
});

function formSend() {
    $(".form-send").bind("submit", function() {
        ajaxSendForm($(this));
        return false;
    });
}

function eliminar(id_form) {
    var form = $("#form-delete-" + id_form);
    var tipo = "Archivar";
    var tituloDef = '¿Estás seguro(a) de borrar este registro?';
    var contenidoDef = 'Recuerda que una vez eliminado, no podrás volver a recuperarlo';

    if(form.data("type")){
        tipo = form.data("type");
    }

    if(tipo === "Archivar"){
        tituloDef = "¿Deseas archivar este registro?";
        contenidoDef = "Recuerda que al archivar el registro, este quedará invisible para todo público";
    }

    $.confirm({
        title: tituloDef,
        content: contenidoDef,
        buttons: {
            cancel: {
                btnClass: 'btn-default',
                text: "Cancelar",
                action: function() {}
            },
            confirm: {
                btnClass: (tipo === "Archivar"? "btn-success" : "btn-danger" ),
                text: (tipo === "Archivar"? tipo : "Eliminar" ),
                action: function() {
                    form.submit();
                }
            },
        }
    });
}

function recuperar(id_form) {
    var form = $("#form-restore-" + id_form);
    $.confirm({
        title: '¿Estás seguro(a) de restaurar este registro?',
        content: 'Recuerda que al restaurar quedará visible para todo el público',
        position: 'center',
        buttons: {
            cancel: {
                btnClass: 'btn-default',
                text: "Cancelar",
                action: function() {}
            },
            confirm: {
                btnClass: 'btn-success',
                text: "Restaurar",
                action: function() {
                    form.submit();
                }
            },
        }
    });
}

function eliminarTim(id_form) {
    var form = "timing-destroy/" + id_form;
    $.confirm({
        title: '¿Estás seguro(a) de eliminar este registro?',
        content: 'Recuerda que una vez eliminada esta entidad quedará invisible para el público',
        buttons: {
            cancel: {
                btnClass: 'btn-default',
                text: "Cancelar",
                action: function() {}
            },
            confirm: {
                btnClass: 'btn-danger',
                text: "Eliminar",
                action: function() {
                    window.location.href = form;
                }
            },
        }
    });
}

function ajaxSendForm(form) {
    var closeModalOnSubmit = false;
    var addItem = false;
    var buttonSub = false;
    var modalCloseId = "";
    var selectName = "";
    var buttonSubmit = null;
    if (form.data("buttonsub")) {
        buttonSubmit = $(form.data("buttonsub"));
    } else {
        buttonSubmit = $(".form-send button[type=submit]");
    }
    if (form.data("closeonsub")) {
        closeModalOnSubmit = true;
        modalCloseId = form.data("closeonsub");
    }
    if (form.data("additem")) {
        addItem = true;
        selectName = form.data("additem");
    }
    $.ajax({
        type: form.attr("method"),
        url: form.attr("action"),
        data: form.serialize(),
        beforeSend: function() {
            addLoading(buttonSubmit);
            disableButton(buttonSubmit);
        },
        success: function(respuesta) {
            if (respuesta.errores) {
                if (respuesta.message) {
                    infoError(respuesta.message);
                } else {
                    infoError();
                }
                removeLoading(buttonSubmit);
                enableButton(buttonSubmit);
                return false;
            }
            if (respuesta) {
                if (closeModalOnSubmit) {
                    $('#' + modalCloseId).modal('hide');
                }
                if (addItem) {
                    addItemToSelect("select[name=" + selectName + "]", respuesta.id, respuesta.nombre);
                }
                infoOk();
                limpiaForm(form);
                location.reload();
            } else {
                infoError();
            }
            removeLoading(buttonSubmit);
            enableButton(buttonSubmit);
        },
        error: function() {
            infoError();
            removeLoading(buttonSubmit);
            enableButton(buttonSubmit);
        }
    });
}