<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
</script>

<template>
    <Head title="Edit page"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" v-if="form.title">
                Title: {{ form.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit="form.post(route('pages.store'))">
                        <div class="p-6 bg-white border-b border-gray-200 text-right">
                            <select v-model="form.slug" class="mx-3">
                                <option disabled value="" selected>Select slug</option>
                                <option v-for="(slug, index) in slugs" :value="slug">{{slug}}</option>
                            </select>

                            <select v-model="form.locale" class="mx-3">
                                <option disabled value="" selected>Select locale</option>
                                <option v-for="(locale, index) in $page.props.locales" :value="index">{{locale}}</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.locale" />
                            <primary-button :disabled="form.processing">Save</primary-button>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="mt-4">
                                <InputLabel for="title" value="Page title" />
                                <TextInput id="password" type="text" class="mt-1 block w-full" v-model="form.title" required />
                                <InputError class="mt-2" :message="form.errors.title" />
                            </div>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                                <ckeditor :editor="editor" v-model="form.content" :config="editorConfig"></ckeditor>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200 text-right">
                            <primary-button :disabled="form.processing">Save</primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import {useForm} from '@inertiajs/inertia-vue3'

export default {
    name: 'Edit',
    data() {
        return {
            editor: ClassicEditor,
            editorConfig: {
                // The configuration of the editor.
            },
            slugs: {
                0: 'project',
                1: 'house',
                2: 'partners',
                3: 'contacts',
            },
            form: useForm({
                title: '',
                content: '',
                slug: '',
                locale: ''
            })
        };
    }
}
</script>
