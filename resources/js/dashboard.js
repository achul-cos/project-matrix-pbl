console.log("Loaded");

/* ------------------------------------------------------------------
   resources/js/app.js
   ------------------------------------------------------------------ */
import 'flowbite';
import { DataTable } from 'simple-datatables';   // ES-module

/* ------------------------------------------------------------------
   1.  Datatable dengan header filter
   ------------------------------------------------------------------ */
document.addEventListener('DOMContentLoaded', () => {
    const tableEl = document.querySelector('#filter-table');
    if (tableEl && typeof DataTable !== 'undefined') {
        new DataTable(tableEl, {
            tableRender: (_data, table, type) => {
                if (type === 'print') return table;

                const thead = table.childNodes[0];
                const filterRow = {
                    nodeName: 'TR',
                    attributes: { class: 'search-filtering-row' },
                    childNodes: Array.from(thead.childNodes[0].childNodes).map(
                        (_th, i) => ({
                            nodeName: 'TH',
                            childNodes: [{
                                nodeName: 'INPUT',
                                attributes: {
                                    class: 'datatable-input',
                                    type: 'search',
                                    'data-columns': `[${i}]`,
                                },
                            }],
                        }),
                    ),
                };
                thead.childNodes.push(filterRow);
                return table;
            },
        });
    }
});

/* ------------------------------------------------------------------
   2. Preview gambar
   ------------------------------------------------------------------ */
window.previewImage = function (event, index) {
    const input = event.target;
    const preview = document.getElementById(`preview-image${index}`);
    if (!input.files?.[0] || !preview) return;

    const reader = new FileReader();
    reader.onload = e => (preview.src = e.target.result);
    reader.readAsDataURL(input.files[0]);
};

/* ------------------------------------------------------------------
   3.  Form upload + progress bar
   ------------------------------------------------------------------ */
document.addEventListener('DOMContentLoaded', () => {
    const form         = document.querySelector('#yourFormID');
    if (!form) return;

    const loadingModal = document.getElementById('loadingModal');
    const bar          = document.getElementById('progressBar');
    const txt          = document.getElementById('progressText');

    form.addEventListener('submit', e => {
        e.preventDefault();
        showLoading();
        uploadWithXHR(new FormData(form));
    });

    function showLoading() {
        loadingModal?.classList.remove('hidden');
        loadingModal?.classList.add('flex');
        bar.style.width = '0%';
        txt.textContent = '0 %';
    }

    function uploadWithXHR(fd) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);

        // CSRF + AJAX header
        const token = document.querySelector('meta[name="csrf-token"]')?.content;
        if (token) xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        // progress
        xhr.upload.addEventListener('progress', e => {
            if (e.lengthComputable) {
                const pct = Math.round((e.loaded / e.total) * 100);
                bar.style.width = pct + '%';
                txt.textContent = pct + ' %';
            }
        });

        // selesai
        xhr.onreadystatechange = () => {
            if (xhr.readyState !== 4) return;

            bar.style.width = '100%';
            txt.textContent = '100 %';

            // tutup loading
            loadingModal?.classList.add('hidden');

            if (xhr.status === 200) {
                const res = JSON.parse(xhr.responseText);
                showToast(res.success ?? 'Berhasil!', 'success');
                // window.location.href = res.redirect ?? window.location.href;
            } else if (xhr.status === 422) {
                const res = JSON.parse(xhr.responseText);
                alert('Validasi gagal:\n' + Object.values(res.errors).flat().join('\n'));
            } else {
                showToast('Upload gagal!', 'error');
            }
        };

        xhr.send(fd);
    }
});

/* ------------------------------------------------------------------
   4.  Toast helper (expose ke global)
   ------------------------------------------------------------------ */
window.showToast = function (message, type = 'success') {
    const colors = {
        success: 'bg-green-100 text-green-800',
        error:   'bg-red-100 text-red-800',
    };
    const icons = {
        success: `<svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 011.414-1.414L8.414 12.172l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>`,
        error:   `<svg class="w-5 h-5 text-red-500"  fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM9 4a1 1 0 012 0v4a1 1 0 01-2 0V4zm0 8a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>`,
    };

    const toast = document.createElement('div');
    toast.className = `flex items-center w-full max-w-xs p-4 mb-2 ${colors[type]} rounded-lg shadow`;
    toast.innerHTML = `
        <div class="flex-shrink-0 w-8 h-8">${icons[type]}</div>
        <div class="ml-3 text-sm font-normal">${message}</div>
        <button onclick="this.parentElement.remove();" class="ml-auto text-gray-400 hover:text-gray-900">
            <svg class="w-4 h-4" viewBox="0 0 20 20"><path fill="currentColor" d="M10 8.586 4.707 3.293 3.293 4.707 8.586 10l-5.293 5.293 1.414 1.414L10 11.414l5.293 5.293 1.414-1.414L11.414 10l5.293-5.293-1.414-1.414L10 8.586z"/></svg>
        </button>`;
    document.getElementById('toast-container')?.appendChild(toast);
    setTimeout(() => toast.remove(), 4000);
};

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
            // Simpan hasil crop ke input hidden
            croppedImageDataInput.value = reader.result;

            // Tampilkan preview di img utama
            profilePhoto.src = reader.result;

            // Tutup modal cropper
            cropperModal.classList.add('hidden');

            // Hancurkan cropper instance
            cropper.destroy();
            cropper = null;
        };
    }, 'image/jpeg');
});

photoInput.addEventListener('change', function(e) {
    const files = e.target.files;
    if (files && files.length > 0) {
        const file = files[0];

        const fileName = file.name.toLowerCase();
        const mimeType = file.type;

        // Cek jika ekstensi atau MIME type adalah HEIC
        if (fileName.endsWith('.heic') || mimeType === 'image/heic' || mimeType === 'image/heif') {
            alert('Format gambar HEIC tidak didukung. Silakan pilih gambar PNG, JPG, JPEG, atau GIF.');
            photoInput.value = null; // Reset input
            return; // Hentikan proses, jangan buka modal
        }

        const url = URL.createObjectURL(file);
        imageToCrop.src = url;

        // Tampilkan modal cropper
        cropperModal.classList.remove('hidden');

        // Hancurkan cropper lama jika ada
        if (cropper) {
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

