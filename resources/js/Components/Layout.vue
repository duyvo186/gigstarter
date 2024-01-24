<template>

 
    <div id="main">
 
 
        <div class="py-26">
 
            <slot/>
 
        </div>
 
 
    </div>
 </template>
 
 <script setup>
 import {onMounted, computed, onBeforeUpdate} from "vue";
 import {usePage} from "@inertiajs/inertia-vue3";
 import {useToast} from "vue-toastification";
 
 const toast = useToast();
 const created = computed(() => usePage().props.value.flash.created);
 const updated = computed(() => usePage().props.value.flash.updated);
 const deleted = computed(() => usePage().props.value.flash.deleted);
 let showUpdated = false;
 
 onMounted(() => {
    if (created.value) {
        toast.success(created.value, {
            icon: "fa-solid fa-check",
            timeout: 3000,
        });
    }
 
    if (updated.value) {
        showUpdated = true;
        toast.info(updated.value, {
            icon: "fa-solid fa-pen-to-square",
            timeout: 3000,
        });
    }
 });
 
 onBeforeUpdate(() => {
    if (deleted.value) {
        toast.error(deleted.value, {
            icon: "fa-solid fa-trash-can",
            timeout: 3000,
        });
    }
 });
 </script>