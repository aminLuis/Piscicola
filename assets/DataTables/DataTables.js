$(document).ready(function() {
    $('#tabla').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        
        {
            extend:    'excelHtml5',
            text:      '<i class="fas fa-file-excel"></i>',
            titleAttr: 'Exportat a Excel',
            className: 'btn btn-success'
        },
       
        {
            extend:    'pdfHtml5',
            text:      '<i class="fas fa-file-pdf"></i>',
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger'
        },
        {
            extend:    'print',
            text:      '<i class="fa fa-print"></i>',
            titleAttr: 'Imprimir',
            className: 'btn btn-primary'
        }
    ],
        
     language: {
            "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sSearch":         "Buscar:",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
    }
     }

    } );
} );
