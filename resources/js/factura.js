
function calcularKilosTotal(product) {
    let kilosPorUnidad = product.querySelector('.kilosPorUnidad');
    let cantidadCJ = product.querySelector('.cantidadCJ');
    let kilosTotal = product.querySelector('.kilosTotal');

    if (kilosPorUnidad && cantidadCJ) {
    

        kilosPorUnidad.addEventListener('keyup', function() {
            if (kilosPorUnidad.value && cantidadCJ.value) {
                kilosTotal.value = kilosPorUnidad.value * cantidadCJ.value;
            }
        });
        cantidadCJ.addEventListener('keyup', function() {
            if (kilosPorUnidad.value && cantidadCJ.value) {
                kilosTotal.value = kilosPorUnidad.value * cantidadCJ.value;
            }
        });
    }else{
        console.log(kilosTotal.value)
    }
}

    let products = document.getElementsByClassName('producto');
    Array.from(products).forEach(calcularKilosTotal);

    document.getElementById('add-producto').addEventListener('click', function() {
        let container = document.getElementById('productos-container');
        let newProduct = container.children[0].cloneNode(true);
        let inputs = newProduct.getElementsByTagName('input');
        let selects = newProduct.getElementsByTagName('select');

        for (let i = 0; i < inputs.length; i++) {
            inputs[i].value = '';
        }
        for (let i = 0; i < selects.length; i++) {
            selects[i].selectedIndex = 0;
        }

        container.appendChild(newProduct);
        calcularKilosTotal(newProduct);
    
    });

    document.getElementById('remove-producto').addEventListener('click', function() {
        let container = document.getElementById('productos-container');
        if (container.children.length > 1) {
            container.removeChild(container.lastChild);
        }
    });

