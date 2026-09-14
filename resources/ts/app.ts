import DataTable from "datatables.net-dt";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

//
document.addEventListener("DOMContentLoaded", function () {
  const table = document.getElementById("ekdromesTable") as HTMLTableElement;
  if (!table) return;

  const apiUrl = table.dataset.url;
  const selectedSchoolId = table.dataset.selectedSchoolId;
  const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    ?.getAttribute("content");

  // Initialize DataTables
  new DataTable(table, {
    serverSide: true,
    processing: true,
    ajax: {
      url: apiUrl,
      type: "POST",
      headers: {
        "X-CSRF-TOKEN": csrfToken || "",
        "X-Requested-With": "XMLHttpRequest",
      },
      data: function (d: Record<string, unknown>) {
        if (selectedSchoolId) {
          d.school_id = selectedSchoolId;
        }
      },
    },
    columns: [
      { data: "index", orderable: true, searchable: false },
      {
        data: "school.displayname",
        orderable: true,
        searchable: true,
        render: function (data: string, _type: unknown, row: Record<string, unknown>) {
          const school = row.school as { id: number; displayname: string } | null;
          if (!school) return data || "";
          const form = document.createElement("form");
          form.method = "POST";
          form.action = "/admin/select-school";
          form.className = "inline";
          form.innerHTML = `<input type="hidden" name="_token" value="${csrfToken || ""}"><input type="hidden" name="school_id" value="${school.id}"><button type="submit" class="text-coral hover:underline font-medium">${school.displayname}</button>`;
          return form.outerHTML;
        },
      },
      { data: "ar_prot_sxoleiou", orderable: true, searchable: true },
      {
        data: "eidos_ekdromis",
        orderable: true,
        searchable: true,
        render: function (data: string) {
          if (!data) return "";
          const truncated = data.length > 30 ? data.substring(0, 30) + "..." : data;
          return `<span title="${data}" class="truncate block">${truncated}</span>`;
        },
      },
      {
        data: "status",
        orderable: true,
        searchable: true,
        render: function (data: string, _type: unknown, row: Record<string, unknown>) {
          if (data === "ΥΠΟΒΛΗΘΗΚΕ") {
            return `<span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">ΥΠΟΒΛΗΘΗΚΕ (${row.ar_prot || ""})</span>`;
          }
          if (data === "ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ") {
            return `<span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs font-semibold">ΠΡΟΣΧΕΔΙΟ</span>`;
          }
          return `<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-semibold">${data || ""}</span>`;
        },
      },
      { data: "submit_datetime", orderable: true, searchable: false },
      {
        data: "id",
        orderable: false,
        searchable: false,
        render: function (data: number) {
          return `<a href="/excursion/${data}" class="text-blue-500 hover:text-blue-700 font-medium">Προβολή</a>`;
        },
      },
    ],
    order: [[0, "desc"]],
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
    },
    dom: "lipftrip",
  });
});
