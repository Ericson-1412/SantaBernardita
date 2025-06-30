var relacion_id = $('#id').val();

function init() {
  $("#padreadolescente_form").on("submit", function (e) {
    guardaryeditar(e);
  });

  cargarPadres();
  cargarAdolescentes();
  
}

function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#padreadolescente_form")[0]);

  $.ajax({
    url: "../../controller/padre_adolescente.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function () {
      $('#padreadolescente_data').DataTable().ajax.reload();
      $('#modalmantenimiento').modal('hide');
      Swal.fire('Correcto', 'Registro guardado', 'success');
    }
  });
}

$(document).ready(function () {
  $('#padreadolescente_data').DataTable({
    ajax: {
      url: "../../controller/padre_adolescente.php?op=listar",
      type: "POST"
    },
    columns: [
      { data: 0 }, 
      { data: 1 }, 
      { data: 2 }, 
      { data: 3 }, 
      { data: 4 }, 
      { data: 5 }  
    ],
    responsive: true
  });
});

function editar(id) {
  $.post("../../controller/padre_adolescente.php?op=mostrar", { id: id }, function (data) {
    data = JSON.parse(data);
    $('#id').val(data.id);
    $('#id_padre').val(data.id_padre);
    $('#id_adolescente').val(data.id_adolescente);
    $('#tipo_relacion').val(data.tipo_relacion);
    $('#observaciones').val(data.observaciones);
    $('#lbltitulo').text('Editar Relación');
    $('#modalmantenimiento').modal('show');
  });
}

function eliminar(id) {
  Swal.fire({
    title: 'Eliminar',
    text: "Desea eliminar el registro?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../../controller/padre_adolescente.php?op=eliminar", { id: id }, function () {
        $('#padreadolescente_data').DataTable().ajax.reload();
        Swal.fire('Eliminado', 'Registro eliminado', 'success');
      });
    }
  });
}

function nuevo() {
  $('#padreadolescente_form')[0].reset();
  $('#id').val('');
  $('#lbltitulo').text('Nueva Relación');
  $('#modalmantenimiento').modal('show');
}

// Llenar <select> de padres
function cargarPadres() {
  $.ajax({
    url: "../../controller/padres.php?op=combo",
    type: "POST",
    success: function (data) {
      $('#id_padre').html(data);
    }
  });
}

// Llenar <select> de adolescentes
function cargarAdolescentes() {
  $.ajax({
    url: "../../controller/adolescente.php?op=combo",
    type: "POST",
    success: function (data) {
      $('#id_adolescente').html(data);
    }
  });
}

init();
