import { defineConfig, loadEnv } from "vite";
import laravel from "laravel-vite-plugin";
import { bunny } from "laravel-vite-plugin/fonts";
import tailwindcss from "@tailwindcss/vite";
import path from "path";

export default defineConfig(({ mode }) => {
  process.env = { ...process.env, ...loadEnv(mode, process.cwd(), "") };

  // Εύρεση resource path από το APP_URL
  var resources_dir;
  var index = 0;
  index = process.env.APP_URL.indexOf("//");
  if (index === -1) {
    console.log("Σφάλμα με τον ορισμό του APP_URL στο .env!");
    process.exit(1);
  }
  index = process.env.APP_URL.indexOf("/", index + 2);
  if (index === -1) {
    resources_dir = "/";
  } else {
    resources_dir = process.env.APP_URL.substring(index);
    if (!resources_dir.endsWith("/")) {
      resources_dir += "/";
    }
  }

  console.log("==", resources_dir);
  process.env.ASSET_URL = resources_dir;

  return {
    plugins: [
      laravel({
        input: ["resources/css/app.css", "resources/ts/app.ts"],
        refresh: true,
        fonts: [
          bunny("Instrument Sans", {
            weights: [400, 500, 600],
          }),
        ],
        assets: ["resources/images/**", "resources/css/transmittal.css"],
      }),
      tailwindcss(),
    ],
    server: {
      watch: {
        ignored: ["**/storage/framework/views/**"],
      },
    },
    resolve: {
      alias: {
        "@": path.resolve(import.meta.dirname, "resources/ts"),
        "~@fortawesome": path.resolve(
          import.meta.dirname,
          "node_modules/@fortawesome",
        ),
        "ziggy-js": path.resolve("vendor/tightenco/ziggy"),
      },
    },
  };
});
