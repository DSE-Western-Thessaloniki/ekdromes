import Alpine from "alpinejs";
import { initAdminTable, initSchoolTable } from "./dataTableFunctions";
import { fileUploader } from "./fileUploader";

window.Alpine = Alpine;
window.fileUploader = fileUploader;

Alpine.start();

function initUnsavedChangesGuard(): void {
  const form = document.querySelector<HTMLFormElement>(
    "[data-unsaved-changes-form]",
  );

  if (!form) {
    return;
  }

  const getFormState = (): string =>
    JSON.stringify(
      Array.from(form.elements)
        .filter(
          (
            element,
          ): element is
            | HTMLInputElement
            | HTMLSelectElement
            | HTMLTextAreaElement => {
            if (
              !(
                element instanceof HTMLInputElement ||
                element instanceof HTMLSelectElement ||
                element instanceof HTMLTextAreaElement
              )
            ) {
              return false;
            }

            return !["submit", "button", "reset", "file"].includes(
              element.type,
            );
          },
        )
        .map((element) => {
          if (
            element instanceof HTMLInputElement &&
            ["checkbox", "radio"].includes(element.type)
          ) {
            return [element.name, element.type, element.value, element.checked];
          }

          if (element instanceof HTMLSelectElement && element.multiple) {
            return [
              element.name,
              Array.from(element.selectedOptions).map((option) => option.value),
            ];
          }

          return [element.name, element.value];
        }),
    );

  const initialState = getFormState();
  let allowNavigation = false;

  const isDirty = (): boolean =>
    !allowNavigation && getFormState() !== initialState;

  form.addEventListener("submit", () => {
    allowNavigation = true;
  });

  form
    .querySelectorAll<HTMLAnchorElement>("[data-unsaved-changes-link]")
    .forEach((link) => {
      link.addEventListener("click", (event) => {
        if (!isDirty()) {
          return;
        }

        if (
          !window.confirm(
            "Υπάρχουν μη αποθηκευμένες αλλαγές. Θέλετε να συνεχίσετε χωρίς αποθήκευση;",
          )
        ) {
          event.preventDefault();
          return;
        }

        allowNavigation = true;
      });
    });

  window.addEventListener("beforeunload", (event) => {
    if (!isDirty()) {
      return;
    }

    event.preventDefault();
    event.returnValue = "";
  });
}

document.addEventListener("DOMContentLoaded", function () {
  initUnsavedChangesGuard();

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
