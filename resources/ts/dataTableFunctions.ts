import DataTable from "datatables.net-dt";
import { ExcursionRow } from "./types/ExcursionRow";

function initAdminTable(table: HTMLTableElement): void {
  const apiUrl = table.dataset.url;
  const selectedSchoolId = table.dataset.selectedSchoolId;
  const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    ?.getAttribute("content");

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
        render: function (data: string, _type: unknown, row: ExcursionRow) {
          const school = row.school;
          if (!school) return data || "";
          const form = document.createElement("form");
          form.method = "POST";
          form.action = route("admin.select-school");
          form.className = "inline";
          form.innerHTML = `<input type="hidden" name="_token" value="${csrfToken || ""}"><input type="hidden" name="school_id" value="${school.id}"><button type="submit" class="btn btn-coral hover:underline font-medium text-sm">${school.displayname}</button>`;
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

          return `<span title="${data}">${data}</span>`;
        },
      },
      {
        data: "status",
        orderable: true,
        searchable: true,
        render: function (data: string, _type: unknown, row: ExcursionRow) {
          if (data === "ΥΠΟΒΛΗΘΗΚΕ") {
            return `<span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">ΥΠΟΒΛΗΘΗΚΕ (${row.ar_prot || ""})</span>`;
          }
          if (data === "ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ") {
            return `<span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs font-semibold">ΠΡΟΣΧΕΔΙΟ</span>`;
          }
          return `<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-semibold">${data || ""}</span>`;
        },
      },
      { data: "notes", orderable: true, searchable: true },
      { data: "submit_datetime", orderable: true, searchable: false },
      {
        data: "id",
        orderable: false,
        searchable: false,
        render: function (data: number) {
          const form = document.createElement("form");
          form.method = "POST";
          form.action = route("excursion.destroy", data);
          form.className = "inline";
          form.innerHTML = `<input type="hidden" name="_method" value="DELETE" />
            <input type="hidden" name="_token" value="${csrfToken || ""}">
            <button type="submit" class="btn btn-gray border font-medium" title="Ακύρωση/Διαγραφή"><i class="far fa-circle-xmark"></i></button>`;

          return (
            `<a href="${route("excursion.edit", data)}" class="btn btn-gray border font-medium" title="Προβολή"><i class="fas fa-eye"></i></a>` +
            form.outerHTML
          );
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
    layout: {
      top1Start: "pageLength",
      topStart: "info",
      top1End: "search",
      topEnd: "paging",
      bottomStart: "info",
      bottomEnd: "paging",
    },
  });
}

function initSchoolTable(table: HTMLTableElement): void {
  const apiUrl = table.dataset.url;
  const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    ?.getAttribute("content");

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
    },
    columns: [
      { data: "index", orderable: true, searchable: false },
      {
        data: "eidos_ekdromis",
        orderable: true,
        searchable: true,
        render: function (data: string) {
          if (!data) return "";
          const truncated =
            data.length > 30 ? data.substring(0, 30) + "..." : data;
          return `<span title="${data}" class="truncate block">${truncated}</span>`;
        },
      },
      { data: "proorismos", orderable: true, searchable: true },
      { data: "hmera_ekdromis_anaxorisis", orderable: true, searchable: false },
      { data: "hmera_epistrofis", orderable: true, searchable: false },
      { data: "ar_mathiton", orderable: true, searchable: false },
      {
        data: "status",
        orderable: true,
        searchable: true,
        render: function (data: string, _type: unknown, row: ExcursionRow) {
          if (data === "ΥΠΟΒΛΗΘΗΚΕ") {
            return `<span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">Υποβλήθηκε (${row.ar_prot || ""})</span>`;
          }
          if (data === "ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ") {
            return `<span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs font-semibold">Προσωρινή</span>`;
          }
          return `<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-semibold">${data || ""}</span>`;
        },
      },
      {
        data: "id",
        orderable: false,
        searchable: false,
        render: function (data: number, _type: unknown, row: ExcursionRow) {
          let html = `<a href="${route("excursion.edit", data)}" class="inline-block bg-coral text-white px-3 py-1 rounded text-sm hover:bg-coral-dark" title="Επεξεργασία"><i class="fas fa-edit"></i></a>`;
          // TODO -v Έλεγξε αν υπάρχει σύνδεσμος για τα αρχεία και στην αρχική εφαρμογή
          html += ` <a href="/excursion/${data}/files" class="inline-block bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600" title="Αρχεία"><i class="fas fa-folder-open"></i></a>`;
          if (row.isDraft) {
            html += ` <form action="${route("excursion.destroy", data)}" method="POST" class="inline"><input type="hidden" name="_token" value="${csrfToken || ""}"><input type="hidden" name="_method" value="DELETE"><button type="submit" class="inline-block bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600" onclick="return confirm('Είστε σίγουρος;')" title="Διαγραφή"><i class="fas fa-trash"></i></button></form>`;
          }
          return html;
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
    layout: {
      top1Start: "pageLength",
      topStart: "info",
      top1End: "search",
      topEnd: "paging",
      bottomStart: "info",
      bottomEnd: "paging",
    },
  });
}

export { initAdminTable, initSchoolTable };
