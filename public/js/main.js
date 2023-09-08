const $button  = document.querySelector('#sidebar-toggle');
const $wrapper = document.querySelector('#wrapper');

$button.addEventListener('click', (e) => {
  e.preventDefault();
  $wrapper.classList.toggle('toggled');
});

// $(document).ready(function(){
//   var table = $('#data-table').DataTable();

//   table.on('click', '.edit', function() {
//     $tr = $(this).closest('tr');
//     if ($($tr).hasClass('child'))
//   })
// })