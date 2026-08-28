//

$(document).ready(function () {
  //----------------------code for epitirites

  var atomatable = $("#ekdromesTable").DataTable({
    stripeClasses: [],
    pagingType: "full_numbers",
    iDisplayLength: 10,
    lengthMenu: [10, 20, 30, 50],
    scrollX: true,
    scrollY: true,
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
  $(".dataTables_length").addClass("bs-select");

  $("#tablewithexport").DataTable({
    stripeClasses: [],
    paging: false,
    ordering: false,
    info: false,
    dom: "B",
    //buttons: [ 'csv', 'excel' ],
    buttons: ["excel"],
    initComplete: function () {
      $("#tablewithexport").hide();
    },
  });

  $("table[name='visibletable_excelexport']").DataTable({
    stripeClasses: [],
    paging: false,
    ordering: false,
    info: false,
    dom: "Bt",
    //buttons: [ 'csv', 'excel' ],
    buttons: [
      {
        extend: "excel",
        text: "Εξαγωγή (excel)",
        title: "",
        filename: "Πίνακας επιτηρητών",
        //messageTop: 'Πίνακας επιτηρητών',
        customize: function (xlsx) {
          var sheet = xlsx.xl.worksheets["sheet1.xml"];
          $("row c", sheet).attr("s", "25"); //bordered cells in excel
        },
      },
    ],
  });
});
