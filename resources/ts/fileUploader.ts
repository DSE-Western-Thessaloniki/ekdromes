import { fileUploaderOptions } from "./types/fileUploaderOptions";

export function fileUploader(options: fileUploaderOptions) {
  return {
    show_dropzone: false,
    isDragging: false,
    uploading: false,
    error: "",
    files: new Array<{
      id: number;
      file: File;
    }>(),
    nextId: 1,

    handleDrop(event: DragEvent) {
      this.isDragging = false;

      if (!event.dataTransfer) {
        return;
      }

      this.handleFiles(event.dataTransfer.files);
    },

    handleFiles(fileList: FileList) {
      this.error = "";

      for (const file of fileList) {
        if (this.files.length >= 100) {
          this.error = "Δεν μπορείτε να ανεβάσετε περισσότερα από 100 αρχεία.";
          break;
        }

        if (file.size > 10 * 1024 * 1024) {
          this.error = `Το αρχείο "${file.name}" είναι μεγαλύτερο από 10MB.`;
          continue;
        }

        if (!/\.(pdf|doc|docx|xls|xlsx|txt)$/i.test(file.name)) {
          this.error = `Ο τύπος του αρχείου "${file.name}" δεν υποστηρίζεται.`;
          continue;
        }

        if (this.files.some((item) => item.file.name === file.name)) {
          continue;
        }

        this.files.push({
          id: this.nextId++,
          file,
        });
      }
    },

    removeFile(index: number) {
      this.files.splice(index, 1);
    },

    formatSize(bytes: number) {
      return `${(bytes / 1024).toFixed(1)} KB`;
    },

    async upload() {
      if (this.files.length === 0) {
        return;
      }

      this.uploading = true;
      this.error = "";

      try {
        for (const { file } of this.files) {
          const formData = new FormData();
          formData.append("file", file);

          const response = await fetch(options.url, {
            method: "POST",
            headers: {
              "X-CSRF-TOKEN": options.csrfToken,
              Accept: "application/json",
            },
            body: formData,
          });

          if (!response.ok) {
            throw new Error(`Η αποστολή του αρχείου "${file.name}" απέτυχε.`);
          }
        }

        window.location.reload();
      } catch (error) {
        this.error = error.message;
        this.uploading = false;
      }
    },
  };
}
