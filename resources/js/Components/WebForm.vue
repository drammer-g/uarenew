<template>
    <div class="webform" ref="webform" v-html="webform"></div>
</template>

<script>
export default {
    name: "WebForm",
    data() {
        return {
            webform: '',
            form: null,
            reCAPTCHA_site_key: '',
            crmSource: null
        }
    },
    methods: {
        async getWebForm() {
            const app = this;
            return axios.get(this.route('webforms.show', {'locale': this.$page.props.locale})).then((result) => {
                app.webform = JSON.parse(result.data.content);
                app.reCAPTCHA_site_key = result.data.recaptcha_site_key;
                app.crmSource = result.data.crm_source;
            });
        },
        async formProtectInit() {
            let app = this;
            app.form = app.$refs.webform.querySelector('form');
            if (app.form == null) {
                return;
            }
            if (app.reCAPTCHA_site_key) {
                return app.reCapthaApiLoad().then(() => {
                    app.form.addEventListener('submit', function (e) {
                        let form = this;
                        app.onClick(e, form)
                    });
                })
            }
        },
        crmSourceInit(formData) {
            if (this.crmSource === null) {
                return;
            }
            axios.post(this.crmSource, formData);
        },
        async sendForm(formData) {
            console.log(formData.get('src'));
            axios.post(this.crmSource, {
                header:
                formData
            });
        },
        async reCapthaApiLoad() {
            let scriptApi = document.createElement('script');
            scriptApi.src = `https://www.google.com/recaptcha/api.js?render=${this.reCAPTCHA_site_key}`;
            // scriptApi.setAttribute('crossorigin', 'anonymous');
            let head = document.querySelector('body');
            if (head !== null) {
                return head.appendChild(scriptApi);
            }
        },
        onClick(e, form) {
            e.preventDefault();
            const app = this;
            if (app.reCAPTCHA_site_key) {
                let crmFormData = new FormData(form);
                grecaptcha.ready(function () {
                    grecaptcha.execute(app.reCAPTCHA_site_key, {action: 'submit'}).then(function (token) {
                        crmFormData.append('uarenew_antispam', 'token');
                        app.crmSourceInit(crmFormData);
                        app.sendForm(crmFormData).then(() => {
                            form.reset()
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
