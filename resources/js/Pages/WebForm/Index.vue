<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import NavLink from '@/Components/NavLink.vue';

defineProps({
    webforms: Object
})
</script>

<template>
    <Head title="Edit page"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                WebForms
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <ul class="webforms">
                        <li class="webforms__item flex flex-row p-2 justify-between" v-for="(webform, index) in webforms" :key="index">
                            <div class="item-count w-2">{{ webform.id }}</div>
                            <div class="item-count w-auto text-left">Landing Web Form</div>
                            <div class="item-count w-4">{{ webform.locale }}</div>
                            <div class="item-count w-auto">
                                <NavLink :href="route('webforms.edit', {id: webform.id})">Edit</NavLink>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>

export default {
    name: 'Edit',
    data() {
        return {
            //
        };
    }
}
</script>
