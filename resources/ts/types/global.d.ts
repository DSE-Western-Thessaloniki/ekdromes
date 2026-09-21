import Alpine from "alpinejs";
import { route as routeFn } from "ziggy-js";
import { fileUploader } from "../fileUploader";

declare global {
  interface Window {
    Alpine: Alpine;
    fileUploader: typeof fileUploader;
  }

  var route: typeof routeFn;
}
