var padre_id = $('#id').val();

function init() {
  $("#padre_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#padre_form")[0]);

  $.ajax({
    url: "../../controller/padres.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function () {
      $('#padre_data').DataTable().ajax.reload();
      $('#modalmantenimiento').modal('hide');
      Swal.fire('Correcto', 'Registro guardado', 'success');
    }
  });
}

$(document).ready(function () {
  $('#padre_data').DataTable({
    ajax: {
      url: "../../controller/padres.php?op=listar",
      type: "POST"
    },
    columns: [
      { data: 0 },
      { data: 1 },
      { data: 2 },
      { data: 3 },
      { data: 4 },
      { data: 5 },
      { data: 6 },
      { data: 7 }
    ],
    responsive: true
  });
});

function editar(id) {
  $.post("../../controller/padres.php?op=mostrar", { id: id }, function (data) {
    data = JSON.parse(data);
    $('#id').val(data.id);
    $('#nombres').val(data.nombres);
    $('#apellidos').val(data.apellidos);
    $('#dni').val(data.dni);
    $('#telefono').val(data.telefono);
    $('#direccion').val(data.direccion);
    $('#ocupacion').val(data.ocupacion);
    $('#lbltitulo').text('Editar Padre');
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
      $.post("../../controller/padres.php?op=eliminar", { id: id }, function () {
        $('#padre_data').DataTable().ajax.reload();
        Swal.fire('Eliminado', 'Registro eliminado', 'success');
      });
    }
  });
}

function nuevo() {
  $('#padre_form')[0].reset();
  $('#id').val('');
  $('#lbltitulo').text('Nuevo Padre');
  $('#modalmantenimiento').modal('show');
}

init();
