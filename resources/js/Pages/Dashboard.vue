<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/inertia-vue3';
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
                Home Page
            </h2>
            <Link method="get" :href="route('pages.create')" as="button" type="button" class="border p-2">
                Add page
            </Link>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="update">
                        <div class="p-6 bg-white border-b border-gray-200 text-right">
                            <primary-button :disabled="form.processing">Save</primary-button>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200" v-for="(block, index) in form.texts">
                            <InputLabel :for="block.locale" :value="block.locale" class="mb-4"/>
                            <textarea :id="`block-${block.locale}`" v-model="block.text"
                                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
export default {
    name: 'Dashboard',
    props: {
        texts: Object
    },
    data() {
        return {
            form: this.$inertia.form({
                texts: [{
                    locale: 'en',
                    text: ''
                },
                    {
                        locale: 'pl',
                        text: ''
                    },
                    {
                        locale: 'ua',
                        text: ''
                    }]
            })
        }
    },
    methods: {
        update() {
            this.form.patch(this.route('home_page.update'));
        }
    },
    mounted() {
        if (this.texts.length > 0) {
            this.form.texts = this.texts
        }
    }
}
</script>
