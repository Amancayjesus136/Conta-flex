$('#hojas').on('keyup, change', function () {
  let hojas = Number($(this).val());
  if (hojas < 0) return;
  let init = Number($(this).attr('data-init'));
  if (hojas > init) {
    for (let hoja = (init + 1); hoja <= hojas; hoja++) {
      $('#editor').append(`<hr><div class="editor" data-hoja="${hoja}">
      <div class="row mb-3">
        <div class="col-4"><h3>Editor de hoja ${hoja}</h3></div>
        <div class="col-4">
          <select name="contenido[${hoja}][orientation]" class="form-select orientation" data-hoja="${hoja}">
            <option value="L">Horizontal</option>
            <option value="P">Vertical</option>
          </select>
        </div>
        <div class="col-4">
          Fondo:
          <input type="file" name="fondo-${hoja}" id="fondo-${hoja}" accept=".jpg, .png" data-hoja="${hoja}"
            onchange="readURL(this);">
        </div>
      </div>
      <p>Puedes usar las siguientes variables: [nombre_evento] [nombre_participante] [fecha] [puntaje]</p>
      <ul class="botones">
        <li>
          <button type="button" class="btn btn-secondary agregar-texto" data-hoja="${hoja}" data-current="0">
            Agregar texto
          </button>
        </li>
        <li>
          <button type="button" class="btn btn-secondary agregar-parrafo" data-hoja="${hoja}" data-current="0">
            Agregar parrafo
          </button>
          </li>
        <li>
          <button type="button" class="btn btn-secondary agregar-imagen" data-hoja="${hoja}" data-current="0">
            Agregar imagen
          </button>
        </li>
        <li>
          <button type="button" class="btn btn-secondary agregar-firma" data-hoja="${hoja}" data-current="0">
            Agregar firma
          </button>
        </li>
        <li>
          <button type="button" class="btn btn-secondary agregar-qr" data-hoja="${hoja}" data-current="0">
            Agregar QR
          </button>
        </li>
      </ul>
      <table class="campos-${hoja} table table-striped">
        <tr>
          <th class="text-center">Campo</th>
          <th class="text-center" width="30%">Valor</th>
          <th class="text-center">Tamaño de fuente</th>
          <th class="text-center">Negrita</th>
          <th class="text-center">Posición X</th>
          <th class="text-center">Posición Y</th>
          <th class="text-center">Ancho</th>
          <th class="text-center">Alinear</th>
          <th class="text-center">Eliminar</th>
        </tr>
      </table>
      <section id="hoja-${hoja}" class="hoja" data-orientation="L" style="background-image: url();"></section>
      <sub>* Los bordes no serán visibles en el archivo PDF</sub>
    </div>`);
    }
    $(this).attr('data-init', hojas)
    $('#accion').removeAttr('disabled');
  }
})
$('body').on('change', '.orientation', function () {
  let hoja = Number($(this).attr('data-hoja'));
  $('#hoja-' + hoja).attr('data-orientation', $(this).val());
})

/* ----- Agregar texto ----- */
$('body').on('click', '.agregar-texto', function () {
  let hoja = Number($(this).attr('data-hoja'));
  let current = Number($(this).attr('data-current'));
  let nuevo = current + 1;
  $('.campos-'+hoja).append(`<tr>
  <td>Texto ${nuevo}</td>
  <td><input name="contenido[${hoja}][texto-${nuevo}][valor]" type="text" class="valor form-control" data-id="texto-${hoja}-${nuevo}"></td>
  <td><input name="contenido[${hoja}][texto-${nuevo}][tamano]" type="number" value="14" class="tamano form-control" data-id="texto-${hoja}-${nuevo}"></td>
  <td><input name="contenido[${hoja}][texto-${nuevo}][negrita]" type="checkbox" class="negrita" data-id="texto-${hoja}-${nuevo}"></td>
  <td><input name="contenido[${hoja}][texto-${nuevo}][posicionX]" type="number" value="10" class="posicionX form-control" data-id="texto-${hoja}-${nuevo}"></td>
  <td><input name="contenido[${hoja}][texto-${nuevo}][posicionY]" type="number" value="10" class="posicionY form-control" data-id="texto-${hoja}-${nuevo}"></td>
  <td><input name="contenido[${hoja}][texto-${nuevo}][ancho]" type="number" value="280" class="ancho form-control" data-id="texto-${hoja}-${nuevo}"></td>
  <td><select name="contenido[${hoja}][texto-${nuevo}][align]" class="align form-control" data-id="texto-${hoja}-${nuevo}">
  <option value="left">Izquierda</option><option value="center">Centro</option><option value="right">Derecha</option><option value="justify">Justificado</option></select></td>
  <td><button type="button" class="eliminar badge badge-pill bg-danger" data-id="texto-${hoja}-${nuevo}"><i class="fa fa-trash"></i></button></td>
  </tr>`);
  $('#hoja-'+hoja).append(`<div id="texto-${hoja}-${nuevo}"></div>`);
  $(this).attr('data-current', nuevo);
})
/* ----- Agregar texto ----- */

/* ----- Agregar parrafo ----- */
$('body').on('click', '.agregar-parrafo', function () {
  let hoja = Number($(this).attr('data-hoja'));
  let current = Number($(this).attr('data-current'));
  let nuevo = current + 1;
  $('.campos-'+hoja).append(`<tr>
  <td>Parrafo ${nuevo}</td>
  <td><textarea name="contenido[${hoja}][parrafo-${nuevo}][valor]" class="valor form-control" data-id="parrafo-${hoja}-${nuevo}"></textarea></td>
  <td><input name="contenido[${hoja}][parrafo-${nuevo}][tamano]" type="number" value="14" class="tamano form-control" data-id="parrafo-${hoja}-${nuevo}"></td>
  <td><input name="contenido[${hoja}][parrafo-${nuevo}][negrita]" type="checkbox" class="negrita" data-id="parrafo-${hoja}-${nuevo}"></td>
  <td><input name="contenido[${hoja}][parrafo-${nuevo}][posicionX]" type="number" value="10" class="posicionX form-control" data-id="parrafo-${hoja}-${nuevo}"></td>
  <td><input name="contenido[${hoja}][parrafo-${nuevo}][posicionY]" type="number" value="10" class="posicionY form-control" data-id="parrafo-${hoja}-${nuevo}"></td>
  <td><input name="contenido[${hoja}][parrafo-${nuevo}][ancho]" type="number" value="280" class="ancho form-control" data-id="parrafo-${hoja}-${nuevo}"></td>
  <td><select name="contenido[${hoja}][parrafo-${nuevo}][align]" class="align form-control" data-id="parrafo-${hoja}-${nuevo}">
  <option value="left">Izquierda</option><option value="center">Centro</option><option value="right">Derecha</option><option value="justify">Justificado</option></select></td>
  <td><button type="button" class="eliminar badge badge-pill bg-danger" data-id="parrafo-${hoja}-${nuevo}"><i class="fa fa-trash"></i></button></td>
  </tr>`);
  $('#hoja-'+hoja).append(`<div id="parrafo-${hoja}-${nuevo}"></div>`);
  $(this).attr('data-current', nuevo);
})
/* ----- Agregar parrafo ----- */

/* ----- Agregar imagen ----- */
$( 'body' ).on( 'click', '.agregar-imagen', function () {
  let hoja    = Number( $( this ).attr( 'data-hoja' ) );
  let current = Number( $( this ).attr( 'data-current' ) );
  let nuevo   = current + 1;
  $( '.campos-' + hoja ).append(
    `<tr>
      <td>Imagen ${ nuevo }</td>
      <td><input type="file" name="contenido[${ hoja }][imagen-${ nuevo }][valor]" id="preview-${ hoja }-${ nuevo }" accept=".jpg, .png, .jpeg" data-hoja="${ hoja }" data-id-image="imagen-${ hoja }-${ nuevo }" onchange="readURLIMG(this);"></td>
      <td></td>
      <td></td>
      <td><input name="contenido[${ hoja }][imagen-${ nuevo }][posicionX]" type="number" value="10" class="posicionX form-control" data-id="imagen-${ hoja }-${ nuevo }"></td>
      <td><input name="contenido[${ hoja }][imagen-${ nuevo }][posicionY]" type="number" value="10" class="posicionY form-control" data-id="imagen-${ hoja }-${ nuevo }"></td>
      <td><input name="contenido[${ hoja }][imagen-${ nuevo }][ancho]" type="number" value="80" class="ancho form-control" data-id="imagen-${ hoja }-${ nuevo }"></td>
      <td></td>
      <td><button type="button" class="eliminar badge badge-pill bg-danger" data-id="imagen-${ hoja }-${ nuevo }"><i class="fa fa-trash"></i></button></td>
    </tr>`
  );
  $( '#hoja-' + hoja ).append( `<img src="" id="imagen-${ hoja }-${ nuevo }">` );
  $( this ).attr( 'data-current', nuevo );
})
/* ----- Agregar imagen ----- */

/* ----- Agregar qr ----- */
$( 'body' ).on( 'click', '.agregar-qr', function () {
  let hoja    = Number( $( this ).attr( 'data-hoja' ) );
  let current = Number( $( this ).attr( 'data-current' ) );
  let nuevo   = current + 1;
  $( '.campos-' + hoja ).append(
    `<tr>
      <td>qr ${ nuevo }</td>
      <td><img src="/public/assets/images/qr-default.png" width="50" /></td>
      <td></td>
      <td></td>
      <td><input name="contenido[${ hoja }][qr-${ nuevo }][posicionX]" type="number" value="10" class="posicionX form-control" data-id="qr-${ hoja }-${ nuevo }"></td>
      <td><input name="contenido[${ hoja }][qr-${ nuevo }][posicionY]" type="number" value="10" class="posicionY form-control" data-id="qr-${ hoja }-${ nuevo }"></td>
      <td><input name="contenido[${ hoja }][qr-${ nuevo }][ancho]" type="number" value="50" class="ancho form-control" data-id="qr-${ hoja }-${ nuevo }"></td>
      <td></td>
      <td><button type="button" class="eliminar badge badge-pill bg-danger" data-id="qr-${ hoja }-${ nuevo }"><i class="fa fa-trash"></i></button></td>
    </tr>`
  );
  $( '#hoja-' + hoja ).append( `<img src="/public/assets/images/qr-default.png" class="firma" id="qr-${ hoja }-${ nuevo }">` );
  $( this ).attr( 'data-current', nuevo );
})
/* ----- Agregar qr ----- */

$('#editor').on('keyup', '.valor', function() {
  let id = $(this).attr('data-id');
  $('#'+id).text( $(this).val() );
})
$('#editor').on('keyup', '.posicionX', function() {
  let id = $(this).attr('data-id');
  $('#'+id).css('left', $(this).val() * 2.95);
})
$('#editor').on('keyup', '.posicionY', function() {
  let id = $(this).attr('data-id');
  $('#'+id).css('top', $(this).val() * 2.95);
})
$('#editor').on('keyup', '.ancho', function() {
  let id = $(this).attr('data-id');
  $('#'+id).css('width', $(this).val() * 2.95);
})
$('#editor').on('keyup', '.tamano', function() {
  let id = $(this).attr('data-id');
  $('#'+id).css('font-size', $(this).val()+'px');
})
$('#editor').on('change', '.negrita', function() {
  let id = $(this).attr('data-id');
  if ($(this).is(':checked')) {
    $('#'+id).css('font-weight', 'bold');
  } else {
    $('#'+id).css('font-weight', 'normal');
  }
})
$('#editor').on('change', '.align', function() {
  let id = $(this).attr('data-id');
  let align = $(this).val();
  $('#'+id).css('text-align', align);
})
$('#editor').on('click', '.eliminar', function() {
  let id = $(this).attr('data-id');
  $('#'+id).remove();
  $(this).parent().parent().remove();
})

/* ----- Imagen fondo ----- */
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      console.log('e.target.result', e.target.result)
      let hoja = $(input).attr('data-hoja');
      jQuery('#hoja-'+hoja).css('background-image', 'url('+e.target.result+')');
    };

    reader.readAsDataURL(input.files[0]);
  }
}
/* ----- Imagen fondo ----- */

/* ----- Imagen normal ----- */
function readURLIMG( input ) {
  if ( input.files && input.files[ 0 ] ) {
    var reader = new FileReader();

    reader.onload = function (e) {
      console.log( 'e.target.result', e.target.result )
      let hoja = $( input ).data( 'id-image' );
      jQuery( '#' + hoja ).attr( 'src', e.target.result );
    };

    reader.readAsDataURL( input.files[ 0 ] );
  }
}
/* ----- Imagen normal ----- */

// Agregar un evento cuando el documento esté listo
document.addEventListener("DOMContentLoaded", function() {
    // Seleccionar el elemento del alert
    var successAlert = document.getElementById("success-alert");

    // Verificar si el elemento del alert existe
    if (successAlert) {
        // Establecer un temporizador para ocultar el alert después de 2 segundos
        setTimeout(function() {
            successAlert.style.display = "none";
        }, 2000); // 2000 milisegundos = 2 segundos
    }
});
