// // root folder
// let root = {
//     id: "folder123",
//     name: "Documents",
//     parentFolderId: null, // This is a root folder
//     createdAt: "2024-02-10T12:00:00Z",
//     updatedAt: "2024-02-10T12:00:00Z",
// };

// // subfolder
// let s = {
//     id: "folder456",
//     name: "Work",
//     parentFolderId: "folder123", // This subfolder is under the "Documents" folder
//     createdAt: "2024-02-11T08:30:00Z",
//     updatedAt: "2024-02-11T09:00:00Z",
// };

// // file
// let f = {
//     id: "file789",
//     name: "Report.pdf",
//     folderId: "folder456", // This file is located in the "Work" subfolder
//     type: "application/pdf",
//     size: 204800, // The size of the file in bytes
//     createdAt: "2024-02-12T10:15:00Z",
//     updatedAt: "2024-02-12T10:15:00Z",
// };


// Create a function to build the filesystem data structure
function buildFilesystem(rootFolders, folders, files) {
    // Create a map to store folders and files by their IDs
    const folderMap = new Map();
    const fileMap = new Map();

    // Add root folders to the folder map
    for (const rootFolder of rootFolders) {
        folderMap.set(rootFolder.id, { ...rootFolder, folders: [], files: [] });
    }

    // Add subfolders to the folder map and organize them under their parent folders
    for (const folder of folders) {
        if (!folderMap.has(folder.parentFolderId)) {
            // Parent folder does not exist, skip this folder
            continue;
        }
        const parentFolder = folderMap.get(folder.parentFolderId);
        parentFolder.folders.push({ ...folder, folders: [], files: [] });
        folderMap.set(folder.id, parentFolder.folders[parentFolder.folders.length - 1]);
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
    return rootFolders.map(rootFolder => folderMap.get(rootFolder.id));
}

// Define the root folders, subfolders, and files
let rootFolders = [
    {
        id: "folder123",
        name: "Documents",
        parentFolderId: null, // This is a root folder
        createdAt: "2024-02-10T12:00:00Z",
        updatedAt: "2024-02-10T12:00:00Z",
    },
    // Add more root folders as needed
];

let subfolder = {
    id: "folder456",
    name: "Work",
    parentFolderId: "folder123", // This subfolder is under the "Documents" folder
    createdAt: "2024-02-11T08:30:00Z",
    updatedAt: "2024-02-11T09:00:00Z",
};

let file = {
    id: "file789",
    name: "Report.pdf",
    folderId: "folder456", // This file is located in the "Work" subfolder
    type: "application/pdf",
    size: 204800, // The size of the file in bytes
    createdAt: "2024-02-12T10:15:00Z",
    updatedAt: "2024-02-12T10:15:00Z",
};

// Build the filesystem data structure
const filesystem = buildFilesystem(rootFolders, [subfolder], [file]);
Promise.
// Print the filesystem structure
console.log(JSON.stringify(filesystem, null, 2));



P
r
o
m
i
s
e
