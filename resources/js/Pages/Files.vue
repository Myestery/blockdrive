<template>
  <div class="dm-page-content">
    <div class="container-fluid">
      <div class="fileM-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcrumb-main">
              <h4 class="text-capitalize breadcrumb-title">File Manager</h4>
              <div class="breadcrumb-action justify-content-center flex-wrap">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#"><i class="las la-home"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      File Manager
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
                            <div class="fileM-action__right">
                              <div
                                class="dropdown dropleft content-center d-flex"
                              >
                                <a
                                  href="#"
                                  class="btn btn-primary btn-default btn-rounded content-center"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                >
                                  <img
                                    class="svg"
                                    src="/assets/img/svg/plus.svg"
                                    alt=""
                                  />
                                  Create</a
                                >
                                <div class="dropdown-menu">
                                  <a
                                    class="dropdown-item"
                                    href="#"
                                    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop1"
                                    ><img
                                      src="/assets/img/svg/folder.svg"
                                      alt="folder"
                                      class="svg"
                                    />Create folder</a
                                  >
                                  <a
                                    class="dropdown-item"
                                    href="#"
                                    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop2"
                                    ><img
                                      src="/assets/img/svg/folder.svg"
                                      alt="folder"
                                      class="svg"
                                    />File Upload
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Modal -->
                          <div
                            class="modal fade fileM-Modal-overlay show"
                            id="staticBackdrop1"
                            data-backdrop="static"
                            data-keyboard="false"
                            tabindex="-1"
                            aria-labelledby="staticBackdrop1Label"
                            aria-hidden="true"
                          >
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h6
                                    class="modal-title fw-500"
                                    id="staticBackdrop1Label"
                                  >
                                    Create Folder in
                                    {{ active_folder?.path || "/" }}
                                  </h6>
                                  <button
                                    type="button"
                                    class="close shadow-none border-0 bg-transparent"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                  >
                                    <span
                                      aria-hidden="true"
                                      class="la la-close"
                                    ></span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form @submit.prevent="createFolder">
                                    <div class="form-group mb-20">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="File name"
                                        v-model="folder_name"
                                      />
                                    </div>
                                  </form>
                                </div>
                                <div class="modal-footer m-n1">
                                  <button
                                    type="button"
                                    class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light"
                                    data-bs-dismiss="modal"
                                    :disabled="creating_folder"
                                    id="cancelCreateFolder"
                                  >
                                    Cancel
                                  </button>
                                  <button
                                    @click.prevent="createFolder"
                                    type="button"
                                    :class="`btn btn-squared text-capitalize btn-default ${
                                      creating_folder
                                        ? 'btn-info'
                                        : 'btn-secondary'
                                    }`"
                                    :disabled="creating_folder"
                                  >
                                    <span v-if="!creating_folder"> Create</span>
                                    <div v-else class="dm-spin-dots spin-sm">
                                      <span
                                        class="spin-dot badge-dot dot-primary"
                                      ></span>
                                      <span
                                        class="spin-dot badge-dot dot-primary"
                                      ></span>
                                      <span
                                        class="spin-dot badge-dot dot-primary"
                                      ></span>
                                      <span
                                        class="spin-dot badge-dot dot-primary"
                                      ></span>
                                    </div>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Modal -->
                          <div
                            class="modal fade fileM-Modal-overlay"
                            id="staticBackdrop2"
                            data-backdrop="static"
                            data-keyboard="false"
                            tabindex="-1"
                            aria-labelledby="staticBackdrop2Label"
                            aria-hidden="true"
                          >
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h6
                                    class="modal-title fw-500"
                                    id="staticBackdrop2Label"
                                  >
                                    Upload File to
                                    {{ active_folder?.path || "/" }}
                                  </h6>
                                  <button
                                    type="button"
                                    class="close shadow-none border-0 bg-transparent"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                  >
                                    <span
                                      aria-hidden="true"
                                      class="la la-close"
                                    ></span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form>
                                    <div class="form-group mb-20">
                                      <div class="dm-upload">
                                        <div class="dm-upload__button">
                                          <a
                                            href="javascript:void(0)"
                                            class="btn btn-lg btn-outline-lighten btn-upload"
                                            onclick="$('#upload-3').click()"
                                          >
                                            <img
                                              src="/assets/img/svg/upload.svg"
                                              alt="upload"
                                              class="svg"
                                            />
                                            Click to
                                            {{
                                              uploaded_file_name
                                                ? "Change"
                                                : "Upload"
                                            }}</a
                                          >
                                          <input
                                            type="file"
                                            name="upload-3"
                                            class="upload-one"
                                            id="upload-3"
                                            @change="getFiles"
                                          />
                                        </div>
                                        <div class="dm-upload__file">
                                          <ul :key="uploaded_file_name">
                                            <li></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="modal-footer m-n1">
                                  <button
                                    type="button"
                                    class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light"
                                    data-bs-dismiss="modal"
                                    id="cancelCreateFile"
                                  >
                                    Cancel
                                  </button>
                                  <button
                                    @click.prevent="uploadFile"
                                    type="button"
                                    :class="`btn btn-squared text-capitalize btn-default ${
                                      uploading_file
                                        ? 'btn-info'
                                        : 'btn-secondary'
                                    }`"
                                    :disabled="uploading_file"
                                  >
                                    <span v-if="!uploading_file"> Upload</span>
                                    <div v-else class="dm-spin-dots spin-sm">
                                      <span
                                        class="spin-dot badge-dot dot-primary"
                                      ></span>
                                      <span
                                        class="spin-dot badge-dot dot-primary"
                                      ></span>
                                      <span
                                        class="spin-dot badge-dot dot-primary"
                                      ></span>
                                      <span
                                        class="spin-dot badge-dot dot-primary"
                                      ></span>
                                    </div>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="fileM-types">
                            <div class="sidebar__menu-group">
                              <ul class="sidebar_nav">
                                <li class="menu-title">
                                  <span>Quick Access</span>
                                </li>
                                <directory
                                  :filesystem="filesystem"
                                  @switch-directory="switchDirectory"
                                />
                              </ul>
                            </div>
                          </div>

                          <div class="fileM-progress">
                            <div class="user-group-progress-bar">
                              <p>Storage</p>
                              <div
                                class="progress-wrap d-flex align-items-center mb-0"
                              >
                                <div class="progress">
                                  <div
                                    class="progress-bar bg-success"
                                    role="progressbar"
                                    style="width: 84%"
                                    aria-valuenow="84"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                  ></div>
                                </div>
                                <span class="progress-percentage">83%</span>
                              </div>
                              <span class="">9.5 GB of 15 GB used</span>
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
                      <div class="fileM-top-search">
                        <form action="/" class="d-flex align-items-center">
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
                        <div class="project-icon-selected">
                          <div class="listing-social-link pb-lg-0 pb-xs-2">
                            <div class="icon-list-social d-flex">
                              <a
                                class="icon-list-social__link rounded-circle icon-list-social__style justify-content-center ms-xl-20 me-20"
                                href="/"
                              >
                                <img
                                  class="svg"
                                  src="/assets/img/svg/grid.svg"
                                  alt="grid"
                              /></a>
                              <a
                                class="icon-list-social__link rounded-circle icon-list-social__style justify-content-center active"
                                href="/"
                              >
                                <img
                                  class="svg"
                                  src="/assets/img/svg/list.svg"
                                  alt="list"
                              /></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h6 class="fileM-wrapper__title">
                        Folders in
                        {{ active_folder?.path || "/" }}
                      </h6>
                      <div class="row" v-if="active_folder?.folders?.length">
                        <div
                          v-for="folder in active_folder.folders"
                          :key="folder.id"
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
                                  <div class="fileM-action__right">
                                    <div
                                      class="dropdown dropleft position-absolute"
                                    >
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
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"
                                          ><svg
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
                                              d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z"
                                            />
                                          </svg>
                                          Share</a
                                        >

                                        <a class="dropdown-item" href="#"
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
                                        {{ file.name }}
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
                                <td>False</td>
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
// let filesystem = [
//   {
//     id: "folder123",
//     name: "Documents",
//     parentFolderId: null,
//     createdAt: "2024-02-10T12:00:00Z",
//     updatedAt: "2024-02-10T12:00:00Z",
//     folders: [
//       {
//         id: "folder456",
//         name: "Work",
//         parentFolderId: "folder123",
//         createdAt: "2024-02-11T08:30:00Z",
//         updatedAt: "2024-02-11T09:00:00Z",
//         folders: [
//           {
//             id: "folder457",
//             name: "Work child",
//             parentFolderId: "folder123",
//             createdAt: "2024-02-11T08:30:00Z",
//             updatedAt: "2024-02-11T09:00:00Z",
//             folders: [
//               {
//                 id: "folder458",
//                 name: "Work Grandchild",
//                 parentFolderId: "folder123",
//                 createdAt: "2024-02-11T08:30:00Z",
//                 updatedAt: "2024-02-11T09:00:00Z",
//                 folders: [],
//               },
//             ],
//             files: [
//               {
//                 id: "file789",
//                 name: "Report.pdf",
//                 folderId: "folder456",
//                 type: "application/pdf",
//                 size: 204800,
//                 createdAt: "2024-02-12T10:15:00Z",
//                 updatedAt: "2024-02-12T10:15:00Z",
//               },
//             ],
//           },
//         ],
//         files: [
//           {
//             id: "file789",
//             name: "Report.pdf",
//             folderId: "folder456",
//             type: "application/pdf",
//             size: 204800,
//             createdAt: "2024-02-12T10:15:00Z",
//             updatedAt: "2024-02-12T10:15:00Z",
//           },
//         ],
//       },
//     ],
//     files: [],
//   },
// ];

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
    async createFolder() {
      let key = ulid();
      this.creating_folder = true;
      try {
        await setDoc({
          collection: "folders",
          doc: {
            key,
            data: {
              id: key,
              name: this.folder_name,
              parentFolderId: this.active_folder?.id || null,
              folders: [],
              files: [],
              createdAt: new Date().toISOString(),
              updatedAt: new Date().toISOString(),
            },
          },
        });
        console.log(key);
        toastr.success(
          `Folder ${this.folder_name} was added successfully`,
          "Folder Created Successfully"
        );
        this.creating_folder = false;
        // close modal
        setTimeout(() => {
          document.getElementById("cancelCreateFolder").click();
        }, 0);
        // get filesystem again
        await this.fetchDirectory();
      } catch (error) {
        console.error(error);
        toastr.error(
          `An error occurred while creating folder ${this.folder_name}`,
          "Error Creating Folder"
        );
        this.creating_folder = false;
      }
    },
    async fetchDirectory() {
      let key = "01HPCJ34VXBHKYDE8ZZ49C8WXR";
      let f2 = await getDoc({
        collection: "folders",
        key,
      });
      const [folders, files, storageAssets] = await Promise.all([
        listDocs({
          collection: "folders",
        }),
        listDocs({
          collection: "files",
        }),
        listAssets({
          collection: "files",
        }),
      ]);

      //   await deleteManyDocs({
      //     docs: folders.items.map((x) => {
      //       return { collection: "folders", doc: x };
      //     }),
      //   });

      console.log({
        folders,
        files,
        storageAssets,
      });

      this.raw_files = files.items;
      this.raw_folders = folders.items;

      this.filesystem = this.buildFilesystem(
        folders.items
          .map((x) => x.data)
          .filter((x) => x.parentFolderId == null),
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
    async uploadFile() {
      let files = document.getElementById("upload-3").files;
      let file = Array.from(files)[0];
      let key = ulid();
      this.uploading_file = true;
      try {
        const [fileRecord, fileStored] = await Promise.all([
          // create file on db
          setDoc({
            collection: "files",
            doc: {
              key,
              data: {
                id: key,
                name: file.name,
                folderId: this.active_folder?.id || null,
                type: file.type,
                size: file.size,
                createdAt: new Date().toISOString(),
                updatedAt: new Date().toISOString(),
              },
            },
          }),
          // upload file
          uploadFile({
            data: file,
            collection: "files",
            token: key,
          }),
        ]);
        this.uploading_file = false;
        toastr.success(
          `File ${file.name} was added successfully`,
          "File Uploaded Successfully"
        );
        setTimeout(() => {
          document.getElementById("cancelCreateFile").click();
        }, 0);
        // load
        await this.fetchDirectory();
        // switch to current folder
        this.switchDirectory(this.active_folder.id);
      } catch (error) {
        this.uploading_file = false;
        toastr.error(`Error Uploading File`);
        console.log(error);
        setTimeout(() => {
          document.getElementById("cancelCreateFile").click();
        }, 0);
      }
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
      console.log("switched to ", folder_id);
      this.active_folder = findFolder(folder_id, this.filesystem);
    },
    findFolder(id, folders) {
      return findFolder(id, folders);
    },
    async Delete(file) {
      let raw_file = this.raw_files.find((x) => x.key == file.id);
      if (!confirm("Are you sure you want to delete")) {
        return;
      }
      this.loading = true;
      // delete from storage and data store
      //   get asset
      let asset = file.asset;

      try {
        await Promise.all([
          deleteDoc({
            collection: "files",
            doc: raw_file,
          }),
          !!file.asset
            ? deleteAsset({
                collection: "files",
                fullPath: asset.fullPath,
              })
            : setTimeout(() => {}, 0),
        ]);
        this.loading = false;
        toastr.success(`File ${file.name} was deleted successfully`);
        await this.fetchDirectory();
        // switch to current folder
        this.switchDirectory(this.active_folder.id);
      } catch (error) {
        this.loading = false;
        console.log(error);
        toastr.error(`Error Deleting ${file.name}`);
      }
    },
  },
  async mounted() {
    await this.fetchDirectory();
    // this.filesystem = filesystem
    // this.active_folder = this.filesystem.length ? this.filesystem[0] : null;
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
