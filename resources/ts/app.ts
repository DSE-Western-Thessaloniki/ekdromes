import Alpine from "alpinejs";
import { initAdminTable, initSchoolTable } from "./dataTableFunctions";
import { fileUploader } from "./fileUploader";

window.Alpine = Alpine;
window.fileUploader = fileUploader;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
  const adminTable = document.getElementById(
    "ekdromesTable",
  ) as HTMLTableElement | null;
  if (adminTable) {
    initAdminTable(adminTable);
    return;
  }

  const schoolTable = document.getElementById(
    "excursionsTable",
  ) as HTMLTableElement | null;
  if (schoolTable) {
    initSchoolTable(schoolTable);
  }
});
