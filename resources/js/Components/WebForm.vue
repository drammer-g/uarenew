<script setup>
import InputError from "@/Components/InputError.vue";
</script>
<template>
    <div class="web-form relative">
        <p v-if="$page.props.flash.success" class="form flash-message"
           :class="[($page.props.flash.success) ?  'success': null]">
            Message has ben send!</p>
        <form name="crmFormWebForm" method="post" @submit.prevent="onClick">
            <section v-if="form.processing" class="loaderDiv">
                <div class="imgSpinner"></div>
            </section>
            <div class="form-group text"><label class="attribute-label required" for="">
                Name</label>
                <input type="text"
                       name="name"
                       class="control"
                       placeholder=""
                       id="name"
                       v-model="form.name"
                       required="">
                <InputError class="mt-2" :message="form.errors.name"/>
            </div>
            <div class="form-group email"><label class="attribute-label required" for="">Email</label> <input
                v-model="form.email"
                type="email" name="email" class="control" placeholder="" id="persons[emails]"
                required="">
                <InputError class="mt-2" :message="form.errors.email"/>
            </div>
            <div class="form-group textarea"><label class="attribute-label " for="">Message</label> <textarea
                name="leads[description]" class="control" id="leads[description]" v-model="form.message"></textarea>
                <InputError class="mt-2" :message="form.errors.message"/>
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-xl btn-primary" :disabled="form.processing">Send</button>
            </div>
            <div class="crm-form-logo">Powered by &nbsp;<a href="http://y-digital.team"
                                                           target="_blank">y-digital.team </a>
            </div>
        </form>
    </div>
</template>

<script>
import {useForm} from '@inertiajs/inertia-vue3'

export default {
    name: "WebForm",
    props: {
        flash: Object
    },
    data() {
        return {
            webform: '',
            form: useForm({
                name: '',
                email: '',
                message: '',
                uarenew_antispam: null,
            }),
            reCAPTCHA_site_key: '',
            crmSource: null,
        }
    },
    methods: {
        async getWebForm() {
            const app = this;
            return axios.get(this.route('webforms.show', {'locale': this.$page.props.locale})).then((result) => {
                app.reCAPTCHA_site_key = result.data.recaptcha_site_key;
            });
        },
        async formProtectInit() {
            let app = this;
            if (app.reCAPTCHA_site_key) {
                return app.reCapthaApiLoad().then(() => {
                    //
                })
            }
        },
        async sendForm() {
            return this.form.post('/leads', {
                onSuccess: params => () => {
                    this.form.reset()
                }
            });
        },
        async reCapthaApiLoad() {
            let scriptApi = document.createElement('script');
            scriptApi.src = `https://www.google.com/recaptcha/api.js?render=${this.reCAPTCHA_site_key}`;
            let head = document.querySelector('body');
            if (head !== null) {
                return head.appendChild(scriptApi);
            }
        },
        onClick(e) {
            e.preventDefault();
            const app = this;
            app.message = '';
            if (app.reCAPTCHA_site_key) {
                grecaptcha.ready(function () {
                    grecaptcha.execute(app.reCAPTCHA_site_key, {action: 'submit'}).then(function (token) {
                        app.form.uarenew_antispam = token;
                        // app.crmSourceInit(crmFormData);
                        app.sendForm().then(() => {
                            app.form.reset()
                        })
                        // Add your logic to submit to your backend server here.
                    });
                });
            }
        }
    },
    mounted() {
        const app = this;
        setTimeout(() => {
            app.getWebForm().then(() => {
                app.formProtectInit();
            })
        }, 100)
    }
}
</script>

<style scoped>

</style>
