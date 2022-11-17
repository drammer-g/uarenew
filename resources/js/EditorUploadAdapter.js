class EditorUploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }

    //Start the upload process
    upload() {
        return this.loader.file
            .then(file => new Promise((resolve, reject) => {
                this._initRequest();
                this._initListeners(resolve, reject, file);
                this._sendRequest(file);
            }));
    }

    // Abort the upload process
    abort() {
        if (this.xhr) {
            this.xhr.abort();
        }
    }

    // Initializes the XMLHttpRequest
    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();
        xhr.open('POST', `${window.APP_URL}/images/upload?location=images`, true);

        const token = document.querySelector('meta[name="csrf-token"]').content;
        xhr.setRequestHeader('X-CSRF-TOKEN', token);

        xhr.responseType = 'json';
    }

    _initListeners(resolve, reject, file) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Cold not upload file: ${file.name}.`;
        xhr.addEventListener('error', () => reject(genericErrorText));
        xhr.addEventListener('abort', () => reject());
        xhr.addEventListener('load', () => {
            const response = xhr.response;

            if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText)
            }

            console.log(response.urls)

            resolve(response.urls);
        });
        if (xhr.upload) {
            xhr.upload.addEventListener('progress', evt => {
                if (evt.lengthComputable) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            })
        }
    }

    //Prepare the data and sends the request
    _sendRequest(file) {
        const data = new FormData();
        data.append('upload', file);

        //Send the request
        this.xhr.send(data);
    }
}

export default EditorUploadAdapter;
