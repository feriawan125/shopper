var formBarang = document.getElementById('formBarang');

formBarang.addEventListener("submit", (e) =>{
  e.preventDefault();
  
  let formData = new FormData(formBarang);
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (xhr.responseText == 'Input Data Berhasil!') {
        swal('Sukses', 'Data barang sukses dibuat', 'success'); 
        formBarang.reset();
      }else{
        swal('Gagal', 'Data barang gagal dibuat', 'error'); 
      }
    }
  }

  xhr.open("POST", "../assets/ajax/createBarang.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.send(formData);

});