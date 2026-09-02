import DataTable from "datatables.net-dt";
//
document.addEventListener("DOMContentLoaded", function () {
  // Initialize DataTables
  new DataTable("#ekdromesTable", {
    pagingType: "full_numbers",
    pageLength: 10,
    lengthMenu: [10, 20, 30, 50],
    scrollX: true,
    language: {
      paginate: {
        next: "Επόμενο",
        previous: "Προηγούμενο",
        first: "Αρχική",
        last: "Τελευταία",
      },
      search: "Αναζήτηση:",
      lengthMenu: "Εμφάνιση _MENU_ ανά σελίδα",
      zeroRecords: "Δεν βρέθηκε",
      emptyTable: "Δεν υπάρχουν δεδομένα",
      info: "Εμφανίζονται: _START_ ως _END_ σε σύνολο _TOTAL_ ",
      infoFiltered: "(φίλτρο από σύνολο _MAX_ γραμμών)",
      thousands: ".",
      loadingRecords: "Φορτώνει...",
      processing: "Επεξεργασία σε εξέλιξη...",
    }, //endof language
    dom: "lipftrip",
    //    l - length changing input control
    //    f - filtering input
    //    t - The table!
    //    i - Table information summary
    //    p - pagination control
    //    r - processing display element
    //		"columnDefs": [
    //			{ "searchable": false, "targets": [0,6,7] } //0,6 and 8 column non-searchable
    //			],
  });
});
