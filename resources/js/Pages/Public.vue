<template>
  <div class="dm-page-content">
    <div class="container-fluid">
      <div class="fileM-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcrumb-main">
              <h4 class="text-capitalize breadcrumb-title">Shared Files</h4>
              <div class="breadcrumb-action justify-content-center flex-wrap">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="/"><i class="las la-home"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Shared Files
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="fileM-contents">
              <div class="row">
                <div class="col-20 col-lg-3 col-sm-4">
                  <div class="fileM-sidebar-wrapper mb-30">
                    <div class="fileM-sidebar">
                      <div class="card border-0 shadow-none">
                        <div class="card-body px-15 pt-30">
                          <div class="px-xl-3">
                            <div class="fileM-action__right"></div>
                          </div>

                          <div class="fileM-types">
                            <div class="sidebar__menu-group">
                              <ul class="sidebar_nav">
                                <li class="menu-title">
                                  <span @click="goHome">Home</span>
                                </li>
                                <directory
                                  :filesystem="filesystem"
                                  @switch-directory="switchDirectory"
                                />
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-79 col-lg-9 col-sm-8">
                  <div class="fileM-grid-wrapper mb-30">
                    <div class="fileM-wrapper mb-25">
                      <div class="fileM-top-search row">
                        <form
                          action="/"
                          class="d-flex align-items-center col-2"
                        >
                          <img
                            src="/assets/img/svg/search.svg"
                            alt="search"
                            class="svg"
                          />
                          <input
                            class="form-control px-10 border-0 box-shadow-none"
                            type="search"
                            placeholder="Search by Name"
                            aria-label="Search"
                          />
                        </form>
                      </div>
                      <h6 class="fileM-wrapper__title">
                        Folders in
                        {{ active_folder?.path || "/" }}
                      </h6>
                      <div class="row" v-if="active_folder?.folders?.length">
                        <div
                          v-for="folder in active_folder.folders"
                          :key="folder.id"
                          @dblclick="switchDirectory(folder.id)"
                          class="col-xl-2 col-lg-4 col-sm-6 mb-25"
                        >
                          <div class="fileM-card">
                            <div class="card border-0">
                              <div class="card-body pb-40 pt-45">
                                <div class="g">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                                    />
                                  </svg>
                                </div>
                                <p class="fileM-excerpt">
                                  {{ folder.name }}
                                </p>
                                <div class="fileM-action">
                                  <div class="fileM-action__right"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div v-else>
                        <small
                          >No folders found in
                          {{ active_folder?.path || "/" }}</small
                        >
                      </div>
                    </div>
                    <div class="fileM-wrapper">
                      <h6 class="fileM-wrapper__title mb-35">
                        Files in
                        {{ active_folder?.path || "/" }}
                      </h6>
                      <div
                        class="fileM-grid table-responsive"
                        style="min-height: 300px"
                      >
                        <div class="filleM-table w-100">
                          <table class="table mb-0 pb-12" v-if="active_folder">
                            <thead>
                              <tr class="userDatatable-header">
                                <th>
                                  <span class="projectDatatable-title"
                                    >Name</span
                                  >
                                </th>
                                <th>
                                  <span class="projectDatatable-title"
                                    >Size</span
                                  >
                                </th>
                                <th>
                                  <span class="projectDatatable-title"
                                    >Owner</span
                                  >
                                </th>
                                <th>
                                  <span class="projectDatatable-title"
                                    >shared</span
                                  >
                                </th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr
                                v-for="file in active_folder.files"
                                :key="file.id"
                              >
                                <td>
                                  <div
                                    class="files-area__left d-flex align-items-center"
                                  >
                                    <div class="files-area__img">
                                      <img
                                        src="/assets/img/pdf.png"
                                        alt="img"
                                        class="wh-40"
                                      />
                                    </div>
                                    <div class="files-area__title">
                                      <p
                                        class="mb-0 fs-14 fw-500 color-dark text-capitalize"
                                      >
                                        {{ trim(file.name) }}
                                      </p>
                                      <span class="color-light fs-12 d-flex">
                                        {{ file.type.split("/")[1] }}
                                      </span>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class="userDatatable-content">
                                    <!-- convert bytes to mb -->
                                    {{ (file.size / 1024 / 1024).toFixed(2) }}
                                    MB
                                  </div>
                                </td>
                                <td>
                                  <div class="userDatatable-content">You</div>
                                </td>
                                <td>True</td>
                                <td>
                                  <div class="project-progress text-end">
                                    <div class="fileM-action__right">
                                      <div class="dropdown dropleft">
                                        <button
                                          class="btn-link border-0 bg-transparent p-0"
                                          data-bs-toggle="dropdown"
                                          aria-haspopup="true"
                                          aria-expanded="false"
                                        >
                                          <img
                                            class="svg"
                                            src="/assets/img/svg/more-vertical.svg"
                                            alt="more-vertical"
                                          />
                                        </button>
                                        <div
                                          class="dropdown-menu dropdown-menu--dynamic"
                                        >
                                          <a
                                            v-if="file.asset"
                                            class="dropdown-item"
                                            :download="file.name"
                                            target="_blank"
                                            :href="file.asset.downloadUrl"
                                            ><img
                                              src="/assets/img/svg/download.svg"
                                              alt="download"
                                              class="svg"
                                            />Download</a
                                          >

                                          <a
                                            @click="Delete(file)"
                                            class="dropdown-item"
                                            href="#"
                                            ><img
                                              class="svg"
                                              src="/assets/img/svg/trash-2.svg"
                                              alt=""
                                            />Delete</a
                                          >
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <textarea
                            style="display: none"
                            ref="urlTextarea"
                          ></textarea>
                        </div>
                        <!-- End: .userDatatable-->
                      </div>
                    </div>
                  </div>
                  <!-- ends: .col-lg-10 -->
                </div>
                <!-- ends: .col-lg-2 -->
              </div>
            </div>
          </div>
          <!-- ends: .col-lg-12 -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {
  deleteAsset,
  deleteDoc,
  deleteManyDocs,
  getDoc,
  listAssets,
  listDocs,
  setDoc,
  uploadFile,
} from "@junobuild/core";
import { ulid } from "ulid";
import Directory from "../components/Directory.vue";

function findFolder(id, folders, path = "") {
  for (const folder of folders) {
    // Construct the path for the current folder
    const currentPath =
      path === "" ? `/${folder.name}` : `${path}/${folder.name}`;

    if (folder.id === id) {
      // Found the folder, add path and return it
      return { ...folder, path: currentPath };
    }
    if (folder.folders && folder.folders.length > 0) {
      // Recursively search through subfolders
      const result = findFolder(id, folder.folders, currentPath);
      if (result) {
        return result; // Found the folder in subfolders, return it
      }
    }
  }
  // Folder with the specified ID not found
  return null;
}
export default {
  components: { Directory },
  data() {
    return {
      active_folder: {
        path: "/",
      },
      folder_name: "",
      filesystem: [],
      creating_folder: false,
      uploading_file: false,
      uploaded_file_name: "",

      raw_files: [],
      raw_folders: [],
      loading: false,
    };
  },
  methods: {
    trim(text) {
      return text.length > 30 ? text.substring(0, 30) + "..." : text;
    },
    async fetchDirectory() {
      let key = "01HPCJ34VXBHKYDE8ZZ49C8WXR";
      let f2 = await getDoc({
        collection: "folders",
        key,
      });
      const [folders, files, storageAssets] = await Promise.all([
        listDocs({
          collection: "public_folders",
        }),
        listDocs({
          collection: "public_files",
        }),
        listAssets({
          collection: "public_files",
        }),
      ]);

      console.log({
        folders,
        files,
        storageAssets,
      });

      this.raw_files = files.items;
      this.raw_folders = folders.items;
      let id_from_url = window.location.pathname.split("/").pop();
      this.filesystem = this.buildFilesystem(
        // root folder should have the id from the link
        folders.items
          .map((x) => x.data)
          .filter(
            (x) =>
              x.parentFolderId == null ||
              !this.raw_folders.map((x) => x.data.id).includes(x.parentFolderId)
          )
          .filter((x) => x.id == id_from_url),
        folders.items
          .map((x) => x.data)
          .filter((x) => x.parentFolderId != null),
        files.items.map((x) => {
          // get asset from storageAssets
          return {
            asset: storageAssets.assets.find((ass) => ass.token == x.key),
            ...x.data,
          };
        })
      );
    },
    getFiles(event) {
      const input = event.target;
      const files = input.files;
      this.uploaded_file_name = Array.from(files)[0].name;
    },
    buildFilesystem(rootFolders, folders, files) {
      // Create a map to store folders and files by their IDs
      const folderMap = new Map();
      const fileMap = new Map();

      // Add root folders to the folder map
      for (const rootFolder of rootFolders) {
        folderMap.set(rootFolder.id, {
          ...rootFolder,
          folders: [],
          files: [],
        });
      }

      // Add subfolders to the folder map and organize them under their parent folders
      for (const folder of folders) {
        if (!folderMap.has(folder.parentFolderId)) {
          // Parent folder does not exist, skip this folder
          continue;
        }
        const parentFolder = folderMap.get(folder.parentFolderId);
        parentFolder.folders.push({
          ...folder,
          folders: [],
          files: [],
        });
        folderMap.set(
          folder.id,
          parentFolder.folders[parentFolder.folders.length - 1]
        );
      }

      // Organize files under their respective folders
      for (const file of files) {
        if (!folderMap.has(file.folderId)) {
          // Folder for this file does not exist, skip this file
          continue;
        }
        const parentFolder = folderMap.get(file.folderId);
        parentFolder.files.push(file);
        fileMap.set(file.id, file);
      }

      // Return the root folders with nested folders and files
      return rootFolders.map((rootFolder) => folderMap.get(rootFolder.id));
    },
    switchDirectory(folder_id) {
      if (!folder_id) {
        return this.goHome();
      }
      this.active_folder = findFolder(folder_id, this.filesystem);
    },
    findFolder(id, folders) {
      return findFolder(id, folders);
    },
    async Delete(file, confirmed = false) {
      let raw_file = this.raw_files.find((x) => x.key == file.id);
      if (!confirmed) {
        if (!confirm("Are you sure you want to delete from shared?")) {
          return;
        }
      }
      this.loading = true;
      // delete from storage and data store
      //   get asset
      //   let asset = file.asset;

      try {
        await Promise.all([
          deleteDoc({
            collection: "public_files",
            doc: raw_file,
          }),
        ]);
        this.loading = false;
        if (!confirmed) {
          toastr.success(`File ${file.name} was deleted successfully`);
          await this.fetchDirectory();
          // switch to current folder
          this.switchDirectory(this.active_folder.id);
        }
      } catch (error) {
        this.loading = false;
        console.log(error);
        toastr.error(`Error Deleting ${file.name}`);
      }
    },
    async DeleteFolder(folder) {
      if (
        !confirm(
          `Do you want to delete ${folder.name} and all its contents from shared`
        )
      ) {
        return;
      }
      // get all files
      let promises = folder.files.map((x) => this.Delete(x, true));
      let folder_promises = folder.folders.map((x) => this.DeleteFolder(x));
      try {
        this.loading = true;
        await Promise.all([
          ...promises,
          ...folder_promises,
          deleteDoc({
            collection: "public_folders",
            doc: this.raw_folders.find((x) => x.key == folder.id),
          }),
        ]);
        toastr.success(`Folder ${folder.name} was deleted successfully`);
        this.loading = false;
        await this.fetchDirectory();
        // switch to current folder
        this.switchDirectory(this.active_folder.id);
      } catch (error) {
        this.loading = false;
        toastr.error(`Error Deleting ${folder.name}`);
      }
    },
    goHome() {
      this.active_folder = {
        path: "/",
        id: null,
        folders: this.filesystem,
        files: [],
      };
    },
  },
  async mounted() {
    await this.fetchDirectory();
    // this.goHome();
    // this.filesystem = filesystem
    this.active_folder = this.filesystem.length ? this.filesystem[0] : null;
  },
  watch: {
    loading(newVal, oldVal) {
      if (newVal) {
        document.querySelector("body").style.opacity = 0.4;
      } else {
        document.querySelector("body").style.opacity = 1;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
a.btn-delete {
  display: none;
}
</style>
