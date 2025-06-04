function setupUploadHandlers(prefix, acceptOnlyImages = true) {
    const fileInput = document.getElementById(`${prefix}Upload`);
    const previewImage = document.getElementById(`${prefix}PreviewImage`);
    const icon = document.getElementById(`${prefix}Icon`);
    const text = document.getElementById(`${prefix}Text`);
    const deleteIcon = document.getElementById(`${prefix}Delete`);
    const viewIcon = document.getElementById(`${prefix}View`);
    const pdfPreview = document.getElementById(`${prefix}PdfPreview`);
    const uploadBox = document.getElementById(`${prefix}UploadBox`);

    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const modalClose = document.getElementById('modalClose');

    if (!fileInput) return;

    // ✅ INITIAL CHECK FOR PRELOADED FILE (image or PDF)
    if ((previewImage && previewImage.src && previewImage.style.display !== 'none') ||
        (pdfPreview && pdfPreview.style.display !== 'none')) {
        uploadBox.classList.add('file-selected');
        if (text) text.textContent = 'Uploaded';
        if (icon) icon.style.display = 'none';
    }

    // ✅ Allow re-uploading same file by resetting input on click
    fileInput.addEventListener('click', function () {
        fileInput.value = '';
    });

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (!file) return;

        const fileType = file.type;

        if (!acceptOnlyImages || fileType.startsWith('image/') || fileType === 'application/pdf') {
            if (fileType.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                    if (pdfPreview) pdfPreview.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else if (fileType === 'application/pdf') {
                if (previewImage) previewImage.style.display = 'none';
                if (pdfPreview) pdfPreview.style.display = 'flex';
            }

            uploadBox.classList.add('file-selected');
            if (icon) icon.style.display = 'none';
            if (text) text.textContent = file.name;
        } else {
            alert('Invalid file type.');
            fileInput.value = '';
        }
    });

    // ✅ Delete/reset handler
    if (deleteIcon) {
        deleteIcon.addEventListener('click', function () {
            fileInput.value = '';
            if (previewImage) {
                previewImage.src = '';
                previewImage.style.display = 'none';
            }
            if (pdfPreview) pdfPreview.style.display = 'none';
            if (icon) icon.style.display = 'inline-block';
            if (text) text.textContent = 'Upload';
            uploadBox.classList.remove('file-selected');
        });
    }

    // ✅ View in modal
    if (viewIcon) {
        viewIcon.addEventListener('click', function () {
            const file = fileInput.files[0];

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    modalImg.src = e.target.result;
                    modal.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                if (previewImage && previewImage.src && previewImage.style.display !== 'none') {
                    modalImg.src = previewImage.src;
                    modal.style.display = 'block';
                } else {
                    alert("PDF preview is not supported in modal.");
                }
            }
        });
    }

    if (modalClose) {
        modalClose.addEventListener('click', function () {
            modal.style.display = 'none';
        });
    }
}

// ✅ Initialize all handlers
setupUploadHandlers('resume', false);
setupUploadHandlers('photo');
setupUploadHandlers('adhar');
setupUploadHandlers('pan');
setupUploadHandlers('marksheet');
