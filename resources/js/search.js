// JavaScript untuk filter functionality - Gabungan script untuk UI dan Backend
document.addEventListener('DOMContentLoaded', function() {
    // Get reference to the filter display span
    const filterDisplaySpan = document.querySelector('.text-center.text-lg span.font-bold');
    
    // Get references to filter inputs
    const cpuIntel = document.getElementById('cpu-intel');
    const cpuAmd = document.getElementById('cpu-amd');
    const gpuGtx = document.getElementById('gpu-gtx');
    const gpuRtx = document.getElementById('gpu-rtx');
    const roomPublic = document.getElementById('room-public');
    const roomPrivate = document.getElementById('room-private');
    const ramRange = document.getElementById('ram-range');
    const tokenRange = document.getElementById('token-range');
    
    // Get references to action buttons
    const resetButton = document.getElementById('reset-filters');
    const applyButton = document.getElementById('apply-filters');
    
    let activeFilters = [];
    let pendingFilters = [];
    
    // Function to update filter display text
    function updateFilterDisplay(filtersArray) {
        if (filtersArray.length > 0) {
            filterDisplaySpan.textContent = filtersArray.join(', ');
        } else {
            filterDisplaySpan.textContent = 'Semua Produk';
        }
    }
    
    // Function to collect current filter values for display
    function collectFilterValues() {
        let filters = [];
        
        // Check CPU filters
        if (cpuIntel.checked) filters.push('Intel');
        if (cpuAmd.checked) filters.push('AMD');
        
        // Check GPU filters
        if (gpuGtx.checked) filters.push('GTX');
        if (gpuRtx.checked) filters.push('RTX');
        
        // Check Room filters
        if (roomPublic.checked) filters.push('Public');
        if (roomPrivate.checked) filters.push('Private');
        
        // Check RAM filters (range input)
        if (ramRange.value == 8) filters.push('8GB RAM');
        if (ramRange.value == 16) filters.push('16GB RAM');
        
        // Check Token filters (range input)
        if (tokenRange.value > 1) filters.push(`${tokenRange.value} Token`);
        
        return filters;
    }
    
    // Function to handle input changes (collect pending filters but don't apply yet)
    function handleInputChange() {
        pendingFilters = collectFilterValues();
    }
    
    // Function to apply filters - Send to backend
    function applyFilters() {
        const formData = new FormData();
        
        // Get search parameter from URL
        const urlParams = new URLSearchParams(window.location.search);
        const searchParam = urlParams.get('search');
        if (searchParam) {
            formData.append('search', searchParam);
        }
        
        // Get selected CPU
        const selectedCpu = document.querySelector('input[name="cpu"]:checked');
        if (selectedCpu) {
            formData.append('cpu', selectedCpu.value);
        }
        
        // Get selected GPU
        const selectedGpu = document.querySelector('input[name="gpu"]:checked');
        if (selectedGpu) {
            formData.append('gpu', selectedGpu.value);
        }
        
        // Get selected Room
        const selectedRoom = document.querySelector('input[name="room"]:checked');
        if (selectedRoom) {
            formData.append('room', selectedRoom.value);
        }
        
        // Get RAM range value
        const ramValue = ramRange.value;
        if (ramValue && ramValue !== '0') {
            formData.append('ram', ramValue);
        }
        
        // Get Token range value
        const tokenValue = tokenRange.value;
        if (tokenValue && tokenValue !== '1') {
            formData.append('token', tokenValue);
        }
        
        // Build query string
        const queryParams = new URLSearchParams();
        for (let [key, value] of formData.entries()) {
            queryParams.append(key, value);
        }
        
        // Update active filters for UI
        activeFilters = pendingFilters;
        updateFilterDisplay(activeFilters);
        
        console.log('Filters applied:', activeFilters);
        
        // Close the drawer after applying filters
        const drawerElement = document.getElementById('drawer-disabled-backdrop');
        if (typeof window.Flowbite !== 'undefined' && drawerElement) {
            const drawer = window.Flowbite.getInstance('Drawer', drawerElement);
            if (drawer) drawer.hide();
        }
        
        // Redirect to search page with filters
        window.location.href = '/search?' + queryParams.toString();
    }
    
    // Function to reset filters
    function resetFilters() {
        // Reset radio inputs
        cpuIntel.checked = false;
        cpuAmd.checked = false;
        gpuGtx.checked = false;
        gpuRtx.checked = false;
        roomPublic.checked = false;
        roomPrivate.checked = false;
        
        // Reset range inputs
        ramRange.value = 0;
        tokenRange.value = 1;
        
        // Update pending filters
        pendingFilters = [];
        
        // Also update active filters and display immediately
        activeFilters = [];
        updateFilterDisplay(activeFilters);
        
        console.log('Filters reset');
        
        // Get search parameter and redirect with only search parameter
        const urlParams = new URLSearchParams(window.location.search);
        const searchParam = urlParams.get('search');
        
        if (searchParam) {
            window.location.href = '/search?search=' + encodeURIComponent(searchParam);
        } else {
            window.location.href = '/search';
        }
    }
    
    // Set current filter values based on URL parameters (untuk maintain state)
    const urlParams = new URLSearchParams(window.location.search);
    
    // Set CPU filter
    const cpuParam = urlParams.get('cpu');
    if (cpuParam) {
        const cpuRadio = document.getElementById(cpuParam);
        if (cpuRadio) cpuRadio.checked = true;
    }
    
    // Set GPU filter
    const gpuParam = urlParams.get('gpu');
    if (gpuParam) {
        const gpuRadio = document.getElementById(gpuParam);
        if (gpuRadio) gpuRadio.checked = true;
    }
    
    // Set Room filter
    const roomParam = urlParams.get('room');
    if (roomParam) {
        const roomRadio = document.getElementById(roomParam);
        if (roomRadio) roomRadio.checked = true;
    }
    
    // Set RAM range
    const ramParam = urlParams.get('ram');
    if (ramParam) {
        ramRange.value = ramParam;
    }
    
    // Set Token range
    const tokenParam = urlParams.get('token');
    if (tokenParam) {
        tokenRange.value = tokenParam;
    }
    
    // Add event listeners to all filter inputs
    const radioInputs = document.querySelectorAll('input[type="radio"]');
    radioInputs.forEach(input => {
        input.addEventListener('change', handleInputChange);
    });
    
    // Add event listeners to range inputs
    const rangeInputs = document.querySelectorAll('input[type="range"]');
    rangeInputs.forEach(input => {
        input.addEventListener('input', handleInputChange);
    });
    
    // Add event listeners to buttons
    if (resetButton) resetButton.addEventListener('click', resetFilters);
    if (applyButton) applyButton.addEventListener('click', applyFilters);
    
    // Initialize filters
    pendingFilters = collectFilterValues();
    activeFilters = pendingFilters;
    updateFilterDisplay(activeFilters);
    
    // If using Flowbite, initialize the drawer
    if (typeof window.Flowbite !== 'undefined') {
        const drawerElement = document.getElementById('drawer-disabled-backdrop');
        if (drawerElement) {
            const drawer = window.Flowbite.getInstance('Drawer', drawerElement);
            if (!drawer) {
                new window.Flowbite.Drawer(drawerElement);
            }
        }
    }
});