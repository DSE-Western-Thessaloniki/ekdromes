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
        visible: !selectedSchoolId,
        orderable: true,
        searchable: true,
        render: function (data: string, _type: unknown, row: ExcursionRow) {
          const school = row.school;
          if (!school) return data || "";
          const form = document.createElement("form");
          form.method = "POST";
          form.action = route("admin.select-school");
          form.className = "inline";
          form.innerHTML = `<input type="hidden" name="_token" value="${csrfToken || ""}"><input type="hidden" name="school_id" value="${school.id}"><button type="submit" class="btn btn-brand hover:underline font-medium text-sm">${school.displayname}</button>`;
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
            return `<span class="inline-flex whitespace-nowrap rounded-full border border-green-200 bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-800">ΥΠΟΒΛΗΘΗΚΕ (${row.ar_prot || ""})</span>`;
          }
          if (data === "ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ") {
            return `<span class="inline-flex whitespace-nowrap rounded-full border border-amber-200 bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-800">ΠΡΟΣΧΕΔΙΟ</span>`;
          }
          return `<span class="inline-flex whitespace-nowrap rounded-full border border-gray-200 bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-700">${data || ""}</span>`;
        },
      },
      { data: "notes", orderable: true, searchable: true },
      { data: "submit_datetime", orderable: true, searchable: false },
      {
        data: "id",
        orderable: false,
        searchable: false,
        render: function (data: number, _type: unknown, row: ExcursionRow) {
          const viewLink = `<a href="${route("excursion.edit", data)}" class="table-action" title="Προβολή" aria-label="Προβολή εκδρομής"><i class="fas fa-eye" aria-hidden="true"></i></a>`;
          if (!row.isDraft) return `<div class="table-actions">${viewLink}</div>`;

          const form = document.createElement("form");
          form.method = "POST";
          form.action = route("excursion.destroy", data);
          form.className = "";
          form.innerHTML = `<input type="hidden" name="_method" value="DELETE" />
            <input type="hidden" name="_token" value="${csrfToken || ""}">
            <button type="submit" class="table-action table-action-danger" title="Ακύρωση/Διαγραφή" aria-label="Ακύρωση ή διαγραφή εκδρομής"><i class="far fa-circle-xmark" aria-hidden="true"></i></button>`;

          return `<div class="table-actions">${viewLink}${form.outerHTML}</div>`;
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
      { data: "a_arithmos", orderable: true, searchable: false },
      { data: "hmera_ekdromis_anaxorisis", orderable: true, searchable: false },
      { data: "paratiriseis", orderable: true, searchable: true },
      { data: "submit_datetime", orderable: true, searchable: false },
      {
        data: "status",
        orderable: true,
        searchable: true,
        render: function (data: string, _type: unknown, row: ExcursionRow) {
          if (data === "ΥΠΟΒΛΗΘΗΚΕ") {
            return `<span class="inline-flex whitespace-nowrap rounded-full border border-green-200 bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-800">Υποβλήθηκε (${row.ar_prot || ""})</span>`;
          }
          if (data === "ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ") {
            return `<span class="inline-flex whitespace-nowrap rounded-full border border-amber-200 bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-800">Προσωρινή</span>`;
          }
          return `<span class="inline-flex whitespace-nowrap rounded-full border border-gray-200 bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-700">${data || ""}</span>`;
        },
      },
      {
        data: "id",
        orderable: false,
        searchable: false,
        render: function (data: number, _type: unknown, row: ExcursionRow) {
          let html = `<div class="table-actions"><a href="${route("excursion.edit", data)}" class="table-action" title="Επεξεργασία" aria-label="Επεξεργασία εκδρομής"><i class="fas fa-edit" aria-hidden="true"></i></a>`;
          // TODO -v Έλεγξε αν υπάρχει σύνδεσμος για τα αρχεία και στην αρχική εφαρμογή
          html += `<a href="${route("excursion.files", data)}" class="table-action" title="Αρχεία" aria-label="Αρχεία εκδρομής"><i class="fas fa-folder-open" aria-hidden="true"></i></a>`;
          if (row.isDraft) {
            html += `<form action="${route("excursion.destroy", data)}" method="POST"><input type="hidden" name="_token" value="${csrfToken || ""}"><input type="hidden" name="_method" value="DELETE"><button type="submit" class="table-action table-action-danger" onclick="return confirm('Είστε σίγουρος;')" title="Διαγραφή" aria-label="Διαγραφή εκδρομής"><i class="fas fa-trash" aria-hidden="true"></i></button></form>`;
          }
          return `${html}</div>`;
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
