document.addEventListener('DOMContentLoaded', function() {
    fetch('get_materials.php')
        .then(response => response.json())
        .then(data => {
            const materialSelect = document.getElementById('material');
            data.forEach(material => {
                const option = document.createElement('option');
                option.value = material.id;
                option.textContent = material.name;
                materialSelect.appendChild(option);
            });
        });

    document.getElementById('material').addEventListener('change', function() {
        const materialId = this.value;
        fetch(`get_designs.php?material_id=${materialId}`)
            .then(response => response.json())
            .then(data => {
                const designGrid = document.getElementById('design-grid');
                designGrid.innerHTML = '';
                data.forEach(design => {
                    const designItem = document.createElement('div');
                    designItem.className = 'design-item';
                    designItem.textContent = design.design_name;
                    designGrid.appendChild(designItem);
                });
            });
    });
});
