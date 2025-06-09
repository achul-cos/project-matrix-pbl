// resources/js/app.js

function togglePasswordVisibility(inputId, iconId) {
  const passwordInput = document.getElementById(inputId);
  const eyeIcon = document.getElementById(iconId);
  if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      eyeIcon.innerHTML = `
      <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.965
      9.965 0 012.66-4.306m2.06-1.992A9.97 9.97 0 0112 5c4.477 0 8.268 2.943 9.542 7a10.028 10.028 0 01-4.661
      5.313M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>  
      <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18"></path>`;
  } else {
      passwordInput.type = 'password';
      eyeIcon.innerHTML = `
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
      <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268
      2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>`;
  }
}

// Agar fungsi bisa dipakai global dari HTML, tulis seperti ini
window.togglePasswordVisibility = togglePasswordVisibility;

let cropper;
const photoInput = document.getElementById('photoInput');
const cropperModal = document.getElementById('cropperModal');
const imageToCrop = document.getElementById('imageToCrop');
const profilePhoto = document.getElementById('profilePhoto');
const croppedImageDataInput = document.getElementById('croppedImageData');
const saveBtn = document.getElementById('saveBtn');
const cancelCropBtn = document.getElementById('cancelCropBtn');
const cropBtn = document.getElementById('cropBtn');

photoInput.addEventListener('change', function(e) {
    const files = e.target.files;
    if (files && files.length > 0) {
        const file = files[0];
        const url = URL.createObjectURL(file);

        imageToCrop.src = url;

        // Tampilkan modal
        cropperModal.classList.remove('hidden');

        if(cropper) {
            cropper.destroy();
        }
        cropper = new Cropper(imageToCrop, {
            aspectRatio: 1,
            viewMode: 1,
            minContainerHeight: 400,
            minContainerWidth: 400,
            movable: true,
            zoomable: true,
            rotatable: false,
            scalable: false,
        });
    }
});

cancelCropBtn.addEventListener('click', () => {
    // tutup modal dan reset input file
    cropperModal.classList.add('hidden');
    photoInput.value = null;
    if(cropper) {
        cropper.destroy();
        cropper = null;
    }
});

cropBtn.addEventListener('click', () => {
    if (!cropper) return;

    cropper.getCroppedCanvas({
        width: 300,
        height: 300,
        imageSmoothingQuality: 'high',
    }).toBlob((blob) => {
        const reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = () => {
            croppedImageDataInput.value = reader.result; // Base64 cropped image
            profilePhoto.src = reader.result; // Update preview foto utama
            saveBtn.disabled = false;
            saveBtn.classList.remove('cursor-not-allowed', 'bg-[#556B2F]');
            saveBtn.classList.add('bg-[#556B2F]');
            cropperModal.classList.add('hidden');
            cropper.destroy();
            cropper = null;
        };
    }, 'image/jpeg');
});

document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('product-image');
    const preview = document.getElementById('preview');
    const imagePreviewContainer = document.getElementById('image-preview');

    if (input) {
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.src = event.target.result;
                    imagePreviewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                imagePreviewContainer.classList.add('hidden');
            }
        });
    }
});


module.exports = {
  content: ['resources/**/*.blade.php', 'public/**/*.html', 'src/**/*.js'],
  theme: {
    extend: {
      keyframes: {
        fadeUp: {
          '0%':   { opacity: '0', transform: 'translateY(40px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        fadeLeft: {
          '0%':   { opacity: '0', transform: 'translateX(40px)' },
          '100%': { opacity: '1', transform: 'translateX(0)' },
        },
      },
      animation: {
        'fade-up':   'fadeUp   0.7s ease-out forwards',
        'fade-left': 'fadeLeft 0.7s ease-out forwards',
      },
    },
  },
  plugins: [],
}
