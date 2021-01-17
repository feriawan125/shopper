var cartItems = [];
var pemasok = 0;
$(function () {
  buildCartList();
})
function json2Table(headerRow, rows, tableId) {

  //build the table
  const table = `
	<table class="table table-striped" id=\"${tableId}\">
		<thead>
			<tr>${headerRow}</tr>
		<thead>
		<tbody>
			${rows}
		<tbody>
	<table>`;


  return table;
}


function getBarang() {
  
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      let myList =JSON.parse(xhr.responseText);
      let selector = document.getElementById("tabelBarang");
      let cols = ["KodeBarang", "NamaBarang", "StokBarang", "HargaJual", "Slug"]
      let headerRow = cols
      .map(col => `<th>${col}</th>`)
      .join("");
      let rows = myList
      .map(row => {
        let tds = cols.map(col => '<td onclick=\"fillBarang(' +`${row['KodeBarang']}, '${row['NamaBarang']}', '${row['HargaJual']}'`+`)\">${row[col]}</td>`).join("");
        return `<tr class="cursor-pointer">${tds}</tr>`;
      })
      .join("");
  
      selector.innerHTML = json2Table(headerRow, rows, "Barang");
      $(function() {
        $('#Barang').DataTable();
      });
    }
  }

  xhr.open("POST", "../assets/ajax/selectBarang.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.send();
}

function buildCartList() {
  let cartItems = [];
  let selector = document.getElementById("cartList");
  let cols = ["Kode", "Nama Barang", "Kuantitas", "Harga Jual", "Subtotal", "Aksi"];
  let headerRow = cols
  .map(col => `<th>${col}</th>`)
  .join("");
  let rows = cartItems
  .map(row => {
    let tds = cols.map(col => `<td>${row[col]}</td>`).join("");
    return `<tr class="cursor-pointer>${tds}</tr>`;
  })
  .join("");

  $(function() {
    $('#cart').DataTable({
      "ordering": false,
    });
  });

  selector.innerHTML = json2Table(headerRow, rows, "cart");
}
function updateCartList(kode, namaBarang, kuantitas, hargaJual) {
  kuantitas = parseInt(kuantitas);
  hargaJual = parseInt(hargaJual);
  txtTotal = document.getElementById('txtTotal');
  if(updateQty(kode, kuantitas, hargaJual)){
    
  }else{
    let subtotal = hargaJual * kuantitas;
    cartItems.push({"Kode": `${kode}`, "Nama Barang": `${namaBarang}`, "Kuantitas": `${kuantitas}`, "Harga Jual": `${hargaJual}`, "Subtotal": `${subtotal}`, "Aksi": `<a href=\"#\" onclick=\"removeFromCart(${kode}); \" class=\"btn btn-block bg-gradient-danger btn-xs text-white\">Delete</a>`});
  }

  updateCart();
}

function updateQty(id, qty, hargaJual) {
  let updated = false
  for (var i in cartItems) {
    if (cartItems[i].Kode == id) {
       cartItems[i].Kuantitas = parseInt(cartItems[i].Kuantitas) + parseInt(qty);
       cartItems[i].Subtotal = cartItems[i].Kuantitas * parseInt(hargaJual);
       updated = true;
       break;
    }
  }
  return updated;
}

function addToCart() {
  let kodeBarang = document.getElementById("kodeBarang");
  let namaBarang = document.getElementById("namaBarang");
  let hargaJual = document.getElementById("hargaJual");
  let kuantitas = document.getElementById("kuantitas");
  if (kuantitas.value > 0) {
    if (kodeBarang.value != "") {
      updateCartList(kodeBarang.value, namaBarang.value, kuantitas.value, hargaJual.value);
      kodeBarang.value = "";
      namaBarang.value = "";
      hargaJual.value = "";
      kuantitas.value = 1;
    }
  }
}

Array.prototype.sum = function (prop) {
  var total = 0
  for ( var i = 0, _len = this.length; i < _len; i++ ) {
      total += parseInt(this[i][prop]);
  }
  return total
}
function updateCart(aksi = true) {
  let selector = document.getElementById("cartList");
  let cols = [];
  if (aksi) {
    cols = ["Kode", "Nama Barang", "Kuantitas", "Harga Jual", "Subtotal", "Aksi"];
  } else{
    cols = ["Kode", "Nama Barang", "Kuantitas", "Harga Jual", "Subtotal"];
  }
  let headerRow = cols
  .map(col => `<th>${col}</th>`)
  .join("");
  let rows = cartItems
  .map(row => {
    let tds = cols.map(col => `<td>${row[col]}</td>`).join("");
    return `<tr class="cursor-pointer">${tds}</tr>`;
  })
  .join("");

  $(function() {
    $('#cart').DataTable({
      "ordering": false,
    });
  });

  txtTotal.innerHTML = new Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3 }).format(cartItems.sum("Subtotal"));

  selector.innerHTML = json2Table(headerRow, rows, "cart");
}
function fillBarang(id, nama, harga) {
  let idBarang = document.getElementById("kodeBarang");
  let namaBarang = document.getElementById("namaBarang");
  let hargaJual = document.getElementById("hargaJual");
  idBarang.value = id;
  namaBarang.value = nama;
  hargaJual.value = harga;
  $('#modal-barang').modal('hide')

}
function resetPenjualan() {
  goToPage('penjualan');
}
function save() {
  let txId = document.getElementById('txId').value;
  let total = cartItems.sum("Subtotal");
  if (cartItems.length !== 0) {
    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function (){
      if (xhr.readyState == 4 && xhr.status == 200) {
        if (xhr.responseText == 'Transaksi Berhasil') {
          swal('Sukses', 'Transaksi berhasil', 'success'); 
          goToPage('penjualan');
        }else{
          swal('Gagal', 'Transaksi gagal', 'error'); 
        }
      }
    }
  
    xhr.open("POST", "../assets/ajax/insertPenjualan.php", true);
    xhr.setRequestHeader('token', getCookie('token'));
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify({txId: txId, total: total, cart:cartItems}));
    
  }
}
function getNotaPenjualan() {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      let myList =JSON.parse(xhr.responseText);
      let selector = document.getElementById("tabelNotaPenjualan");
      let cols = Object.keys(myList[0]);
      let headerRow = cols
      .map(col => `<th>${col}</th>`)
      .join("");
      let rows = myList
      .map(row => {
        let tds = cols.map(col => '<td onclick=\"fillNotaPenjualan(' +`'${row['KodeJual']}'`+`)\">${row[col]}</td>`).join("");
        return `<tr class="cursor-pointer">${tds}</tr>`;
      })
      .join("");
  
      selector.innerHTML = json2Table(headerRow, rows, "notaPenjualan");
      $(function() {
        $('#notaPenjualan').DataTable();
      });
    }
  }

  xhr.open("POST", "../assets/ajax/selectNotaPenjualan.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({action: "getNotaPenjualan"}));
}
function getNotaPenjualanDetail(kodeJual){
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      let myList =JSON.parse(xhr.responseText);
      cartItems = myList;
      updateCart(false);
    }
  }

  xhr.open("POST", "../assets/ajax/selectNotaPenjualan.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({action: "getNotaPenjualanDetail",kodeJual: kodeJual}));
}
function fillNotaPenjualan(kodeJual) {
  document.getElementById('txId').value = kodeJual;
  getNotaPenjualanDetail(kodeJual);
  $('#btnDelete').toggleClass('d-none');
  $('#btnSave').toggleClass('d-none');
  $('#addItemGroup').toggleClass('d-none');
  $('#modal-nota').modal('hide');
}
function delNotaPenjualan() {
  swal({
    title: "Ada Yakin?",
    text: "Data akan dihapus dan tidak dapat dikembalikan lagi!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      let kodeJual = document.getElementById('txId');
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function (){
        if (xhr.readyState == 4 && xhr.status == 200) {
          if (xhr.responseText == 'Delete Berhasil') {
            swal('Sukses', 'Retur berhasil dihapus', 'success');
            goToPage('pembelian');
          }else{
            swal('Gagal', 'Retur gagal dihapus', 'error');
          }
        }
      }
    
      xhr.open("POST", "../assets/ajax/deletePenjualan.php", true);
      xhr.setRequestHeader('token', getCookie('token'));
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.send(JSON.stringify({kodeJual: kodeJual.value}));
    }
  });
}