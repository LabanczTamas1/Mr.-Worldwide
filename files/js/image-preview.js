document.addEventListener('DOMContentLoaded', function() {
    const imageUpload = document.getElementById('image-upload');
    const previewImage = document.getElementById('preview-image');
    const uploadBox = document.querySelector('.upload-box');

    imageUpload.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                if (previewImage) {
                    previewImage.src = reader.result;
                    previewImage.style.display = 'block';
                }

                if (uploadBox) {
                    uploadBox.style.visibility = 'hidden';  // Hide the upload box after selection
                } else {
                    console.error("Upload box not found.");
                }
            };
            reader.readAsDataURL(file);
        }
    });

    uploadBox.addEventListener('click', function() {
        imageUpload.click();
    });
});
