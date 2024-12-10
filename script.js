// Función para cargar productos
function loadProducts() {
    fetch('obtener_productos.php')
        .then(response => response.json())
        .then(products => {
            const productList = document.getElementById('productList');
            productList.innerHTML = '';
            products.forEach(product => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td>${product.nombre}</td>
                    <td>${product.descripcion}</td>
                    <td>${product.precio}</td>
                    <td>${product.stock}</td>
                    <td>
                        <button onclick="editProduct(${product.id}, '${product.nombre}', '${product.descripcion}', ${product.precio}, ${product.stock})">Editar</button>
                        <button onclick="deleteProduct(${product.id})">Eliminar</button>
                    </td>
                `;

                productList.appendChild(row);
            });
        });
}

// Función para guardar o actualizar un producto
document.getElementById('productForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const id = document.getElementById('productId').value;
    const nombre = document.getElementById('nombre').value;
    const descripcion = document.getElementById('descripcion').value;
    const precio = document.getElementById('precio').value;
    const stock = document.getElementById('stock').value;

    const url = id ? 'actualizar_producto.php' : 'guardar_producto.php';
    const data = { id, nombre, descripcion, precio, stock };

    fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        alert(result.message);
        document.getElementById('productForm').reset();
        document.getElementById('productId').value = '';
        loadProducts();
    });
});

// Función para cargar datos de un producto en el formulario para editar
function editProduct(id, nombre, descripcion, precio, stock) {
    document.getElementById('productId').value = id;
    document.getElementById('nombre').value = nombre;
    document.getElementById('descripcion').value = descripcion;
    document.getElementById('precio').value = precio;
    document.getElementById('stock').value = stock;
}

// Función para eliminar un producto
function deleteProduct(id) {
    if (confirm('¿Estás seguro de eliminar este producto?')) {
        fetch('eliminar_producto.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id })
        })
        .then(response => response.json())
        .then(result => {
            alert(result.message);
            loadProducts();
        });
    }
}

// Cargar productos al cargar la página
loadProducts();
