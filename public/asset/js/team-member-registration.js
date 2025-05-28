
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
                    pdfPreview.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else if (fileType === 'application/pdf') {
                previewImage.style.display = 'none';
                pdfPreview.style.display = 'flex';
            }

            uploadBox.classList.add('file-selected');
            icon.style.display = 'none';
            text.textContent = file.name;
        } else {
            alert('Invalid file type.');
            fileInput.value = '';
        }
    });

    if (deleteIcon) {
        deleteIcon.addEventListener('click', function () {
            fileInput.value = '';
            previewImage.src = '';
            previewImage.style.display = 'none';
            pdfPreview.style.display = 'none';
            icon.style.display = 'inline-block';
            text.textContent = 'Upload';
            uploadBox.classList.remove('file-selected');
        });
    }

    if (viewIcon) {
        viewIcon.addEventListener('click', function () {
            const file = fileInput.files[0];
            if (!file) return;

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    modalImg.src = e.target.result;
                    modal.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                alert("PDF preview is not supported in modal.");
            }
        });
    }

    modalClose.addEventListener('click', function () {
        modal.style.display = 'none';
    });
}

// Initialize upload handlers
setupUploadHandlers('resume', false);
setupUploadHandlers('photo');
setupUploadHandlers('adhar');
setupUploadHandlers('pan');
setupUploadHandlers('marksheet');

