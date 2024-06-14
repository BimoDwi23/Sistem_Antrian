const flashData = $('.flash-data').data('flashdata');
if (flashData) {
	swal({
  title: "Selamat",
  text: "Data Berhasil " +flashData,
  icon: "success",
  button: "Oke",
});
}

const Data = $('.flash-stok').data('flashstok');
if (Data) {
	swal({
  title: "Maaf",
  text: "Jumlah " +Data+ " Kurang",
  icon: "warning",
  button: "Oke",
});
}

$('.tombol-hapus').on('click',function(e){
	e.preventDefault();
	const href = $(this).attr('href');
swal({
  title: "Anda Yakin?",
  text: "Data Akan di Hapus",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
  	document.location.href = href;
  }
});
});