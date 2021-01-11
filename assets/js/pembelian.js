function getPemasok() {
  
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      var myList =JSON.parse(xhr.responseText);
      let selector = document.getElementById("tabelPemasok");
      selector.innerHTML = json2Table(myList);
    }
  }

  xhr.open("POST", "../assets/ajax/selectPemasok.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.send();
}


function json2Table(json) {
  let cols = Object.keys(json[0]);


  //Map over columns, make headers,join into string
  let headerRow = cols
    .map(col => `<th>${col}</th>`)
    .join("");

  //map over array of json objs, for each row(obj) map over column values,
  //and return a td with the value of that object for its column
  //take that array of tds and join them
  //then return a row of the tds
  //finally join all the rows together
  let rows = json
    .map(row => {
      let tds = cols.map(col => '<td onclick=\"fill(' +`${row['KodePemasok']}, '${row['NamaPemasok']}', '${row['AlamatPemasok']}'`+`)\">${row[col]}</td>`).join("");
      return `<tr>${tds}</tr>`;
    })
    .join("");

  //build the table
  const table = `
	<table border="1">
		<thead>
			<tr>${headerRow}</tr>
		<thead>
		<tbody>
			${rows}
		<tbody>
	<table>`;

  return table;
}

function fill(id, nama, alamat) {
  let namaPemasok = document.getElementById("namaPemasok");
  let idPemasok = document.getElementById("idPemasok");
  let alamatPemasok = document.getElementById("alamatPemasok");
  namaPemasok.value = nama;
  idPemasok.value = id;
  alamatPemasok.value = alamat;
  $('#modal-pemasok').modal('hide')

}