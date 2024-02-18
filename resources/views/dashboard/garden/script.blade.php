<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch(`https://staggingabsensi.labura.go.id/api-wilayah-indonesia/static/api/districts/1311.json`)
        .then(response => response.json())
        .then(districts => {
            // Mengurutkan data kecamatan berdasarkan nama
            districts.sort((a, b) => a.name.localeCompare(b.name));
            
            // Mengambil data kelurahan untuk setiap kecamatan
            districts.forEach(district => {
                fetch(`https://staggingabsensi.labura.go.id/api-wilayah-indonesia/static/api/villages/${district.id}.json`)
                .then(response => response.json())
                .then(villages => {
                    // Mengurutkan data kelurahan berdasarkan nama
                    villages.sort((a, b) => a.name.localeCompare(b.name));
                    
                    // Menambahkan opsi kecamatan ke dalam dropdown
                    const select = document.getElementById('lokasi');
                    const optgroup = document.createElement('optgroup');
                    optgroup.label = district.name;
                    villages.forEach(village => {
                        const option = document.createElement('option');
                        option.value = `${district.name},${village.name}`;
                        option.textContent = `${district.name}, ${village.name}`;
                        optgroup.appendChild(option);
                    });
                    select.appendChild(optgroup);
                    const lokasi = '{{ request()->routeIs('garden.create') ? '' : $garden->lokasi }}';
                    select.value = lokasi;
                })
                .catch(error => {
                    console.error(`Error fetching villages for district ${district.name}:`, error);
                });
            });
        })
        .catch(error => {
            console.error('Error fetching districts:', error);
        });
    });
</script>