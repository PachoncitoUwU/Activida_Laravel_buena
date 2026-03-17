<h1>Productos</h1>

<ul class="productos-lista">
    @foreach($products as $product)
        <li class="producto-item">
            <span>{{ $product->name }}</span>
            <button onclick='agregarAlCarrito(@json($product))'>
                Añadir al carrito
            </button>
        </li>
    @endforeach
</ul>

    <div id="carrito">
        <h2>Carrito</h2>
    </div>

<script>
    // Inicialización del carrito (Uso de || [] es más limpio)
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    console.log("carrito inicial", carrito);
    mostrarCarrito();

    function agregarAlCarrito(product) {
        let posicion = carrito.findIndex(item => item.id === product.id);
        
        if (posicion !== -1) {
            carrito[posicion].cantidad++;
        } else {
            // Es mejor crear una copia del objeto para no modificar el original de Laravel
            let nuevoProducto = { ...product, cantidad: 1 };
            carrito.push(nuevoProducto);
        }
        actualizarTodo();
    }

    function mostrarCarrito() {
        let divCarrito = document.getElementById('carrito');
        if (!divCarrito) return; // Evita errores si el div no existe

        divCarrito.innerHTML = '<h2>Carrito</h2>';

        // CORRECCIÓN: .map o .forEach necesitan paréntesis si usas más de un parámetro (item, index)
        carrito.forEach((item, index) => {
            divCarrito.innerHTML += `
                <p>${item.name} - Cantidad: ${item.cantidad}
                    <button onclick="eliminarDelCarrito(${index})">Eliminar</button>
                </p>`;
        });
    }

    function eliminarDelCarrito(index) {
        if (carrito[index].cantidad > 1) {
            carrito[index].cantidad--;
        } else {
            carrito.splice(index, 1);
        }
        actualizarTodo();
    }

    // Función auxiliar para no repetir código de guardado y renderizado
    function actualizarTodo() {
        localStorage.setItem("carrito", JSON.stringify(carrito));
        console.log("Carrito actualizado:", carrito);
        mostrarCarrito();
    }
</script>