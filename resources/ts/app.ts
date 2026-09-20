import DataTable from "datatables.net-dt";
import Alpine from "alpinejs";
import { SchoolRow } from "./types/SchoolRow";
import { ExcursionRow } from "./types/ExcursionRow";
import Dropzone from "@deltablot/dropzone";
import { initAdminTable, initSchoolTable } from "./dataTableFunctions";

const options: Dropzone.DropzoneOptions = {
  url: "/file/post",
  maxFilesize: 10,
};

window.Alpine = Alpine;

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

  if (document.querySelector("#dropzone") !== null) {
    const dropzone = new Dropzone("#dropzone", options);
    console.log(dropzone);
    dropzone.on("addedfile", (file) => {
      console.log(file.name, file.upload?.progress);
    });
  }
});
