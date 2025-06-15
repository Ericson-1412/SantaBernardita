var adolescente_id = $('#id').val();

function init() {
  $("#adolescente_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#adolescente_form")[0]);

  $.ajax({
    url: "../../controller/adolescente.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function () {
      $('#adolescente_data').DataTable().ajax.reload();
      $('#modalmantenimiento').modal('hide');
      Swal.fire('Correcto', 'Registro guardado', 'success');
    }
  });
}

$(document).ready(function () {
  $('#adolescente_data').DataTable({
    ajax: {
      url: "../../controller/adolescente.php?op=listar",
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
  $.post("../../controller/adolescente.php?op=mostrar", { id: id }, function (data) {
    data = JSON.parse(data);
    $('#id').val(data.id);
    $('#nombres').val(data.nombres);
    $('#apellidos').val(data.apellidos);
    $('#edad').val(data.edad);
    $('#dni').val(data.dni);
    $('#sexo').val(data.sexo);
    $('#direccion').val(data.direccion);
    $('#lbltitulo').text('Editar Adolescente');
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
      $.post("../../controller/adolescente.php?op=eliminar", { id: id }, function () {
        $('#adolescente_data').DataTable().ajax.reload();
        Swal.fire('Eliminado', 'Registro eliminado', 'success');
      });
    }
  });
}

function nuevo() {
  $('#adolescente_form')[0].reset();
  $('#id').val('');
  $('#lbltitulo').text('Nuevo Adolescente');
  $('#modalmantenimiento').modal('show');
}

init();