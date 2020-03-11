function sortTable(n){
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0; //creer variabelen
  table = document.getElementById("table_1");
  switching = true;
  dir = "asc"; //standaard van Ascending 
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) { // pakt elke row door middel van een loop
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;      
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
//bovenstaande functie pakt alle rows van de table en slaat deze op in variabelen. Hij herkent welke stand hij staat  (dir = asc of desc) en 
//gebasseerd daarop kan hij de rows omswitchen.

function Filter() {
  var input, filter, table, tr, td, cell, i, j;
  input = document.getElementById("filter");
  filter = input.value.toUpperCase(); // filtert alle letters (hoofdletter en kleine) naar hoofletters
  table = document.getElementById("table_1");
  tr = table.getElementsByTagName("tr"); // variabelen gecreëerd.
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
    td = tr[i].getElementsByTagName("td");
    //target in een loop alle rows.
    for (var j = 0; j < td.length; j++) {
      cell = tr[i].getElementsByTagName("td")[j];
      if (cell) {
        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) { // filter of zoekt naar de eerste match met bijvoorbeeld de letter 'e' als deze
          tr[i].style.display = "";   //ingevoerd wordt en filtert alles wat hier niet bij hoort eruit.
          break;
        } 
      }
    }
  }
}