import Alpine from "alpinejs";
import { route as routeFn } from "ziggy-js";

declare global {
  interface Window {
    Alpine: Alpine;
  }

  var route: typeof routeFn;
}
