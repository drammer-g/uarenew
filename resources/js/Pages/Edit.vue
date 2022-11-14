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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit: {{ this.form.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="update">
                        <div class="p-6 flex bg-white border-b border-gray-200 justify-between">
                            <span>Lang: {{ form.locale }}</span>
                            <primary-button :disabled="form.processing">Save</primary-button>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="mt-4">
                                <InputLabel for="title" value="Page title"/>
                                <TextInput id="password" type="text" class="mt-1 block w-full" v-model="form.title"
                                           required/>
                                <InputError class="mt-2" :message="form.errors.title"/>
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
import EditorUploadAdapter from '@/EditorUploadAdapter';

function MyUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function (loader) {
        return new EditorUploadAdapter(loader)
    };
}

export default {
    name: 'Edit',
    props: {
        page: Object
    },
    data() {
        return {
            editor: ClassicEditor,
            editorConfig: {
                extraPlugins: [MyUploadAdapterPlugin]
            },
            form: this.$inertia.form({
                title: this.page.title,
                content: this.page.content,
                slug: this.page.slug,
                locale: this.page.locale
            })
        };
    },
    methods: {
        update() {
            this.form.patch(this.route(`pages.update`, {page: this.page.id}))
        }
    }
}
</script>
