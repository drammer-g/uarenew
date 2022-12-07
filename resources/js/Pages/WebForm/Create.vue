<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

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
                    <form @submit.prevent="form.post(route('webforms.store'))">
                        <div class="p-6 bg-white border-b border-gray-200 text-right">
                            <select v-model="form.locale" class="mx-3">
                                <option disabled value="" selected>Select locale</option>
                                <option v-for="(locale, index) in $page.props.locales" :value="index">{{ locale }}
                                </option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.locale"/>
                            <primary-button :disabled="form.processing">Save</primary-button>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="mt-4">
                                <InputLabel for="content" value="Web Form HTML content"/>
                                <textarea id="content" type="text" class="mt-1 block w-full" v-model="form.content"
                                          required></textarea>
                                <InputError class="mt-2" :message="form.errors.content"/>
                            </div>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="mt-4">
                                <InputLabel for="crm_source" value="Script source"/>
                                <TextInput id="crm_source" type="text" class="mt-1 block w-full" v-model="form.crm_source"></TextInput>
                                <InputError v-if="form.errors && form.errors.crm_source" class="mt-2" :message="form.errors.crm_source"/>
                            </div>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="mt-4">
                                <InputLabel for="recaptcha_site_key" value="reCAPTCHA site key"/>
                                <TextInput id="recaptcha_site_key" type="text" class="mt-1 block w-full" v-model="form.recaptcha_site_key"></TextInput>
                                <InputError v-if="form.errors && form.errors.recaptcha_site_key" class="mt-2" :message="form.errors.recaptcha_site_key"/>
                            </div>
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
import {useForm} from '@inertiajs/inertia-vue3'

export default {
    name: 'Edit',
    data() {
        return {
            form: useForm({
                locale: 'en',
                content: '',
                crm_source: '',
                recaptcha_site_key: '',
            })
        };
    }
}
</script>
