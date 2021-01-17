var formPengguna = document.getElementById('formPengguna');

formPengguna.addEventListener("submit", (e) =>{
  e.preventDefault();
  
  let formData = new FormData(formPengguna);
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (xhr.responseText == 'Input Data Berhasil!') {
        swal('Sukses', 'Data pengguna sukses dibuat', 'success'); 
        formPengguna.reset();
      }else{
        swal('Gagal', 'Data pengguna gagal dibuat', 'error'); 
      }
    }
  }

  xhr.open("POST", "../assets/ajax/createPengguna.php");
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.send(formData);

});