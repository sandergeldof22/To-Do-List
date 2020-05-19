function Filter() {
  var input, filter, table, tr, td, i,alltables;
  alltables = document.querySelectorAll("table[data-name=listtable]");
  input = document.getElementById("filter");
  filter = input.value.toUpperCase();
  alltables.forEach(function(table){
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
  });
}