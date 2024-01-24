<template>
        <form @submit.prevent="location ? form.put(`/locations/${location.id}`) : form.post('/locations')">
            <div class="form-group">
                <label>Location Name<span class="required">*</span></label>
                <input class="form-control" type="text" :class="{ 'is-invalid': form.errors.name }" v-model="form.name" placeholder="Location Name">
                <div v-if="form.errors.name" class="invalid-feedback">{{ form.errors.name }}</div>
            </div>
            <button class="btn btn-purple" type="submit" :disabled="form.processing">Update Location</button>
            <Link class="btn btn-light btn-light--brounded" :href="stores.routeDelete">Discard</Link>
        </form>
 </template>
 
 <script setup>
 import {useForm, Link} from "@inertiajs/inertia-vue3";
 import {onMounted} from "vue";
 
 const props = defineProps({
    stores: Array,
 });
 
 const form = useForm({
    name: 'duy',
 });
 
 onMounted(() => {
    if (props.location) {
        form.name = props.stores.name;
    }
 });
 </script>
 
 