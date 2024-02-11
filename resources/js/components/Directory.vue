<template>
    <li v-for="folder in filesystem" :key="folder.id" class="has-child">
        <a @click="switchDirectory(folder.id)" href="#" class="">
            <img
                class="svg nav-icon"
                src="/assets/img/svg/file.svg"
                alt="file"
            />
            <span class="menu-text">{{ folder.name }}</span>
            <span class="toggle-icon"></span>
        </a>
        <ul>
            <li
                :class="{ 'has-child': subfolder.folders.length > 0 }"
                v-for="subfolder in folder.folders"
                :key="subfolder.id"
            >
                <a @click="switchDirectory(subfolder.id)" href="#" class="">
                    <img
                        class="svg nav-icon"
                        src="/assets/img/svg/folder.svg"
                        alt="folder"
                    />
                    <span class="menu-text">
                        {{ subfolder.name }}
                    </span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <directory
                        v-if="subfolder.folders.length > 0"
                        :filesystem="subfolder.folders"
                        @switch-directory="switchDirectory"
                    />
                </ul>
            </li>
        </ul>
    </li>
</template>

<script>
export default {
    props: ["filesystem"],
    emits: ["switch-directory"],
    methods: {
        switchDirectory(folder_id) {
            this.$emit("switch-directory", folder_id);
        },
    },
};
</script>

<style></style>
